<div x-data="mapComponent()" class="mt-2 bg-none overflow-y-auto h-auto py-2">

    <!--Page description-->
    <div class="mt-4 mb-2 lg:text-sm text-xs text-[#656565] pl-3">
        {{ $page_description }}
      </div>

    <!-- Map Reports Information -->
    <div class="mt-0 z-0 m-0 border border-t-gray-300 min-h-[35vh] max-h-[78vh] inset-0 mx-2 p-0">
        <div class="w-full inline-block align-middle p-0 z-0">
            <div class="flex" x-data="{ expanded: false }">
                <button @click="expanded = !expanded"
                        class="hidden bg-gradient-to-b from-[#84D689] to-green-500 drop-shadow lg:flex items-center fixed top-16 right-9 z-[50] text-white rounded-full transition-all duration-300 px-2 py-2">
                    <svg :class="expanded ? '-rotate-90' : 'rotate-90'" class="w-4 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-.707.293l-6 6a1 1 0 001.414 1.414L10 5.414l5.293 5.293a1 1 0 001.414-1.414l-6-6A1 1 0 0010 3z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm ml-1" x-text="expanded ? 'View Report Information' : 'Hide Report Information'"></span>
                </button>

                <div class="w-full min-h-[35vh] max-h-[78vh] flex flex-col lg:flex-row">

                    <!-- Map Container View -->
                    <div id="map" class="w-full min-h-[35vh] max-h-[78vh] bg-gradient-to-b from-[#84D689] to-green-500 border-r border-r-gray-300 drop-shadow"></div>

                    <!-- Map Information Sidebar -->
                    <div class="mt-2 p-0.5 rounded-[20px] h-[70vh] bg-white transition-all duration-300 overflow-hidden" :class="expanded ? 'w-0 hidden' : 'w-3/9 absolute flex justify-end items-end right-10 top-24 bg-gradient-to-b from-[#84D689] to-green-500 drop-shadow'">
                        <div class="bg-white h-full w-full rounded-[18px]">
                            <div class="p-0 block h-full w-full flex flex-col" x-data = "{showFilters: false}">
                                <div class="flex flex-wrap gap-4 mx-1">

                                    <!-- Search Bar -->
                                    <div class="relative flex flex-1 md:flex-none w-full md:w-auto pt-2.5 pb-0">
                                        {{ $search_container }}
                                    </div>

                                    <div class="mt-4">
                                        <!-- Toggle Filters Button -->
                                        <button
                                            @click="showFilters = !showFilters"
                                            class="ml-auto bg-white text-[#F59E0B] px-1 py-2 rounded-md flex items-center shadow-md hover:text-[#D97706] hover:shadow-lg transition-all border border-[#F59E0B]">
                                            <span class="text-xs" x-text="showFilters ? 'Hide Filters' : 'Show Filters'"></span>
                                            <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 9l-7 7-7-7"
                                                      x-show="!showFilters" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 15l-7-7-7 7"
                                                      x-show="showFilters" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Dropdown Filters container -->
                                <div x-show="showFilters"
                                     class="md:pl-2 flex justify-start items-start mb-1 mt-3 mx-1 mr-auto p-1 border-b border-b-gray-200">
                                    <div x-data="{ activeFilter: '', query: '' }"
                                    class="flex flex-wrap justify-start items-start gap-3 ">
                                        {{ $dropdown_filters_container}}
                                    </div>
                                </div>

                                <!--Comprehensive Reports-->
                                <div class="flex-1 overflow-y-auto min-h-[25vh] max-h-auto pb-16">
                                        <div class="pb-16 mt-6 px-6">

                                            <div class="space-y-2">
{{--                                                <x-slot:no_selected_report_yet_container>--}}
{{--                                                    <!-- When No Report Is Selected -->--}}
{{--                                                    <template x-if="!selectedReport || !selectedReport.id && !showingGroupReports">--}}
{{--                                                        <div class="mb-4 w-full text-[12px] text-gray-500 text-center">--}}
{{--                                                            <div class="flex flex-col items-center justify-center h-full">--}}
{{--                                                                <img src="{{ asset('storage/icons/marker-on-the-map-icon.png') }}" alt="markerIcon"--}}
{{--                                                                     class="xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg" />--}}
{{--                                                                <p class="text-sm font-medium">Click a marker on the map to view details of the road defect report.</p>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </template>--}}
{{--                                                </x-slot:no_selected_report_yet_container>--}}

                                                {{ $comprehensive_or_group_report_information }}

                                                {{ $individual_report_information }}
                                            </div>

                                        </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

