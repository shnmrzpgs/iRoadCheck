<x-app-layout>

    <x-User.user-navigation page_title="Manage Tagging">

        <div id="notification" class="fixed top-4 right-4 z-50"></div>

        <div class="text-[#202020] bg-[#FBFBFB]  pt-0 px-4 pb-4 rounded-lg drop-shadow">

            <!--Page description and Add button-->
            <div class="flex px-4" >
                <div class="mt-0 py-3 mr-auto">

                    <div class="flex flex-col">
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-[12px] text-primary-800">
                                A GIS map to input status to the road concerns through tagging.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Reports Information -->
            <div class="mt-0 px-2 mb-2 z-0">
                <div class="m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                    <div x-data="mapComponent()" class="min-w-full inline-block min-h-[45vh] max-h-auto align-middle p-0 z-0">
                        <div class="flex"
                             x-data="{ expanded: false }"
                             >

                            <!-- Leaflet JS -->
                            <livewire:reports-map/>

                             <!-- Map Container -->
                            <div id="map" class="w-full h-[75vh] bg-white drop-shadow"></div>

                            <!-- Sidebar Toggle Button -->
                            <button @click="expanded = !expanded"
                                    class="flex fixed top-3 right-4 z-[1000] p-2 bg-[#4AA76F] text-white rounded-full shadow-lg hover:bg-[#3AA76F] transition-all duration-300 mx-2 px-2">
                                <svg :class="expanded ? 'rotate-90' : '-rotate-90'" class="w-4 h-4 mr-1 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 00-.707.293l-6 6a1 1 0 001.414 1.414L10 5.414l5.293 5.293a1 1 0 001.414-1.414l-6-6A1 1 0 0010 3z" clip-rule="evenodd" />
                                </svg>
                               <span class="text-xs">View Report Information</span>
                            </button>

                            <!-- Map Information Sidebar -->
                            <div
                                 class="h-[68vh] bg-white transition-all duration-300 overflow-hidden"
                                 :class="expanded ? 'w-5/10 block' : 'w-0 hidden'">

                                <!-- Sidebar Content -->
                                <div class="p-4 block">
                                    <!-- Search -->
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
                                                    <img :src="'/storage/' + selectedReport.image" alt="Defect Image" class="w-full h-auto rounded-[10px] object-cover">

                                                </div>
                                            </div>

                                                <form action="{{ route('update.report.status') }}" method="POST" x-data="{ newStatus: '', statuses: ['On Going', 'Unfixed', 'Not Found'] }">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden Input for Report ID -->
                                                    <input type="hidden" name="reportId" :value="selectedReport.id">

                                                    <!-- Status Filter -->
                                                    <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">
                                                        Update Road Status Report:
                                                    </div>

                                                    <!-- Status Dropdown -->
                                                    <div class="relative flex items-center rounded-[4px] border transition-all duration-100 custom-select">
                                                        <!-- Status Color Indicator -->
                                                        <span :style="{ backgroundColor: getStatusColor(newStatus || selectedReport.status) }" class="w-3 h-3 rounded-full ml-2"></span>

                                                        <!-- Dropdown -->
                                                        <select name="newStatus" x-model="newStatus" class="text-[14px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                                                            <option value="" class="text-gray-400 text-[12px]" x-text="newStatus || selectedReport.status || 'Select Status'"></option>
                                                            <template x-for="status in statuses" :key="status">
                                                                <option :value="status" :selected="selectedReport.status === status" class="text-gray-700" x-text="status"></option>
                                                            </template>
                                                        </select>
                                                    </div>

                                                    <!-- Update Report Status -->
                                                    <div class="flex justify-center items-center mt-10">
                                                        <button type="submit"
                                                                class="relative w-auto gap-x-[8px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#3AA76F] hover:shadow-md">
                                                            <span class="mt-[2px] px-2 text-[14px]">Update Report</span>
                                                        </button>
                                                    </div>
                                                </form>



                                                <!-- Success/Error Notifications -->
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success mt-2">{{ session('message') }}</div>
                                                @endif
                                                @if (session()->has('error'))
                                                    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                                                @endif

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
    </x-User.user-navigation>

</x-app-layout>

