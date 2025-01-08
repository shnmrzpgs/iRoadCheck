<?php
//
//namespace App\Livewire\Modals\Admin\UsersModal;
//
//use App\Livewire\Forms\AddUserAccountForm;
//use App\Models\User;
//use App\Models\UserRole;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Illuminate\Support\Collection;
//use Illuminate\Support\Facades\Hash;
//use Livewire\Component;
//
//class AddUserAccountModal extends Component
//{
//
//    public string $identifier = '';
//
//    public Collection $user_types;
//
//    public AddUserAccountForm $form;
//
//    public ?User $user = null;
//
//    public bool $clearing_user = true;
//
//
//    public function render(): Application|Factory|View
//    {
//        return view('livewire.modals.admin.users-modal.add-user-modal', [
////            'userTypePermissions' => $this->userTypePermissions,
//        ]);
//    }
//}

//
//namespace App\Livewire\Modals\Admin\UsersModal;
//
//use App\Enums\User\UserSex;
//use App\Enums\User\UserStatus;
//use App\Livewire\Forms\AddUserAccountForm;
//use App\Models\UserLog;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Illuminate\Support\Collection;
//use Livewire\Component;
//
//class AddUserAccountModal extends Component
//{
//    public string $identifier = '';
//
//    public Collection $genders;
//
//    public AddUserAccountForm $form;
//
//    public Collection $user_status;
//
//    public function mount(): void
//    {
//        $this->identifier = uniqid('add_user_account_modal');
//        $this->genders = collect([
//            (object)[
//                'id' => UserSex::MALE,
//                'value' => UserSex::MALE,
//            ],
//            (object)[
//                'id' => UserSex::FEMALE,
//                'value' => UserSex::FEMALE,
//            ],
//        ]);
//
//        $this->user_status = collect([
//            (object)[
//                'id' => UserStatus::ACTIVE,
//                'value' => 'Active',
//            ],
//            (object)[
//                'id' => UserStatus::INACTIVE,
//                'value' => 'Inactive',
//            ],
//        ]);
//    }
//
//    public function save(): void
//    {
//        $form_saved = $this->form->save();
//
//        if ($form_saved) {
//            $this->form->clear();
//            $this->dispatch($this->identifier . 'gender_force_clear');
//            $this->dispatch('user_account_added');
//            UserLog::create([
//                'action' => 'user added',
//                'description' => 'user admin',
//                'date' => now(),
//                'user_id' => auth()->id()
//            ]);
//        } else {
//            $this->dispatch('user_account_not_added');
//        }
//    }
//
//    public function render(): Factory|View|Application|\Illuminate\View\View
//    {
//        return view('livewire.modals.admin.users-modal.add-user-modal');
//    }
//}
//


//namespace App\Livewire\Modals\Admin\UsersModal;
//
//use App\Enums\User\UserSex;
//use App\Enums\User\UserStatus;
//use App\Models\UserLog;
//use App\Models\User;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Illuminate\Support\Collection;
//use Livewire\Component;
//
//class AddUserAccountModal extends Component
//{
//    public string $identifier;
//    public Collection $genders;
//    public Collection $userStatuses;
//
//    public array $formData = [
//        'first_name' => '',
//        'middle_name' => '',
//        'last_name' => '',
//        'gender' => '',
//        'email' => '',
//        'id_number' => '',
//        'password' => '',
//        'assigned_permissions' => [],
//    ];
//
//    public array $tabs = [
//        ['key' => 'basic-info', 'label' => 'Basic Information'],
//        ['key' => 'access-info', 'label' => 'Access Control'],
//        ['key' => 'account-info', 'label' => 'Account Settings'],
//    ];
//
//    public string $activeTab = 'basic-info';
//    public array $visitedTabs = [];
//
//    public function mount(): void
//    {
//        $this->identifier = uniqid('add_user_account_modal');
//        $this->genders = collect([
//            ['id' => UserSex::MALE, 'value' => 'Male'],
//            ['id' => UserSex::FEMALE, 'value' => 'Female'],
//        ]);
//        $this->userStatuses = collect([
//            ['id' => UserStatus::ACTIVE, 'value' => 'Active'],
//            ['id' => UserStatus::INACTIVE, 'value' => 'Inactive'],
//        ]);
//    }
//
//    public function generatePassword(): void
//    {
//        $this->formData['password'] = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'), 0, 12);
//    }
//
//    public function activateTab(string $tabKey): void
//    {
//        $this->activeTab = $tabKey;
//    }
//
//    public function nextTab(): void
//    {
//        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
//        if ($currentIndex !== false && $currentIndex < count($this->tabs) - 1) {
//            $this->visitedTabs[] = $this->activeTab;
//            $this->activeTab = $this->tabs[$currentIndex + 1]['key'];
//        }
//    }
//
//    public function previousTab(): void
//    {
//        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
//        if ($currentIndex !== false && $currentIndex > 0) {
//            $this->activeTab = $this->tabs[$currentIndex - 1]['key'];
//        }
//    }
//
//    public function validateAndSubmit(): void
//    {
//        $this->validate([
//            'formData.first_name' => 'required|string|max:255',
//            'formData.last_name' => 'required|string|max:255',
//            'formData.email' => 'required|email|unique:users,email',
//            'formData.id_number' => 'required|string|unique:users,id_number',
//            'formData.password' => 'required|string|min:8',
//        ]);
//
//        $user = User::create($this->formData);
//        if ($user) {
//            $this->logUserAction('User added successfully.');
//            $this->resetForm();
//            $this->dispatch('userAdded', ['message' => 'User added successfully!']);
//        }
//    }
//
//    private function logUserAction(string $description): void
//    {
//        UserLog::create([
//            'action' => 'Add User',
//            'description' => $description,
//            'date' => now(),
//            'user_id' => auth()->id(),
//        ]);
//    }
//
//    private function resetForm(): void
//    {
//        $this->formData = [
//            'first_name' => '',
//            'middle_name' => '',
//            'last_name' => '',
//            'gender' => '',
//            'email' => '',
//            'id_number' => '',
//            'password' => '',
//            'assigned_permissions' => [],
//        ];
//        $this->visitedTabs = [];
//        $this->activeTab = 'basic-info';
//    }
//
//    public function render(): Factory|View|Application|\Illuminate\View\View
//    {
//        return view('livewire.modals.admin.users-modal.add-user-modal');
//    }
//}


namespace App\Livewire\Modals\Admin\UsersModal;

use App\Enums\User\UserSex;
use App\Enums\User\UserStatus;
use App\Models\UserRole;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Livewire\Forms\AddUserAccountForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddUserAccountModal extends Component
{
    use WithFileUploads;
    public string $identifier = '';

    public Collection $sexes;

    public AddUserAccountForm $form;

    public Collection $user_status;

    public $user_roles;
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
                'id' => UserStatus::ACTIVE,
                'value' => 'Active',
            ],
            (object)[
                'id' => UserStatus::INACTIVE,
                'value' => 'Inactive',
            ],
        ]);

        $this->user_roles = UserRole::all();
        $this->formData['user_role'] = $this->form->user_role;
        $this->selectedPermissions = [];
    }

    public array $tabs = [
        ['key' => 'basic-info', 'label' => 'Basic Information'],
        ['key' => 'access-info', 'label' => 'Access Control'],
        ['key' => 'account-info', 'label' => 'Account Settings'],
    ];

    public array $formData = [
        'user_role' => '',
    ];

    public string $activeTab = 'basic-info';
    public array $visitedTabs = [];

    // public function generatePassword(): void
    // {
    //     $this->formData['password'] = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'), 0, 12);
    // }

    public function activateTab(string $tabKey): void
    {
        $this->activeTab = $tabKey;
    }

    public function nextTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex < count($this->tabs) - 1) {
            $this->visitedTabs[] = $this->activeTab;
            $this->activeTab = $this->tabs[$currentIndex + 1]['key'];
        }
    }

    public function previousTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex > 0) {
            $this->activeTab = $this->tabs[$currentIndex - 1]['key'];
        }
    }

    // public function save(): void
    // {
      

    //     $form_saved = $this->form->save();

    //     if ($form_saved) {



    //         $this->dispatch($this->identifier . 'sex_force_clear');
    //         $this->dispatch('alert', [
    //             'title' => 'User Account Added!',
    //             'message' => 'User account added successfully!',
    //             'type' => 'success',
    //         ]);
    //     } else {
    //         $this->dispatch('alert', [
    //             'title' => 'User Account Not Added!',
    //             'message' => 'Failed to save the user account. Please try again.',
    //             'type' => 'danger',
    //         ]);
    //     }
    // }

    public function updatedFormDataUserRole($roleId): void
    {
        $this->form->user_role = $roleId;

        $role = UserRole::find($roleId);

        if ($role) {
            $this->selectedPermissions = $role->getPermissions();
        } else {
            $this->selectedPermissions = [];
        }
    }

    public function validateAndSubmit()
    {
        Log::info('validateAndSubmit triggered.');

        $this->validate([
            'photo' => 'nullable|image|max:1024',
        ]);

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
                $this->dispatch('alert', [
                    'title' => 'User Account Added!',
                    'message' => 'User account added successfully!',
                    'type' => 'success',
                ]);
                $this->form->clear();
                $this->photo = null; // Clear the uploaded photo after saving
            } else {
                Log::warning('Form save failed.');
                $this->dispatch('alert', [
                    'title' => 'User Account Not Added!',
                    'message' => 'Failed to save the user account. Please try again.',
                    'type' => 'danger',
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['errors' => $e->errors()]);
            $this->dispatch('user_account_not_added', [
                'message' => 'Validation error: ' . collect($e->errors())->flatten()->first()
            ]);
        } catch (\Exception $e) {
            Log::error('Error during validateAndSubmit.', ['exception' => $e]);
            $this->dispatch('user_account_not_added', [
                'message' => 'An unexpected error occurred. Please try again.'
            ]);
        }
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.users-modal.add-user-account-modal', [
            'user_roles' => $this->user_roles,
        ]);
    }
}
