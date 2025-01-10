<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Enums\Staff\StaffRoleStatus;
use App\Livewire\Forms\AddStaffRoleForm;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddStaffRoleModal extends Component
{

    public string $identifier = '';

    public AddStaffRoleForm $form;

    public Collection $staff_permissions;

    public ?int $staffRoleId = null; // For storing the ID of the staff role
    public string $role_name = '';
    public string $role_status = StaffRoleStatus::ENABLED; // Use your enum for default
    public array $selectedPermissions = []; // Array of selected permission I

    public bool $clearing_course = true;


    public function mount(?StaffRole $staffRole = null): void
    {
        $this->staffRoleId = $staffRole?->id;
        $this->role_name = $staffRole?->name ?? '';
        $this->role_status = $staffRole?->status === StaffRoleStatus::ENABLED ? 'enabled' : 'disabled';
        $this->staff_permissions = StaffPermission::all() ?? collect();
    }

    public function updated($property): void
    {
        if ($property === 'form.id') {
            $value = $this->form->id;

            if ($value) {
                // Check if this is an existing course
                $this->staffRole = StaffRole::with(['name', 'status'])->find($this->form->id);

                if ($this->staffRole) {
                    // If the course exists, update form fields
                    $this->form->id = $this->staffRole->id;
                    $this->form->name = $this->staffRole->name;
                }

                // Clear fields when necessary
                if ($this->clearing_staffRole) {
                    $this->form->staffRole_id = '';
                    $this->dispatch($this->identifier . 'staffRole_cleared');
                }

            }
        }
    }

    public function save(): void

    {
        $this->form = new AddStaffRoleForm();
        $form_saved = $this->form->save();

        // Clear form and dispatch events if successful
        if ($form_saved) {
            $this->form->clear();
            // Dispatch success events
            $this->dispatch($this->identifier . 'role_name_force_clear');
            $this->dispatch($this->identifier . 'role_status_force_clear');
            $this->dispatch($this->identifier . 'selectedPermissions_force_clear');
            $this->dispatch('staffRole_added');

            // Reset form and clear properties
            $this->form->reset();
        } else {
            // Dispatch failure event
            $this->dispatch('staffRole_not_added');
        }

    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.add-staff-role-modal');
    }
}
