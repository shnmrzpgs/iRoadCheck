<!-- Header-->
<header
    class="bg-white md:bg-transparent fixed md:relative flex py-2 lg:py-5 shadow-lg md:shadow-none pr-0 md:pr-5 w-full z-[10]">

    <!-- Logo, Page Title and Search Bar-->
    <div x-cloak
         class="ml-2 mr-auto md:ml-5 ld:mx-auto md:pl-0 md:flex md:items-start md:justified-start lg:ml-0 md:flex-row flex flex-col items-center justify-center">

        <!-- Logo -->
        <div class="block md:hidden w-full flex justify-start items-center mr-auto">
            {{$logo}}
        </div>

        {{$page_title_and_search_bar}}

    </div>

    <!-- Notifications and Profile Icons -->
    <div class="hidden md:block  ">

        <div class="flex">
            <div x-data="{
                    tooltipVisible: false,
                    tooltipText: 'Notifications',
                    tooltipArrow: true,
                    tooltipPosition: 'top',
                    dropdownVisible: false,
                    activeLink: localStorage.getItem('activeLink') || '',
                    isClicked: false
                }"
                 x-init="
                    $refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; });
                    $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });
                "
                 class="relative mr-3 mt-[4px]">

                <!-- Tooltip -->
                <div x-ref="tooltip" x-show="tooltipVisible" :class="{
                        'top-1 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top',
                        'top-1.5 -translate-y-1/2 -ml-1 left-0 -translate-x-full' : tooltipPosition == 'left',
                        'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                        'top-0 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right'
                    }" class="absolute w-auto text-sm" x-cloak>
                    <div x-show="tooltipVisible" x-transition
                         class="relative px-2 py-0 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg bg-opacity-100">
                        <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap"></p>
                        <div x-ref="tooltipArrow" x-show="tooltipArrow" :class="{
                                'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top',
                                'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left',
                                'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom',
                                'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right'
                            }" class="absolute inline-flex items-center justify-center overflow-hidden">
                            <div :class="{
                                'origin-top-left -rotate-45' : tooltipPosition == 'top',
                                'origin-top-left rotate-45' : tooltipPosition == 'left',
                                'origin-bottom-left rotate-45' : tooltipPosition == 'bottom',
                                'origin-top-right -rotate-45' : tooltipPosition == 'right'
                            }" class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F]"></div>
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                {{ $notification_dropdown }}

            </div>

            <!-- Profile -->
            <div
                x-data="{
                tooltipVisible: false,
                tooltipText: 'Profile',
                tooltipArrow: true,
                tooltipPosition: 'top',
                isClicked: false,
                handleClick() {
                    this.isClicked = true;
                    setTimeout(() => this.isClicked = false, 150); // Reset scale after 150ms
                }
            }"
                x-init="
                    $refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; });
                    $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });
                "
                class="relative flex mt-[5px]">

                <!-- Tooltip -->
                <div x-ref="tooltip" x-show="tooltipVisible" :class="{
                    'top-0 left-5 -translate-x-1/2 -mt-1 -translate-y-full' : tooltipPosition == 'top',
                    'top-0 -translate-y-1/2 -ml-3 left-0 -translate-x-full' : tooltipPosition == 'left',
                    'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                    'top-1/2 -translate-y-1/2 mr-0 right-0 translate-x-full' : tooltipPosition == 'right'
                }" class="absolute w-auto text-sm" x-cloak>
                    <div x-show="tooltipVisible" x-transition
                         class="relative px-2 py-0 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg bg-opacity-100">
                        <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap"></p>
                        <div x-ref="tooltipArrow" x-show="tooltipArrow" :class="{
                            'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top',
                            'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left',
                            'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom',
                            'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right'
                        }" class="absolute inline-flex items-center justify-center overflow-hidden">
                            <div :class="{
                            'origin-top-left -rotate-45' : tooltipPosition == 'top',
                            'origin-top-left rotate-45' : tooltipPosition == 'left',
                            'origin-bottom-left rotate-45' : tooltipPosition == 'bottom',
                            'origin-top-right -rotate-45' : tooltipPosition == 'right'
                        }" class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F]">
                            </div>
                        </div>
                    </div>
                </div>

                {{ $staff_profile_name }}

            </div>
        </div>

    </div>

    {{ $mobile_notification_and_profile_header }}
</header>
