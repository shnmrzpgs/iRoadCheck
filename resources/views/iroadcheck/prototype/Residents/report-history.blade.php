<x-app-layout>
    <div class="h-screen flex flex-col items-center bg-white">
        <!--  header -->
        <x-residents.resident-header />
        <!--  Navigation Tabs -->
        <x-residents.residents-navigation-tab />


        <div class="min-h-[100vh] max-h-[150vh] overflow-y-auto flex flex-col items-center w-full mt-0 mb-20">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-0 w-full mt-5">
                <!-- Search Section -->
                <div class="flex w-full justify-center items-center mb-6 lg:mb-0 lg:w-auto lg:justify-start">
                    <div class="flex mt-2 lg:mt-0 w-8/10 lg:w-80 items-center px-0 lg:px-5">
                        <form class="relative flex flex-1 h-10 rounded-full border-[#F8F7F7]" action="{{ $action ?? '#' }}" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#4AA76F" aria-hidden="false">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                            <input id="search-field"
                                class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow-[0px_5px_40px_rgba(0,0,0,0.2)] focus:bg-white bg-white rounded-full border-none block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 text-sm lg:text-[14px]"
                                placeholder="{{ $placeholder ?? 'Search' }}" type="search" name="{{ $name ?? 'search' }}" value="{{ request($name ?? 'search') }}">
                        </form>

                    </div>
                </div>

                <!-- Date Filter -->
                <div class="flex w-full lg:w-auto justify-center items-center mb-6 lg:mb-0 lg:mr-20">
                    <label class="text-center text-customGreen mt-2 mr-1 text-sm">Date From:</label>
                    <input type="date" id="start_date" class="border  text-[13px] w-[93px] border-gray-300 rounded px-2 py-1"
                        max="{{ now()->toDateString() }}">
                    <label class="text-center text-sm mt-2 ml-2 mr-1">To:</label>
                    <input type="date" id="end_date" class="border text-[13px] w-[93px] border-gray-300 rounded px-2 py-1 mr-1"
                        max="{{ now()->toDateString() }}">

                    <div class="relative group">
                        <button wire:click="resetFilters" class="flex items-center justify-center border border-gray-300 bg-gray-100 rounded w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 256 256" class="w-4 h-4" xml:space="preserve">
                                <g transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path d="M 81.521 31.109 c -0.86 -1.73 -2.959 -2.438 -4.692 -1.575 c -1.73 0.86 -2.436 2.961 -1.575 4.692 c 2.329 4.685 3.51 9.734 3.51 15.01 C 78.764 67.854 63.617 83 45 83 S 11.236 67.854 11.236 49.236 c 0 -16.222 11.501 -29.805 26.776 -33.033 l -3.129 4.739 c -1.065 1.613 -0.62 3.784 0.992 4.85 c 0.594 0.392 1.264 0.579 1.926 0.579 c 1.136 0 2.251 -0.553 2.924 -1.571 l 7.176 -10.87 c 0.001 -0.001 0.001 -0.002 0.002 -0.003 l 0.018 -0.027 c 0.063 -0.096 0.106 -0.199 0.159 -0.299 c 0.049 -0.093 0.108 -0.181 0.149 -0.279 c 0.087 -0.207 0.152 -0.419 0.197 -0.634 c 0.009 -0.041 0.008 -0.085 0.015 -0.126 c 0.031 -0.182 0.053 -0.364 0.055 -0.547 c 0 -0.014 0.004 -0.028 0.004 -0.042 c 0 -0.066 -0.016 -0.128 -0.019 -0.193 c -0.008 -0.145 -0.018 -0.288 -0.043 -0.431 c -0.018 -0.097 -0.045 -0.189 -0.071 -0.283 c -0.032 -0.118 -0.065 -0.236 -0.109 -0.35 c -0.037 -0.095 -0.081 -0.185 -0.125 -0.276 c -0.052 -0.107 -0.107 -0.211 -0.17 -0.313 c -0.054 -0.087 -0.114 -0.168 -0.175 -0.25 c -0.07 -0.093 -0.143 -0.183 -0.223 -0.27 c -0.074 -0.08 -0.153 -0.155 -0.234 -0.228 c -0.047 -0.042 -0.085 -0.092 -0.135 -0.132 L 36.679 0.775 c -1.503 -1.213 -3.708 -0.977 -4.921 0.53 c -1.213 1.505 -0.976 3.709 0.53 4.921 l 3.972 3.2 C 17.97 13.438 4.236 29.759 4.236 49.236 C 4.236 71.714 22.522 90 45 90 s 40.764 -18.286 40.764 -40.764 C 85.764 42.87 84.337 36.772 81.521 31.109 z"
                                        style="fill: rgb(0,0,0);"></path>
                                </g>
                            </svg>
                        </button>
                        <p class="absolute opacity-0 w-12/12 group-hover:opacity-50 transition-opacity duration-300 rounded-md bg-gray-700 text-[11px] text-white mt-1 p-1">
                            Reset
                        </p>
                    </div>
                </div>

            </div>

            <!-- Report History Section -->
            <div x-data="reportData()" class="w-full h-[200px] flex items-center justify-center mb-5 -ml-20 mx-[22px]">
                <!-- Conditional Rendering based on Report History -->
                <div x-data="{ showModal: false }" class="w-7/10 h-[200px] mb-10 bg-white border border-gray-300 rounded-md shadow mx-auto overflow-y-auto">
                    <template x-if="reports.length === 0">
                        <div class="flex flex-col items-center justify-center text-gray-400 h-40">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                            <p class="text-sm mt-2">No Report Road Issue yet</p>
                        </div>
                    </template>

                    <!-- If there are reports, display the table -->
                    <template x-if="reports.length > 0">
                        <div class="overflow-y-auto max-h-60">
                            <table class="overflow-y-scroll  min-w-full bg-white divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-2 text-center text-xs text-gray-600 border-b whitespace-nowrap">Report ID</th>
                                        <th class="py-2 px-3 text-center text-xs text-gray-600 border-b whitespace-nowrap">Type of Defect</th>
                                        <th class="py-2 px-2 text-center text-xs text-gray-600 border-b whitespace-nowrap">Status</th>
                                        <th class="py-2 px-2 text-center text-xs text-gray-600 border-b whitespace-nowrap">Date</th>
                                        <th class="py-2 px-2 text-center text-xs text-gray-600 border-b whitespace-nowrap">Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- Separate div for scrolling tbody -->

                            <table class="min-w-full bg-white divide-y divide-gray-300">
                                <tbody>
                                    <!-- Render actual rows from the report data -->
                                    <template x-for="(report, index) in reports" :key="report.id">
                                        <tr class="even:bg-gray-200 odd:bg-[#FBFBFA]">
                                            <td class="py-2 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.id"></td>
                                            <td class="py-2 px-10 text-center text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.defectType"></td>
                                            <td class="py-2 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.status"></td>
                                            <td class="py-2 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.date"></td>
                                            <td class="py-2 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap">
                                                <button @click="showModal = true" class="flex items-center gap-2 px-4 py-1 border border-[#F99E00] text-[#F99E00] rounded-md bg-orange-50 hover:bg-orange-100 focus:outline-none transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12m-6 0a6 6 0 1012 0 6 6 0 00-12 0z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    <span class="font-semibold">View</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>

                                    <!-- Add empty rows to fill space if less than desired row count -->
                                    <template x-for="n in emptyRows()" :key="`empty-${n}`">
                                        <tr class="even:bg-gray-200 odd:bg-[#FBFBFA]">
                                            <td class="py-3 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap">-</td>
                                            <td class="py-3 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap">-</td>
                                            <td class="py-3 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap">-</td>
                                            <td class="py-3 px-2 text-center text-xs text-gray-800 border-b whitespace-nowrap">-</td>
                                            <td class="py-3 px-2 text-center text-xs text-gray-800 border-b">-</td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>

                        </div>
                    </template>


                    <!-- Modal -->
                    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
                        <div class="mt-6 bg-white w-[80%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 p-4 relative">

                            <div class="flex p-2 justify-between items-center mb-4 border-b border-gray-400">
                                <h3 class="text-sm font-semibold text-black">View Report</h3>
                                <button @click="showModal = false" class="absolute top-6 right-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Captured Road Photo -->
                            <div class=" text-center text-xs">
                                <span class="font-semibold text-customGreen">Actual Captured Road Photo:</span>
                                <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="relative w-full " />
                            </div>

                            <!-- Type of Defect -->
                            <div class="mb-6 text-center text-xs">
                                <span class="font-semibold text-customGreen">Type of Defect:</span>
                                <span>Pothole</span>
                            </div>

                            <!-- Report ID -->
                            <div class="mb-2 text-xs ml-6">
                                <span class="font-semibold text-customGreen">Report ID:</span>
                                <span class="ml-2">00001</span>
                            </div>

                            <!-- Date and Time -->
                            <div class="mb-2 text-xs ml-6">
                                <span class="font-semibold text-customGreen">Date and Time Reported:</span>
                                <span class="ml-[22%] mr-2">10/12/2024</span>
                                <span class="">08:34:02 AM</span>
                            </div>

                            <!-- Date and Time -->
                            <div class="mb-2 text-xs ml-6">
                                <span class="font-semibold text-customGreen">Sheena's Date and Time Reported:</span>
                                <span class="ml-[22%] mr-2">10/12/2024</span>
                                <span class="">08:34:02 AM</span>
                            </div>

                            <!-- Location -->
                            <div class="mb-6 text-xs ml-6">
                                <span class="font-semibold text-customGreen">Location:</span>
                                <span class="ml-1">Apokon Street, Tagum City</span>
                            </div>

                            <div class="text-center ml-8 mt-4 w-[80%]">
                                <button @click="showModal = false" class="px-6 py-2 w-full bg-customGreen text-white font-semibold rounded-full hover:bg-[#e68a00] transition-colors">
                                    CLOSE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function reportData() {
            const totalRows = 12;
            return {
                reports: [{
                        id: '0001',
                        defectType: 'Pothole',
                        status: 'On-going',
                        date: '07/10/24'
                    },
                    {
                        id: '0002',
                        defectType: 'Crack',
                        status: 'On-going',
                        date: '07/10/24'
                    },
                    {
                        id: '0003',
                        defectType: 'Pothole',
                        status: 'Resolved',
                        date: '06/15/24'
                    },
                    {
                        id: '0004',
                        defectType: 'Debris',
                        status: 'On-going',
                        date: '07/05/24'
                    },
                ],
                emptyRows() {
                    // Calculate how many empty rows to add based on the total desired rows
                    return Math.max(totalRows - this.reports.length, 0);
                }
            }
        }
    </script>
</x-app-layout>