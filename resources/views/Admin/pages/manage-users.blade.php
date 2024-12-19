<x-app-layout title="iRoadCheck | Admin | Manage Users">
    <x-Admin.admin-navigation page_title="Manage Users" action="{{ route('admin.manage-users-table') }}" placeholder="Search..." name="user_search">

        <livewire:pages.admin.manage-users-table/>

    </x-Admin.admin-navigation>
</x-app-layout>
