<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;

class ReportsMap extends Component
{
    public $reports = [];

    public function mount()
    {
        // Fetch reports when the component is mounted
        $this->reports = Report::all();
    }
    public function render()
    {
        return view('livewire.reports-map');
    }
}
