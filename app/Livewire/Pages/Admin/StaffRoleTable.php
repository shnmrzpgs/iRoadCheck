<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\Staff\StaffRoleStatus;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class StaffRoleTable extends Component
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

    public function mount(): void
    {
        $this->staff_role_statuses = collect([
            ['key' => StaffRoleStatus::ENABLED, 'label' => 'Enabled'],
            ['key' => StaffRoleStatus::DISABLED, 'label' => 'Disabled'],
        ]);
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

    public function render(): Factory|Application|View
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
            $staffRoleQuery->orderBy($this->sort_by, $this->sort_direction);
        }

        // Paginate the results
        $staffRoles = $staffRoleQuery->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.staff-role-table', [
            'staffRoles' => $staffRoles,
        ]);
    }
}
