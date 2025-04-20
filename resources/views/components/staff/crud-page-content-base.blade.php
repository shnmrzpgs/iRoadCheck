<div class="text-[#202020] lg:bg-[#FBFBFB] md:bg-[#FBFBFB] rounded-[6px] pt-5 h-auto lg:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] md:shadow-[0px_1px_5px_rgba(0,0,0,0.2)]  lg:w-full w-[48vh] md:w-full">

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
            <div class="pl-2 md:pl-0 flex justify-center items-center md:justified-start md:items-start lg:gap-2 gap-1 md:mb-2 mt-6 mr-auto">
                {{ $dropdown_filters_container }}
            </div>

            {{-- Action Buttons container --}}
            <div class="pr-2 md:pr-0 flex justify-end items-center -mr-4">
                {{ $action_buttons_container }}
            </div>


        </div>

    </div>

    {{-- Body --}}
    <div class="mt-2 px-2 lg:px-6 md:px-6 mb-2">

        {{-- Table Container --}}
        
            {{ $table_container }}
        

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
