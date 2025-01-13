<?php

namespace App\Livewire\Modals\Admin\StaffRolesModal;

use App\Enums\Staff\StaffRoleStatus;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddStaffRoleModal extends Component
{
    public string $identifier = '';
    public string $name = '';
    public bool $status = true;
    public array $selectedPermissions = [];
    public Collection $staff_permissions;
    public bool $selectAllPermissions = false; // Track if "Select All" checkbox is checked

    public function mount(?StaffRole $staffRole = null): void
    {
        $this->identifier = uniqid('add_staff_role_modal');
        $this->staff_permissions = StaffPermission::all()->pluck('label', 'id');
        // Update the 'selectAllPermissions' state based on existing selected permissions
        $this->selectAllPermissions = count($this->selectedPermissions) === $this->staff_permissions->count();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:staff_roles,name'],
            'status' => ['required', 'boolean'],
            'selectedPermissions' => ['array', 'min:1'],
            'selectedPermissions.*' => ['exists:staff_permissions,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The staff role name is required.',
            'name.unique' => 'This staff role name already exists.',
//            'status.required' => 'The role status is required.',
            'selectedPermissions.required' => 'At least one staff permission must be selected.',
            'selectedPermissions.*.exists' => 'One or more permissions are invalid.',
        ];
    }

    public function clear(): void
    {
        $this->reset([
            'name',
            'status',
            'selectedPermissions',
        ]);
    }

    public function toggleSelectAllPermissions(): void
    {
        if ($this->selectAllPermissions) {
            // If "Select All" is checked, select all permissions
            $this->selectedPermissions = $this->staff_permissions->keys()->toArray();
        } else {
            // If "Select All" is unchecked, deselect all permissions
            $this->selectedPermissions = [];
        }
    }

    public function togglePermissions(): void
    {
        // Check if all permissions are selected
        if (count($this->selectedPermissions) !== $this->staff_permissions->count()) {
            // If not all permissions are selected, uncheck "Select All"
            $this->selectAllPermissions = false;
        } else {
            // If all permissions are selected, check "Select All"
            $this->selectAllPermissions = true;
        }
    }


    public function save(): void
    {
        $this->validate();

        try {
            // Use instantiation instead of create()
            $staffRole = new StaffRole();
            $staffRole->name = $this->name;
            $staffRole->status = $this->status ? StaffRoleStatus::ENABLED : StaffRoleStatus::DISABLED;
            $staffRole->save();

            // Sync permissions
            $staffRole->permissions()->sync($this->selectedPermissions);

            $this->clear();

            // Dispatch success message to session
            session()->flash('message', 'Staff Role added successfully!');

        } catch (\Exception $e) {
            // Dispatch error message to session
            session()->flash('error', 'There was an issue adding the Staff Role.');
        }

    }



    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.modals.admin.staff-roles-modal.add-staff-role-modal');
    }

}
