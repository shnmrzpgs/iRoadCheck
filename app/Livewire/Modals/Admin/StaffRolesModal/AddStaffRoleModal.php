<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Enums\Staff\StaffRoleStatus;
use App\Livewire\Forms\AddStaffRoleForm;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddStaffRoleModal extends Component
{
    public string $identifier = '';

    public Collection $staff_role_statuses;

    public Collection $staff_roles;

    public AddStaffRoleForm $form;

    public ?StaffRole $staffRole = null;

    public bool $clearing_staffRole = true;

    public array $selectedPermissions = [];

    public function mount(): void
    {
        $this->identifier = uniqid('add_staff_role_modal');
        $this->staff_role_statuses = collect([
            ['key' => StaffRoleStatus::ENABLED, 'label' => 'Enabled'],
            ['key' => StaffRoleStatus::DISABLED, 'label' => 'Disabled'],
        ]);
        $this->staff_roles = StaffRole::all();
        $this->selectedPermissions = [];
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.add-staff-role-modal');
    }
}
