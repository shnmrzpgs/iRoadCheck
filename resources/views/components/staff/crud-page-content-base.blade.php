<div class="text-[#202020] lg:bg-[#FBFBFB] md:bg-[#FBFBFB] rounded-[6px] md:pt-5 min-h-[50vh] max-h-[80vh]  lg:h-full lg:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] md:shadow-[0px_1px_5px_rgba(0,0,0,0.2)] w-9/10 md:w-full overflow-y-scroll">

    <div class="mx-auto bg-[#FBFBFB] w-9/10 lg:w-full px-4 py-2 rounded-lg drop-shadow mb-2 block md:hidden text-center text-[22px] text-md md:text-lg font-semibold text-[#4AA76F] md:mr-3 lg:mr-1">
        Update History
    </div>

    <div class="px-5">
        {{-- Header --}}
        <div class="text-center md:text-start" >

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
                <div class="pl-2 md:pl-0 flex justify-center items-center md:justified-start md:items-start lg:gap-2 gap-1 md:mb-2 mt-6 md:mr-auto">
                    {{ $dropdown_filters_container }}
                </div>

                {{-- Action Buttons container --}}
                <div>
                    {{ $action_buttons_container }}
                </div>


            </div>

        </div>

        {{-- Body --}}
        <div class="mt-2 md:px-6 mb-2">

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


</div>
