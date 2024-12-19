<?php
//
//namespace App\Livewire\Forms;
//
//use App\Models\User;
//
//use Exception;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Log;
//use Livewire\Form;
//
//class AddUserAccountForm extends Form
//{
//    public ?User $user = null; // Ensure $user is nullable
//
//    // Main User Information
//    public string $firstName = '';
//    public string $middleName = '';
//    public string $lastName = '';
//    public string $gender = '';
//    public string $email = '';
//    public string $userType = '';
//    public bool $isAccountDisabled = false;
//
//    // Permissions
//    public array $userTypePermissions = [
//        'Admin' => ['Manage Users', 'View Reports'],
//        'Editor' => ['Edit Content', 'View Reports'],
//        'Viewer' => ['View Content'],
//    ];
//    public array $filteredPermissions = [];
//
//    public function mount(?User $user = null): void
//    {
//        $this->user = $user ?? new User;
//    }
//
//    protected $rules = [
//        'firstName' => 'required|string|max:255',
//        'middleName' => 'nullable|string|max:255',
//        'lastName' => 'required|string|max:255',
//        'gender' => 'required|in:Male,Female,Other',
//        'email' => 'required|email|unique:users,email',
//        'password' => 'required|min:8|confirmed',
//        'userType' => 'required|string|in:Admin,Editor,Viewer',
//    ];
//
//    public function submit(): void
//    {
//        $this->validate();
//
//        User::create([
//            'first_name' => $this->firstName,
//            'middle_name' => $this->middleName,
//            'last_name' => $this->lastName,
//            'gender' => $this->gender,
//            'email' => $this->email,
//            'password' => Hash::make($this->password),
//            'user_type' => $this->userType,
//        ]);
//
//        session()->flash('message', 'User account created successfully!');
//        $this->reset();
//    }
//
//
//
//    public function rules(): array
//    {
//        return [
//            'firstName' => ['required', 'string', 'max:255'],
//            'middleName' => ['nullable', 'string', 'max:255'],
//            'lastName' => ['required', 'string', 'max:255'],
//            'gender' => ['required', 'in:Male,Female,Other'],
//            'email' => ['required', 'email', 'unique:users,email'],
//            'userType' => ['required', 'string'],
//        ];
//    }
//
//    public function messages(): array
//    {
//        return [
//            'firstName.required' => 'First name is required.',
//            'lastName.required' => 'Last name is required.',
//            'gender.required' => 'Gender is required.',
//            'email.required' => 'Email address is required.',
//            'email.unique' => 'This email address is already taken.',
//            'userType.required' => 'User type is required.',
//        ];
//    }
//
//    public function updatedUserType(): void
//    {
//        $this->filteredPermissions = $this->userTypePermissions[$this->userType] ?? [];
//    }
//
//    public function save(): bool
//    {
//        $this->validate();
//
//        DB::beginTransaction();
//
//        try {
//            $this->user->fill([
//                'first_name' => $this->firstName,
//                'middle_name' => $this->middleName,
//                'last_name' => $this->lastName,
//                'gender' => $this->gender,
//                'email' => $this->email,
//                'user_type' => $this->userType,
//                'is_disabled' => $this->isAccountDisabled,
//            ]);
//            $this->user->save();
//
//            DB::commit();
//
//            return true;
//        } catch (Exception $e) {
//            DB::rollBack();
//            Log::error('Failed to save user: ' . $e->getMessage());
//            return false;
//        }
//    }
//}


namespace App\Livewire\Forms;

use App\Enums\User\UserStatus;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;

class AddUserAccountForm extends Form
{
    // Personal Information

    public string $last_name = '';

    public string $first_name = '';

    public string $middle_name = '';

    public string $email = '';

    public string $role = '';

    public string $gender = '';

    //Account information

    public string $password = '';

    public string $id_number = '';

    public bool $user_status = true;

    public function rules(): array
    {
        return [

            //personal information
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'email' => ['email', 'required', 'unique:users,email'],
            'gender' => ['required', 'in:male,female,other'],
            'position' => ['required', 'string'],

            //Account information
            'password' => ['required', 'string', Password::default()],
            'id_number' => ['required', 'unique:users,id_number'],

        ];
    }

    public function messages(): array
    {
        return [
            // Personal information
            'last_name.required' => 'The last name field is required.',
            'first_name.required' => 'The first name field is required.',
            'middle_name.string' => 'The middle name field must be a string.',
            // Academic information
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be a valid email.',
            'email.unique' => 'The email field has already been taken.',
            'gender.required' => 'The gender field is required.',
            'position.required' => 'The position field is required.',
            'email.exists' => 'The email field is invalid.',

            // Account information
            'password.required' => 'The password field is required.',
            'id_number.required' => 'The id number field is required.',
            'id_number.unique' => 'The id number field has already been taken.',
            'id_number.exists' => 'The id number field is invalid.',
        ];
    }

    public function clear(): void
    {
        $this->reset([
            'last_name',
            'first_name',
            'middle_name',
            'email',
            'password',
            'gender',
            'id_number',
            'admin_status',
        ]);
    }

    public function save(): bool
    {
        $this->validate();

        //Personal information
        $first_name = $this->first_name;
        $middle_name = $this->middle_name;
        $last_name = $this->last_name;

        //Account information
        $email = $this->email;
        $gender = $this->gender;
        $position = $this->position;
        $status = $this->user_status ? UserStatus::ACTIVE : UserStatus::INACTIVE;

        //account information
        $id_number = $this->id_number;
        $password = $this->password;

        DB::beginTransaction();

        try {
            $user = User::create([
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'phone' => '',

                'email' => $email,
                'id_number' => $id_number,
                'password' => bcrypt($password),
                'generated_password' => $password,

                'status' => $status,
                'email_verified_at' => now(),
            ]);

            $user->assignRole('user');

            $user->user()->create([
                'work_position' => $position,
            ]);

            DB::commit();

            return true;
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();

            return false;
        }
    }

    protected function isRootComponent()
    {
    }
}

