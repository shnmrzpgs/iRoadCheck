<?php
namespace App\Livewire\Pages\Admin;

use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Support\Collection;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalStaff = 0;
    public $activeStaffCount;
    public $inactiveStaffCount;
    public $staffRolesData;
    public Collection $roles;

    public array $filters = [
        'sort' => '',
        'staffRole' => '',
    ];

    public function mount(): void
    {
        $this->updateStaffCount();
        $this->activeStaffCount = Staff::where('status', 'Active')->count();
        $this->inactiveStaffCount = Staff::where('status', 'Inactive')->count();
        
        $this->roles = StaffRole::whereHas('staffs')->get();
        $this->getStaffRolesData();
    }

    public function getStaffRolesData(): void
    {
        $query = StaffRole::query();

        // Apply role filter if selected
        if (!empty($this->filters['staffRole'])) {
            $query->where('id', $this->filters['staffRole']);
        }

        $staffRoles = $query->get();
    
        $rolesData = $staffRoles->map(function ($role) {
            // Get all staff members for this role
            $staffMembers = Staff::whereHas('staffRolesPermissions', function ($query) use ($role) {
                $query->where('staff_role_id', $role->id);
            })->with('user')->get();
    
            $count = $staffMembers->count();
    
            if ($count > 0) {
                return [
                    'name' => $role->name,
                    'count' => $count,
                    'members' => $staffMembers->map(function ($staff) {
                        return [
                            'name' => trim(
                                ($staff->user->first_name ?? '') . ' ' .
                                ($staff->user->middle_name ?? '') . ' ' .
                                ($staff->user->last_name ?? '')
                            ),
                            'avatar' => $staff->user->profilePhoto?->photo_path ?? null,
                        ];
                    })->values()->all(),
                ];
            }
    
            return null;
        })->filter()->values();
    
        // Sort roles by count based on filter
        if ($this->filters['sort'] === 'asc') {
            $rolesData = $rolesData->sortBy('count');
        } elseif ($this->filters['sort'] === 'desc') {
            $rolesData = $rolesData->sortByDesc('count');
        }
    
        $this->staffRolesData = $rolesData->values();
    }

    public function updatedFilters(): void
    {
        $this->getStaffRolesData();
    }

    public function updateStaffCount(): void
    {
        $this->totalStaff = Staff::count();
    }

    public function resetFilters(): void
    {
        $this->filters = [
            'sort' => '',
            'staffRole' => '',
        ];
        $this->getStaffRolesData();
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}