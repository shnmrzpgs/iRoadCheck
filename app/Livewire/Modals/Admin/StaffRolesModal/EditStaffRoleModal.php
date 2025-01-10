<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Livewire\Forms\EditStaffRoleForm;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class EditStaffRoleModal extends Component
{
    public string $identifier = '';

    #[Modelable]
    public ?StaffRole $staffRole = null;

    public EditStaffRoleForm $form;

    public Collection $staff_permissions;

    public function mount(): void
    {
        $this->identifier = uniqid('edit_staff_role_modal');
        $this->staff_permissions = StaffPermission::all() ?? collect();
    }

    #[On('show-edit-staff-role-modal')]
    public function showModal(): void
    {
        $this->dispatch('show-'.$this->identifier);
        $this->dispatch('edit-staff-role-modal-shown', $this->staffRole);
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.edit-staff-role-modal');
    }
}
