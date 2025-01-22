<?php

namespace App\Livewire\Forms;

use App\Enums\Staff\StaffStatus;
use App\Models\Staff;
use App\Models\User;
use App\Models\UserProfilePhoto;
use App\Models\StaffRolesPermissions;
use App\Models\StaffRole;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;
use Ramsey\Collection\Collection;
use Illuminate\Support\Carbon;

class AddUserAccountForm extends Form
{
    // Basic Information
    public string $first_name = '';

    public string $middle_name = '';

    public string $last_name = '';

    public string $sex = '';

    public ?string $date_of_birth = null;

    public string $username = '';

    public string $staffRolesPermissions = '';

    public ?string $user_role = null;
    //Account information

    public string $password = '';

    public bool $user_status = true;
    public $form;
    public $photo_path;

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'sex' => ['required', 'in:male,female'],
            // 'date_of_birth' => ['nullable', 'date_format:F j, Y'],
            'user_role' => ['required', 'exists:staff_roles,id'],
            'username' => ['required'],
            'password' => ['required', 'string', Password::default()],
        ];
    }


    public function messages(): array
    {
        return [
            // Basic information
            'first_name.required' => 'The first name field is required.',
            'middle_name.string' => 'The middle name field must be a string.',
            'last_name.required' => 'The last name field is required.',
            'sex.required' => 'The gender field is required.',
            'username.required' => 'The username field is required.',
            'username.username' => 'The username field must be a valid username.',
            'username.unique' => 'The username field has already been taken.',
            'username.exists' => 'The username field is invalid.',
            'password.required' => 'The password field is required.',
        ];
    }

    public function clear(): void
    {
        $this->reset([
            'first_name',
            'middle_name',
            'last_name',
            'sex',
            'username',
            'date_of_birth',
            'password',
            'user_status',
        ]);
    }

    public function saveProfilePhoto(string $path, User $user): void
    {
        Log::info("Saving profile photo for user: {$user->id}, Path: $path");
        UserProfilePhoto::create([
            'user_id' => $user->id,
            'photo_path' => $path,
        ]);
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

    public function save(): bool
    {
        $generatedPassword = Str::random(8);

        try {
            $this->validate(); // Validate the form inputs
            Log::info('Validation passed.');

            DB::beginTransaction();

            // Create the User record
            $user = User::create([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'sex' => $this->sex,
                'date_of_birth' => $this->date_of_birth,
                'password' => bcrypt($generatedPassword),
                'generated_password' => $generatedPassword, 
                'user_type' => 3, // Staff type
                'status' => $this->user_status ? StaffStatus::ACTIVE : StaffStatus::INACTIVE,
                // 'email_verified_at' => now(),
            ]);

            // Save the profile photo if it exists
            $staffRole = StaffRole::find($this->user_role);
            if (!$staffRole) {
                throw new Exception('Invalid role selected.');
            }


            // Find the StaffRolesPermissions entry that matches the role
            $staffRolePermission = StaffRolesPermissions::where('staff_role_id', $staffRole->id)->first();
            if (!$staffRolePermission) {
                throw new Exception('No permissions assigned to the selected role.');
            }
            if (!empty($this->photo_path)) {
                $this->saveProfilePhoto($this->photo_path, $user);
            }

            // Create a corresponding Staff record
            $staff = Staff::create([
                'user_id' => $user->id,
                'staff_roles_permissions_id' => $staffRolePermission->id, // Assuming $this->user_role maps to a valid staff role
                'username' => $this->username,
                'status' => $this->user_status ? StaffStatus::ACTIVE : StaffStatus::INACTIVE,
            ]);

            DB::commit();

            return true;
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['errors' => $e->errors()]);
            throw $e; // Propagate the error
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving user account', ['exception' => $e]);
            return false;
        }
    }

    public function generatePassword()
    {
        $password = Str::random(8); // Generate an 8-character password
        $this->password = $password; // Update local field
    }




    protected function isRootComponent() {}
}
