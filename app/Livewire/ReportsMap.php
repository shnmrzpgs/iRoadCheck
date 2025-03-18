<?php

namespace App\Livewire;

use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ReportsMap extends Component
{
    public $reports = [];

    public function mount(): void
    {
        // Fetch reports when the component is mounted
        $this->reports = Report::all();
    }
//    public function updated($propertyName)
//    {
//        if ($propertyName === 'reports') {
//            $this->emit('reportsUpdated', $this->reports);
//        }
//    }

//    public function fetchReports()
//    {
//        $this->reports = Report::all();
//        $this->dispatch('reportsUpdated', $this->reports);
//    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.reports-map');
    }
}
