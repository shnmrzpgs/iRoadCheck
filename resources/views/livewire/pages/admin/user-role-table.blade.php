<x-Admin.admin-navigation page_title="User Role" action="{{ route('admin.user-role-table') }}" placeholder="Search..." name="search">

    <div class="flex justify-center items-center sm:justify-start sm:items-start">
    <x-admin.crud-page-content-base>

        <x-slot:page_description>
            A list of all user type in iRoadCheck System.
        </x-slot:page_description>

        <x-slot:dropdown_filters_container>
        </x-slot:dropdown_filters_container>

        <x-slot:action_buttons_container>
{{--            <div class="mt-4 mb-2 z-50">--}}
{{--                <livewire:modals.admin.users-modal.add-user-modal--}}
{{--                    :users="$users"--}}
{{--                    @user_added="$refresh"--}}
{{--                />--}}
{{--            </div>--}}
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
                                User Role Name
                                <div x-cloak x-show="$wire.sort_by === 'name'">
                                    <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                    <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                </div>
                            </button>
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                            <button class="flex items-end" wire:click="toggleSorting('permissions')">
                                Permissions
                                <div x-cloak x-show="$wire.sort_by === 'permissions'">
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
                    @forelse ($userRoles as $userRole)
                        <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                            <td class="px-4 py-3 text-xs">{{ $userRole->id }}</td>
                            <td class="px-4 py-3 text-xs">{{ $userRole->role}}</td>
                            <td class="px-4 py-3 text-xs truncate max-w-[150px]">
                                {{--                                {{ implode(', ', $userType->permissions) ?? 'No permissions' }}--}}
                            </td>
                            <td class="px-4 py-3 text-xs font-medium">
                            <span class="{{ $userRole->status === 'Enabled' ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                {{ $userRole->status }}
                            </span>
                            </td>
                            <td class="pr-5 py-3 text-xs">
{{--                                <div class="flex">--}}
{{--                                    <!-- Button to Open Edit Course Modal -->--}}
{{--                                    <button class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-100 hover:shadow py-1 px-3.5 rounded-md"--}}
{{--                                            wire:click="editUser({{ $user->id }})"--}}
{{--                                            wire:loading.attr="disabled"--}}
{{--                                            x-data="{ loading: false }"--}}
{{--                                            x-on:click="loading = true"--}}
{{--                                            x-on:edit-user-modal-shown.window="loading = false"--}}
{{--                                    >--}}
{{--                                        <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="hidden md:block w-4 h-4 mr-2" />--}}
{{--                                        <span x-cloak x-show="! loading">Edit</span>--}}
{{--                                        <x-loading-indicator class="text-orange-500 w-4 h-4"--}}
{{--                                                             x-cloak x-show="loading"--}}
{{--                                        />--}}
{{--                                    </button>--}}

{{--                                    <!-- Button to Open View Course Modal -->--}}
{{--                                    <button class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md"--}}
{{--                                            wire:click="viewUser({{ $user->id }})"--}}
{{--                                            wire:loading.attr="disabled"--}}
{{--                                            x-data="{ loading: false }"--}}
{{--                                            x-on:click="loading = true"--}}
{{--                                            x-on:view-user-modal-shown.window="loading = false"--}}
{{--                                    >--}}
{{--                                        <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="hidden md:block w-5 h-5 mr-2" />--}}
{{--                                        <span x-cloak x-show="! loading">View</span>--}}
{{--                                        <x-loading-indicator class="text-blue-500 w-4 h-4"--}}
{{--                                                             x-cloak x-show="loading"--}}
{{--                                        />--}}
{{--                                    </button>--}}
{{--                                </div>--}}
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
                <!-- Loading indicator for pagination -->
                <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition
                     class="absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
                    <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading/>
                </div>
            </div>


        </x-slot:table_container>

        <x-slot:pagination_container  wire:key="{{ now() }}">
            {{ $userRoles->links('vendor.pagination.custom') }}
        </x-slot:pagination_container>

        <x-slot:modal_container>
{{--            <!-- View User Modal -->--}}
{{--            <livewire:modals.admin.user-role-modal.view-user-role-modal--}}
{{--                wire:model.live="user_role_to_viewed"--}}
{{--            />--}}
        </x-slot:modal_container>

    </x-admin.crud-page-content-base>
</div>

</x-Admin.admin-navigation>
