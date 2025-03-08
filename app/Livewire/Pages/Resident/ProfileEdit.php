<?php

namespace App\Livewire\Pages\Resident;

use App\Models\Resident;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Add this line to import the User model
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\UserType;

class ProfileEdit extends Component
{
    public $profilePicture;
    public $currentProfilePicture;

    public $phone;
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

    public $resident;

    public function mount(): void
    {

        $user = Auth::user();
        $this->phone = $user->phone;
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

        $this->resident = Resident::where('user_id', $user->id)->first();
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
    if (!$user instanceof User) {
        throw new \Exception('Authenticated user is not an instance of User model.');
    }

    // Validate input fields
    $validated = $this->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'middle_name' => ['nullable', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'sex' => ['required', 'in:male,female'],
        'date_of_birth' => ['required', 'date', 'before:18 years ago'],
    ]);

    // Convert display date format to 'Y-m-d' before saving
    try {
        $validated['date_of_birth'] = Carbon::createFromFormat('F j, Y', $this->date_of_birth)->format('Y-m-d');
    } catch (\Exception $e) {
        session()->flash('feedback', 'Invalid date format. Please use a valid format (e.g., January 1, 2000).');
        session()->flash('feedback_type', 'error');
        return;
    }

    // Capitalize names
    $validated['first_name'] = ucwords(strtolower($validated['first_name']));
    $validated['middle_name'] = $validated['middle_name'] ? ucwords(strtolower($validated['middle_name'])) : null;
    $validated['last_name'] = ucwords(strtolower($validated['last_name']));

    // Update user details
    $user->update($validated);

    // Refresh Livewire state to reflect changes
    $this->first_name = $user->first_name;
    $this->middle_name = $user->middle_name;
    $this->last_name = $user->last_name;
    $this->sex = $user->sex;
    $this->date_of_birth = Carbon::parse($user->date_of_birth)->format('F j, Y');

    session()->flash('feedback', 'Personal information updated successfully.');
    session()->flash('feedback_type', 'success');
}


    public function updateAccountInfo(): void
    {
        $user = Auth::user(); // Get the authenticated user
        if (!$user instanceof User) {
            throw new \Exception('Authenticated user is not an instance of User model.');
        }

        // Determine what needs to be updated
        $isPasswordChanged = !empty($this->password);
        $isPhoneChanged = !empty($this->phone) && $user->phone !== $this->phone;
        $isCurrentPasswordFilled = !empty($this->current_password);

        // If no changes are detected, reset the form and show a message
        if (!$isPasswordChanged && !$isPhoneChanged && $isCurrentPasswordFilled) {
            $this->password = null;
            $this->password_confirmation = null;
            $this->current_password = null;

            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'No changes were made to your account information.');
            session()->flash('feedback_type', 'info');
            return;
        }

        // If no actual changes to phone, or password
        if (!$isPasswordChanged && !$isPhoneChanged) {
            $this->phone = $user->phone;
            $this->password = null;
            $this->password_confirmation = null;

            session(['hideSearchBar' => true]); // Hide search bar
            session()->flash('feedback', 'No changes were made to your account information.');
            session()->flash('feedback_type', 'info');
            return;
        }

        // Prepare validation rules dynamically
        $rules = ['current_password' => ['required', 'string']]; // Current password is always required


        if ($isPhoneChanged) {
            $rules['phone'] = [
                'regex:/^0\d{10}$/',
                'unique:users,phone,' . $user->id
            ];
        }

        if ($isPasswordChanged) {
            $rules['password'] = [
                'required',
                'confirmed',
                'min:8',
                'regex:/[A-Z]/',  // At least one uppercase letter
                'regex:/[a-z]/',  // At least one lowercase letter
                'regex:/[0-9]/',  // At least one digit
                'regex:/[@$!%*?&]/' // At least one special character
            ];
            $rules['password_confirmation'] = 'required|same:password';
        }

        // Validate input data
        $validatedData = $this->validate($rules, [
            'phone.regex' => 'Phone number must be a valid Philippine phone number (e.g., 09123456789).',
            'phone.unique' => 'The phone number is already in use. Please use a different one.',
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
        if ($isPhoneChanged) {
            $user->phone = preg_replace('/^0/', '+63', $this->phone);
        }

        $user->save(); // Save changes to the database
        $user->refresh();

        // Reset the form fields
        $this->phone = $user->phone;
        $this->password = null;
        $this->password_confirmation = null;

        // Provide feedback to the user
        session(['hideSearchBar' => true]); // Hide search bar
        session()->flash('feedback', 'Account information updated successfully.');
        session()->flash('feedback_type', 'success');
    }



    public function render()
    {
        return view('livewire.pages.resident.profile-edit');
    }
}
