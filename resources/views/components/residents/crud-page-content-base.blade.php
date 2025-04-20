<div class="text-[#202020] lg:bg-[#FBFBFB] md:bg-[#FBFBFB] rounded-[6px] lg:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] md:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] flex flex-col w-full right-0 items-center justify-center overflow-x-hidden lg:ml-12 lg:w-[95%]">


    {{-- Header --}}
    <div class="text-center md:text-start  w-[95%]" >

        <!-- Title Search Section -->
        <div x-cloak class="my-5 md:pl-0 sm:-pl-2 md:-pt-2 flex flex-col items-center md:flex md:items-center md:flex-row lg:flex-row lg:items-center lg:w-[95%]">

            <!-- Title Section -->
            {{ $title_page_container }}

            <!-- Search Section -->
            <div class="flex lg:w-80 items-center px-0 lg:mt-0 justify-end">

                {{ $search_container }}

            </div>

        </div>

        <div class="w-auto border-gray-400 border mb-8 hidden md:block"></div>
        <div class="flex flex-col">
            <!--Page description-->
            <div class="sm:flex-auto">
                <p class="mt-0 lg:text-sm text-xs text-[#656565] pl-2">
                    {{ $page_description }}
                </p>
            </div>
        </div>


        {{-- Sub Header --}}
        <div class="flex flex-col justify-center items-center md:flex-row md:justified-start md:items-start">

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
    <div class="mt-2 px-0 mb-2 lg:w-[95%] md:w-[95%] w-full">

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
