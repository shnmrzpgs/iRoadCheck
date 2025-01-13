<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\Staff\StaffRoleStatus;
use App\Livewire\Modals\Admin\StaffRolesModal\EditStaffRoleModal;
use App\Livewire\Modals\Admin\StaffRolesModal\ViewStaffRoleModal;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class StaffRolesTable extends Component
{
    use WithoutUrlPagination, WithPagination;

    // Search term
    public string $search = '';

    // Rows per page
    public int $rowsPerPage = 10;

    // Status options
    public Collection $staff_role_statuses;

    // Selected filter for staff role status
    public string $staff_role_status_filter = '';

    // Sorting
    public string $sort_by = 'id';
    public string $sort_direction = 'asc';

    // Staff Role Modals to view and edit
    public ?StaffRole $staff_role_to_viewed = null;

    public ?StaffRole $staff_role_to_edited = null;

    public function mount(): void
    {
        $this->staff_role_statuses = collect([
            ['key' => StaffRoleStatus::ENABLED, 'label' => 'Enabled'],
            ['key' => StaffRoleStatus::DISABLED, 'label' => 'Disabled'],
        ]);
    }


    public function viewStaffRole(StaffRole $staff_role): void
    {
        if ($this->staff_role_to_viewed === null) {
            $this->staff_role_to_viewed = $staff_role;
        }
        if ($this->staff_role_to_viewed !== $staff_role) {
            $this->staff_role_to_viewed = $staff_role;
        }

        $this->dispatch('show-view-staff-role-modal', $staff_role)->to(ViewStaffRoleModal::class);
    }

    public function editStaffRole(StaffRole $staff_role): void
    {
        if ($this->staff_role_to_edited === null) {
            $this->staff_role_to_edited = $staff_role;
        }
        if ($this->staff_role_to_edited !== $staff_role) {
            $this->staff_role_to_edited = $staff_role;
        }

        $this->dispatch('show-edit-staff-role-modal', $staff_role)->to(EditStaffRoleModal::class);
    }

    public function updating($property): void
    {
        // Reset pagination whenever search or filter properties are updated
        if ($property === 'search' || $property === 'staff_role_status_filter') {
            $this->resetPage();
        }
    }

    public function toggleSorting(string $field): void
    {
        // Toggle sorting direction
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }
    }

    public function resetFilterAndSearch(): void
    {
        $this->search = '';
        $this->staff_role_status_filter = '';
        $this->sort_by = 'id';
        $this->sort_direction = 'asc';
        $this->resetPage(); // Reset pagination
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        $staffRoleQuery = StaffRole::with(['permissions']);

        // Apply search filter
        if ($this->search) {
            $staffRoleQuery->where(function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('permissions', function ($subQuery) {
                        $subQuery->where('label', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Apply status filter
        if ($this->staff_role_status_filter) {
            $staffRoleQuery->where('status', $this->staff_role_status_filter);
        }

        // Apply sorting
        if ($this->sort_by) {
            // Handle sorting by permissions label if needed
            if ($this->sort_by === 'permissions.label') {
                $staffRoleQuery->join('staff_roles_permissions', 'staff_roles.id', '=', 'staff_roles_permissions.staff_role_id')
                    ->join('staff_permissions', 'staff_roles_permissions.staff_permission_id', '=', 'staff_permissions.id')
                    ->select('staff_roles.*', 'staff_permissions.label')  // Ensure you're selecting both the staff role and permission label
                    ->orderBy('staff_permissions.label', $this->sort_direction);  // Sorting by the permission label
            } else {
                // Handle sorting by other fields in staff_roles
                $staffRoleQuery->orderBy($this->sort_by, $this->sort_direction);
            }
        }


        // Paginate the results
        $staffRoles = $staffRoleQuery->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.staff-roles-table', [
            'staffRoles' => $staffRoles,
        ]);
    }
}
