<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;



class Notifications extends Component
{

    public string $filter = 'all'; // default filter
    public string $search = '';   // search query

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function updatedSearch(): void
    {
        $this->render();
    }

    public function markAllAsRead(): void
    {
        Notification::where('admin_user_id', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        session()->flash('success', 'All notifications have been marked as read.');
    }

    public function viewNotification(Notification $notification): void
    {
        $notification->update(['is_read' => true]);

        $details = [
            'title' => $notification->title,
            'message' => $notification->message,
            'created_at' => $notification->created_at->diffForHumans(),
            'report_details' => $notification->report_id
                ? Report::find($notification->report_id)->only(['defect', 'location', 'severity', 'status'])
                : null,
        ];

        $this->dispatch('show-notification-modal', ['notification' => $details]);
    }

    public function markReportAsFixed(Report $report): void
    {
        $report->update(['status' => 'fixed']);

        // Create a notification for the admin
        Notification::create([
            'admin_user_id' => 1, // Assign to relevant admin(s)
            'report_id' => $report->id,
            'title' => 'Report Fixed',
            'message' => "The report for defect '{$report->defect}' at '{$report->location}' has been marked as fixed by staff: " .
                auth()->user()->name,
            'is_read' => false,
        ]);

        $this->dispatch('report-fixed', ['message' => 'Report marked as fixed and admin notified.']);
    }


    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        $query = Notification::query()
            ->where('admin_user_id', auth()->id())
            ->with('report');

        if ($this->filter === 'unread') {
            $query->where('is_read', false);
        } elseif ($this->filter === 'read') {
            $query->where('is_read', true);
        }

        if (!empty($this->search)) {
            $query->where(function (Builder $query) {
                $query->where('message', 'like', "%{$this->search}%")
                    ->orWhereHas('report', function (Builder $query) {
                        $query->where('defect', 'like', "%{$this->search}%")
                            ->orWhere('location', 'like', "%{$this->search}%");
                    });
            });
        }

        $notifications = $query->orderByDesc('created_at')->get();

        return view('livewire.pages.admin.notifications', ['notifications' => $notifications]);
    }

}
