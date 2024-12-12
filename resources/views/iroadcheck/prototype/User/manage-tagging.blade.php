<x-app-layout>

    <x-User.user-navigation page_title="Manage Tagging">

        <div id="notification" class="fixed top-4 right-4 z-50"></div>

        <div class="text-[#202020] bg-[#FBFBFB]  pt-4 px-4 pb-4 rounded-lg drop-shadow">

            <!--Page description and Add button-->
            <div class="flex px-4" >
                <div class="mt-4 mr-auto">

                    <div class="flex flex-col">
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-[12px] text-primary-800">
                                A GIS map to input status to the road concerns through tagging.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legend -->
            <div class="absolute top-28 right-[390px] z-50">
                <!-- Legend Content -->
                <div class="bg-[#3F4243] bg-opacity-90 text-white px-3 py-1 mt-2 rounded shadow-lg text-[12px]">
                    <h3 class="font-semibold mb-2 text-center border-b border-b-white p-1">Legend</h3>
                    <ul>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-yellow-500 mr-2 rounded-full"></span>On Going</li>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-blue-500 mr-2 rounded-full"></span>Unfixed</li>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-red-500 mr-2 rounded-full"></span>Not Found</li>
                    </ul>
                </div>
            </div>

            <!-- Map Reports Information -->
            <div class="mt-4 px-2 mb-2 z-0">
                <div class="m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                    <div class="min-w-full inline-block min-h-[45vh] max-h-[68vh] align-middle p-0 z-0">
                        <div class="flex"
                             x-data="mapComponent()">

                        <!-- Map Container -->
                            <div id="map" class="w-7/10 h-[68vh] bg-white drop-shadow">
                                <!-- Leaflet JS -->

                            </div>
                                <livewire:reports-map/>

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


    </x-User.user-navigation>

</x-app-layout>

