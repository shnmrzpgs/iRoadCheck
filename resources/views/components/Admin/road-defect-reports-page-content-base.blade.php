<div class="w-full font-pop">
    <div class="text-[#202020] bg-[#FBFBFB] pt-4 pb-4 rounded-lg drop-shadow"
         x-data="{
                    tileCount: 4,
                    view: 'grid',
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

        <!--Grid and Table Content-->
        <div x-show="view === 'grid'" class="w-full flex justify-center items-center">

            <!-- Grid View -->
            <div x-show="view === 'grid'" class="scroll-hidden w-full relative px-4">

                <!--Page description and Buttons-->
                <div class="flex px-4" >
                    <div class="mt-4 mr-auto">
                        <div class="flex flex-col">
                            <!--Page Title-->
                            {{ $page_title }}

                            <!--Page description-->
                            <div class="sm:flex-auto">
                                {{ $page_description }}
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

{{--                                        <!-- Show this content when no report is selected -->--}}
{{--                                        <template x-if="!selectedReport.id || Object.keys(selectedReport).length === 0">--}}
{{--                                            <div class="mb-4 w-full text-[12px] text-gray-500 text-center"--}}
{{--                                                 x-init="lottie.loadAnimation({--}}
{{--                                                          container: $refs.lottieAnimation,--}}
{{--                                                          renderer: 'svg',--}}
{{--                                                          loop: true,--}}
{{--                                                          autoplay: true,--}}
{{--                                                          path: '{{ asset("animations/Animation - 1731695507574.json") }}'--}}
{{--                                                        })">--}}
{{--                                                <div  class="flex flex-col items-center justify-center h-full">--}}
{{--                                                    <!-- Lottie Animation Container -->--}}
{{--                                                    <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>--}}
{{--                                                    <p class="text-sm font-medium">Click a marker on the map to view details of the road defect report.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </template>--}}

{{--                                        <!-- Show this content when a report is selected -->--}}
{{--                                        <template x-if="selectedReport.id" x-show="Object.keys(selectedReport).length > 0">--}}
{{--                                            <div class="mb-4 w-full text-[12px] animate-wipe-right transition-transform duration-200" >--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Report ID:</div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.id"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Type of Defect:</div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.defect"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Location:</div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.location"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Reported Date:</div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.date"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Severity:</div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.severity"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex mb-2 space-x-2 leading-6">--}}
{{--                                                    <div class="text-[#1AA76F] font-semibold w-4/10">Current Status: </div>--}}
{{--                                                    <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.status"></div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Road Image Report -->--}}
{{--                                                <div class="mb-8">--}}
{{--                                                    <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">Road Image:</div>--}}
{{--                                                    <div class="w-full rounded-[10px] p-4 drop-shadow bg-white">--}}
{{--                                                        <img :src="selectedReport.image" alt="Defect Image" class="w-full h-auto rounded-[10px] object-cover">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Status Filter -->--}}
{{--                                                <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">--}}
{{--                                                    Update Road Status Report:--}}
{{--                                                </div>--}}
{{--                                                <div class="relative flex items-center rounded-[4px] border transition-all duration-100 custom-select"--}}
{{--                                                     :class="{--}}
{{--                                                                'bg-green-50 text-[#4D4F50] border-[#4AA76F] active': newStatus !== '',  /* Active state */--}}
{{--                                                                'text-gray-600 border-gray-300 hover:border-[#4AA76F]': newStatus === ''  /* Default and hover state */--}}
{{--                                                            }">--}}

{{--                                                    <!-- Status Color Indicator -->--}}
{{--                                                    <span :style="{ backgroundColor: getStatusColor(newStatus || selectedReport.status) }" class="w-3 h-3 rounded-full ml-2"></span>--}}

{{--                                                    <!-- Dropdown -->--}}
{{--                                                    <select x-model="newStatus"--}}
{{--                                                            class="text-[14px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">--}}
{{--                                                        <!-- Display the current status or placeholder -->--}}
{{--                                                        <option value="" class="text-gray-400 text-[12px]" x-text="newStatus || selectedReport.status || 'Select Status'"></option>--}}

{{--                                                        <!-- Dynamically loop through the statuses array -->--}}
{{--                                                        <template x-for="status in statuses" :key="status">--}}
{{--                                                            <option :value="status" :selected="selectedReport.status === status" class="text-gray-700">--}}
{{--                                                                <span x-text="status"></span>--}}
{{--                                                            </option>--}}
{{--                                                        </template>--}}
{{--                                                    </select>--}}

{{--                                                </div>--}}

{{--                                                <!--Update Report Status-->--}}
{{--                                                <div class="flex justify-center items-center mt-10">--}}
{{--                                                    <button @click="updateReportStatus"--}}
{{--                                                            class="relative w-auto gap-x-[8px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#3AA76F] hover:shadow-md">--}}
{{--                                                        <span class="mt-[2px] px-2 text-[14px] ">Update Report</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </template>--}}
                                            <!-- Search Bar -->
                                            <div class="flex items-center border rounded-lg p-2">
                                                <input type="text" placeholder="Search" class="w-full outline-none px-2">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.4-6.15A7.5 7.5 0 1110.5 3.5a7.5 7.5 0 017.5 7.5z" />
                                                </svg>
                                            </div>

                                            <!-- Date Range -->
                                            <div class="flex items-center mt-4 space-x-2">
                                                <label class="font-semibold">Date Range</label>
                                                <input type="date" class="border px-2 py-1 rounded">
                                                <span>to</span>
                                                <input type="date" class="border px-2 py-1 rounded">
                                            </div>

                                            <!-- Filters -->
                                            <div class="flex space-x-2 mt-4">
                                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                                                    Number of Complaints
                                                    <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>
                                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                                                    Road Defects
                                                    <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Report Cards -->
                                            <div class="mt-4 space-y-4">
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

                    <!-- user Role Filter -->
                    <div class="relative flex rounded-[4px] border hover:shadow-md  custom-select "
                         :class="{
                            'bg-green-200 bg-opacity-20 text-green-800 border-[#4AA76F] active': filters.userType !== '',  /* Active state */
                            'text-gray-600 border-gray-300 hover:border-[#4AA76F]': filters.userType === ''  /* Default and hover state */
                         }">
                        <select x-model="filters.userType" @change="console.log('Filters:', filters)"
                                class="text-[12px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none focus:scale-105">
                            <option value="" class="text-gray-400 text-[12px]">User Role</option>
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
                            <option value="enabled" class="text-gray-700">Active</option>
                            <option value="disabled" class="text-gray-700">Inactive</option>
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
                                <th class="sticky top-0 z-10 bg-white py-3.5 pl-4 pr-10 text-left text-xs font-semibold text-[#757575]">Updated By</th>
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
                                                }" x-text="report.status">
                                        </div>
                                    </td>

                                    <!-- Updated By Whom Column -->
                                    <td class="whitespace-nowrap py-3 pl-4 text-xs">
                                        <div x-text=""></div>
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

