<?php

//namespace App\Livewire\Pages\Admin;
//
//use App\Models\User;
//use App\Models\UserRole;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Livewire\Component;
//
//class UserRoleTable extends Component
//{
//    public $userTypes;
//    public function mount()
//    {
//        $this->userTypes = UserRole::all(); // Fetch all user roles
//    }
//    public function render(): Factory|Application|View|\Illuminate\View\View
//    {
//        return view('livewire.pages.admin.user-type-table');
//    }
//}


namespace App\Livewire\Pages\Admin;

use App\Models\UserRole;
use App\Models\UserType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class UserRoleTable extends Component
{
    use WithPagination;

    // Search term
    public string $search = '';

    // Rows per page
    public int $rowsPerPage = 10;

    // Sorting
    public string $sort_by = 'id';
    public string $sort_direction = 'asc';

    public function mount(): void
    {
        // No need to fetch activities in mount, pagination will handle that
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

    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function updatingRowsPerPage(): void
    {
        // Reset pagination when rows per page is updated
        $this->resetPage();
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        // Query to filter and paginate
        $userRole = UserRole::query()
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('id', 'like', '%' . $this->search . '%')
                        ->orWhere('type', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->rowsPerPage);

        return view('livewire.pages.admin.user-role-table', [
            'userRoles' => $userRole,  // Pass the activities to the view
        ]);
    }
}

