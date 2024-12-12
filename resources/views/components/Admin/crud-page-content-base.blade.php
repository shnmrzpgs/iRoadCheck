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
            <div class="flex lg:gap-2 gap-1 mr-auto mb-0 mt-6">
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
