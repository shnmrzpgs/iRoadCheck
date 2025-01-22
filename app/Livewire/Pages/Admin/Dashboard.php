<?php
namespace App\Livewire\Pages\Admin;

use App\Models\Staff;
use App\Models\StaffRole;
use App\Models\StaffRolesPermissions;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Support\Collection;

class Dashboard extends Component
{
    public int $totalStaff = 0;
    public $activeStaffCount;
    public $inactiveStaffCount;
    public $staffRolesData;
    public Collection $roles;

    public function mount(): void
    {
        $this->updateStaffCount();
        $this->activeStaffCount = Staff::where('status', 'Active')->count();
        $this->inactiveStaffCount = Staff::where('status', 'Inactive')->count();
        $this->getStaffRolesData();
        $this->roles = StaffRole::with('permissions')->get();
    }

    public function getStaffRolesData(): void
    {
        // Get all staff roles
        $staffRoles = StaffRole::all();
        
        $rolesData = $staffRoles->map(function ($role) {
            // Get all staff members for this role through StaffRolesPermissions
            $staffMembers = Staff::whereHas('staffRolesPermissions', function ($query) use ($role) {
                $query->where('staff_role_id', $role->id);
            })->with('user')->get();
            
            return [
                'name' => $role->name,
                'count' => $staffMembers->count(),
                'members' => $staffMembers->map(function ($staff) {
                    return [
                        'name' => $staff->user->name ?? $staff->username ?? 'Unknown',
                        'avatar' => $staff->user->profilePhoto?->photo_path ?? null,
                    ];
                })->values()->all(),
            ];
        })->values();

        $this->staffRolesData = $rolesData;
        // dd($this->staffRolesData);
    }

    public function updateStaffCount(): void
    {
        $this->totalStaff = Staff::count();
    }
    
    public function render(): View
    {
        return view('livewire.pages.admin.dashboard', [
            'staffRolesData' => $this->staffRolesData,
        ]);
    }
}