<div>
    <x-admin.crud-page-content-base>

        <x-slot:page_title>ACADEMIC YEAR</x-slot:page_title>
        <x-slot:page_description>
            A list of all academic years in the system.
        </x-slot:page_description>

        <x-slot:search_bar_container>
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-search-icon class="h-5 w-5 text-gray-400"/>
            </div>

            <input id="search" name="search"
                   class="text-[14px] block w-full pl-10 pr-3 py-2 rounded-md leading-5 bg-[#2D2D2D] border border-transparent focus:bg-none focus:border focus:border-[#F1F1F1] text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-[#2D2D2D] focus:text-gray-300 sm:text-sm"
                   placeholder="Search Student"
                   type="search"
                   wire:model.live="search"
            >
        </x-slot:search_bar_container>

        <x-slot:dropdown_filters_container>

            {{-- Active: border-[#E37878] border --}}

            {{-- All User Option --}}
            <div class="flex text-[14px] rounded-[4px] hover:border-[#E37878] hover:border"
            ><span wire:click="resetFiltersAndSearch"
                   class="cursor-pointer text-gray-300 block appearance-none w-full bg-[#262626] border border-none focus:ring-0 px-2 py-2 rounded shadow-none focus:outline-none focus:shadow- text-center"
                >All Academic Years</span>
            </div>

            {{-- User Status Filter --}}
            <div class="relative flex hover:border-[#E37878] hover:border rounded-[4px]">
                <select wire:model.live="status_filter" class="text-[14px] text-gray-300 block appearance-none w-full bg-[#262626] border border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:shadow-none">
                    <option value="" class="text-gray-400 text-[13px]">User Status</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status['key'] }}">{{ ucfirst($status['label']) }}</option>
                    @endforeach
                </select>
            </div>

            <div
                x-data=
                    "
                        {
                            value: [$wire.min_date, $wire.max_date],
                            init() {
                                let picker = flatpickr(this.$refs.picker, {
                                    mode: 'range',
                                    dateFormat: 'Y-m-d',
                                    defaultDate: this.value,
                                    minDate: $wire.min_date,
                                    maxDate: $wire.max_date,
                                    allowInput: false,
                                    onChange: (date, dateString) => {
                                        this.value = dateString.split(' to ')
                                    }
                                })

                                this.$watch('value', () => picker.setDate(this.value))
                            }
                        }
                    "
                class="relative flex hover:border-[#E37878] hover:border rounded-[4px] custom-date-input"
            >
                <input class="text-[14px] text-gray-300 block appearance-none w-full bg-[#262626] border border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:shadow-none"
                       x-ref="picker"
                       type="text"
                       placeholder="Select Date Range"
                       wire:model.live="date_range_filter"
                />
            </div>
        </x-slot:dropdown_filters_container>

        <x-slot:action_buttons_container>

        </x-slot:action_buttons_container>

        <x-slot:table_container>

            <div class="relative overflow-x-auto rounded-t-[2px] shadow shadow-gray-400">
                <div class="min-w-full inline-block max-h-[53vh] min-h-[53vh] overflow-y-auto align-middle p-0 z-0">
                    <table class="min-w-full divide-y divide-gray-300 gap-y-5">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300 rounded-tl-[2px] pl-3">
                                <button class="flex items-end" wire:click="toggleSorting('id')">
                                    No
                                    <div x-cloak x-show="$wire.sort_by === 'id'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'"/>
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'"/>
                                    </div>
                                </button>
                            </th>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300">
                                <button class="flex items-end" wire:click="toggleSorting('start_date')">
                                    Academic Year
                                    <div x-cloak x-show="$wire.sort_by === 'start_date'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'"/>
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'"/>
                                    </div>
                                </button>
                            </th>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300">
                                <button class="flex items-end" wire:click="toggleSorting('start_date')">
                                    Start Date
                                    <div x-cloak x-show="$wire.sort_by === 'start_date'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'"/>
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'"/>
                                    </div>
                                </button>
                            </th>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300">
                                <button class="flex items-end" wire:click="toggleSorting('end_date')">
                                    End Date
                                    <div x-cloak x-show="$wire.sort_by === 'end_date'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'"/>
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'"/>
                                    </div>
                                </button>
                            </th>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300">
                                <button class="flex items-end" wire:click="toggleSorting('status')">
                                    Status
                                    <div x-cloak x-show="$wire.sort_by === 'status'">
                                        <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'"/>
                                        <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'"/>
                                    </div>
                                </button>
                            </th>
                            <th scope="col"
                                class="sticky top-0 z-10 bg-[#404040] py-3.5 text-left text-[13px] font-semibold text-gray-300">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="relative">

                        @forelse($academic_years as $academic_year)
                            <tr class="text-left {{ $loop->iteration % 2 === 0 ? 'bg-[#252525]' : 'bg-[#303030]' }}">
                                <td class="whitespace-nowrap py-6 text-[13px] text-[#E37575] pl-4"
                                >{{ $academic_year->id }}</td>
                                <td class="whitespace-nowrap py-6 text-[13px] text-gray-200"
                                >{{ $academic_year->value }}</td>
                                <td class="whitespace-nowrap py-6 text-[13px] text-gray-200"
                                >{{ $academic_year->start_date->format('M d, Y') }}</td>
                                <td class="whitespace-nowrap py-6 text-[13px] text-gray-200"
                                >{{ $academic_year->end_date->format('M d, Y') }}</td>
                                <td class="whitespace-nowrap py-6 text-[13px] {{ $academic_year->status === 'active' ? 'text-green-500' : 'text-red-500' }}"
                                >{{ ucfirst($academic_year->status) }}</td>
                                <td class="whitespace-nowrap py-5 text-[13px] text-gray-200">
                                    <div class="flex">

                                        <button
                                            class="text-orange-500 hover:underline mr-2 flex justify-center items-center"
                                            wire:click="editAcademicYear({{ $academic_year->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:edit-academic-year-modal-shown.window="loading = false"
                                        >
                                            <span x-cloak x-show="! loading">Edit</span>
                                            <x-loading-indicator class="text-orange-500 w-4 h-4"
                                                                 x-cloak x-show="loading"
                                            />
                                        </button>

                                        <button class="text-blue-500 hover:underline flex justify-center items-center"
                                                {{--wire:click="viewStudentAccount({{ $student->id }})"--}}
                                                wire:loading.attr="disabled"
                                                x-data="{ loading: false }"
                                                x-on:click="loading = true"
                                                x-on:view-student-account-modal-shown.window="loading = false"
                                        >
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
                                <td colspan="100%" class="text-center py-28 opacity-80">
                                    <div class="flex flex-col items-center justify-center">
                                        <img src="{{ asset('storage/icons/no-content-student.png') }}"
                                             alt="no-content-student" class="w-24 h-24 mb-2"/>
                                        <p class="text-[13px] font-light italic text-gray-400">No student account
                                            found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <div wire:loading.class.remove="opacity-0 pointer-events-none"
                     wire:target="previousPage, nextPage, gotoPage" x-cloak x-transition
                     class="absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
                    <x-loading-indicator wire:loading class="h-[50px] w-[50px] text-white"/>
                </div>
            </div>

        </x-slot:table_container>

        <x-slot:item_group_name>Total Academic Years</x-slot:item_group_name>

        <x-slot:total_items_count>
            {{ $academic_years->total() }}
            <span>&nbsp;|&nbsp;</span>
            <span>Showing</span>
            <span class="font-medium">{{ $academic_years->firstItem() }}</span>
            <span>to</span>
            <span class="font-medium">{{ $academic_years->lastItem() }}</span>
            <span>of</span>
            <span class="font-medium">{{ $academic_years->total() }}</span>
            <span>results</span>
        </x-slot:total_items_count>

        <x-slot:rows_per_page_dropdown>
            @if($academic_years->links()->getData()['paginator'] !== null && count($academic_years->links()->getData()['paginator']->items()) >= $rows_per_page)
                <span class="mr-2">Rows per page: </span>
                <select
                    class=" py-0 text-[12px] bg-[#404040] rounded-[2px] focus:border-[#E37575] text-white focus:ring-1 focus:ring-[#E37575]"
                    wire:model.live="rows_per_page">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            @endif
        </x-slot:rows_per_page_dropdown>

        <x-slot:pagination_container wire:key="{{ now() }}">
            {{ $academic_years->links() }}
        </x-slot:pagination_container>

        <x-slot:modal_container>
            <livewire:modals.admin.academic-year-modal.edit-academic-year-modal
                wire:model.live="academic_year_to_edit"
            />
        </x-slot:modal_container>

    </x-admin.crud-page-content-base>
</div>
