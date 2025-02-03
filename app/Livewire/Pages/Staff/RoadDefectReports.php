<?php

namespace App\Livewire\Pages\Staff;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class RoadDefectReports extends Component
{
    public function render():  Factory|Application|View|\Illuminate\View\View
    {
        session()->forget('hideSearchBar');
        return view('livewire.pages.staff.road-defect-reports');
    }
}
