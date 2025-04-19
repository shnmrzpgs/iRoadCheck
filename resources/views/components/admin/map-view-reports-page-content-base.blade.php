<div x-data="mapComponent()" class="mt-2 bg-none overflow-y-auto h-auto py-2">

    <!--Page description-->
    <div class="hidden lg:block mt-4 mb-2 text-xs text-[#656565] pl-3">
        {{ $page_description }}
      </div>

    <!-- Map Reports Information -->
    <div class="min-h-[35vh] max-h-[80vh] -mt-3 lg:mt-0 z-0 m-0 border border-t-gray-300 lg:min-h-[35vh] lg:max-h-[78vh] inset-0 mx-2 p-0">
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
                    <div class="hidden lg:block  mt-2 p-0.5 rounded-[20px] h-[68vh] bg-white transition-all duration-300 overflow-hidden" :class="expanded ? 'w-0 hidden' : 'w-3/9 absolute flex justify-end items-end right-10 top-24 bg-gradient-to-b from-[#84D689] to-green-500 drop-shadow'">
                        <div class="bg-white h-full w-full rounded-[18px]">
                            <div class="p-0 block h-full w-full flex flex-col">
                                <div x-data="{ showFilters: false }" class="flex flex-wrap gap-2">

                                    <!-- Search Bar -->
                                    <div class="relative flex flex-1 md:flex-none w-7/10 pt-2.5 pb-0">
                                        {{ $search_container }}
                                    </div>

                                    <div class="mt-4 w-2.5/10">
                                        <!-- Toggle Filters Button -->
                                        <button
                                            @click="showFilters = !showFilters"
                                            class="ml-auto bg-white text-[#F59E0B] px-1 py-2 rounded-md flex items-center shadow-md hover:text-[#D97706] hover:shadow-lg transition-all border border-[#F59E0B]">
                                            <span class="text-xs" x-text="showFilters ? 'Hide Filters' : 'Show Filters'"></span>
                                            <svg class="ml-1 w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                                         class="flex flex-wrap justify-start items-start gap-2 ">
                                        {{ $dropdown_filters_container}}
                                    </div>
                                </div>

                                <!--Comprehensive Reports-->
                                <div class="flex-1 overflow-y-auto min-h-[25vh] max-h-auto pb-16">
                                    <div class="pb-16 mt-6 px-6">
                                        <div class="space-y-2">
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

    <!-- Draggable Bottom Panel -->
    <div x-data="{ open: false }"
        :class="open ? 'h-[80%]' : 'h-[120px]'"
         class="block lg:hidden fixed bottom-0 w-full bg-white rounded-t-2xl shadow-lg transition-all duration-300 ease-in-out overflow-hidden flex flex-col"
    >
        <!-- Drag Handle -->
        <div
            @click="open = !open"
            class="w-full flex justify-center py-3 cursor-pointer"
        >
            <div class="w-12 h-1.5 bg-gray-400 rounded-full"></div>
        </div>

        <!-- Panel Content -->
        <div class="overflow-y-auto h-[calc(100%-2rem)] px-4">
            <!-- Optional Search + Filters -->
            <div x-data="{ showFilters: false }" class="flex flex-col gap-3">
                <!-- Search Bar -->
                <div class="relative flex flex-1 w-full pt-2.5 pb-0">
                    {{ $search_container }}
                </div>

                <!-- Toggle Filters Button -->
                <div class="w-full flex justify-end">
                    <button
                        @click="showFilters = !showFilters"
                        class="bg-white text-[#F59E0B] px-2 py-1.5 rounded-md flex items-center shadow hover:text-[#D97706] border border-[#F59E0B] text-xs">
                        <span x-text="showFilters ? 'Hide Filters' : 'Show Filters'"></span>
                        <svg class="ml-1 w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
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

                <!-- Dropdown Filters -->
                <div x-show="showFilters" class="border-t pt-2">
                    <div x-data="{ activeFilter: '', query: '' }"
                         class="flex flex-wrap justify-start items-start gap-2">
                        {{ $dropdown_filters_container }}
                    </div>
                </div>
            </div>

            <!-- Report Information -->
            <div class="block flex-1 overflow-y-auto min-h-[25vh] max-h-[60vh] pb-16">
                <div class="pb-16 mt-6 px-6">
                    <div class="space-y-2">
                        {{ $comprehensive_or_group_report_information }}
                        {{ $individual_report_information }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



