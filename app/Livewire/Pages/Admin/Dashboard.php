<?php

namespace App\Livewire\Pages\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\Staff;
use Livewire\Component;

class Dashboard extends Component
{

    public int $totalStaff = 0;
    public $activeStaffCount;
    public $inactiveStaffCount;

    // Load the total staff count when the component is mounted
    public function mount(): void
    {
        $this->updateStaffCount();
        $this->activeStaffCount = Staff::where('status', 'Active')->count();
        $this->inactiveStaffCount = Staff::where('status', 'Inactive')->count();
    }

    // Function to update the staff count
    public function updateStaffCount(): void
    {
        $this->totalStaff = Staff::count();
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.admin.dashboard');
    }
}
