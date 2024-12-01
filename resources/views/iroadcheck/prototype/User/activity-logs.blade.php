<x-app-layout>
    <x-User.user-navigation  page_title="Activity Logs">>
        <div class="text-[#202020] bg-[#FBFBFB] -mt-6 pt-4 px-4 pb-4 rounded-lg drop-shadow"
             x-data="{
                currentPage: 1,
                totalPages: 20,
                maxVisiblePages: 5,
                get pages() {
                    const start = Math.max(this.currentPage - Math.floor(this.maxVisiblePages / 2), 1);
                    const end = Math.min(start + this.maxVisiblePages - 1, this.totalPages);
                    return Array.from({ length: end - start + 1 }, (_, i) => start + i);
                },
                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                    }
                },
                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) this.currentPage++;
                },
            }
            ">

            <!--Page description and Add button-->
            <!--Page description and Add button-->
            <div class="px-6" >
                <div class="mr-auto">

                    <div class="flex flex-col">
                        <!--Page description-->
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-sm text-[#656565]">
                                A list of all users in iRoadCheck System.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-start">

                    <!-- Dropdown Filters -->
                    <div class="flex gap-2 mr-auto mb-0 mt-4"
                         x-data="{
                             filters: {
                                 selectedDateRange: '' // Date range filter
                             },
                             initFlatpickr() {
                                 flatpickr(this.$refs.dateInput, {
                                     mode: 'range', // Enable range mode
                                     dateFormat: 'Y-m-d',
                                     onChange: (selectedDates, dateStr) => {
                                         this.filters.selectedDateRange = dateStr;
                                         console.log('Selected Date Range:', this.filters.selectedDateRange);
                                     },
                                     locale: {
                                         rangeSeparator: ' to ' // Separator text
                                     }
                                 });
                             }
                         }"
                         x-init="initFlatpickr()">

                        <!-- All Filters Reset Option -->
                        <div class="relative rounded-[4px] border transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-md"
                             :class="{
                                    'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F]': filters.selectedDateRange === '',  /* Active state */
                                    'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.selectedDateRange !== ''  /* Default and hover state */
                                 }"
                             @click="filters.selectedDateRange = ''; console.log('Filters Reset')">
                            <span class="text-[12px] block appearance-none w-full text-center px-2 py-2 rounded">
                                All Logs
                            </span>
                        </div>

                        <!-- Date Range Picker -->
                        <div class="relative flex rounded-[4px] border hover:shadow-md custom-select"
                             :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.selectedDateRange !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.selectedDateRange === ''  /* Default and hover state */
                             }">
                            <input type="text" x-ref="dateInput"
                                   class="text-[12px] block appearance-none min-w-[200px] max-w-[100px] bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105"
                                   placeholder="Select Date Range">
                        </div>
                    </div>

                    <!--Export Button-->
                    <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                        <div class="flex w-full items-center px-4 py-2 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                            <div class="w-full">
                                <div @click="exportModal = true">

                                    <button type="submit" name="addUser" id="addUser" value="addUser"
                                            class="flex gap-x-[8px] w-auto text-xs px-[14px] py-[8px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                                            <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/>
                                        </svg>
                                        <span class="ml-0 mt-[2px] text-[#FFFFFF] text-md">Export Reports</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Table Content-->
            <div x-data="{
                    activities: [
                        { transactionId: 'TRX001', activity: 'Logged into account successfully', dateTime: '2024-10-23 08:15 AM' },
                        { transactionId: 'TRX002', activity: 'Supervisor assigned patching task to team', dateTime: '2024-10-23 09:30 AM' },
                        { transactionId: 'TRX003', activity: 'Inspector reviewed road damage report', dateTime: '2024-10-23 10:45 AM' },
                        { transactionId: 'TRX004', activity: 'Patcher completed pothole repair on Highway 21', dateTime: '2024-10-23 11:50 AM' },
                        { transactionId: 'TRX005', activity: 'Engineer approved road resurfacing plan', dateTime: '2024-10-23 12:30 PM' },
                        { transactionId: 'TRX006', activity: 'Safety Officer conducted safety briefing for workers', dateTime: '2024-10-23 01:15 PM' },
                        { transactionId: 'TRX007', activity: 'Equipment Operator began asphalt rolling on Main Street', dateTime: '2024-10-23 02:20 PM' },
                        { transactionId: 'TRX008', activity: 'Traffic Controller set up traffic cones and signs', dateTime: '2024-10-23 03:10 PM' }
                    ]
                }">
                <!-- Table Content -->
                <div class="mt-2 px-5 mb-2 ">
                    <div class="overflow-x-auto m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                        <div class="min-w-full inline-block max-h-[56vh] min-h-[56vh] overflow-y-auto align-middle p-0 z-0">
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
                                <template x-for="(activity, index) in activities" :key="index">
                                    <tr :class="index % 2 == 0 ? 'bg-white' : 'bg-slate-50'" class="hover:bg-slate-200 text-left">
                                        <!-- No. Column -->
                                        <td class="whitespace-nowrap py-3.5 text-[12px] pl-4">
                                            <div class="ml-2">
                                                <div class="mt-[1px] text-[12px]" x-text="index + 1"></div>
                                            </div>
                                        </td>

                                        <!-- Transaction ID Column -->
                                        <td class="whitespace-nowrap pl-4 py-3 text-[12px]">
                                            <div class="font-normal text-left min-w-[150px]" x-text="activity.transactionId"></div>
                                        </td>

                                        <!-- Type of Activity Column -->
                                        <td class="whitespace-nowrap pl-4 py-3 text-[12px]">
                                            <div class="font-normal text-left min-w-[250px]" x-text="activity.activity"></div>
                                        </td>

                                        <!-- Date and Time Column -->
                                        <td class="whitespace-nowrap pl-4 py-3 text-[12px]">
                                            <div class="font-normal text-left min-w-[150px]" x-text="activity.dateTime"></div>
                                        </td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Layout -->
            <div class="flex items-center justify-between mt-4 px-6">
                <!-- Total Logs -->
                <div class="text-xs text-gray-500 font-semibold">
                    Total Logs: <span x-text="totalLogs"></span>
                </div>


                <!-- Pagination Controls -->
                <div>
                    <nav aria-label="Page navigation" class="flex items-center text-xs space-x-1">
                        <!-- First Page -->
                        <button
                            @click="goToPage(1)"
                            :disabled="currentPage === 1"
                            class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                            First
                        </button>
                        <!-- Previous Page -->
                        <button
                            @click="prevPage()"
                            :disabled="currentPage === 1"
                            class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                            &lt; Prev
                        </button>
                        <!-- Page Numbers -->
                        <template x-for="page in pages" :key="page">
                            <button
                                @click="goToPage(page)"
                                :class="{'bg-green-100 text-green-600': page === currentPage, 'text-gray-500 hover:bg-gray-100': page !== currentPage}"
                                class="px-3 h-8 border border-gray-300">
                                <span x-text="page"></span>
                            </button>
                        </template>
                        <!-- Next Page -->
                        <button
                            @click="nextPage()"
                            :disabled="currentPage === totalPages"
                            class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                            Next &gt;
                        </button>
                        <!-- Last Page -->
                        <button
                            @click="goToPage(totalPages)"
                            :disabled="currentPage === totalPages"
                            class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 disabled:text-gray-300 disabled:hover:bg-white">
                            Last
                        </button>
                    </nav>
                </div>

                <!-- Page Information -->
                <div class="text-xs text-gray-500 font-semibold">
                    Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                </div>
            </div>


        </div>
    </x-User.user-navigation>
</x-app-layout>
