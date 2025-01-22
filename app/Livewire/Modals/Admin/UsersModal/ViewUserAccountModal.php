<?php 

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ViewUserAccountModal extends Component
{
    public ?Staff $staff = null;
    public ?string $date_of_birth = null;
    public ?string $currentPhoto = null;
    
    public function showStaffInfo($staffId)
{
    $staff = Staff::with(['staffRolesPermissions.permissions'])
        ->findOrFail($staffId);

    // Extract permission names from the assigned role
    $permissions = $staff->staffRolesPermissions->permissions
        ->pluck('name')
        ->toArray();

    // Add permissions as a dynamic property
    $staff->permissions = $permissions;

    $this->staff = $staff;
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
