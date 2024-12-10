<div class="bg-[#202020] rounded-[6px] pt-5 px-2 h-[85vh]">
    {{-- Header --}}
    <div class="px-2">
        <div class="sm:flex sm:items-baseline">
            {{-- Page Description --}}
            <div class="sm:flex-auto">
                <p class="text-[18px] text-[#E37575] font-bold">
                    {{ $page_title }}
                </p>
                <p class="mt-2 text-[14px] text-gray-300 font-light italic">
                    {{ $page_description }}
                </p>
            </div>
            {{-- Search Bar container --}}
            <div class="flex w-80 items-center z-10 ">
                <div class="relative w-full">
                    {{ $search_bar_container }}
                </div>
            </div>
        </div>

    </div>

    {{-- Sub Header --}}
    <div class="flex justify-start px-2">

        {{-- Dropdown Filters container --}}
        <div class="flex justify-start gap-2 mr-auto px-0 mt-6">
            {{ $dropdown_filters_container }}
        </div>

        {{-- Action Buttons container --}}
        {{ $action_buttons_container }}

    </div>

    {{-- Body --}}
    <div class="mt-3 pb-5 px-2 mx-1">

        {{-- Table Container --}}
        <div>
            {{ $table_container }}
        </div>

        {{-- Pagination Container --}}
        <div class="p-0 text-[14px] w-full shadow shadow-gray-400 rounded-b-[4px]">
            <div
                class="p-2 flex flex-col md:flex-row justify-between items-center bg-[#404040] rounded-b-[4px] md:space-y-0 md:space-x-3">
                <div class="ml-3">
                    <p class="font-medium">
                        <span>{{ $item_group_name }}</span>:&nbsp;<span>{{ $total_items_count }}</span>
                    </p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex items-center text-white">
                        {{ $rows_per_page_dropdown }}
                    </div>
                    <div class="flex items-center space-x-2">
                        {{ $pagination_container }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Container --}}
        <div>
            {{ $modal_container }}
        </div>

    </div>

</div>
