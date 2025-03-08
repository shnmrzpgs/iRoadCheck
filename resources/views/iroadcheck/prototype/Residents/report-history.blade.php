<x-app-layout>
    <x-residents.residents-navigation>

        <div class="flex flex-col items-center justify-center w-full mb-32" x-data="{ showFilters: false, showModal: false}">

            <div class="w-full md:w-[85%] flex flex-col justify-center px-4 pt-2 pb-12 bg-[#FBFBFB] rounded-[6px] h-auto shadow-[0px_1px_5px_rgba(0,0,0,0.2)]">

                <!-- Search Bar and Filter Button -->
                <div class="w-full sticky -top-3 pt-2 pb-5 bg-[#FBFBFB] z-10">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">


                        <div class="flex w-full items-center justify-center md:justify-between md:items-center lg:mb-0 z-40 sticky -top-3 pt-2 pb-5 overflow-hidden bg-[#FBFBFB]">
                            <div x-cloak class="mx-auto md:pl-0 sm:-pl-10 md:-pt-2 md:ml-20 md:flex md:items-start md:justify-start lg:ml-0 md:flex-row flex flex-col items-center">
                                <div class="flex justify-center text-lg text-[#4AA76F] mr-4 md:pb-2 ">Report History</div>

                                <!-- Search Section -->
                                <div class="flex lg:w-80 items-center px-0 lg:mt-0 mr-3">
                                    <form class="relative flex flex-1 h-9 rounded-full border-[#F8F7F7]" action="#" method="GET">
                                        <svg class="absolute left-1 inset-y-0 w-4 h-full text-gray-400 ml-2 z-10" fill="#4AA76F" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                        </svg>
                                        <input id="search-field" class="w-full h-full pl-8 py-0 text-sm lg:text-[14px] text-gray-900 placeholder:text-gray-400 bg-white rounded-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow"
                                            placeholder="Search" type="search">
                                    </form>
                                </div>

                            </div>

                            <!-- Filter Button -->
                            <button @click="showFilters = !showFilters"
                                class="flex items-center px-4 py-1.5 lg:py-2 text-sm text-white bg-[#4AA76F] bg-opacity-80 hover:bg-[#4AA76F] rounded transition mt-7 lg:mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-2 text-white">
                                    <path fill="currentColor" d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                                </svg>
                                Filters
                            </button>
                        </div>
                    </div>


                    <!-- Filters Modal Background Overlay -->
                    <div x-show="showFilters" x-cloak
                        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

                        <!-- Modal Content -->
                        <div class="bg-white p-4 shadow-md border rounded-md max-w-sm mx-auto mb-3 z-50">

                            <!-- Header -->
                            <div class="relative text-sm text-[#4AA76F] font-semibold pb-1 border-b border-[#4AA76F] mb-4">
                                <div class="text-sm text-[#4AA76F] font-semibold pb-1">Filters Report History</div>
                                <!-- Close Button -->
                                <button @click="showFilters = false" class="absolute -top-1.5 right-0 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Date Filter -->
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Date From:</label>
                                <input
                                    type="text"
                                    id="start_date"
                                    data-max-date="{{ now()->toDateString() }}"
                                    class="flatpickr w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] rounded p-2 text-sm text-gray-700"
                                    placeholder="Select Start Date">
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Date To:</label>
                                <input
                                    type="text"
                                    id="end_date"
                                    data-max-date="{{ now()->toDateString() }}"
                                    class="flatpickr w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] rounded p-2 text-sm text-gray-700"
                                    placeholder="Select End Date">
                            </div>


                            <!-- Sorting Options -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Sort By:</label>
                                <select class="w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] rounded p-2 text-sm text-gray-700">
                                    <option value="" disabled selected>Choose an option</option>
                                    <option value="date_asc">Date (Oldest First)</option>
                                    <option value="date_desc">Date (Newest First)</option>
                                    <option value="status">Status</option>
                                </select>
                            </div>

                            <!-- Additional Filters -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Defect Type:</label>
                                <select class="w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] rounded p-2 text-sm text-gray-700">
                                    <option value="" disabled selected>Choose an option</option>
                                    <option value="pothole">Pothole</option>
                                    <option value="crack">Crack</option>
                                    <option value="debris">Debris</option>
                                </select>
                            </div>

                            <!-- Apply Filters -->
                            <button @click="showFilters = false;
                                $dispatch('apply-filters',
                                    {
                                        startDate: document.getElementById('start_date').value,
                                        endDate: document.getElementById('end_date').value,
                                        // Add more filters here as needed
                                    }
                                )"
                                class="w-full px-4 py-2 text-sm text-white bg-[#4AA76F] mb-2 mt-1 rounded hover:bg-green-600 transition">
                                Apply Filters
                            </button>

                            <!-- Reset Filters -->
                            <button @click="showFilters = false; $dispatch('reset-filters')"
                                class="w-full px-4 py-2 text-sm text-white bg-gray-400 rounded hover:bg-gray-600 transition mb-2">
                                Reset Filters
                            </button>
                        </div>
                    </div>

                    <!-- Report History Section -->


                    <!-- Preview Reports History Information -->
                    <div class="z-30 mt-0 w-full max-h-[300px] py-4 flex flex-col"
                        x-data="reportData()" x-init="loadReports({{ $reports->toJson() }})">

                        <!-- Conditional Rendering based on Report History -->
                        <div x-data="{ showModal: false }" class="w-full">

                            <!-- Display Icons and Message if no reports yet -->
                            <template x-if="reports.length === 0">
                                <div class="flex flex-col items-center justify-center text-gray-400"
                                    x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                                            container: $refs.lottieAnimation, // the DOM element
                                            renderer: 'svg', // render as SVG
                                            loop: true, // loop the animation
                                            autoplay: true, // start playing the animation
                                            path: '{{ asset("animations/Animation - Clipboard.json") }}'
                                        })">

                                    <!-- Lottie Animation Container -->
                                    <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>

                                    <p class="text-gray-400 text-sm">No Report Road Issue yet</p>
                                </div>
                            </template>

                            <!-- If there are reports, display the table -->
                            <template x-if="reports.length > 0">
                                <div class="overflow-auto max-h-[60vh] h-auto border border-gray-300 px-2">
                                    <div class="overflow-auto max-h-[300px]">
                                        <!-- Table Header -->
                                        <table class="w-full bg-white divide-y divide-gray-300 px-2 h-auto ">
                                            <thead class="bg-gray-200 0 px-4">
                                                <tr>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Report ID</th>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Type of Defect</th>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Location</th>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Status</th>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Date</th>
                                                    <th class="bg-white sticky top-0 py-5 px-4 text-start text-xs font-semibold text-gray-600 border-b whitespace-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <!-- Table Content -->
                                            <tbody>
                                                <template x-for="(report, index) in reports" :key="report.id">
                                                    <tr class="even:bg-gray-200 odd:bg-[#FBFBFA]">
                                                        <td class="py-3 px-4 text-start text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.id"></td>
                                                        <td class="py-3 px-4 text-start text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.defect"></td>
                                                        <td class="py-3 px-4 text-start text-xs text-gray-800 border-b whitespace-nowrap" x-text="report.location"></td>
                                                        <td class="py-3 px-4 text-start text-xs text-gray-800 border-b whitespace-nowrap" :class="{
                                                                'text-green-600': report.status === 'Repaired',
                                                                'text-yellow-500': report.status === 'Ongoing',
                                                                'text-red-600': report.status === 'Unfixed'
                                                            }" x-text="report.status"></td>
                                                        <td class="py-3 px-4 text-start text-xs text-gray-800 border-b whitespace-nowrap" x-text="formatDate(report.date)"></td>
                                                        <td class="py-4 px-4 text-start text-xs text-gray-800 whitespace-nowrap">
                                                            <button @click="showModal = true" class="px-6 flex justify-center items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-50 hover:shadow py-1 rounded-md">
                                                                <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="w-5 h-5 mr-1" />
                                                                <div>View</div>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </template>
                            <!-- Pagination -->
                            {{-- Put Pagination Here: Design located in "vendor.pagination.custom"--}}
                            <div class="mt-2 mb-0 pb-3 flex flex-wrap items-center justify-between space-y-2 xl:space-y-0">
                                <!-- Total Users -->
                                <div id="pagination-info" class="w-full xl:w-auto text-center xl:text-left text-[11px] md:text-xs text-gray-500 font-semibold">
                                    Showing 1 to 10 of 100 results
                                </div>

                                <!-- Pagination Controls -->
                                <div class="w-full xl:w-auto">
                                    <nav aria-label="Page navigation" class="flex justify-center xl:justify-start items-center text-[10px] md:text-xs space-x-1">
                                        <!-- First Page -->
                                        <button id="first-page" class="hidden md:block px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-l-xl hover:bg-gray-100">First</button>

                                        <!-- Previous Page -->
                                        <button id="prev-page" class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100">&lt; Prev</button>

                                        <!-- Page Numbers -->
                                        <div id="page-numbers" class="flex space-x-1">
                                            <!-- Page numbers will be generated dynamically -->
                                        </div>

                                        <!-- Next Page -->
                                        <button id="next-page" class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100">Next &gt;</button>

                                        <!-- Last Page -->
                                        <button id="last-page" class="hidden md:block px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-r-xl hover:bg-gray-100">Last</button>
                                    </nav>
                                </div>

                                <!-- Rows Per Page -->
                                <div class="w-full xl:w-auto flex xl:justify-start justify-center items-center space-x-2">
                                    <label for="rowsPerPage" class="text-[11px] md:text-xs text-gray-500 font-semibold">Rows per page:</label>
                                    <select id="rowsPerPage" class="w-20 h-8 border border-gray-300 rounded bg-white text-xs text-gray-500">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>



                            <!-- View Report Modal -->
                            <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
                                <div class="bg-white w-[80%] h-[60vh] max-w-md shadow-sm rounded-lg border-2 border-gray-300 px-4 py-2 relative">

                                    <!-- Header -->
                                    <div class="flex py-2 px-1 justify-between items-center mb-4 border-b border-[#4AA76F]">
                                        <div class="text-sm text-[#4AA76F] font-semibold pb-1">View Report</div>
                                        <!-- Close Button -->
                                        <button @click="showModal = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Body -->
                                    <div class="h-[48vh] overflow-y-auto pl-2 space-y-4 mb-2">
                                        <!-- Captured Road Photo -->
                                        <div class="text-center text-xs -ml-3 flex flex-col justify-center items-center mb-3">
                                            <span class="font-semibold text-gray-700">Actual Captured Road Photo</span>
                                            <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="relative w-[60%] " />
                                        </div>

                                        <!-- Type of Defect -->
                                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Type of Defect:</div>
                                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold text-[#4AA76F]">Pothole</div>
                                        </div>

                                        <!-- Report ID -->
                                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Report ID:</div>
                                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold text-[#4AA76F]">00001</div>
                                        </div>

                                        <!-- Date and Time -->
                                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Date Reported:</div>
                                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold text-[#4AA76F]">10/12/2024</div>
                                        </div>

                                        <!-- Date and Time -->
                                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Time Reported:</div>
                                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold text-[#4AA76F]">08:34:02 AM</div>
                                        </div>

                                        <!-- Location -->
                                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Location:</div>
                                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold text-[#4AA76F]">Apokon Street, Tagum City</div>
                                        </div>

                                        <!--Longitude-->
                                        <!--Latitude-->
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
                        reports: [],
                        loadReports(data) {
                            console.log("Loaded Reports:", data); // Check if data is correctly passed
                            this.reports = data.map(report => ({
                                ...report,
                                formattedDate: this.formatDate(report.date)
                            }));
                        },
                        formatDate(dateString) {
                            if (!dateString) return '';
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            return new Date(dateString).toLocaleDateString('en-US', options);
                        },
                        emptyRows() {
                            return Math.max(totalRows - this.reports.length, 0);
                        }
                    }
                }
            </script>
    </x-residents.residents-navigation>
</x-app-layout>