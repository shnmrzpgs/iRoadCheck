<x-Staff.staff-navigation page_title="Dashboard" action="{{ route('staff.dashboard') }}" placeholder="Search..." name="search">

    <!-- Main Content -->
    <main class="flex-1 -mt-2 overflow-y-scroll h-[83vh] md:h-[85vh] xl:h-full xl:overflow-hidden pb-5">
        <div class="bg-[#FBFBFB] px-4 pb-2 rounded-lg drop-shadow mb-2">
            <div class="flex flex-col lg:gap-2 gap-1 mr-auto mb-2 pt-2">
                <!-- Page Description -->
                <div class="flex px-0 border-b border-b-gray-300 py-2">
                    <div class="mt-2 mr-auto">
                        <div class="flex flex-col">
                            <!-- Card Title -->
                            <div class="text-[#4D4F50] font-semibold text-lg sm:text-xl">
                                Number of Road Defects Reports
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between gap-2">
                    <div class="flex flex-wrap gap-2 mb-4 mt-4">
                        <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md flex justify-center items-center"
                            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] ': filters.sort === '' && filters.status === ''  && filters.userType === '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort !== '' || filters.status !== '' || filters.userType !== ''  /* Default and hover state */
                             }"
                            @click="filters.sort = ''; filters.status = ''; filters.userType = '';">
                            <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                                All Reports
                            </span>
                        </div>

                        <!-- Staff Type Filter -->
                        <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                            :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.userType !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.userType === ''  /* Default and hover state */
                             }">
                            <select x-model="filters.userType" @change="console.log('Filters:', filters)"
                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                                <option value="" class="text-gray-400 text-[12px]">Barangay</option>
                                <option value="patcher" class="text-gray-700">Patcher</option>
                                <option value="user-type-2" class="text-gray-700">User Type 2</option>
                                <option value="user-type-3" class="text-gray-700">User Type 3</option>
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
                                        this.value = dateString.split(' to '); // Splitting the range into two dates
                                    }
                                });
                                this.$watch('value', () => picker.setDate(this.value)); // Updating the picker on value change
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
                                @focus="activeFilter = 'dateRange'" />
                        </div>
                    </div>
                    <div class=" flex justify-center items-center">
                        <div class="font-semibold text-[#FFAD00] pl-2 pr-3 text-lg opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-4 transition-all duration-500 ease-in-out">
                            Total Reports : {{ $totalReport }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col xl:flex-row">
                <!-- Left Section -->
                <div class="flex flex-col text-[#202020] bg-[#FBFBFB] px-4 pb-2 pt-2 rounded-lg drop-shadow mb-4 xl:w-8/10">
                    <!-- Page Description -->
                    {{-- <div class="flex justify-between px-4 py-2"> --}}

                    {{-- <div class="relative flex justify-end rounded-[4px] border hover:shadow-md custom-select" 
                     :class="{ --}}
                    {{-- 'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.selectedYear !== '',  /* Active state */ --}}
                    {{-- 'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.selectedYear === ''  /* Default and hover state */ --}}
                    {{-- }"> --}}
                    {{-- <select wire:model="selectedYear" class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105"> --}}
                    {{-- <option value="" class="text-gray-400 text-[12px]">Select Year</option> --}}
                    {{-- @for ($i = now()->year; $i >= now()->year - 5; $i--) --}}
                    {{-- <option value="{{ $i }}" class="text-gray-700">{{ $i }}</option> --}}
                    {{-- @endfor --}}
                    {{-- </select> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}

                    <div class="xl:flex-row px-3 gap-2">
                        <div class="w-full max-h-[450px] pt-2 overflow-hidden">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex px-4">
                    <!-- Stats Cards -->
                    <div class="flex flex-col gap-3 mb-5">

                        <!-- Today's Reports Card -->
                        <a href="{{ route('admin.manage-users-table') }}"
                            class="relative bg-white rounded-lg shadow-md py-0 px-2 overflow-hidden min-w-auto w-[300px] max-w-[340px] h-[115px]
                            hover:drop-shadow-lg transition-all duration-500 ease-out drop-shadow
                            transform-gpu group">

                            <!-- Background graphic -->
                            <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                                <img src="{{ asset('storage/images/bg-cardGraphics-blue.png') }}"
                                    class="w-full h-auto rounded-b-lg object-cover"
                                    alt="Card background graphic">
                            </div>

                            <div class="flex flex-col text-[#7E91FF] mt-6 pl-2 pr-3 pt-4 relative z-10">
                                <!-- Card Title -->
                                <div class="font-semibold text-md opacity-90 transform group-hover:scale-110 group-hover:translate-y-1 group-hover:translate-x-3 transition-all duration-500 ease-in-out">
                                    Unfixed Reports
                                </div>
                                <!-- Card Counts with gentle scale on hover -->
                                <div class="px-5 py-1 mb-3 ml-auto text-lg text-[#7E91FF] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                                    {{ $unfixedReportCount }}
                                </div>
                            </div>
                        </a>

                        <!-- Active Accounts Card -->
                        <a href="{{ route('admin.manage-users-table') }}"
                            class="relative bg-white rounded-lg shadow-md p-0 overflow-hidden w-auto h-[115px]
                        hover:drop-shadow-lg transition-all duration-500 ease-out drop-shadow
                        transform-gpu group ">

                            <!-- Background graphic -->
                            <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                                <img src="{{ asset('storage/images/bg-cardGraphics-green.png') }}"
                                    class="w-full h-auto rounded-b-lg object-cover"
                                    alt="Card background graphic">
                            </div>

                            <div class="flex flex-col text-[#4AA76F] mt-6 px-5 pt-4 relative z-10">
                                <!-- Card Title -->
                                <div class="font-semibold text-md opacity-90 transform group-hover:scale-105 group-hover:translate-y-1 group-hover:translate-x-1 transition-all duration-500 ease-in-out">
                                    Ongoing Reports
                                </div>

                                <!-- Card Counts -->
                                <div class="px-5 py-1 mb-3 ml-auto text-lg text-[#4AA76F] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                                    {{ $ongoingReportCount }}
                                </div>
                            </div>

                        </a>

                        <!-- Inactive Accounts Card -->
                        <a href="{{ route('admin.manage-users-table') }}"
                            class="relative bg-white rounded-lg shadow-md p-0 overflow-hidden w-auto h-[115px]
                        hover:drop-shadow-lg transition-all duration-500 ease-out drop-shadow
                        transform-gpu group ">

                            <!-- Background graphic -->
                            <div class="absolute inset-x-0 bottom-0 opacity-90 transform group-hover:scale-125 transition-transform group-hover:translate-x-1 duration-700 ease-in-out">
                                <img src="{{ asset('storage/images/bg-cardGraphics-red.png') }}"
                                    class="w-full h-auto rounded-b-lg object-cover"
                                    alt="Card background graphic">
                            </div>

                            <div class="flex flex-col text-[#E26161] mt-6 px-5 pt-4 relative z-10">
                                <!-- Card Title -->
                                <div class="font-semibold text-md opacity-90 transform group-hover:scale-105 group-hover:translate-y-1 group-hover:translate-x-1 transition-all duration-500 ease-in-out">
                                    Fixed Reports
                                </div>

                                <!-- Card Counts -->
                                <div class="px-5 py-1  mb-3 ml-auto text-lg text-[#E26161] rounded-full bg-[#FBFBFB] font-bold transform group-hover:scale-105 group-hover:translate-x-1 duration-500 ease-in-out">
                                    {{ $fixedReportCount }}
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: true, // Keep the toolbar visible
                        tools: {
                            zoom: false,
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: false,
                            download: true,
                        }
                    }
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12
                    }
                },
                series: @json($chartData['series']),
                xaxis: {
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    labels: {
                        offsetX: 4
                    }
                },
                yaxis: {

                },
                colors: ['#FFAD00', '#7E91FF', '#4AA76F'], // Line colors
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.8,
                        opacityTo: 0,
                        stops: [0, 100]
                    }
                },
                markers: {

                    colors: ['#FFAD00', '#7E91FF', '#4AA76F'],
                    strokeColor: '#fff',
                    strokeWidth: 2,
                    shape: 'circle',
                    hover: {
                        size: 10,
                        sizeOffset: 3
                    }
                },
                dataLabels: {
                    enabled: false
                },

            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>


</x-Staff.staff-navigation>