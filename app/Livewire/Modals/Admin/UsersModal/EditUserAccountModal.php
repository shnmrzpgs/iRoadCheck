<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\User;
use App\Models\UserProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Enums\User\UserSex;
use App\Enums\Staff\StaffStatus;
use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class EditUserAccountModal extends Component
{
    use WithFileUploads;

    public Collection $sexes;
    public Collection $staff_status;
    public Collection $roles;
    public string $identifier = '';
    public $photo;
    public $currentPhoto;
    public ?Staff $staff = null;
    public array $form = [
        'first_name' => '',
        'middle_name' => '',
        'last_name' => '',
        'sex' => '',
        'date_of_birth' => '',
        'email' => '',
        'password' => '',
        'user_role' => '',
        'is_disabled' => false,
    ];

    public array $selectedPermissions = [];

    public function mount(): void
    {
        $this->sexes = collect([
            (object) ['id' => UserSex::MALE, 'value' => UserSex::MALE],
            (object) ['id' => UserSex::FEMALE, 'value' => UserSex::FEMALE],
        ]);

        $this->staff_status = collect([
            (object) ['id' => StaffStatus::ACTIVE, 'value' => 'active'],
            (object) ['id' => StaffStatus::INACTIVE, 'value' => 'inactive'],
        ]);

        $this->roles = StaffRole::all();
    }

    public function updatedFormUserRole($roleId): void
    {
        // Fetch permissions for the selected role
        $role = StaffRole::find($roleId);
        $this->selectedPermissions = $role ? $role->permissions->pluck('label')->toArray() : [];
    }

    #[On('show-edit-user-account-modal')]
    public function showModal(Staff $staff): void
    {
        $this->staff = $staff;

        // Load existing staff data into form
        $this->form = [
            'first_name' => $staff->user->first_name,
            'middle_name' => $staff->user->middle_name,
            'last_name' => $staff->user->last_name,
            'sex' => $staff->user->sex,
            'date_of_birth' => $staff->user->date_of_birth,
            'email' => $staff->user->email,
            'password' => $staff->generated_password ?? '',
            'staff_roles_permissions_id' => $staff->user_role,
            'is_disabled' => $staff->status === StaffStatus::INACTIVE,
        ];

        $this->currentPhoto = $staff->user->profile_photo?->photo_path
            ? Storage::url($staff->user->profile_photo->photo_path)
            : null;

        $staffRolesPermissions = $staff->staffRolesPermissions()->with('permissions')->get();

        $this->selectedPermissions = $staffRolesPermissions->map(function ($rolePermission) {
            // Log or check each rolePermission and its permissions
            Log::info("RolePermission: ", $rolePermission->toArray());
            if ($rolePermission->permissions) {
                Log::info("Permission Name: {$rolePermission->permissions->name}");
            }
            return $rolePermission->permissions->name ?? null;
        })->filter()->toArray();

        $this->dispatch('edit-user-account-modal-shown');
    }

    public array $tabs = [
        ['key' => 'basic-info', 'label' => 'Basic Information'],
        ['key' => 'access-info', 'label' => 'Access Control'],
        ['key' => 'account-info', 'label' => 'Account Settings'],
    ];

    public string $activeTab = 'basic-info';
    public array $visitedTabs = [];

    protected function rules()
    {
        return [
            'form.first_name' => 'required|string|max:255',
            'form.middle_name' => 'nullable|string|max:255',
            'form.last_name' => 'required|string|max:255',
            'form.sex' => 'required|string',
            'form.date_of_birth' => 'required|date',
            'form.email' => 'required|email|unique:users,email,' . $this->staff->user->id,
            'form.password' => ['nullable', Password::defaults()],
            'form.user_role' => 'required|string',
            'form.is_disabled' => 'required|boolean',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function activateTab(string $tabKey): void
    {
        $this->activeTab = $tabKey;
        if (!in_array($tabKey, $this->visitedTabs)) {
            $this->visitedTabs[] = $tabKey;
        }
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

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            // Update user information
            $this->staff->user->update([
                'first_name' => $this->form['first_name'],
                'middle_name' => $this->form['middle_name'],
                'last_name' => $this->form['last_name'],
                'sex' => $this->form['sex'],
                'date_of_birth' => $this->form['date_of_birth'],
                'email' => $this->form['email'],
            ]);

            // Update password if provided
            if (!empty($this->form['password'])) {
                $this->staff->user->update([
                    'password' => bcrypt($this->form['password']),
                    'generated_password' => $this->form['password'],
                ]);
            }

            $this->staff->update([
                'user_id' => $this->staff->user->id,
                'staff_roles_permissions_id' => $this->form['user_role'], // Ensure this is mapped to a valid role
                'generated_password' => $this->form['password'], // Ensure password hashing if needed
                'status' => $this->form['is_disabled'] ? StaffStatus::INACTIVE : StaffStatus::ACTIVE,
            ]);


            // Handle profile photo upload
            if ($this->photo) {
                // Delete old photo if exists
                if ($this->staff->user->profile_photo) {
                    Storage::delete($this->staff->user->profile_photo->photo_path);
                    $this->staff->user->profile_photo->delete();
                }

                // Save new photo
                $path = $this->photo->store('profile_photos', 'public');
                UserProfilePhoto::create([
                    'user_id' => $this->staff->user->id,
                    'photo_path' => $path,
                ]);
            }

            DB::commit();

            // Dispatch success message to session
            session()->flash('message', 'Staff Account updated successfully!');

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update user account: ' . $e->getMessage());
            // Dispatch error message to session
            session()->flash('error', 'There was an issue updating the Staff Account.');

            return false;
        }
    }

    public function render()
    {
        return view('livewire.modals.admin.users-modal.edit-user-account-modal');
    }
}
