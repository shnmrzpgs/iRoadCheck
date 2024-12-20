<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\User\UserStatus;
use App\Livewire\Modals\Admin\UsersModal\EditUserAccountModal;
use App\Livewire\Modals\Admin\UsersModal\ViewUserAccountModal;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ManageUsersTable extends Component
{
    use WithoutUrlPagination, WithPagination;

    //Search
    public $search = '';

    public int $rowsPerPage = 10;

    public Collection $user_statuses;

    // User account to view
    public ?User $user_account_to_viewed = null;
    public ?User $user_account_to_edited = null;

    //Filters
    public string $user_status_filter = '';

    //Sorting
    public string $sort_by = 'id';

    public string $sort_direction = 'asc'; // 'asc' or 'desc'

    // Listening for changes in pagination
    protected $updatesQueryString = ['rowsPerPage'];


    public function mount(): void
    {
        $this->user_statuses = collect([
            [
                'key' => UserStatus::ACTIVE,
                'label' => 'Active',
            ],
            [
                'key' => UserStatus::INACTIVE,
                'label' => 'Inactive',
            ],
        ]);
    }

    public function editUserAccount(User $user): void
    {
        if ($this->user_account_to_edited === null) {
            $this->user_account_to_edited = $user;
        }
        if ($this->user_account_to_edited !== $user) {
            $this->user_account_to_edited = $user;
        }

        $this->dispatch('show-edit-user-account-modal', $user)->to(EditUserAccountModal::class);
    }

    public function viewUserAccount(User $user): void
    {
        if ($this->user_account_to_viewed === null) {
            $this->user_account_to_viewed = $user;
        }

        if ($this->user_account_to_viewed !== $user) {
            $this->user_account_to_viewed = $user;
        }

        $this->dispatch('show-view-user-account-modal', $user)->to(ViewUserAccountModal::class);
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

    public function render(): Factory|View|Application|\Illuminate\View\View
    {

        $query = User::with([
            'userRole',
            'user_type'
        ])->select('users.*');

        //Apply search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('id', 'like', "%{$this->search}%")
                    ->orWhere('first_name', 'like', "%{$this->search}%")
                    ->orWhere('middle_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('user_role', 'like', "%{$this->search}%");
            });
        }


        //Apply sorting
        if ($this->sort_by) {
            if (substr_count($this->sort_by, '.') === 1) {
                // Handling related fields
                [$relation, $column] = explode('.', $this->sort_by);
                $query->join($relation, 'users.'.Str::singular($relation).'_id', '=', $relation.'.id')
                    ->orderBy($relation.'.'.$column, $this->sort_direction ?? 'asc');
            } elseif (substr_count($this->sort_by, '.') > 1) {
                // Handling nested related fields
                $parts = explode('.', $this->sort_by);
                $column = array_pop($parts);
                $relations = $parts;

                $previousTable = 'users';
                foreach ($relations as $currentTable) {
                    $query->join($currentTable, $previousTable.'.'.Str::singular($currentTable).'_id', '=', $currentTable.'.id');
                    $previousTable = $currentTable;
                }

                $query->orderBy($previousTable.'.'.$column, $this->sort_direction ?? 'asc');
            } else {
                // Handling local fields
                $query->orderBy($this->sort_by, $this->sort_direction ?? 'asc');
            }
        }

        //Apply Filter
        if (! empty($this->user_status_filter)) {
            $query->where('status', $this->user_status_filter);
        }

        $users = $query->paginate($this->rowsPerPage);


        return view('livewire.pages.admin.manage-users-table', ['users' => $users ]);
    }
}
