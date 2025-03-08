<div class="text-[#202020] lg:bg-[#FBFBFB] md:bg-[#FBFBFB] rounded-[6px] pt-5 lg:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] md:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] flex flex-col w-full right-0 items-center justify-center overflow-x-hidden lg:ml-12 lg:w-[95%]">

    
    {{-- Header --}}
    <div class="text-center md:text-start  w-[90%]" >

        <div class="flex flex-col">
            <!--Page description-->
            <div class="sm:flex-auto">
                <p class="mt-0 lg:text-sm text-xs text-[#656565] pl-2">
                    {{ $page_description }}
                </p>
            </div>
        </div>


        {{-- Sub Header --}}
        <div class="flex flex-col justify-center items-center md:px-2 md:flex-row md:justified-start md:items-start">

            {{-- Dropdown Filters container --}}
            <div class="pl-1 md:pl-0 flex justify-center items-center md:justified-start md:items-start lg:gap-2 gap-1 md:mb-2 mt-6 mr-auto">
                {{ $dropdown_filters_container }}
            </div>

            {{-- Action Buttons container --}}
            <div>
                {{ $action_buttons_container }}
            </div>


        </div>

    </div>

    {{-- Body --}}
    <div class="mt-2 px-0 mb-2 w-[90%]">

        {{-- Table Container --}}
        <div class="w-full">
            {{ $table_container }}
        </div>

        {{-- Pagination Container --}}
        <div class="mt-4 px-4">
            {{ $pagination_container }}
        </div>


        {{-- Modal Container --}}
        <div>
            {{ $modal_container }}
        </div>

    </div>

</div>