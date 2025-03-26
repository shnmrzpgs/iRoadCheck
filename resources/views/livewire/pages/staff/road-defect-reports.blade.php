<x-Staff.staff-navigation page_title="Road Defect Reports" action="{{ route('staff.road-defect-reports') }}" placeholder="Search..." name="search">

    <x-Staff.road-defect-reports-page-content-base>
        <x-slot:page_description>
            <div class="mt-2">
                This map view page allows admin to view the comprehensive reports of the road defects within Tagum City.
            </div>
        </x-slot:page_description>

        <x-slot:map_container>
            <div class="flex"
                 x-data="{
                     expanded: false,
                     showFilters: false,
                     activeFilter: '',
                     complaintsRange: '',
                     roadDefects: '',
                     dateRange: ''
                    }"
            >
                <button @click="expanded = !expanded"
                        class="hidden lg:flex items-center fixed top-14 right-7 z-[50] bg-gradient-to-b from-[#84D689] to-green-500 text-white rounded-full hover:bg-[#3AA76F] transition-all duration-300 px-4 py-2">
                    <svg :class="expanded ? '-rotate-90' : 'rotate-90'" class="w-4 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-.707.293l-6 6a1 1 0 001.414 1.414L10 5.414l5.293 5.293a1 1 0 001.414-1.414l-6-6A1 1 0 0010 3z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm ml-1" x-text="expanded ? 'View Report Information' : 'Hide Report Information'"></span>
                </button>

                <div class="w-full flex flex-col lg:flex-row">

                    <!-- Leaflet JS -->
                    <livewire:admin.comprehensive-report-map/>

                    <!-- Map Container -->
                    <div id="map" class="w-full h-[78vh] bg-white drop-shadow"></div>

                    <!-- Map Information Sidebar -->
                    <div class="mt-0 h-[78vh] bg-white transition-all duration-300 overflow-hidden"
                         :class="expanded ? 'w-0 hidden' : 'w-full lg:w-6/10 block' ">

                        <!-- Sidebar Content -->
                        <div class="p-0 block h-full flex flex-col">
                            <div class="w-full bg-gradient-to-b from-[#84D689] to-green-500 h-10 mb-4"></div>

                            <div class="px-5 mt-3 flex flex-col">
                                <!-- Search Filter-->
                                <div class="flex w-full items-center px-5 space-x-6">
                                    <form class="mr-auto relative flex flex-1 h-9 rounded-[6px] border border-gray-200" action="#" method="GET" onsubmit="event.preventDefault();">
                                        <label for="search-field" class="sr-only">Search</label>
                                        <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#6AA76F" aria-hidden="false">
                                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                        </svg>
                                        <input id="search-field"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#6AA76F] focus:border-[#6AA76F] drop-shadow-md focus:bg-white bg-white rounded-[6px] border-none block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 xs:text-[10px] sm:text-[12px] md:text-[14px] lg:text-[14px]"
                                               placeholder="Search"
                                               type="text"
                                               x-on:input="filterMarkers($event.target.value)">
                                    </form>
                                    <!-- Toggle Filters Button -->
                                    <button
                                        @click="showFilters = !showFilters"
                                        class="ml-auto bg-orange-500 text-white px-4 py-2 rounded-md flex items-center shadow-md hover:shadow-lg transition-all">
                                        <span class="text-xs" x-text="showFilters ? 'Hide Filters' : 'Show Filters'"></span>
                                        <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"
                                                  x-show="!showFilters" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 15l-7-7-7 7"
                                                  x-show="showFilters" />
                                        </svg>
                                    </button>

                                </div>

                                <!-- Filters Section -->
                                <div x-show="showFilters"
                                     class="flex flex-col space-y-4 mt-4 transition-all duration-300 overflow-auto max-h-[30vh] px-2">
                                    <!-- Number of Complaints Filter -->
                                    <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                                         :class="{
                                                         'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'complaints',
                                                         'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'complaints'
                                                     }">
                                        <select x-model="complaintsRange"
                                                @change="activeFilter = 'complaints'"
                                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                                            <option value="" class="text-gray-400">Number of Complaints</option>
                                            <option value="low">Low (0-10)</option>
                                            <option value="medium">Medium (11-50)</option>
                                            <option value="high">High (51+)</option>
                                        </select>
                                    </div>

                                    <!-- Types of Road Defects Filter -->
                                    <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                                         :class="{
                                                 'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'roadDefects',
                                                 'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'roadDefects'
                                             }">
                                        <select x-model="roadDefects"
                                                @change="activeFilter = 'roadDefects'"
                                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none">
                                            <option value="" class="text-gray-400 text-[12px]">Types of Road Defects</option>
                                            <option value="pothole">Potholes</option>
                                            <option value="cracks">Alligator Cracks</option>
                                            <option value="erosion">Raveling</option>
                                            <option value="erosion">Cracks</option>
                                        </select>
                                    </div>

                                    <!-- Date Range Filter -->
                                    <div x-data="{
                                        value: [$wire.start_date, $wire.end_date],
                                        init() {
                                            let picker = flatpickr(this.$refs.picker, {
                                                mode: 'range',
                                                dateFormat: 'Y-m-d',
                                                defaultDate: this.value,
                                                minDate: $wire.start_date,
                                                maxDate: $wire.end_date,
                                                allowInput: false,
                                                onChange: (date, dateString) => {
                                                    this.value = dateString.split(' to ');
                                                }
                                            });
                                            this.$watch('value', () => picker.setDate(this.value));
                                        }
                                    }"
                                         class="relative flex rounded-[4px] border hover:shadow-md custom-date-input"
                                         :class="{
                                                'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'dateRange',
                                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'dateRange'
                                            }">
                                        <input
                                            class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none"
                                            x-ref="picker"
                                            type="text"
                                            placeholder="Select Date Range"
                                            x-model="dateRange"
                                            @focus="activeFilter = 'dateRange'"
                                        />
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end space-x-2 mt-3">
                                        <!-- Remove All Filters Button -->
                                        <button
                                            @click="clearFilters()"
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg flex items-center shadow-md hover:shadow-lg transition-all text-xs">
                                            Remove All Filters
                                        </button>
                                        <!-- Apply Filters Button -->
                                        <button
                                            @click="applyFilters()"
                                            class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center shadow-md hover:shadow-lg transition-all text-xs">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!--comprehensive reports-->
                            <div class="flex-1 overflow-y-auto min-h-[25vh] max-h-auto pb-16 px-6">
                                <div class="space-y-4">
                                    <template x-for="i in 4" :key="i">
                                        <div class="bg-white shadow-md p-4 rounded-lg flex justify-between items-center border">
                                            <div>
                                                <h3 class="font-bold">Potholes</h3>
                                                <p class="text-gray-500">Anywhere Street</p>
                                                <p class="text-sm text-gray-400">Current Report Status: <span x-text="i * 10"></span> days ago</p>
                                            </div>
                                            <div class="text-center border-2 border-orange-400 text-orange-400 px-4 py-2 rounded-lg">
                                                <span class="text-xl font-bold">500</span>
                                                <p class="text-xs">reports</p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </x-slot:map_container>

        <x-slot:table_container>
            <x-admin.crud-page-content-base>

                <x-slot:page_description>
                    A table view for the geospatial mapping reports with all the reports occur in the iRoadCheck system.
                </x-slot:page_description>

                <x-slot:dropdown_filters_container>
                    <div x-data="{ activeFilter: 'all' }" class="flex space-x-2">
                        <!-- All Road Defect Reports Option -->
                        <div wire:click="resetFiltersAndSearch" class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                             :class="{
                             'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'all',
                             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'all'
                         }"
                             @click="activeFilter = 'all'">
                        <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                            All Staff
                        </span>
                        </div>

                        <!-- Date Range Filter -->
                        <div
                            x-data="{
                            value: [$wire.start_date, $wire.end_date],
                            init() {
                                let picker = flatpickr(this.$refs.picker, {
                                    mode: 'range',
                                    dateFormat: 'Y-m-d',
                                    defaultDate: this.value,
                                    minDate: $wire.start_date,
                                    maxDate: $wire.end_date,
                                    allowInput: false,
                                    onChange: (date, dateString) => {
                                        this.value = dateString.split(' to ');
                                    }
                                });
                                this.$watch('value', () => picker.setDate(this.value));
                            }
                        }"
                            class="relative flex rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md custom-date-input"
                            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'dateRange',
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'dateRange'
                            }"
                        >
                            <input
                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none"
                                x-ref="picker"
                                type="text"
                                placeholder="Select Date Range"
                                wire:model.live="date_range_filter"
                                @focus="activeFilter = 'dateRange'"
                            />
                        </div>

                        <!-- Status Filter -->
                        <!-- Type of Road Defect -->
                    </div>
                </x-slot:dropdown_filters_container>

                <x-slot:action_buttons_container>
                    <button type="button"
                            {{--                            wire:click="exportStaffLogs"--}}
                            class="mt-5 flex gap-x-[8px] w-auto text-xs px-[14px] py-[10px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                            <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/>
                        </svg>
                        <span class="ml-0 mt-0 text-[#FFFFFF] text-md">Export Reports</span>
                    </button>
                </x-slot:action_buttons_container>

                <x-slot:table_container>
                    <div class="inline-block w-[40vh] md:w-full lg:w-full h-auto md:h-[52vh] lg:h-[55vh] xl:h-[62vh] xl:max-h-[100vh] overflow-y-auto align-middle drop-shadow rounded-b-md">
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
                                    <button class="flex items-end" wire:click="toggleSorting('report_id')">
                                        Report ID
                                        <div x-cloak x-show="$wire.sort_by === 'report_id'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('location')">
                                        Location
                                        <div x-cloak x-show="$wire.sort_by === 'location'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('dateTime')">
                                        Date and Time
                                        <div x-cloak x-show="$wire.sort_by === 'dateTime'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('severity')">
                                        Severity
                                        <div x-cloak x-show="$wire.sort_by === 'severity'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('location')">
                                        Current Status
                                        <div x-cloak x-show="$wire.sort_by === 'location'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-4 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('updatedBy')">
                                        Updated Status By
                                        <div x-cloak x-show="$wire.sort_by === 'updatedBy'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-white relative">
                            @forelse ($roadDefectReports as $report)
                                <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                                    <td class="px-4 py-3 text-xs">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-xs">{{ $report->report_id }}</td>
                                    <td class="px-4 py-3 text-xs">{{ $report->location }}</td>
                                    <td class="px-4 py-3 text-xs">{{ \Carbon\Carbon::parse($report->date_reported)->timezone('Asia/Manila')->format('F j, Y') }}</td>
                                    <td class="px-4 py-3 text-xs">{{ $report->severity }}</td>
                                    @php
                                        $statusColors = [
                                            'Repaired' => '#28a745',
                                            'On Going' => '#ffc107',
                                            'Unfixed' => '#dc3545',
                                        ];
                                        $color = $statusColors[$report->status] ?? '#dc3545';
                                    @endphp
                                    <td class="px-4 py-3 text-xs font-semibold" style="color: {{ $color }};">
                                        {{ $report->status }}
                                    </td>

                                    <td class="px-4 py-3 text-xs">{{ $report->updated_by }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-2 text-center text-gray-500">No road defect reports found.</td>
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

                <x-slot:modal_container>
                </x-slot:modal_container>

                <x-slot:pagination_container>
                    {{ $roadDefectReports->links('vendor.pagination.custom') }}
                </x-slot:pagination_container>


            </x-admin.crud-page-content-base>
        </x-slot:table_container>

    </x-Staff.road-defect-reports-page-content-base>
</x-Staff.staff-navigation>
