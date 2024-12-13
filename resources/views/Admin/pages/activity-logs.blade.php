<x-app-layout title="iRoadCheck | Activity Logs">
    <x-Admin.admin-navigation page_title="Activity Logs" action="{{ route('admin.activity-logs-table') }}" placeholder="Search..." name="logs_search">

        <livewire:pages.admin.activity-logs-table/>

    </x-Admin.admin-navigation>
</x-app-layout>
