<?php

namespace App\Livewire\Pages\Staff;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class SuggestionReports extends Component
{
    public function render():Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.staff.suggestion-reports');
    }
}
