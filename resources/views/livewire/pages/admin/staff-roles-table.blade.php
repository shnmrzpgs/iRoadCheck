<x-Admin.admin-navigation page_title="Staff Role" action="{{ route('admin.user-role-table') }}" placeholder="Search..." name="search">

    <div class="flex justify-center items-center sm:justify-start sm:items-start">
        <x-admin.crud-page-content-base>

            <x-slot:page_description>
                A list of all types of the staff roles in iRoadCheck System.
            </x-slot:page_description>

            <x-slot:dropdown_filters_container>

                <div x-data="{ activeFilter: 'all' }" class="flex space-x-2">

                    <!-- All Users Option -->
                    <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                         :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'all',  /* Active state */
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'all'  /* Default and hover state */
                         }"
                         @click="activeFilter = 'all'; $wire.resetFilterAndSearch()">
                        <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                            All Roles
                        </span>
                    </div>

                    <!-- Status Filter -->
                    <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                         :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'status',  /* Active state */
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'status'  /* Default and hover state */
                         }">
                        <select wire:model.live="staff_role_status_filter"
                                @change="activeFilter = 'status'"
                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                            <option value="" class="text-gray-400 text-[12px]">Role Status</option>
                            @foreach($staff_role_statuses as $staff_role_status)
                                <option value="{{ $staff_role_status['key'] }}">{{ ucfirst($staff_role_status['label']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </x-slot:dropdown_filters_container>

            <x-slot:action_buttons_container>
                <div class="mt-4 mb-2 z-50">
                    <livewire:modals.admin.staff-roles-modal.add-staff-role-modal
                        :staffRoles="$staffRoles"
                        @staff_added="$refresh"
                    />
                </div>
            </x-slot:action_buttons_container>

            <x-slot:table_container>
                <div class="inline-block w-[40vh] md:w-full lg:w-full h-auto md:h-[52vh] lg:h-[55vh] xl:h-[62vh] xl:max-h-[100vh] overflow-y-auto align-middle drop-shadow rounded-b-md">
                    <table class="w-[100px] md:w-full text-left divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575] rounded-tl-lg">
                                <button class="flex items-end" wire:click="toggleSorting('id')">
                                    No.
                                    <div x-cloak x-show="$wire.sort_by === 'id'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                    </div>
                                </button>
                            </th>
                            <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                <button class="flex items-end" wire:click="toggleSorting('name')">
                                    Staff Role Name
                                    <div x-cloak x-show="$wire.sort_by === 'name'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                    </div>
                                </button>
                            </th>
                            <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                <button class="flex items-end" wire:click="toggleSorting('permissions.label')">
                                    Permissions
                                    <div x-cloak x-show="$wire.sort_by === 'permissions.label'">
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
                            <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575] rounded-tr-lg">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-white relative">
                        @forelse ($staffRoles as $staffRole)
                            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                                <td class="px-4 py-3 text-xs">{{ $staffRole->id }}</td>
                                <td class="px-4 py-3 text-xs">{{ucfirst($staffRole->name)}}</td>
                                <td class="px-4 py-3 text-xs truncate max-w-[150px]">
                                    {{ $staffRole->permissions->pluck('label')->join(', ') }}
                                </td>
                                <td class="px-4 py-3 text-xs font-medium">
                                        <span class="{{ strtolower($staffRole->status) === 'enabled' ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                            {{ ucfirst($staffRole->status) }}
                                        </span>
                                </td>
                                <td class="pr-5 py-3 text-xs">
                                    <div class="flex">
                                        <!-- Button to Open Edit staff Role Modal -->
                                        <button class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-100 hover:shadow py-1 px-3.5 rounded-md"
                                                wire:click="editStaffRole({{ $staffRole->id }})"
                                                wire:loading.attr="disabled"
                                                x-data="{ loading: false }"
                                                x-on:click="loading = true"
                                                x-on:edit-staff-role-modal-shown.window="loading = false"
                                        >
                                            <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="hidden md:block w-4 h-4 mr-2" />
                                            <span x-cloak x-show="! loading">Edit</span>
                                            <x-loading-indicator class="text-orange-500 w-4 h-4" x-cloak x-show="loading"/>
                                        </button>

                                        <!-- Button to Open View staff Role Modal -->
                                        <button class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md"
                                                wire:click="viewStaffRole({{ $staffRole->id }})"
                                                wire:loading.attr="disabled"
                                                x-data="{ loading: false }"
                                                x-on:click="loading = true"
                                                x-on:view-staff-role-modal-shown.window="loading = false"
                                        >
                                            <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="hidden md:block w-5 h-5 mr-2" />
                                            <span x-cloak x-show="! loading">View</span>
                                            <x-loading-indicator class="text-blue-500 w-4 h-4" x-cloak x-show="loading"/>
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
                    <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading/>
                </div>
            </x-slot:table_container>

            <x-slot:pagination_container  wire:key="{{ now() }}">
                {{ $staffRoles->links('vendor.pagination.custom') }}
            </x-slot:pagination_container>

            <x-slot:modal_container>
                <!-- Edit Staff Modal -->
                <livewire:modals.admin.staff-roles-modal.edit-staff-role-modal
                    wire:model.live="staff_role_to_edited"
                    :staffRoles="$staffRoles"
                    @staffRole_updated="$refresh"
                />

                <!-- View Staff Modal -->
                <livewire:modals.admin.staff-roles-modal.view-staff-role-modal
                    wire:model.live="staff_role_to_viewed"
                />

            </x-slot:modal_container>

        </x-admin.crud-page-content-base>
    </div>

</x-Admin.admin-navigation>


