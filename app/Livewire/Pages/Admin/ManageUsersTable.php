<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Forms\AddUserForm;
use App\Livewire\Modals\Admin\UsersModal\EditUserModal;
use App\Livewire\Modals\Admin\UsersModal\ViewUserModal;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsersTable extends Component
{
    use WithPagination;

    public AddUserForm $form;
    public Collection $userTypes;

    public string $search = '';
    public int $rowsPerPage = 10;

    // Sorting
    public string $sort_by = 'id';
    public string $sort_direction = 'asc';

    // User Modals
    public ?User $user_to_viewed = null;
    public ?User $user_to_edited = null;

    public function mount(): void
    {
        $this->userTypes = UserType::all() ?? collect(); // Ensure collection is initialized
    }

    public function viewUser(User $user): void
    {
        $this->user_to_viewed = $user;
        $this->dispatch('show-view-user-modal', $user->id)->to(ViewUserModal::class);
    }

    public function editUser(User $user): void
    {
        $this->user_to_edited = $user;
        $this->dispatch('show-edit-user-modal', $user->id)->to(EditUserModal::class);
    }

    public function toggleSorting(string $field): void
    {
        if ($this->sort_by === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $field;
            $this->sort_direction = 'asc';
        }
    }

    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function updatingRowsPerPage(): void
    {
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        $query = $this->search;

        $users = User::query()
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('', 'like', '%' . $query . '%')
                        ->orWhere('last_name', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%');
                });
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.manage-users-table', [
            'users' => $users,
        ]);
    }
}
