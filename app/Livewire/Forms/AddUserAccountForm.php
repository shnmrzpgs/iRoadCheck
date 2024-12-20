<?php

namespace App\Livewire\Forms;

use App\Enums\User\UserStatus;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;
use Ramsey\Collection\Collection;

class AddUserAccountForm extends Form
{
    // Basic Information
    public string $first_name = '';

    public string $middle_name = '';

    public string $last_name = '';

    public string $sex = '';

    public string $email = '';


    // Access Control Information
    public string $user_role;

    //Permission


    //Account information

    public string $password = '';

    public bool $user_status = true;

    public function rules(): array
    {
        return [

            //basic information
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'sex' => ['required', 'in:male,female,other'],
            'email' => ['email', 'required', 'unique:users,email'],

            //access information
            //userrole and permissions

            //Account information
            'id_number' => ['required', 'unique:users,id_number'],
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
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be a valid email.',
            'email.unique' => 'The email field has already been taken.',
            'email.exists' => 'The email field is invalid.',

            // Access Control information
            //user role

            // Account information
            'id_number.required' => 'The id number field is required.',
            'id_number.unique' => 'The id number field has already been taken.',
            'id_number.exists' => 'The id number field is invalid.',
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
            'email',
            'id_number',
            'password',
            'user_status',
         //   'user_role',
        ]);
    }

    public function save(): bool
    {
        $this->validate();

        //Basic information
        $first_name = $this->first_name;
        $middle_name = $this->middle_name;
        $last_name = $this->last_name;
        $sex = $this->sex;
        $email = $this->email;

        //Account information
        $position = $this->position;
        $status = $this->admin_status ? UserStatus::ACTIVE : UserStatus::INACTIVE;

        //account information
        $id_number = $this->id_number;
        $password = $this->password;

        DB::beginTransaction();

        try {
            $user = User::create([
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'sex' => $sex,
                'email' => $email,
                'id_number' => $id_number,
                'password' => bcrypt($password),
                'generated_password' => $password,

                'status' => $status,
                'email_verified_at' => now(),
            ]);

//            $user->assignRole('user');
//
//            $user->admin()->create([
//                'work_position' => $position,
//            ]);

            DB::commit();

            return true;
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();

            return false;
        }
    }

    protected function isRootComponent() {}
}
