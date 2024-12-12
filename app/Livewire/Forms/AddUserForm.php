<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Form;

class AddUserForm extends Form
{
    public ?User $user = null; // Ensure $user is nullable

    // Main User Information
    public string $firstName = '';
    public string $middleName = '';
    public string $lastName = '';
    public string $gender = '';
    public string $email = '';
    public string $userType = '';
    public bool $isAccountDisabled = false;

    // Permissions
    public array $userTypePermissions = [
        'Admin' => ['Manage Users', 'View Reports'],
        'Editor' => ['Edit Content', 'View Reports'],
        'Viewer' => ['View Content'],
    ];
    public array $filteredPermissions = [];

    public function mount(?User $user = null): void
    {
        $this->user = $user ?? new User;
    }

    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'email' => ['required', 'email', 'unique:users,email'],
            'userType' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'First name is required.',
            'lastName.required' => 'Last name is required.',
            'gender.required' => 'Gender is required.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'This email address is already taken.',
            'userType.required' => 'User type is required.',
        ];
    }

    public function updatedUserType(): void
    {
        $this->filteredPermissions = $this->userTypePermissions[$this->userType] ?? [];
    }

    public function save(): bool
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $this->user->fill([
                'first_name' => $this->firstName,
                'middle_name' => $this->middleName,
                'last_name' => $this->lastName,
                'gender' => $this->gender,
                'email' => $this->email,
                'user_type' => $this->userType,
                'is_disabled' => $this->isAccountDisabled,
            ]);
            $this->user->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to save user: ' . $e->getMessage());
            return false;
        }
    }
}
