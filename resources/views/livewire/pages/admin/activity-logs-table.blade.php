
<x-admin.crud-page-content-base>

    <x-slot:page_description>
        A list of all your activities in iRoadCheck System.
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

        <!-- user Type Filter -->
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
{{--        <button  class="flex items-center px-5 py-2 bg-red-900 hover:bg-red-800 text-white rounded-[4px] text-[12px] font-medium mr-3 mb-0 mt-auto right-0"--}}
{{--                 wire:click="exportEquipmentReport"--}}
{{--                 type="button">--}}
{{--            <img src="{{ asset('storage/icons/Export.png') }}" alt="export-icon" class="w-5 h-5 mr-2">--}}
{{--            <span class="text-[14px]">Export</span>--}}
{{--        </button>--}}
        <button type="button" wire:click="exportEquipmentReport"
                class="mt-5 flex gap-x-[8px] w-auto text-xs px-[14px] py-[10px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/>
            </svg>
            <span class="ml-0 mt-0.5 text-[#FFFFFF] text-md">Export Reports</span>
        </button>
    </x-slot:action_buttons_container>

    <x-slot:table_container>
        <div class="overflow-x-auto m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
            <div class="min-w-full inline-block max-h-[60vh] min-h-[60vh] overflow-y-auto align-middle p-0 z-0">
                <table class="min-w-full min-h-full divide-y divide-gray-300 gap-y-5">
                    <thead>
                    <tr>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575] rounded-tl-lg">
                            No.
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575]">
                            Transaction ID
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575]">
                            Type of Activity
                        </th>
                        <th scope="col" class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-[12px] font-semibold text-[#757575]">
                            Date and Time
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($activities as $activity)
                        <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-slate-50' }} hover:bg-slate-200 text-left">
                            <!-- No. Column -->
                            <td class="whitespace-nowrap pl-4 py-3.5 text-[12px]">
                                <div class="ml-2 mt-[1px]">{{ $loop->iteration }}</div>
                            </td>

                            <!-- Transaction ID Column -->
                            <td class="whitespace-nowrap pl-4 py-3.5 text-[12px]">
                                <div class="font-normal text-left min-w-[150px]">{{ $activity->transaction_id }}</div>
                            </td>

                            <!-- Type of Activity Column -->
                            <td class="whitespace-nowrap pl-4 py-3.5 text-[12px]">
                                <div class="font-normal text-left min-w-[250px]">{{ $activity->type }}</div>
                            </td>

                            <!-- Date and Time Column -->
                            <td class="whitespace-nowrap pl-4 py-3.5 text-[12px]">
                                <div class="font-normal text-left min-w-[150px]">{{ $activity->created_at->format('Y-m-d H:i:s') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                No activity logs found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot:table_container>

    <x-slot:pagination_container  wire:key="{{ now() }}">
        {{ $activities->links('vendor.pagination.custom') }}
    </x-slot:pagination_container>

    <x-slot:modal_container>
{{--        <!-- Edit user Modal -->--}}
{{--        <livewire:modals.admin.users-modal.edit-user-modal--}}
{{--            wire:model.live="user_to_edited"--}}
{{--            :users="$users"--}}
{{--            @user_updated="$refresh"--}}
{{--        />--}}

{{--        <!-- View user Modal -->--}}
{{--        <livewire:modals.admin.users-modal.view-user-modal--}}
{{--            wire:model.live="user_to_viewed"--}}
{{--        />--}}
    </x-slot:modal_container>

</x-admin.crud-page-content-base>
