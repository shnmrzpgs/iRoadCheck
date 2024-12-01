<x-app-layout>
    <x-User.user-navigation page_title="Reports">
        <div class="w-full font-pop">
            <div class="text-[#202020] bg-[#FBFBFB] pt-4 pb-4 rounded-lg drop-shadow"
                 x-data="{
                    tileCount: 4,
                    view: 'grid',
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
                 }">

                <!-- View Toggle Buttons -->
                <div class="absolute mb-8 flex items-end justify-end top-8 right-8 z-10">
                    <button @click="view = 'grid'"
                            x-data="{
                                tooltipVisible: false,
                                tooltipText: 'Map View',
                                tooltipArrow: true,
                                tooltipPosition: 'top'
                            }"
                            x-on:mouseenter="tooltipVisible = true"
                            x-on:mouseleave="tooltipVisible = false"
                            :class="{ 'bg-[#4AA76F] text-white': view === 'grid', 'hover:bg-[#4AA76F] hover:text-white text-[#4AA76F]': view !== 'grid' }"
                            class="px-2 py-2 mr-2 text-white rounded flex items-center relative">
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible"
                             :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top' }"
                             class="absolute w-auto text-sm"
                             x-cloak>
                            <div x-show="tooltipVisible" x-transition
                                 class="px-2 py-1 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg transform transition-transform duration-150 ease-in-out">
                                <p x-text="tooltipText"
                                   class="flex-shrink-0 block text-xs whitespace-nowrap text-[#4AA76F]"></p>
                                <div x-show="tooltipArrow"
                                     class="absolute inline-flex items-center justify-center overflow-hidden"
                                     :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top' }">
                                    <div class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F] -rotate-45 origin-top-left"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20" class="fill-current">
                            <path d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3L576 152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6L416 503zM15.1 187.3C6 191 0 199.8 0 209.6L0 480.4c0 17 17.1 28.6 32.9 22.3L160 451.8l0-251.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77l0 194.4 192 54.9L384 255z"/>
                        </svg>
                    </button>

                    <button @click="view = 'table'"
                            x-data="{
                                tooltipVisible: false,
                                tooltipText: 'Table View',
                                tooltipArrow: true,
                                tooltipPosition: 'top'
                            }"
                            x-on:mouseenter="tooltipVisible = true"
                            x-on:mouseleave="tooltipVisible = false"
                            :class="{ 'bg-[#4AA76F] text-white': view === 'table', 'hover:bg-[#4AA76F] hover:text-white text-[#4AA76F]': view !== 'table' }"
                            class="px-2 py-2 text-white rounded flex items-center relative">
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible"
                             :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top' }"
                             class="absolute w-auto text-sm"
                             x-cloak>
                            <div x-show="tooltipVisible" x-transition
                                 class="px-2 py-1 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg transform transition-transform duration-150 ease-in-out">
                                <p x-text="tooltipText"
                                   class="flex-shrink-0 block text-xs whitespace-nowrap text-[#4AA76F]"></p>
                                <div x-show="tooltipArrow"
                                     class="absolute inline-flex items-center justify-center overflow-hidden"
                                     :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top' }">
                                    <div class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F] -rotate-45 origin-top-left"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" class="fill-current">
                            <path d="M16 96a48 48 0 1 1 96 0A48 48 0 1 1 16 96zM64 208a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm0 160a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM191.5 54.4c5.5-4.2 12.3-6.4 19.2-6.4L424 48c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24l-213.3 0c-6.9 0-13.7-2.2-19.2-6.4l-38.4-28.8c-8.5-6.4-8.5-19.2 0-25.6l38.4-28.8zM153.1 243.2l38.4-28.8c5.5-4.2 12.3-6.4 19.2-6.4L488 208c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24l-277.3 0c-6.9 0-13.7-2.2-19.2-6.4l-38.4-28.8c-8.5-6.4-8.5-19.2 0-25.6zm0 160l38.4-28.8c5.5-4.2 12.3-6.4 19.2-6.4L424 368c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24l-213.3 0c-6.9 0-13.7-2.2-19.2-6.4l-38.4-28.8c-8.5-6.4-8.5-19.2 0-25.6z"/>
                        </svg>
                    </button>
                </div>

{{--                "absolute mb-8 flex items-end justify-end top-8 right-10 z-10"--}}
                <!--Grid and Table Content-->
                <div x-show="view === 'grid'" class="w-full flex justify-center items-center">

                    <!-- Grid View -->
                    <div x-show="view === 'grid'" class="scroll-hidden w-full relative px-4">

                        <!--Page description and Buttons-->
                        <div class="flex px-4" >
                            <div class="mt-4 mr-auto">
                                <div class="flex flex-col">
                                    <!--Page Title-->
                                    <div class="text-[#4D4F50] font-semibold">Manage Reports</div>
                                    <!--Page description-->
                                    <div class="sm:flex-auto">
                                        <p class="mt-2 text-[12px] text-primary-800">
{{--                                                A view for the geospatial mapping reports with all the reports occur in the iRoadCheck system. <br/>--}}
                                            This page allows staff to manage the status of specific Road Defect Reports, including updating, reviewing, and tracking their progress.
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- Map Reports Information -->
                        <div class="mt-4 px-2 mb-2 z-0">
                            <div class="m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                                <div class="min-w-full inline-block min-h-[45vh] max-h-[68vh] align-middle p-0 z-0">
                                    <div class="flex"
                                         x-data="mapComponent()">

                                        <!-- Map Container -->
                                        <div id="map" class="w-7/10 h-[68vh] bg-white drop-shadow"></div>

                                        <!-- Map Information Sidebar -->
                                        <div class="w-3/10 bg-white p-4 h-[68vh]">
                                            <!--Search-->
                                            <div class="flex w-full items-center px-5 mr-auto">
                                                <form class="relative flex flex-1 h-10 rounded-[6px] border border-gray-200" action="#" method="GET" onsubmit="event.preventDefault();">
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
                                            </div>

                                            <!-- Report Information -->
                                            <h2 class="font-semibold text-md mt-5 text-[#4D4F50] fixed px-4">Road Defect Report Information</h2>

                                            <div class="mt-16 h-[50vh] overflow-y-auto pb-16 px-6">

                                                <!-- Show this content when no report is selected -->
                                                <template x-if="!selectedReport.id || Object.keys(selectedReport).length === 0">
                                                    <div class="mb-4 w-full text-[12px] text-gray-500 text-center"
                                                         x-init="lottie.loadAnimation({
                                              container: $refs.lottieAnimation,
                                              renderer: 'svg',
                                              loop: true,
                                              autoplay: true,
                                              path: '{{ asset("animations/Animation - 1731695507574.json") }}'
                                            })">
                                                        <div  class="flex flex-col items-center justify-center h-full">
                                                            <!-- Lottie Animation Container -->
                                                            <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>
                                                            <p class="text-sm font-medium">Click a marker on the map to view details of the road defect report.</p>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Show this content when a report is selected -->
                                                <template x-if="selectedReport.id" x-show="Object.keys(selectedReport).length > 0">
                                                    <div class="mb-4 w-full text-[12px] animate-wipe-right transition-transform duration-200" >
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Report ID:</div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.id"></div>
                                                        </div>
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Type of Defect:</div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.defect"></div>
                                                        </div>
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Location:</div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.location"></div>
                                                        </div>
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Reported Date:</div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.date"></div>
                                                        </div>
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Severity:</div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.severity"></div>
                                                        </div>
                                                        <div class="flex mb-2 space-x-2 leading-6">
                                                            <div class="text-[#1AA76F] font-semibold w-4/10">Current Status: </div>
                                                            <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.status"></div>
                                                        </div>

                                                        <!-- Road Image Report -->
                                                        <div class="mb-8">
                                                            <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">Road Image:</div>
                                                            <div class="w-full rounded-[10px] p-4 drop-shadow bg-white">
                                                                <img :src="selectedReport.image" alt="Defect Image" class="w-full h-auto rounded-[10px] object-cover">
                                                            </div>
                                                        </div>

                                                        <!-- Status Filter -->
                                                        <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">
                                                            Update Road Status Report:
                                                        </div>
                                                        <div class="relative flex items-center rounded-[4px] border transition-all duration-100 custom-select"
                                                             :class="{
                                                'bg-green-50 text-[#4D4F50] border-[#4AA76F] active': newStatus !== '',  /* Active state */
                                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': newStatus === ''  /* Default and hover state */
                                            }">

                                                            <!-- Status Color Indicator -->
                                                            <span :style="{ backgroundColor: getStatusColor(newStatus || selectedReport.status) }" class="w-3 h-3 rounded-full ml-2"></span>

                                                            <!-- Dropdown -->
                                                            <select x-model="newStatus"
                                                                    class="text-[14px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                                                                <!-- Display the current status or placeholder -->
                                                                <option value="" class="text-gray-400 text-[12px]" x-text="newStatus || selectedReport.status || 'Select Status'"></option>

                                                                <!-- Dynamically loop through the statuses array -->
                                                                <template x-for="status in statuses" :key="status">
                                                                    <option :value="status" :selected="selectedReport.status === status" class="text-gray-700">
                                                                        <span x-text="status"></span>
                                                                    </option>
                                                                </template>
                                                            </select>

                                                        </div>

                                                        <!--Update Report Status-->
                                                        <div class="flex justify-center items-center mt-10">
                                                            <button @click="updateReportStatus"
                                                                    class="relative w-auto gap-x-[8px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#3AA76F] hover:shadow-md">
                                                                <span class="mt-[2px] px-2 text-[14px] ">Update Report</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Table View-->
                <div x-show="view === 'table'" class="min-h-[590px] max-h-[600px] px-5">

                    <!--Page description and Add button-->
                    <div class="flex px-2" >
                        <div class=" mb-2 mt-6  mr-auto">
                            <div class="flex flex-col">
                                <!--Page description-->
                                <div class="sm:flex-auto">
                                    <p class="mt-2 text-[12px] text-primary-800">
                                        A table view for the geospatial mapping reports with all the reports occur in the iRoadCheck system.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-start">

                        <!--Dropdown Filters-->
                        <div class="flex gap-2 mr-auto mb-0 mt-4"
                             x-data="{
                             filters: {
                                 status: '',
                                 sort: '',
                                 userType: '',
                             }
                         }">
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

                            <!-- Sort Filter -->
                            <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select"
                                 :class="{
                                'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.sort !== '',  /* Active state */
                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.sort === ''  /* Default and hover state */
                             }">
                                <select x-model="filters.sort" @change="console.log('Filters:', filters)"
                                        class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-6 rounded shadow-none focus:outline-none focus:scale-105">
                                    <option value="" class="text-gray-400 text-[12px]">Sort by</option>
                                    <option value="asc" class="text-gray-700">
                                        Ascending
                                    </option>
                                    <option value="desc" class="text-gray-700">
                                        Descending
                                    </option>
                                </select>
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
                                    <option value="enabled" class="text-gray-700">Enabled</option>
                                    <option value="disabled" class="text-gray-700">Disabled</option>
                                </select>
                            </div>
                        </div>

                        <!--Export Button-->
                        <div class="sm:flex-none">
                            <div class="flex w-full items-center py-2 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                                <div class="w-full">
                                    <div @click="exportModal = true">

                                        <button type="submit" name="addUser" id="addUser" value="addUser"
                                                class="flex gap-x-[8px] w-auto text-xs px-[12px] py-[8px] font-normal tracking-wider text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
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

                    <div class="mt-2 mb-6">
                        <div class="overflow-x-auto m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                            <div class="min-w-full inline-block max-h-[55vh] min-h-[55vh] overflow-y-auto align-middle p-0 z-0">
                                <!-- Table -->
                                <table x-data="mapComponent()" class="min-w-full min-h-full divide-y divide-gray-300 gap-y-5">
                                    <thead>
                                    <tr>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-xs font-semibold text-[#757575] rounded-tl-lg">No.</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-xs font-semibold text-[#757575]">Report ID</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-xs font-semibold text-[#757575]">Location</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-3 text-left text-xs font-semibold text-[#757575]">Date Reported</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-10 text-left text-xs font-semibold text-[#757575]">Severity</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-10 text-left text-xs font-semibold text-[#757575]">Current Status</th>
                                        <th class="sticky top-0 z-10 bg-white py-3.5 px-2 text-left text-xs font-semibold text-[#757575] rounded-tr-lg">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300 bg-white">
                                    <template x-for="(report, index) in reports" :key="report.id">
                                        <tr :class="index % 2 == 0 ? 'bg-white' : 'bg-slate-50'" class="hover:bg-slate-200 text-left">
                                            <!-- No. Column -->
                                            <td class="whitespace-nowrap py-3 text-xs pl-5">
                                                <div x-text="index + 1"></div>
                                            </td>

                                            <!-- Defect Column -->
                                            <td class="whitespace-nowrap py-3 pl-4 text-xs">
                                                <div x-text="report.defect"></div>
                                            </td>

                                            <!-- Location Column -->
                                            <td class="whitespace-nowrap py-3 pl-4 text-xs">
                                                <div x-text="report.location"></div>
                                            </td>

                                            <!-- Date Column -->
                                            <td class="whitespace-nowrap py-3 pl-4 text-xs">
                                                <div x-text="report.date"></div>
                                            </td>

                                            <!-- Severity Column -->
                                            <td class="whitespace-nowrap py-3 pl-4 text-xs">
                                                <div x-text="report.severity"></div>
                                            </td>

                                            <!-- Status Column -->
                                            <td class="whitespace-nowrap py-3 pl-4 text-xs font-medium">
                                                <div :class="{
                                                    'text-green-600 font-bold': report.status === 'Repaired',
                                                    'text-yellow-600 font-bold': report.status === 'Ongoing',
                                                    'text-red-600 font-bold': report.status === 'Unfixed',
                                                    'text-gray-600 font-bold': report.status === 'Not Found'
                                                }" x-text="report.status">
                                                </div>
                                            </td>

                                            <!-- Actions Column -->
                                            <td class="flex whitespace-nowrap py-6 text-left">
                                                <!-- Edit Button -->
                                                <button @click="editReport(report.id)"
                                                        class="flex items-center text-orange-500 hover:underline hover:text-orange-600 font-medium transition active:scale-95 mr-5 pl-2">
                                                    <img src="{{ asset('storage/icons/edit-icon.png') }}" alt="Edit Icon" class="w-4 h-4 mr-2 transition-transform duration-200 ease-in-out group-hover:rotate-12" />
                                                    <span class="text-xs font-medium">Edit</span>
                                                </button>

                                                <!-- View Button -->
                                                <button @click="viewReport(report.id)"
                                                        class="flex items-center text-[#3251FF] hover:underline hover:text-[#1d3fcc] font-medium transition active:scale-95 pl-8">
                                                    <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="w-5 h-5 mr-2 transition-transform duration-200 ease-in-out group-hover:rotate-12" />
                                                    <span class="text-xs font-medium">View</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Layout -->
                    <div class="flex items-center justify-between px-6">
                        <!-- Total Users -->
                        <div class="text-xs text-gray-500 font-semibold">
                            Total Users: <span x-text="totalUsers"></span>
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
            </div>
        </div>

        <!-- Leaflet JS -->
        <script>
            function mapComponent() {
                return {
                    reports: [
                        {
                            id: 1,
                            defect: 'Pothole',
                            location: 'Apokon Road, Tagum City',
                            date: '2024-10-10',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4551,
                            lng: 125.8132,
                        },
                        {
                            id: 2,
                            defect: 'Cracked Pavement',
                            location: 'Rizal Street, Downtown Tagum',
                            date: '2024-10-15',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-pothole.jpg') }}",
                            lat: 7.4483,
                            lng: 125.8127,
                        },
                        {
                            id: 3,
                            defect: 'Flooded Road',
                            location: 'Mabini Street, Tagum City',
                            date: '2024-09-20',
                            severity: 'High',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4520,
                            lng: 125.8055,
                        },
                        {
                            id: 4,
                            defect: 'Eroded Shoulder',
                            location: 'San Miguel Road, Tagum City',
                            date: '2024-08-30',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4601,
                            lng: 125.8245,
                        },
                        {
                            id: 5,
                            defect: 'Sinkhole',
                            location: 'National Highway, Tagum City Center',
                            date: '2024-07-18',
                            severity: 'Critical',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-slippageCrack.png') }}",
                            lat: 7.4528,
                            lng: 125.8183,
                        },
                        {
                            id: 6,
                            defect: 'Debris on Road',
                            location: 'Quirante Road, Near Coastal Area, Tagum City',
                            date: '2024-10-01',
                            severity: 'Low',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-slippageCrack.png') }}",
                            lat: 7.4660,
                            lng: 125.8070,
                        },
                        {
                            id: 7,
                            defect: 'Overgrown Vegetation',
                            location: 'Tagum-Mabini Road, Tagum City',
                            date: '2024-09-12',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4375,
                            lng: 125.7998,
                        },
                        {
                            id: 8,
                            defect: 'Loose Gravel',
                            location: 'Liboganon Road, Tagum City',
                            date: '2024-10-05',
                            severity: 'Low',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4312,
                            lng: 125.7820,
                        },
                        {
                            id: 9,
                            defect: 'Missing Signage',
                            location: 'Visayan Village, Tagum City',
                            date: '2024-09-25',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-pothole.jpg') }}",
                            lat: 7.4460,
                            lng: 125.7972,
                        },
                        {
                            id: 10,
                            defect: 'Damaged Bridge',
                            location: 'Tagum-Panabo Bridge, Outskirts of Tagum City',
                            date: '2024-08-05',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4265,
                            lng: 125.7712,
                        },
                    ],
                    markerLayers: [],
                    newStatus: '',
                    selectedReport: { status: 'Repaired' },
                    statuses: ['Repaired', 'Ongoing', 'Unfixed', 'Not Found'], // Fixed array syntax


                    init() {
                        // Correct bounding box for Tagum City
                        const bounds = [
                            [7.3843, 125.7267], // Southwest corner
                            [7.5100, 125.8867]  // Northeast corner
                        ];

                        // Initialize the map, focused on Tagum City
                        this.map = L.map('map', {
                            center: [7.4475, 125.8067],
                            zoom: 14,
                            minZoom: 13,
                            maxZoom: 18,
                            maxBounds: bounds,
                        });

                        // Add OpenStreetMap tile layer
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 30,
                        }).addTo(this.map);

                        this.map.attributionControl.setPrefix(false);

                        // Add markers for each report
                        this.reports.forEach(report => {
                            const statusColor = getStatusColor(report.status);

                            const marker = L.circleMarker([report.lat, report.lng], {
                                color: 'black',
                                weight: 1,
                                radius: 6,
                                fillColor: statusColor,
                                fillOpacity: 1,
                            }).addTo(this.map);

                            const popupContent = `
                                <div class="max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2">
                                    <div class="max-h-[300px] bg-white text-gray-700 rounded-t-xl leading-4">
                                        <div class="px-3 py-2 flex items-center space-x-2 border-b border-gray-300">
                                            <span style="background-color: ${statusColor}; width: 10px; height: 10px; border-radius: 50%; display: inline-block;"></span>
                                            <h3 class="font-semibold text-xs">Report ID: ${report.id}</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <div>Type of Road Defect: ${report.defect}</div>
                                            <div>Date Reported: ${report.date}</div>
                                            <div class="font-semibold">Location: ${report.location}</div>
                                        </div>
                                    </div>
                                    <div class="max-h-[30px] text-white text-center rounded-b-lg cursor-pointer py-2">
                                        <button x-on:click="viewReport(${report.id})" class="text-[12px] font-semibold">
                                            View Report
                                        </button>
                                    </div>
                                </div>
                            `;

                            marker.on('click', () => {
                                this.viewReport(report.id);
                                marker.openPopup();
                            });

                            marker.bindPopup(popupContent); // Customize this popup as needed
                            report.marker = marker;

                            // Store the entire report in markerLayers for easier access
                            this.markerLayers.push({ marker, report });

                            marker.on('mouseover', function () {
                                this.openPopup();
                            });
                            marker.on('mouseout', function () {
                                this.closePopup();
                            });
                        });

                        // Handle map view updates on move
                        this.map.on('moveend', () => {
                            if (this.selectedReport && this.selectedReport.marker) {
                                this.selectedReport.marker.openPopup();
                            }
                        });
                    },

                    filterMarkers(query) {
                        this.map.closePopup(); // Close any open popups before filtering
                        console.log('filterMarkers called with query:', query); // Debugging line

                        const searchQuery = query.toLowerCase();

                        this.markerLayers.forEach(({ marker, report }) => {
                            const searchableContent = [
                                report.defect.toLowerCase(),
                                report.location.toLowerCase(),
                                report.status.toLowerCase(),
                                report.date.toLowerCase()
                            ].join(' ');

                            if (searchableContent.includes(searchQuery)) {
                                if (!this.map.hasLayer(marker)) {
                                    marker.addTo(this.map);
                                    console.log('Added marker for:', report.location); // Debugging line
                                }
                                // Open the popup without auto-panning
                                marker.openPopup();
                            } else {
                                if (this.map.hasLayer(marker)) {
                                    this.map.removeLayer(marker);
                                    console.log('Removed marker for:', report.location); // Debugging line
                                }
                            }
                        });
                    },

                    viewReport(id) {
                        this.selectedReport = this.reports.find(report => report.id === id);
                        if (!this.selectedReport) return;

                        const latLng = [this.selectedReport.lat, this.selectedReport.lng];
                        this.map.setView(latLng, 18, { animate: true });

                        this.selectedReport.marker.openPopup();

                        if (this.pulseLocationIcon) {
                            this.map.removeLayer(this.pulseLocationIcon);
                            clearInterval(this.pulseInterval);
                        }

                        this.pulseLocationIcon = L.circle(latLng, {
                            color: 'blue',
                            fillColor: 'blue',
                            fillOpacity: 0.15,
                            radius: 25
                        }).addTo(this.map);

                        let pulseSize = 25;
                        this.pulseInterval = setInterval(() => {
                            pulseSize = pulseSize === 25 ? 30 : 25;
                            this.pulseLocationIcon.setRadius(pulseSize);
                        }, 500);
                    },

                    updateReportStatus() {
                        if (this.newStatus) {
                            // Update the status of the selected report
                            this.selectedReport.status = this.newStatus;
                            const statusColor = getStatusColor(this.newStatus);

                            // Update marker style to reflect the new status
                            this.selectedReport.marker.setStyle({
                                color: 'black',
                                weight: 1,
                                fillColor: statusColor,
                                fillOpacity: 1,
                            });

                            // Update popup content dynamically
                            const popupContent = `
                                <div class="max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2">
                                    <div class="max-h-[300px] bg-white text-gray-700 rounded-t-xl leading-4">
                                        <div class="px-3 py-2 flex items-center space-x-2 border-b border-gray-300">
                                            <span style="background-color: ${statusColor}; width: 10px; height: 10px; border-radius: 50%; display: inline-block;"></span>
                                            <h3 class="font-semibold text-xs">Report ID: ${this.selectedReport.id}</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <div>Type of Road Defect: ${this.selectedReport.defect}</div>
                                            <div>Reported Date: ${this.selectedReport.date}</div>
                                            <div class="font-semibold">Location: ${this.selectedReport.location}</div>
                                        </div>
                                    </div>
                                    <div class="max-h-[30px] text-white text-center rounded-b-lg cursor-pointer py-2">
                                        <button class="text-[12px] font-semibold">
                                            View Report
                                        </button>
                                    </div>
                                </div>
                            `;

                            // Update the popup content
                            this.selectedReport.marker.setPopupContent(popupContent);

                            // Show a success notification
                            showNotification(`Status updated to: ${this.newStatus}`, 'success');

                            // Clear the input field for new status
                            this.newStatus = '';
                        } else {
                            // Show an error notification
                            showNotification('Please select a status before updating.', 'error');
                        }
                    }

                };
            }
            function getStatusColor(status) {
                switch (status) {
                    case 'Repaired':
                        return '#28a745'; // Green
                    case 'Ongoing':
                        return '#ffc107'; // Yellow
                    case 'Unfixed':
                        return '#dc3545'; // Red
                    case 'Not Found':
                        return '#6c757d'; // Gray
                    default:
                        return '#6c757d'; // Default gray
                }
            }
            function showNotification(message, type = 'success') {
                // Create notification container
                const notification = document.createElement('div');
                notification.className = `flex items-center px-4 py-2 rounded-lg shadow-md text-white relative transition-transform transform scale-95 opacity-0 ${
                    type === 'success' ? 'bg-green-500' : 'bg-red-500'
                }`;

                // Add the notification content
                notification.innerHTML = `
                    <div class="mr-3">
                        <svg class="w-5 h-5 ${
                    type === 'success' ? 'text-green-300' : 'text-red-300'
                }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            ${
                    type === 'success'
                        ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />'
                        : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm4-9a1 1 0 00-1-1H7a1 1 0 000 2h6a1 1 0 001-1z" clip-rule="evenodd" />'
                }
                        </svg>
                    </div>
                    <div>${message}</div>
                    <div class="absolute bottom-0 left-0 h-1 bg-white bg-opacity-30 w-full progress-bar"></div>
                `;

                // Append notification to the container
                const container = document.getElementById('notification');
                container.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('scale-95', 'opacity-0');
                    notification.classList.add('scale-100', 'opacity-100');
                }, 50);

                // Progress bar animation
                const progressBar = notification.querySelector('.progress-bar');
                progressBar.style.transition = 'width 3s linear';
                progressBar.style.width = '0%';

                // Remove notification after 3 seconds
                setTimeout(() => {
                    // Animate out
                    notification.classList.remove('opacity-100', 'scale-100');
                    notification.classList.add('opacity-0', 'scale-95');

                    // Remove from DOM
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
            }

        </script>
    </x-User.user-navigation>
</x-app-layout>
