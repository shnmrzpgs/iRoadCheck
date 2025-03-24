<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\Suggestion;
use Livewire\Component;

class SuggestionsList extends Component
{
    public $reports;
    protected $listeners = [
        'confirmMatch' => 'confirmMatch',
        'createNewReport' => 'createNewReport',
    ];
    public function mount()
    {
        $this->reports = Suggestion::where('reporter_id', auth()->id())
            ->where('is_match', 0)
            ->with(['report' => function ($query) {
                $query->withCount(['suggestions as match_count' => function ($query) {
                    $query->where('is_match', 1);
                }]);
            }])
            ->get();
    }


    public function confirmMatch($reportId)
    {
        Suggestion::where('id', $reportId)
            ->where('reporter_id', auth()->id())
            ->update(['is_match' => 1]);

        // Refresh component data
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.suggestions-list');
    }
}
