<div class="flex justify-center items-center sm:justify-start sm:items-start">
    <x-admin.crud-page-content-base>

        <x-slot:page_description>
            A list of all users in iRoadCheck System.
        </x-slot:page_description>

        <x-slot:dropdown_filters_container>

            <!-- All Users Option -->
            <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                 :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] ': filters.sort === '' && filters.status === ''  && filters.userType === '',  /* Active state */
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort !== '' || filters.status !== '' || filters.userType !== ''  /* Default and hover state */
                         }"
                 @click="filters.sort = ''; filters.status = ''; filters.userType = '';">
                        <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                            All Users
                        </span>
            </div>

            <!-- User Type Filter -->
            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                 :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.userType !== '',  /* Active state */
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.userType === ''  /* Default and hover state */
                         }">
                <select x-model="filters.userType" @change="console.log('Filters:', filters)"
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                    <option value="" class="text-gray-400 text-[12px]">User Type</option>
                    <option value="patcher" class="text-gray-700">Patcher</option>
                    <option value="user-type-2" class="text-gray-700">User Type 2</option>
                    <option value="user-type-3" class="text-gray-700">User Type 3</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.status !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.status === ''  /* Default and hover state */
                             }">
                <select x-model="filters.status" @change="console.log('Filters:', filters)"
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                    <option value="" class="text-gray-400 text-[12px]">Status</option>
                    <option value="active" class="text-gray-700">Active</option>
                    <option value="inactive" class="text-gray-700">Inactive</option>
                </select>
            </div>
        </x-slot:dropdown_filters_container>

        <x-slot:action_buttons_container>
{{--            <div class="mt-4 mb-2 z-50">--}}
{{--                <livewire:modals.admin.users-modal.add-user-modal--}}
{{--                    :users="$users"--}}
{{--                    @user_added="$refresh"--}}
{{--                />--}}
{{--            </div>--}}
            <button type="button" wire:click="exportEquipmentReport"
                    class="mt-5 flex gap-x-[8px] w-auto text-xs px-[14px] py-[10px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                    <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/>
                </svg>
                <span class="ml-0 mt-0.5 text-[#FFFFFF] text-md">Export Reports</span>
            </button>
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
                            <button class="flex items-end" wire:click="toggleSorting('transaction_id')">
                                Transaction ID
                                <div x-cloak x-show="$wire.sort_by === 'transaction_id'">
                                    <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                    <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                </div>
                            </button>
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                            <button class="flex items-end" wire:click="toggleSorting('type')">
                                Type of Activity
                                <div x-cloak x-show="$wire.sort_by === 'type'">
                                    <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                    <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                </div>
                            </button>
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                            <button class="flex items-end" wire:click="toggleSorting('dateAndTime')">
                                Date and Time
                                <div x-cloak x-show="$wire.sort_by === 'dateAndTime'">
                                    <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                    <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                </div>
                            </button>
                        </th>
                        <th class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575] rounded-tr-lg">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-white relative">
                    @forelse ($activities as $activity)
                        <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                            <td class="px-4 py-3 text-xs">{{ $activity->id }}</td>
                            <td class="px-4 py-3 text-xs">{{ $activity->transaction_id }}</td>
                            <td class="px-4 py-3 text-xs">{{ $activity->userType->name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-xs font-medium">
                                    <span class="{{ $activity->status === 'Active' ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                        {{ $activity->status }}
                                    </span>
                            </td>
                            <td class="pr-5 py-3 text-xs">
                                <div class="flex">
                                    <!-- Button to Open Edit Course Modal -->
                                    <button class="flex items-center text-orange-500 hover:text-orange-600 font-medium text-xs transition active:scale-95 hover:bg-orange-100 hover:shadow py-1 px-3.5 rounded-md"
                                            wire:click="editUser({{ $activity->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:edit-user-modal-shown.window="loading = false"
                                    >
                                        <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="hidden md:block w-4 h-4 mr-2" />
                                        <span x-cloak x-show="! loading">Edit</span>
                                        <x-loading-indicator class="text-orange-500 w-4 h-4"
                                                             x-cloak x-show="loading"
                                        />
                                    </button>

                                    <!-- Button to Open View Course Modal -->
                                    <button class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md"
                                            wire:click="viewUser({{ $activity->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:view-user-modal-shown.window="loading = false"
                                    >
                                        <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="hidden md:block w-5 h-5 mr-2" />
                                        <span x-cloak x-show="! loading">View</span>
                                        <x-loading-indicator class="text-blue-500 w-4 h-4"
                                                             x-cloak x-show="loading"
                                        />
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
                <!-- Loading indicator for pagination -->
                <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition
                     class="absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
                    <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading/>
                </div>
            </div>


        </x-slot:table_container>

        <x-slot:pagination_container  wire:key="{{ now() }}">
{{--            {{ $users->links('vendor.pagination.custom') }}--}}
        </x-slot:pagination_container>

        <x-slot:modal_container>
{{--            <!-- Edit User Modal -->--}}
{{--            <livewire:modals.admin.users-modal.edit-user-modal--}}
{{--                wire:model.live="user_to_edited"--}}
{{--                :users="$users"--}}
{{--                @user_updated="$refresh"--}}
{{--            />--}}

{{--            <!-- View User Modal -->--}}
{{--            <livewire:modals.admin.users-modal.view-user-modal--}}
{{--                wire:model.live="user_to_viewed"--}}
{{--            />--}}
        </x-slot:modal_container>

    </x-admin.crud-page-content-base>
</div>

