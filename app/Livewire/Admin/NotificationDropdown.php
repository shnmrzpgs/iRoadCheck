<?php

namespace App\Livewire\Admin;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class NotificationDropdown extends Component
{
    /** @var Collection|Notification[] */
    public Collection|array $notifications;

    public string $notifications_count = '0';

    // Listeners to trigger when a new notification is received
    public function getListeners(): array
    {
        return [
            'echo-presence:library-session,.staff-report-updated' => 'onStaffReportUpdated',
        ];
    }

    public function mount(): void
    {
        // Fetch unread notifications for the admin
        $this->notifications = auth()->user()->admin_notifications()
            ->with(['staff', 'report'])  // Assuming a relationship to get staff and report data
            ->where('is_read', false)
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }

    public function onStaffReportUpdated(): void
    {
        // Re-fetch notifications when a new report is updated
        $this->notifications = auth()->user()->notifications()
            ->with(['staff', 'report'])
            ->where('is_read', false)
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();

        $this->dispatch('staff_report_updated');
    }

    public function viewNotification(Notification $notification): void
    {
        // Parse the notification details
        $parsed_notification = [
            'title' => $notification->title,
            'message' => $notification->message,
            'staff_name' => $notification->staff->username ?? 'Unknown staff',
            'staff_role' => $notification->staff->staff_roles->name ?? 'Unknown Role',
            'report_details' => [
                'defect' => $notification->report->defect,
                'location' => $notification->report->location,
                'status' => $notification->report->status,
            ],
            'created_at' => $notification->created_at->diffForHumans(),
        ];

        // Dispatch an event to show the notification modal
        $this->dispatch('show-view-notification-modal', ['notification' => $parsed_notification]);

        // Mark the notification as read
        $notification->update(['is_read' => true]);

        // Re-fetch notifications
        $this->notifications = auth()->user()->admin_notifications()
            ->with(['staff', 'report'])
            ->where('is_read', false)
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }

    // Helper function to get notification count formatted
    private function getStringedNotificationCount(): string
    {
        $count = $this->notifications->count(); // Ensure $this->notifications is correctly defined

        // Return "99+" only if the count exceeds 99
        if ($count > 99) {
            return '99+';
        }

        // Otherwise, return the actual count as a string
        return (string) $count;
    }

    public function markAsRead($notificationId): void
    {
        $notification = Notification::find($notificationId);

        if ($notification && !$notification->is_read) {
            $notification->update(['is_read' => true]);
        }

        // Refresh the notification list
        $this->notifications = auth()->user()->admin_notifications()
            ->where('is_read', false)
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }


    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.admin.notification-dropdown');
    }
}
