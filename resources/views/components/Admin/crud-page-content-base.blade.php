<div class="text-[#202020] bg-[#FBFBFB] pt-4 lg:px-2 px-0 pb-4 rounded-lg w-full min-w-[40vh] max-w-full h-full min-h-[60vh] max-h-full ">
    {{-- Header --}}
    <div class="px-6" >
        <div class="mr-auto">
            <div class="flex flex-col">
                <!--Page description-->
                <div class="sm:flex-auto">
                    <p class="mt-2 lg:text-sm text-xs text-[#656565]">
                        {{ $page_description }}
                    </p>
                </div>
            </div>
        </div>


        {{-- Sub Header --}}
        <div class="flex justify-start px-2">

            {{-- Dropdown Filters container --}}
            <div class="flex lg:gap-2 gap-1 mr-auto mb-0 mt-4">
                {{ $dropdown_filters_container }}
            </div>

            {{-- Action Buttons container --}}
            {{ $action_buttons_container }}
        </div>

    </div>


    {{-- Body --}}
    <div class="mt-2 px-6 mb-2">

        {{-- Table Container --}}
        <div>
            {{ $table_container }}
        </div>


{{--        <div class="mt-4 px-6">--}}
{{--            <div class="flex flex-wrap items-center justify-between space-y-2 sm:space-y-0 sm:flex-nowrap">--}}
{{--                <div class="w-full sm:w-auto text-center sm:text-left text-xs text-gray-500 font-semibold">--}}
{{--                        <span>{{ $item_group_name }}</span>:&nbsp;<span>{{ $total_items_count }}</span>--}}
{{--                </div>--}}
{{--                <div class="flex items-center space-x-3">--}}
{{--                    <div class="flex items-center text-white">--}}
{{--                        {{ $rows_per_page_dropdown }}--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        {{ $pagination_container }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        {{-- Pagination Container --}}
        <div class="mt-4 px-6">
            <div class="flex flex-wrap items-center justify-between space-y-2 sm:space-y-0 sm:flex-nowrap">
                <!-- Total Users -->
                <div class="w-full sm:w-auto text-center sm:text-left text-xs text-gray-500 font-semibold">
                    <span>{{ $item_group_name }}</span>:&nbsp;<span>{{ $total_items_count }}</span>
                </div>

                <!-- Pagination Controls -->
                <div class="w-full sm:w-auto">
                    <nav aria-label="Page navigation" class="flex justify-center sm:justify-start items-center text-xs space-x-1">
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

                {{-- Page Information --}}
                <div class="w-full sm:w-auto text-center sm:text-right text-xs text-gray-500 font-semibold">
                    {{ $rows_per_page_dropdown }}
                </div>
            </div>
        </div>
        {{-- Modal Container --}}
        <div>
            {{ $modal_container }}
        </div>

    </div>

</div>
