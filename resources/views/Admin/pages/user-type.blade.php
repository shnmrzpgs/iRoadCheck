<x-app-layout title="iRoadCheck | User Type">
    <x-Admin.admin-navigation page_title="User Type" action="{{ route('admin.user-type-table') }}" placeholder="Search..." name="user_type_search">

        <livewire:pages.admin.user-type-table/>

    </x-Admin.admin-navigation>
</x-app-layout>
