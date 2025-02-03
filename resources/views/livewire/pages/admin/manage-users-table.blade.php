<x-Admin.admin-navigation page_title="Manage Staffs" action="{{ route('admin.manage-users-table') }}" placeholder="Search..." id="search" name="search" wire:model.live="search">

    <div class="flex justify-center items-center sm:justify-start sm:items-start ">
        <x-admin.crud-page-content-base>

            <x-slot:page_description>
                A list of all staffs in iRoadCheck System.
            </x-slot:page_description>

            <x-slot:dropdown_filters_container>

                <!-- Alpine.js State -->
                <div x-data="{ activeFilter: 'all' }" class="flex space-x-2">
                    <!-- All Users Option -->
                    <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                        :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'all',  /* Active state */
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'all'  /* Default and hover state */
                         }"
                        @click="activeFilter = 'all'; $wire.resetFilterAndSearch()">
                        <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                            All Staff
                        </span>
                    </div>

                    <!-- Status Filter -->
                    <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                        :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'status',  /* Active state */
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'status'  /* Default and hover state */
                         }">
                        <select wire:model.live="user_status_filter"
                            @change="activeFilter = 'status'"
                            class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                            <option value="" class="text-gray-400 text-[12px]">User Status</option>
                            @foreach($user_statuses as $user_status)
                            <option value="{{ $user_status['key'] }}">{{ ucfirst($user_status['label']) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                        :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'status',  /* Active state */
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'status'  /* Default and hover state */
                         }">
                        <select wire:model.live="staff_roles_filter"
                            @change="activeFilter = 'roles'"
                            class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                            <option value="" class="text-gray-400 text-[12px]">Staff Roles</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </x-slot:dropdown_filters_container>

            <x-slot:action_buttons_container>
                <div class="flex justify-between items-center gap-2">
                    <div class="mt-5">
                        <livewire:modals.admin.users-modal.add-user-account-modal
                            @user_added="$refresh" />
                    </div>
                    
                    <button type="button" wire:click="exportStaffs"
                        class="mt-5 flex gap-x-[8px] w-auto text-xs px-[14px] py-[8px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                            <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z" />
                        </svg>
                        <span class="ml-0 mt-1 text-[#FFFFFF] text-md">Export</span>
                    </button>
                </div>

            </x-slot:action_buttons_container>

            <x-slot:table_container>
                <div class="inline-block w-[40vh] md:w-full lg:w-full h-[40vh] md:h-[52vh] lg:h-[55vh] xl:h-[62vh] xl:max-h-[100vh] overflow-y-auto align-middle drop-shadow rounded-b-md">
                    <table class="w-[100px] md:w-full text-left divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('id')">
                                        No.
                                        <div x-cloak x-show="$wire.sort_by === 'id'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('first_name')">
                                        Name
                                        <div x-cloak x-show="$wire.sort_by === 'first_name'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('username')">
                                        Username
                                        <div x-cloak x-show="$wire.sort_by === 'username'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('staff_role')">
                                        Staff Role
                                        <div x-cloak x-show="$wire.sort_by === 'staff_role'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('status')">
                                        Status
                                        <div x-cloak x-show="$wire.sort_by === 'status'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-white relative">
                            @forelse ($staffs as $staff)
                            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                                <td class="px-4 py-3 text-xs">{{ $staff->id }}</td>
                                <td class="px-4 py-3 text-xs">
                                    <div class="flex items-center">
                                        <img
                                            src="{{ $staff->user->profilePhoto ? asset('storage/' . $staff->user->profilePhoto->photo_path) : asset('storage/icons/profile-graphics.png') }}"
                                            alt="Profile Image"
                                            class="hidden lg:block h-8 w-8 rounded-full flex-shrink-0 object-cover">
                                        <span class="lg:ml-2 font-medium capitalize">{{ $staff->user->first_name }} {{ $staff->user->middle_name }} {{ $staff->user->last_name }}</span>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-xs">{{ $staff->user->username }}</td>
                                <td class="px-4 py-3 text-xs">
                                    {{ optional($staff->staffRolesPermissions->staffRole)->name ?? 'No role assigned' }}
                                </td>
                                <td class="px-4 py-3 text-xs font-medium">
                                    <span class="{{ strtolower($staff->status ?? '') === 'active' ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                        {{ ucfirst($staff->status ?? 'Unknown') }}
                                    </span>


                                </td>
                                <td class="pr-5 py-3 text-xs">
                                    <div class="flex">
                                        <!-- Button to Open Edit Course Modal -->
                                        <button
                                            class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-100 hover:shadow py-1 px-3.5 rounded-md"
                                            wire:click="editUserAccount({{ $staff->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:edit-user-account-modal-shown.window="loading = false">
                                            <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="hidden md:block w-4 h-4 mr-2" />
                                            <span x-show="!loading">Edit</span>
                                            <x-loading-indicator class="text-orange-500 w-4 h-4" x-show="loading" />
                                        </button>

                                        <!-- Button to Open View Course Modal -->
                                        <button class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md"
                                            wire:click="viewUserAccount({{ $staff->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:view-user-account-modal-shown.window="loading = false">
                                            <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="hidden md:block w-5 h-5 mr-2" />
                                            <span x-cloak x-show="! loading">View</span>
                                            <x-loading-indicator class="text-blue-500 w-4 h-4"
                                                x-cloak x-show="loading" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Loading indicator for pagination -->
                <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition
                    class="absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
                    <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading />
                </div>

            </x-slot:table_container>

            <x-slot:pagination_container wire:key="{{ now() }}">
                {{ $staffs->links('vendor.pagination.custom') }}
            </x-slot:pagination_container>

            <x-slot:modal_container>
                <!-- Edit Staff Modal -->
                <livewire:modals.admin.users-modal.edit-user-account-modal
                    @staff_account_updated="$refresh" />


                <!-- View Staff Modal -->
                <livewire:modals.admin.users-modal.view-user-account-modal
                    wire:model="staff_account_to_viewed" />
            </x-slot:modal_container>

        </x-admin.crud-page-content-base>
    </div>

</x-Admin.admin-navigation>
