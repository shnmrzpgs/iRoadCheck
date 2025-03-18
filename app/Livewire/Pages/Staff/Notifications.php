<?php

namespace App\Livewire\Pages\Staff;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Notifications extends Component
{
    public string $filter = 'all';
    public string $search = '';
    public $notifications = [];
    public string $notifications_count = '0';

    public function mount(): void
    {
        $this->loadNotifications();
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
        $this->fetchNotifications();
    }

    public function updatedSearch(): void
    {
        $this->fetchNotifications();
    }

    public function markAllAsRead(): void
    {
        $unreadNotifications = Notification::where('notifiable_id', auth()->id())
            ->where('notifiable_type', Staff::class) // ✅ Corrected
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->loadNotifications();

        if ($unreadNotifications) {
            session()->flash('success', 'All notifications have been marked as read.');
        } else {
            session()->flash('info', 'No unread notifications to mark as read.');
        }
    }

    public function viewNotification(Notification $notification): Redirector
    {
        // Confirm ownership of the notification before marking it as read
        if (
            $notification->notifiable_id === auth()->id() &&
            $notification->notifiable_type === Staff::class
        ) {
            $parsed_notification = [
                'title' => $notification->title,
                'message' => $notification->message,
                'report_details' => [
                    'defect' => $notification->report->defect ?? 'N/A',
                    'location' => $notification->report->location ?? 'N/A',
                    'status' => $notification->report->status ?? 'N/A',
                ],
                'created_at' => $notification->created_at->diffForHumans(),
            ];

            $this->dispatch('show-view-notification-modal', ['notification' => $parsed_notification]);
            $notification->update(['is_read' => true]);
            $this->fetchNotifications();

            return redirect()->route('staff.road-defect-reports', ['report_id' => $notification->report_id]);
        }

        return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
    }

    #[On('show-view-notification-modal')]
    public function fetchNotifications(): void
    {
        $query = Notification::query()
            ->where('notifiable_id', auth()->id())
            ->where('notifiable_type', Staff::class) // ✅ Corrected
            ->with(['report', 'staff']);

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

        $this->notifications = $query->orderByDesc('created_at')->get();
        $this->notifications_count = $this->getStringedNotificationCount();

        $this->dispatch('notifications-updated', ['notifications' => $this->notifications]);
    }

    private function loadNotifications(): void
    {
        $this->notifications = Notification::where('notifiable_id', auth()->id())
            ->where('notifiable_type', Staff::class) // ✅ Corrected
            ->with(['report', 'staff'])
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }

    private function getStringedNotificationCount(): string
    {
        $count = count($this->notifications);
        return $count > 99 ? '99+' : (string) $count;
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.staff.notifications');
    }
}
