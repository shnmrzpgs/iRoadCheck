<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Enums\User\UserSex;
use App\Enums\Staff\StaffStatus;
use App\Models\AdminLog;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Staff;
use App\Models\StaffRolesPermissions;
use App\Models\StaffRole;
use App\Livewire\Forms\AddUserAccountForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddUserAccountModal extends Component
{
    use WithFileUploads;
    public string $identifier = '';

    public Collection $sexes;
    public Collection $roles;

    public AddUserAccountForm $form;
    // public AddUserAccountForm $user_role;

    public Collection $user_status;


    public $selectedPermissions = [];
    public $photo;



    public function mount(): void
    {
        $this->identifier = uniqid('add_admin_account_modal');
        $this->sexes = collect([
            (object)[
                'id' => UserSex::MALE,
                'value' => UserSex::MALE,
            ],
            (object)[
                'id' => UserSex::FEMALE,
                'value' => UserSex::FEMALE,
            ]
        ]);

        $this->user_status = collect([
            (object)[
                'id' => StaffStatus::ACTIVE,
                'value' => 'Active',
            ],
            (object)[
                'id' => StaffStatus::INACTIVE,
                'value' => 'Inactive',
            ],
        ]);
        $roleIds = StaffRolesPermissions::distinct('staff_role_id')->pluck('staff_role_id');
        $this->roles = StaffRole::whereIn('id', $roleIds)->get(); // Retrieve unique roles based on staff_role_id
    }

    public array $tabs = [
        ['key' => 'basic-info', 'label' => 'Basic Information'],
        ['key' => 'access-info', 'label' => 'Access Control'],
        ['key' => 'account-info', 'label' => 'Account Settings'],
    ];

    public string $activeTab = 'basic-info';
    public array $visitedTabs = [];

    public function activateTab(string $tabKey): void
    {
        $this->activeTab = $tabKey;
    }

    public function nextTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);

        if ($currentIndex === false || $currentIndex >= count($this->tabs) - 1) {
            return;
        }

        // Validate the current tab
        $rules = $this->getValidationRulesForTab($this->activeTab);
        if (!empty($rules)) {
            $this->validate($rules);
        }

        if ($this->checkForDuplicates()) {
            session()->flash('error', 'A staff member with the same name already exists.');
            return;
        }

        // If validation passes, move to the next tab
        $this->visitedTabs[] = $this->activeTab;
        $this->activeTab = $this->tabs[$currentIndex + 1]['key'];
    }


    public function getValidationRulesForTab(string $tabKey): array
    {
        $rules = [
            'basic-info' => [
                'form.first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
                'form.last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
                'form.sex' => ['required', 'in:' . UserSex::MALE . ',' . UserSex::FEMALE],
                'form.date_of_birth' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            ],
            'access-info' => [
                'form.user_role' => ['required', 'exists:staff_roles,id'],
            ],
            'account-info' => [
                'form.password' => ['required', 'string', Password::default()],
                'form.username' => ['required', 'string', 'unique:users,username'],
                'photo' => ['nullable', 'image', 'max:1024'], // Example for photo validation
            ],
        ];

        return $rules[$tabKey] ?? [];
    }


    public function previousTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex > 0) {
            $this->activeTab = $this->tabs[$currentIndex - 1]['key'];
        }
    }

    public function updatedFormUserRole($roleId): void
    {
        // Fetch permissions for the selected role
        $role = StaffRole::find($roleId);
        $this->selectedPermissions = $role ? $role->permissions->pluck('label')->toArray() : [];
        Log::info('Staff selected role ID: ' . $roleId);
    }

    public function rules(): array
    {
        return [
            'form.first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
            'form.last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
            'form.username' => [
                'required',
                'string',
                'unique:users,username', // Ensure unique username
            ],
            'form.date_of_birth' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            'form.user_role' => ['required', 'exists:staff_roles,id'],
            'form.password' => ['required', 'string', Password::default()],
            'form.sex' => ['required', 'in:' . UserSex::MALE . ',' . UserSex::FEMALE]
        ];
    }

    public function messages(): array
    {
        return [
            'form.username.unique' => 'The username is already in use.',
            'form.user_role.required' => 'The user role is required.',
            'form.first_name.required' => 'The first name is required.',
            'form.first_name.regex' => 'The first name must contain only letters and spaces.',
            'form.last_name.regex' => 'The last name must contain only letters and spaces.',
            'form.last_name.required' => 'The last name is required.',
            'form.date_of_birth.before_or_equal' => 'The staff must be at least 18 years old.',
            'form.password.required' => 'The password is required.',
            'form.username.required' => 'The username is required.',
            'form.sex.required' => 'The sex field is required.',
        ];
    }

    public function validateAndSubmit(): void
    {
        Log::info('validateAndSubmit triggered.');

        $this->validate();

        // Check for duplicates
        if ($this->checkForDuplicates()) {
            session()->flash('error', 'A staff member with the same name already exists.');
            return;
        }

        if ($this->photo) {
            $path = $this->photo->store('profile_photos', 'public');
            $this->form->photo_path = $path; // Pass the path to the form
        }

        if (!$this->form) {
            Log::error('Form instance is not initialized.');
            $this->dispatch('user_account_not_added', [
                'message' => 'Form instance is not initialized.'
            ]);
            return;
        }

        Log::info('Attempting to call save on the form instance.');

        try {
            $result = $this->form->save();


            if ($result) {
                Log::info('Form saved successfully.');

                $fullName = trim("{$this->form->first_name} {$this->form->middle_name} {$this->form->last_name}");

                // Log successful creation
                AdminLog::create([
                    'admin_id' => auth()->id(),
                    'action' => "Created a new staff account: {$fullName}",
                    'dateTime' => now(),
                    'user_id' => auth()->id(),
                ]);

                $this->dispatch('modal-close');
                session()->flash('feedback', 'Staff Account added successfully!');
                session()->flash('feedback_type', 'success');
            }


        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['errors' => $e->errors()]);

            // Log failure
            AdminLog::create([
                'admin_id' => auth()->id(),
                'action' => 'Failed to create staff account. Validation error: ' . json_encode($e->errors()),
                'dateTime' => now(),
                'user_id' => auth()->id(),
            ]);

            // Dispatch error message to session
            session()->flash('feedback', 'There was an issue adding the Staff Account.');
            session()->flash('feedback_type', 'error');
        }
    }


    private function checkForDuplicates(): bool
    {
        try {
            // Get all users
            $users = User::all();

            // Check each user for matching decrypted names
            foreach ($users as $user) {
                $firstName = strtolower(Crypt::decryptString($user->first_name));
                $lastName = strtolower(Crypt::decryptString($user->last_name));

                // Match on first and last name
                if (
                    $firstName === strtolower($this->form->first_name) &&
                    $lastName === strtolower($this->form->last_name)
                ) {

                    // If middle name exists, check it too
                    if (!empty($this->form->middle_name)) {
                        $middleName = strtolower(Crypt::decryptString($user->middle_name));
                        if ($middleName === strtolower($this->form->middle_name)) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            }

            return false;
        } catch (\Exception $e) {
            Log::error('Error checking duplicates', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.users-modal.add-user-account-modal');
    }
}
