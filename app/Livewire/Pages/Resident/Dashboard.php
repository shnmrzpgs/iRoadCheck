<?php

namespace App\Livewire\Pages\Resident;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public $reports = [];
    public $reportsCount = 0;
    public $greeting;


    public function mount()
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $this->reports = DB::table('reports')
            ->where('reporter_id', $userId)
            ->select('id', 'defect as defectType', 'location', 'street', 'purok', 'barangay', 'status', 'date')
            ->orderBy('date', 'desc')
            ->get();

        $this->reportsCount = count($this->reports);

         // Set greeting based on time
         $this->greeting = $this->getGreeting();
    }

    public function getGreeting()
    {
        $now = Carbon::now('Asia/Manila');
        $hour = $now->format('H'); // 24-hour format

        if ($hour >= 0 && $hour < 12) {
            return 'Good Morning!';
        } elseif ($hour >= 12 && $hour < 18) {
            return 'Good Afternoon!';
        } else {
            return 'Good Evening!';
        }
    }

    public function render()
    {
        return view('livewire.pages.resident.dashboard', [
            'reports' => $this->reports,
            'reportsCount' => $this->reportsCount,
            'greeting' => $this->greeting,
        ]);
    }
}
