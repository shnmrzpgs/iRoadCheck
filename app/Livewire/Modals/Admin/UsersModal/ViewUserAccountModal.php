<?php 

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewUserAccountModal extends Component
{
    public ?Staff $staff = null;
    
    public function showStaffInfo($staffId)
{
    $staff = Staff::with('staffRolesPermissions.permissions')
        ->findOrFail($staffId);

    $permissions = $staff->staffRolesPermissions
        ->pluck('permissions.name') // Get the names of permissions
        ->flatten()
        ->toArray();

    $staff->permissions = $permissions; // Add permissions as a property

    $this->staff = $staff; // Pass to Livewire component
}

    #[On('show-view-user-account-modal')] 
    public function showModal(Staff $staff): void
    {
        $this->staff = $staff;
        $this->dispatch('view-user-account-modal-shown');
    }

    public function render(): View
    {
        return view('livewire.modals.admin.users-modal.view-user-account-modal');
    }
}
