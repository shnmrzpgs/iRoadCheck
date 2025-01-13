<?php

namespace App\Livewire\Forms;

use App\Enums\Staff\StaffRoleStatus;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddStaffRoleForm extends Component
{

    // Collection for permission labels and IDs.
    public Collection $staff_permissions;

    // String Staff Role Name.
    public string $name = '';

    // Staff Role Status (Enabled and Disabled)
    public bool $status = true;

    // Array of selected permission IDs.
    public array $selectedPermissions = [];


    public function mount(?StaffRole $staffRole = null): void
    {
        $this->staff_permissions = StaffPermission::all()->pluck('label', 'id');
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

    /**
     * Save method to create a new staff role and attach permissions.
     *
     * @return bool
     */

    public function save(): bool
    {
        // Validate the form data
        $this->validate();

        if ($this->staffRole && $this->staffRole->exists) {
            return false;
        } else {
            return true;
        }
    }

//    public function save(): bool
//    {
//
//        $this->validate();
//
//        try {
//            // Use instantiation instead of create()
//            $staffRole = new StaffRole();
//            $staffRole->name = $this->name;
//            $staffRole->status = $this->status ? StaffRoleStatus::ENABLED : StaffRoleStatus::DISABLED;
//            $staffRole->save();
//
//            // Sync permissions
//            $staffRole->permissions()->sync($this->selectedPermissions);
//
//            // Reset fields after successful save
//            $this->reset(['name', 'status', 'selectedPermissions']);
//
//            DB::commit();
//
//            return true;
//        } catch (Exception $e) {
//            //dd($e);
//            DB::rollBack();
//
//            return false;
//        }
//    }

//    protected function isRootComponent() {}

}
