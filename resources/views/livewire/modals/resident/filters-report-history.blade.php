    <!-- FILTER FOR WEB VIEW -->
    <div x-data="{ activeFilter: 'all' }" class="hidden lg:flex md:flex gap-1">
        <!-- All resident Option -->
        <div wire:click="resetFiltersAndSearch" class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'all',
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'all'
                            }"
            @click="activeFilter = 'all'">
            <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                All History
            </span>
        </div>

        <!-- Defect Filter -->
        <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'selectedDefect',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'selectedDefect'  /* Default and hover state */
                            }">
            <select wire:model.live="selectedDefect"
                @change="activeFilter = 'selectedDefect'"
                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                <option value="" class="text-gray-400 text-[12px]">Defect Types</option>
                @foreach($defectTypes as $defect)
                <option value="{{ $defect }}">{{ $defect }}</option>
                @endforeach
            </select>
        </div>

        <!-- barangay Filter -->
        <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'selectedBarangay',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'selectedBarangay'  /* Default and hover state */
                            }">
            <select wire:model.live="selectedBarangay"
                @change="activeFilter = 'selectedBarangay'"
                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                <option value="" class="text-gray-400 text-[12px]">Barangay</option>
                @foreach($barangays as $barangay)
                <option value="{{ $barangay }}">{{ $barangay }}</option>
                @endforeach
            </select>
        </div>

        <!-- status Filter -->
        <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': activeFilter === 'selectedStatus',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'selectedStatus'  /* Default and hover state */
                            }">
            <select wire:model.live="selectedStatus"
                @change="activeFilter = 'selectedStatus'"
                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                <option value="" class="text-gray-400 text-[12px]">Status</option>
                @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
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
                                            $wire.date_range_filter = dateString; // Ensure Livewire updates
                                        }
                                    });
                                    this.$watch('value', () => picker.setDate(this.value));
                                }
                            }"
            class="relative flex rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md custom-date-input"
            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'dateRange',
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'dateRange'
                            }">
            <input
                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none"
                x-ref="picker"
                type="text"
                placeholder="Select Date Range"
                wire:model.live="date_range_filter"
                @focus="activeFilter = 'dateRange'" />
        </div>

    </div>

    <div x-data="{ showFilters: false }" class="w-[328px]">
        <div class="flex justify-between gap-12 items-center w-full lg:hidden md:hidden mb-4">
            <div class="flex justify-start items-center">
                <button @click="showFilters = !showFilters"
                    class="flex items-center px-4 py-1.5 lg:py-2 text-sm text-white bg-[#4AA76F] bg-opacity-80 hover:bg-[#4AA76F] rounded transition lg:hidden md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2 text-white">
                        <path fill="currentColor"
                            d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                    </svg>
                    Filters
                </button>
            </div>

        </div>

        <div x-show="showFilters" x-cloak x-data="{ activeFilter: 'all' }" class="flex flex-col gap-2">
            <!-- 1st line -->
            <div class="flex w-full gap-2">
                <div wire:click="resetFiltersAndSearch" class="relative flex-1 rounded-[4px] border hover:shadow-md"
                    :class="{
                    'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'all',
                    'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'all'
                }" @click="activeFilter = 'all'">
                    <span class="text-[12px] block text-center px-2 py-2 rounded">All History</span>
                </div>

                <div class="relative flex-1 rounded-[4px] border hover:shadow-md">
                    <select wire:model.live="selectedDefect" @change="activeFilter = 'selectedDefect'"
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                        <option value="">Defect Types</option>
                        @foreach($defectTypes as $defect)
                        <option value="{{ $defect }}">{{ $defect }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- 2nd line -->
            <div class="flex w-full gap-2">
                <div class="relative flex-1 rounded-[4px] border hover:shadow-md">
                    <select wire:model.live="selectedBarangay" @change="activeFilter = 'selectedBarangay'"
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                        <option value="">Barangay</option>
                        @foreach($barangays as $barangay)
                        <option value="{{ $barangay }}">{{ $barangay }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative flex-1 rounded-[4px] border hover:shadow-md">
                    <select wire:model.live="selectedStatus" @change="activeFilter = 'selectedStatus'"
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                        <option value="">Status</option>
                        @foreach($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- 3rd line -->
            <div class="flex w-full">
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
                                            $wire.date_range_filter = dateString; // Ensure Livewire updates
                                        }
                                    });
                                    this.$watch('value', () => picker.setDate(this.value));
                                }
                                }"
                    class="relative flex-1 rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md custom-date-input"
                    :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-green-600': activeFilter === 'dateRange',
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': activeFilter !== 'dateRange'
                                }">
                    <input
                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none"
                        x-ref="picker"
                        type="text"
                        placeholder="Select Date Range"
                        wire:model.live="date_range_filter"
                        @focus="activeFilter = 'dateRange'" />
                </div>
            </div>
        </div>
    </div>