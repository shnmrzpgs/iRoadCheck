<?php

namespace App\Livewire\Resident;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Support\Collection;

class Notification extends Component
{
    /** @var Collection|Notification[] */
    public Collection|array $notifications;

    public string $notifications_count = '0';

    // Listeners to trigger updates when a new notification is received
    public function getListeners(): array
    {
        return [
            "echo:resident-session,ResidentNotificationReceived" => 'onNotificationReceived',
        ];
    }

    public function mount(): void
    {
        $this->refreshNotifications();
    }

    public function onNotificationReceived(): void
    {
        $this->refreshNotifications();

        // Debugging Step
        logger('✅ ResidentNotificationReceived fired. Count:', [$this->notifications_count]);

        $this->dispatch('resident_notification_updated');
        $this->refreshNotifications(); // Ensure the count updates immediately
    }

    public function viewNotification(Notification $notification): void
    {
        if ($notification) {
            $notification->update(['is_read' => true]);

            $this->refreshNotifications(); // Ensure count updates before redirection

            // Redirect to Report History or relevant page
            $this->redirect(route('resident.report-history', ['report_id' => $notification->report_id]));
        }
    }

    public function markAsRead($notificationId): void
    {
        $notification = Notification::find($notificationId);

        if ($notification && !$notification->is_read) {
            $notification->update(['is_read' => true]);
        }

        $this->refreshNotifications();
    }

    public function markAllAsRead(): void
    {
        Notification::where('notifiable_id', auth()->id())
            ->where('notifiable_type', \App\Models\User::class)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->refreshNotifications(); // Changed to ensure instant count refresh
    }

    // Refresh notifications list and count
    private function refreshNotifications(): void
    {
        $this->notifications = auth()->user()->notifications()
            ->where('is_read', false)
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }

    // Helper function to get notification count
    private function getStringedNotificationCount(): string
    {
        $count = auth()->user()->notifications()
            ->where('is_read', false)
            ->count();

        return $count > 99 ? '99+' : (string) $count;
    }

    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.resident.notification');
    }
}
