<?php

namespace App\Livewire\Pages\Resident;

use App\Models\Notification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Carbon\Carbon;

class Notifications extends Component
{
    public $notificationsToday;
    public $notificationsEarlier;
    public $search = '';
    public $filter = 'all';

    public function mount(): void
    {
        $this->loadNotifications();
    }

    public function loadNotifications(): void
    {
        $query = Notification::query()
            ->where('notifiable_id', auth()->id())
            ->where('notifiable_type', \App\Models\User::class);

        if ($this->search) {
            $query->where('message', 'like', "%{$this->search}%");
        }

        if ($this->filter === 'unread') {
            $query->where('is_read', false);
        } elseif ($this->filter === 'read') {
            $query->where('is_read', true);
        }

        $this->notificationsToday = (clone $query)
            ->whereDate('created_at', Carbon::today())
            ->latest()
            ->get();

        $this->notificationsEarlier = (clone $query)
            ->whereDate('created_at', '<', Carbon::today())
            ->latest()
            ->get();
    }

    public function setFilter($filter): void
    {
        $this->filter = $filter;
        $this->loadNotifications();
    }

    public function markAllAsRead()
    {
        $unreadNotifications = Notification::where('notifiable_id', auth()->id())
            ->where('notifiable_type', \App\Models\User::class)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        if ($this->filter !== 'read') {
            $this->loadNotifications();
        }

        if ($unreadNotifications) {
            session()->flash('success', 'All notifications have been marked as read.');
        } else {
            session()->flash('info', 'No unread notifications to mark as read.');
        }

        // Redirect to the desired route
        return redirect()->route('resident.notifications'); // Example route name
    }


    public function viewNotification($id): void
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->update(['is_read' => true]);
            $this->redirect(route('resident.report-history', ['report_id' => $notification->report_id]));
        }

        $this->loadNotifications();
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.resident.notifications', [
            'notificationsToday' => $this->notificationsToday,
            'notificationsEarlier' => $this->notificationsEarlier,
        ]);
    }
}
