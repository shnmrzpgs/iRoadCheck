<?php

namespace App\Livewire\Forms;

use App\Enums\Staff\StaffRoleStatus;
use App\Models\StaffPermission;
use App\Models\StaffRole;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddStaffRoleForm extends Component
{
    public Collection $staff_permissions;

    public array $selectedPermissions = [];

    public string $role_name = '';

    public string $role_status = StaffRoleStatus::ENABLED;

    public ?staffRole $staffRole = null;

    public function mount(?StaffRole $staffRole = null): void
    {
        $this->staffRole = $staffRole ?? new StaffRole(); // Initialize a new staff role instance if none is passed
    }

    public function rules(): array
    {
        return [
            'role_name' => ['required', 'string', 'max:255', 'unique:staff_roles,name'],
            'role_status' => ['required', 'in:enabled,disabled'],
            'selectedPermissions' => ['array', 'min:1'], // At least one permission is required
            'selectedPermissions.*' => ['exists:permissions,id'], // Validate each permission ID
        ];
    }

    public function messages(): array
    {
        return [
            'role_name.required' => 'The staff role name is required.',
            'role_name.unique' => 'This staff role name already exists.',
            'role_status.required' => 'The role status is required.',
            'selectedPermissions.required' => 'At least one staff permission must be selected.',
            'selectedPermissions.*.exists' => 'One or more permissions are invalid.',
        ];
    }

    public function clear(): void
    {
        $this->reset([
            'name',
            'status',
            'selectedPermissions'
        ]);
    }

    /**
     * Save method to create a new staff role and attach permissions.
     *
     * @return bool
     */
//    public function save(): bool
//    {
//        // Validate the form data
//        $this->validate();
//
//        if ($this->course && $this->course->exists) {
//            return false;
//        } else {
//            return true;
//        }
//    }

    public function save(): bool
    {
        $this->validate();

        //Staff Role Information

        $role_name = $this->role_name;
        $role_status = $this->role_status ? StaffRoleStatus::ENABLED : StaffRoleStatus::DISABLED;
        $selectedPermissions = $this->selectedPermissions;


        DB::beginTransaction();

        try {

            // Create the staff role
            $staffRole = StaffRole::create([

                'name' => $role_name,
                'status' => $role_status,
            ]);

            // Attach selected permissions
            $staffRole->permissions()->sync($selectedPermissions);

            DB::commit();

            return true;
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();

            return false;
        }
    }

    protected function isRootComponent() {}


}
