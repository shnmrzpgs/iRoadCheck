<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Notification;
use App\Models\Report;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
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
        $unreadNotificationsCount = Notification::where('admin_user_id', auth()->id())
            ->where('is_read', false)
            ->count();

        if ($unreadNotificationsCount > 0) {
            Notification::where('admin_user_id', auth()->id())
                ->where('is_read', false)
                ->update(['is_read' => true]);

            session()->flash('success', 'All notifications have been marked as read.');
        } else {
            session()->flash('info', 'No unread notifications to mark as read.');
        }
    }

    public function viewNotification(Notification $notification)
    {
        // Mark the notification as read
        $notification->update(['is_read' => true]);

        // Retrieve the staff details associated with the action (assuming the notification contains this information)
        $staff = Staff::find($notification->admin_user_id); // Assuming you store admin user id in the notification
        $staffName = $staff->username ?? 'Unknown staff';
        $staffRole = $staff->staff->staff_roles->name ?? 'Unknown Role'; // Adjust based on your relationships

        // Get the report details
        $report = $notification->report;
        $reportDetails = [
            'defect' => $report->defect,
            'location' => $report->location,
            'status' => $report->status,
            'severity' => $report->severity,
            'updated_at' => $report->updated_at->diffForHumans(),
        ];

        // Prepare the notification data to be displayed
        $notificationData = [
            'title' => $notification->title,
            'message' => $notification->message,
            'staff_name' => $staffName,
            'staff_role' => $staffRole,
            'report_details' => $reportDetails,
            'created_at' => $notification->created_at->diffForHumans(),
        ];

        // Redirect to the report details page
        return redirect()->route('admin.road-defect-reports', ['report_id' => $notification->report_id]);
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


    #[On('show-view-notification-modal')]
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

        session()->forget('hideSearchBar');
        return view('livewire.pages.admin.notifications', ['notifications' => $notifications]);
    }

}
