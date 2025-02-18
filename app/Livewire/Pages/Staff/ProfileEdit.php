<?php

namespace App\Livewire\Pages\Staff;

use App\Models\StaffLog;
use App\Models\UserType;
use App\Models\Staff;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $profilePicture;
    public $currentProfilePicture;

    public $username;
    public $current_password;
    public $password;
    public $password_confirmation;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $sex;
    public $date_of_birth;
    public $user_type;
    public $userTypeName;
    public $showModal = false;

    public $staff;
    public $staff_role;
    public $permissions;

    public function mount(): void
    {

        $user = Auth::user();
        $this->username = $user->username;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->sex = $user->sex;

        // Format the date for display (F j, Y) if it exists
        $this->date_of_birth = $user->date_of_birth
            ? Carbon::parse($user->date_of_birth)->format('F j, Y')
            : null;

        $this->user_type = $user->user_type;
        $this->userTypeName = UserType::where('id', $this->user_type)->value('type');

        $this->staff = Staff::where('user_id', $user->id)->first();

        if ($this->staff && $this->staff->staff_roles_permissions_id) {
            $staffRole = StaffRole::with('permissions')->find($this->staff->staff_roles_permissions_id);
            $this->staff_role = $staffRole ? $staffRole->name : 'No Role Assigned';

            // Store permissions as an array of objects
            $this->permissions = $staffRole && $staffRole->permissions->isNotEmpty()
                ? $staffRole->permissions
                : collect(); // Empty collection if no permissions
        } else {
            $this->staff_role = 'No Role Assigned';
            $this->permissions = collect(); // Empty collection
        }
    }

    public function updatedDateOfBirth($value): void
    {
        // Ensure date_of_birth is formatted correctly when updated
        try {
            $this->date_of_birth = Carbon::parse($value)->format('F j, Y');
        } catch (\Exception $e) {
            $this->date_of_birth = null; // Handle invalid date input
        }
    }

    public function updateBasicInfo(): void
    {
        $user = Auth::user();

        // Validate input fields
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'in:male,female'],
            'date_of_birth' => ['required', 'date', 'before:18 years ago'],
        ]);

        try {
            // Convert date_of_birth to 'Y-m-d' only after validation
            $validated['date_of_birth'] = Carbon::createFromFormat('F j, Y', $this->date_of_birth)
                ->format('Y-m-d');
        } catch (\Exception $e) {
            // Handle invalid date format (unlikely since validation already passed)
            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'Invalid date format. Please use a valid format (e.g., January 1, 2000).');
            session()->flash('feedback_type', 'error');
            return;
        }

        // Format names to capitalize each word
        $validated['first_name'] = ucwords(strtolower($validated['first_name']));
        $validated['middle_name'] = $validated['middle_name'] ? ucwords(strtolower($validated['middle_name'])) : null;
        $validated['last_name'] = ucwords(strtolower($validated['last_name']));

        // Check for changes and update only if necessary
        $hasChanges = false;
        foreach ($validated as $key => $value) {
            if ($key === 'date_of_birth') {
                $existingDate = $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : null;
                if ($existingDate !== $value) {
                    $hasChanges = true;
                }
            } else {
                if ($user->$key !== $value) {
                    $hasChanges = true;
                }
            }
        }

        if ($hasChanges) {
            try {
                // Update user data
                $user->update([
                    'first_name' => $validated['first_name'],
                    'middle_name' => $validated['middle_name'],
                    'last_name' => $validated['last_name'],
                    'sex' => $validated['sex'],
                    'date_of_birth' => $validated['date_of_birth'], // Save in Y-m-d format
                ]);

                // Reformat the date for consistent display
                $this->date_of_birth = Carbon::parse($validated['date_of_birth'])->format('F j, Y');

                // Log admin action
                StaffLog::create([
                    'staff_id' => $user->id,
                    'action' => 'Updated Basic Information Successfully',
                    'dateTime' => now(),
                    'user_id' => $user->id,
                ]);

                session(['hideSearchBar' => true]); // Hide search bar
                session()->flash('feedback', 'Personal information updated successfully.');
                session()->flash('feedback_type', 'success');
            } catch (\Exception $e) {
                session(['hideSearchBar' => true]); // Hide search bar
                session()->flash('feedback', 'Something went wrong. Please try again.');
                session()->flash('feedback_type', 'error');
            }
        } else {
            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'No changes were made to your basic information.');
            session()->flash('feedback_type', 'info');
        }
    }

    public function updateAccountInfo(): void
    {
        $user = Auth::user(); // Get the authenticated user

        // Determine what needs to be updated
        $isPasswordChanged = !empty($this->password);
        $isUsernameChanged = $user->username !== $this->username;
        $isCurrentPasswordFilled = !empty($this->current_password);

        // If no changes are detected, reset the form and show a message
        if (!$isPasswordChanged && !$isUsernameChanged && $isCurrentPasswordFilled) {
            $this->password = null;
            $this->password_confirmation = null;
            $this->current_password = null;

            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'No changes were made to your account information.');
            session()->flash('feedback_type', 'info');
            return;
        }

        // If no actual changes to username or password
        if (!$isPasswordChanged && !$isUsernameChanged) {
            $this->username = $user->username;
            $this->password = null;
            $this->password_confirmation = null;

            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'No changes were made to your account information.');
            session()->flash('feedback_type', 'info');
            return;
        }

        // Prepare validation rules dynamically
        $rules = ['current_password' => ['required', 'string']]; // Current password is always required

        if ($isUsernameChanged) {
            $rules['username'] = [
                'required', 'string', 'max:255',
                'unique:users,username,' . $user->id
            ];
        }

        if ($isPasswordChanged) {
            $rules['password'] = [
                'required', 'confirmed', 'min:8',
                'regex:/[A-Z]/',  // At least one uppercase letter
                'regex:/[a-z]/',  // At least one lowercase letter
                'regex:/[0-9]/',  // At least one digit
                'regex:/[@$!%*?&]/' // At least one special character
            ];
            $rules['password_confirmation'] = 'required|same:password';
        }

        // Validate input data
        $validatedData = $this->validate($rules, [
            'username.required' => 'Username is a required field.',
            'username.string' => 'Username must be a valid string.',
            'username.max' => 'Username cannot exceed 255 characters.',
            'username.unique' => 'The username is already taken, please choose a different one.',
            'current_password.required' => 'The current password is required to update your account information.',
            'current_password.string' => 'The current password must be a valid string.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'password_confirmation.required' => 'You must confirm your new password.',
            'password_confirmation.same' => 'Password confirmation does not match the new password.',
        ]);

        // Verify the current password
        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        // Prevent reusing the same password
        if ($isPasswordChanged && Hash::check($this->password, $user->password)) {
            $this->addError('password', 'The new password cannot be the same as the current password.');
            return;
        }

        // Update the user model with changes
        if ($isPasswordChanged) {
            $user->password = Hash::make($this->password);
        }
        if ($isUsernameChanged) {
            $user->username = $this->username;
        }

        $user->save(); // Save changes to the database

        // Log the update action for auditing purposes
        StaffLog::create([
            'staff_id' => $user->id,
            'action' => 'Updated Account Information Successfully',
            'dateTime' => now(),
            'user_id' => $user->id,
        ]);

        // Reset the form fields
        $this->username = $user->username;
        $this->password = null;
        $this->password_confirmation = null;

        // Provide feedback to the user
        session(['hideSearchBar' => true]); // Hide search bar
        session()->flash('feedback', 'Account information updated successfully.');
        session()->flash('feedback_type', 'success');
    }


    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.staff.profile-edit');
    }
}
