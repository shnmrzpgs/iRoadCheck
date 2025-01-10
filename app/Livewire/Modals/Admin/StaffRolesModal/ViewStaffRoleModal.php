<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Models\StaffRole;
use App\Models\StaffRolesPermissions;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewStaffRoleModal extends Component
{
    #[Modelable]
    public ?StaffRole $staffRole = null;

    public string $identifier = '';

    public function mount(): void
    {
        $this->identifier = uniqid(); // Generates a unique identifier for the modal
    }

    #[On('show-view-staff-role-modal')]
    public function showModal(): void
    {
        $this->dispatch('show-'.$this->identifier); // Dispatch event to show modal
        $this->dispatch('view-staff-role-modal-shown'); // Optional event to indicate the modal is shown
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.view-staff-role-modal');
    }
}
