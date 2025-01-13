<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\Staff\StaffStatus;
use App\Livewire\Modals\Admin\UsersModal\EditUserAccountModal;
use App\Livewire\Modals\Admin\UsersModal\ViewUserAccountModal;
use App\Models\User;
use App\Models\Staff;
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

    // User account to view
    public ?Staff $staff_account_to_viewed = null;
    public ?Staff $staff_account_to_edited = null;

    // Filters
    public string $user_status_filter = '';

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
    }

    public function editUserAccount(Staff $staff): void
    {
         // Check if staff ID is valid
    // if (is_null($staff->id)) {
    //     Log::error('Invalid staff ID provided for editing.', ['staff_id' => $staff->id]);
    //     return; // Optionally return early or throw an exception
    // }
    //     $this->staff_account_to_edited = $staff;
    
        $this->dispatch('show-edit-user-account-modal', [
            'staff' => $staff->id, // Pass the ID instead of the whole instance
        ])->to(EditUserAccountModal::class);
    }
    


    public function viewUserAccount(Staff $staff): void
    {
        // if ($this->staff_account_to_viewed === null) {
        //     $this->staff_account_to_viewed = $staff;
        // }

        // if ($this->staff_account_to_viewed !== $staff) {
        //     $this->staff_account_to_viewed = $staff;
        // }

        // $this->dispatch('show-view-user-account-modal', $staff)->to(ViewUserAccountModal::class);
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
        $this->sort_by = '';
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
        $query = Staff::with(['user', 'staffRolesPermissions', 'staffRolesPermissions.staffRole'])
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                })
                    ->orWhereHas('staffRolesPermissions.staffRole', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->user_status_filter, function ($query) {
                $query->where('status', $this->user_status_filter);
            })
            ->orderBy($this->sort_by, $this->sort_direction);

        $staffs = $query->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.manage-users-table', compact('staffs'));
    }
}
