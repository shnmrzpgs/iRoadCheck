<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
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
            ->where('notifiable_type', auth()->user()::class) // ✅ Added 'notifiable_type' here
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
        // Mark the notification as read
        $notification->update(['is_read' => true]);

        // Retrieve the staff details associated with the action
        $staff = Staff::find($notification->admin_user_id);

        $staffName = $staff?->username ?? 'Unknown staff';
        $staffRole = $staff?->staff?->staff_roles?->name ?? 'Unknown Role'; // Improved null handling

        // Get the report details
        $report = $notification->report;

        // Prevent potential null errors if report data is missing
        $reportDetails = $report ? [
            'defect' => $report->defect,
            'location' => $report->location,
            'status' => $report->status,
            'severity' => $report->severity,
            'updated_at' => $report->updated_at->diffForHumans(),
        ] : [];

        // Prepare the notification data
        $notificationData = [
            'title' => $notification->title,
            'message' => $notification->message,
            'staff_name' => $staffName,
            'staff_role' => $staffRole,
            'report_details' => $reportDetails,
            'created_at' => $notification->created_at->diffForHumans(),
        ];

        // Redirect to the report details page
        return Redirect::route('admin.road-defect-reports', ['report_id' => $notification->report_id]);
    }

    public function markReportAsFixed(Report $report): void
    {
        $report->update(['status' => 'fixed']);

        Notification::create([
            'notifiable_id' => auth()->id(),  // ✅ Correct ID
            'notifiable_type' => auth()->user()::class, // ✅ Correct 'notifiable_type' for polymorphic
            'report_id' => $report->id,
            'title' => 'Report Fixed',
            'message' => "The report for defect '{$report->defect}' at '{$report->location}' has been marked as fixed by staff: " . auth()->user()->name,
            'is_read' => false,
        ]);

        $this->loadNotifications();
        $this->dispatch('report-fixed', ['message' => 'Report marked as fixed and admin notified.']);
    }

    #[On('show-view-notification-modal')]
    public function fetchNotifications(): void
    {
        $query = Notification::query()
            ->where('notifiable_id', auth()->id())
            ->where('notifiable_type', auth()->user()::class) // ✅ Added 'notifiable_type' here
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
            ->where('notifiable_type', auth()->user()::class) // ✅ Added 'notifiable_type' here
            ->with(['report', 'staff'])
            ->orderByDesc('created_at')
            ->get();

        $this->notifications_count = $this->getStringedNotificationCount();
    }

    // Helper function to get notification count formatted
    private function getStringedNotificationCount(): string
    {
        $count = count($this->notifications);

        return $count > 99 ? '99+' : (string) $count;
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.admin.notifications', [
            'notifications' => $this->notifications
        ]);
    }
}
