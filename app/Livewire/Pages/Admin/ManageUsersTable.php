<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\Staff\StaffStatus;
use App\Livewire\Modals\Admin\UsersModal\EditUserAccountModal;
use App\Livewire\Modals\Admin\UsersModal\ViewUserAccountModal;
use App\Models\User;
use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ManageUsersTable extends Component
{
    use WithoutUrlPagination, WithPagination;

    // Search
    public $search = '';

    public int $rowsPerPage = 10;

    public Collection $user_statuses;
    public Collection $roles;

    // User account to view
    public ?Staff $staff_account_to_viewed = null;
    public ?Staff $staff_account_to_edited = null;

    // Filters
    public string $user_status_filter = '';
    public string $staff_roles_filter = '';

    // Sorting
    public string $sort_by = 'id';

    public string $sort_direction = 'asc'; // 'asc' or 'desc'

    // Listening for changes in pagination
    protected $updatesQueryString = ['rowsPerPage'];

    public function mount(): void
    {
        $this->user_statuses = collect([
            [
                'key' => StaffStatus::ACTIVE,
                'label' => 'Active',
            ],
            [
                'key' => StaffStatus::INACTIVE,
                'label' => 'Inactive',
            ],
        ]);

        $this->roles = StaffRole::with('permissions')->get();
    }

    public function editUserAccount($staffId): void
    {
        $staff = Staff::findOrFail($staffId);
        $this->dispatch('show-edit-user-account-modal', [
            'staff' => $staff->id
        ])->to(EditUserAccountModal::class);
    }

    public function viewUserAccount($staffId): void
    {
        $staff = Staff::findOrFail($staffId);
        $this->dispatch('show-view-user-account-modal', staff: $staff);
    }

    public function toggleSorting($field): void
    {
        // If the field is the same as the current sort field, toggle the direction
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            // If it's a new field, set it as the sort field and default to ascending
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }
    }

    public function resetFilterAndSearch(): void
    {
        $this->search = '';
        $this->user_status_filter = '';
        $this->staff_roles_filter = '';
        $this->sort_by = 'id';
    }

    public function updatedRowsPerPage(): void
    {
        $this->resetPage();
    }

    public function updatingRowsPerPage(): void
    {
        // Reset pagination when rows per page is updated
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        $allowedSortFields = ['id', 'first_name', 'last_name', 'status', 'username',  'staff_role'];
        if (!in_array($this->sort_by, $allowedSortFields)) {
            $this->sort_by = 'id'; // Default to a valid column
        }

        // Start the query
        $query = Staff::query()
            ->select('staffs.*')
            ->leftJoin('users', 'staffs.user_id', '=', 'users.id') // Ensure this matches your foreign key\
            ->leftJoin('staff_roles_permissions', 'staffs.staff_roles_permissions_id', '=', 'staff_roles_permissions.id')
    ->leftJoin('staff_roles', 'staff_roles_permissions.staff_role_id', '=', 'staff_roles.id') // Join staff_roles
            ->with(['user', 'staffRolesPermissions', 'staffRolesPermissions.staffRole'])
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('users.first_name', 'like', "%{$this->search}%")
                        ->orWhere('users.middle_name', 'like', "%{$this->search}%")
                        ->orWhere('users.last_name', 'like', "%{$this->search}%");
                })->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereHas('staffRolesPermissions.staffRole', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->user_status_filter, function ($query) {
                $query->where('staffs.status', $this->user_status_filter);
            })
            ->when($this->staff_roles_filter, function ($query) {
                $query->whereHas('staffRolesPermissions', function ($query) {
                    $query->where('staff_role_id', $this->staff_roles_filter);
                });
            });

        // Sorting logic
        if ($this->sort_by === 'username') {
            $query->orderBy('staffs.username', $this->sort_direction);
        } elseif (in_array($this->sort_by, ['first_name', 'last_name', 'middle_name'])) {
            $query->orderBy('users.' . $this->sort_by, $this->sort_direction);
        } elseif ($this->sort_by === 'staff_role') {
            $query->orderBy('staff_roles.name', $this->sort_direction); // Sort by staff role name
        } else {
            $query->orderBy('staffs.' . $this->sort_by, $this->sort_direction);
        }
        
        // Paginate the results
        $staffs = $query->paginate($this->rowsPerPage);

        // Return the view
        return view('livewire.pages.admin.manage-users-table', compact('staffs'));
    }
}
