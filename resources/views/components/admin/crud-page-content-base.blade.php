<div class="-mt-2 text-[#202020] bg-[#FBFBFB] rounded-[6px] pt-5 h-auto shadow-[0px_1px_5px_rgba(0,0,0,0.2)] w-[46vh] md:w-full">

    {{-- Header --}}
    <div class="px-4 text-center md:text-start" >
        <div class="flex flex-col">
            <!--Page description-->
            <div class="sm:flex-auto">
                <p class="mt-0 lg:text-sm text-xs text-[#656565] pl-3">
                    {{ $page_description }}
                </p>
            </div>
        </div>

        {{-- Sub Header --}}
        <div class="flex flex-col justify-center items-center md:px-4 md:flex-row md:justified-start md:items-start">

            {{-- Dropdown Filters container --}}
            <div class="pl-6 md:pl-0 flex justify-center items-center md:justified-start md:items-start lg:gap-2 gap-1 md:mb-1 mt-2 mr-auto">
                {{ $dropdown_filters_container }}
            </div>

            {{-- Action Buttons container --}}
            <div>
                {{ $action_buttons_container }}
            </div>
        </div>

    </div>

    {{-- Body --}}
    <div class="mt-2 px-6 mb-1">

        {{-- Table Container --}}
        <div>
            {{ $table_container }}
        </div>

        {{-- Pagination Container --}}
        <div class="mt-4 px-6">
            {{ $pagination_container }}
        </div>

        {{-- Modal Container --}}
        <div>
            {{ $modal_container }}
        </div>
    </div>

</div>
