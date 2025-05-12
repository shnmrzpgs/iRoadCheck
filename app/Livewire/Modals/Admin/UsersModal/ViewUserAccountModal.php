<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use App\Models\StaffRole;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class ViewUserAccountModal extends Component
{
    public ?Staff $staff = null;
    public ?string $date_of_birth = null;
    public ?string $currentPhoto = null;
    public ?array $permissions = null;
    public array $selectedPermissions = [];
    public ?int $user_role = null;

    public function updatedFormUserRole($staffRoleId): void
    {
        $role = StaffRole::with('permissions')->find($staffRoleId);
        $this->selectedPermissions = $role ? $role->permissions->pluck('name')->toArray() : [];
    }

    public function showStaffInfo($staffId)
    {
        $staff = Staff::with(['staffRolesPermissions.staffRole', 'staffRolesPermissions.permissions'])
            ->findOrFail($staffId);

            $this->user_role = $staff->staffRole->id;
        //     $this->permissions = $staff->staffRolesPermissions->permissions->pluck('name')->toArray();

        $role = StaffRole::with('permissions')->find($this->user_role);
        $this->selectedPermissions = $role ? $role->permissions->pluck('name')->toArray() : [];

        $this->staff = $staff;

        // Decrypt user details
        $this->staff->user->first_name = Crypt::decryptString($staff->user->first_name);
        $this->staff->user->middle_name = Crypt::decryptString($staff->user->middle_name);
        $this->staff->user->last_name = Crypt::decryptString($staff->user->last_name);
        $this->staff->user->sex = Crypt::decryptString($staff->user->sex);
        $this->staff->user->username = Crypt::decryptString($staff->user->username);

        $this->date_of_birth = $staff->user->date_of_birth
            ? Carbon::parse($staff->user->date_of_birth)->format('F j, Y')
            : null;
    }

    #[On('show-view-user-account-modal')]
    public function showModal(Staff $staff): void
    {
        $this->showStaffInfo($staff->id);
        if ($staff->user->profilePhoto) {
            $this->currentPhoto = asset('storage/' . $staff->user->profilePhoto->photo_path);
        } else {
            $this->currentPhoto = null;
        }

        $this->dispatch('view-user-account-modal-shown');
    }

    public function render(): View
    {
        return view('livewire.modals.admin.users-modal.view-user-account-modal');
    }
}
