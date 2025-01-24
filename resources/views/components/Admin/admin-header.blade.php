<!-- Header-->
<header
    class="bg-white lg:bg-transparent fixed lg:relative flex py-5 shadow-lg lg:shadow-none lg:pr-5 w-full">

    <!-- Page Title and Search Bar-->
    <div x-cloak
        class="pl-10 mx-auto md:pl-0 md:ml-20 md:flex md:items-start md:justified-start lg:ml-0 md:flex-row flex flex-col items-center justify-center">

        {{$page_title_and_search_bar}}

    </div>

    <!-- Notification and Profile Icons -->
    <div class="flex">
        <!-- Notification -->
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
             class="relative mr-5">

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
                        }" class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F]">
                        </div>
                    </div>
                </div>
            </div>

            <!--Notification icon-->
            <svg
                x-ref="content"
                @click="dropdownVisible = !dropdownVisible"
                :class="'cursor-pointer rounded-[4px] text-[#6AA76F]'"
                class="cursor-pointer fill-current text-customGreen hover:text-[#6AA76F] mt-[9px]"
                xmlns="http://www.w3.org/2000/svg"
                data-name="Layer 1"
                width="22"
                viewBox="0 0 24 24"
                height="22"
                preserveAspectRatio="xMidYMid meet"
                version="1.0">
                <path fill="fill-current"
                      d="M4.068,18H19.724a3,3,0,0,0,2.821-4.021L19.693,6.094A8.323,8.323,0,0,0,11.675,0h0A8.321,8.321,0,0,0,3.552,6.516l-2.35,7.6A3,3,0,0,0,4.068,18Z"/>
                <path fill="fill-current" d="M7.1,20a5,5,0,0,0,9.8,0Z"/>
            </svg>

            <!-- Dropdown Notification -->
            <div x-show="dropdownVisible" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="transform opacity-0 scale-100"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-1 mt-2 w-[350px] rounded-md shadow-[0px_5px_40px_rgba(0,0,0,0.3)]  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                 aria-orientation="vertical" aria-labelledby="notifications-info">

                <div class="py-1 px-4">
                    <h1 class="text-[14px] pt-4 pb-2 px-1 border-b-[#4AA76F] border-b-[2px] text-[#4AA76F] font-semibold">
                        Notifications</h1>

                    <!-- Notification List -->
                    <ul class="overflow-y-auto overflow-x-hidden max-h-[320px] mt-2 mb-10 space-y-2 px-2">
                        <li class="block text-sm text-[#4D4F50]">
                            <div class="hover:bg-gray-200 flex justify-between py-4 rounded-md bg-gray-100">
                                <div class="flex pl-3 items-center space-x-3">
                                    <!-- Notification Message Icon -->
                                    <div
                                        class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                        <img
                                            src="{{ asset('storage/icons/notification-message-icon.png') }}"
                                            alt="message-icon" class="w-4 h-4">
                                    </div>
                                    <!-- Notification Message -->
                                    <div class="text-[12px] text-[#474747] font-semibold">
                                        <span>Successfully</span>
                                        <span>add Users</span>
                                    </div>
                                </div>

                                <!-- Time of Notification Message -->
                                <div x-data="{
                                        now: new Date(),
                                        notificationDate: new Date('2024-10-09T12:00:00'),
                                        timeSince: ''
                                    }" x-init="
                                        const diffTime = now - notificationDate;
                                        const diffSeconds = Math.floor(diffTime / 1000);
                                        const diffMinutes = Math.floor(diffSeconds / 60);
                                        const diffHours = Math.floor(diffMinutes / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffDays > 0) {
                                            timeSince = diffDays + ' day' + (diffDays > 1 ? 's' : '') + ' ago';
                                        } else if (diffHours > 0) {
                                            timeSince = diffHours + ' hour' + (diffHours > 1 ? 's' : '') + ' ago';
                                        } else if (diffMinutes > 0) {
                                            timeSince = diffMinutes + ' minute' + (diffMinutes > 1 ? 's' : '') + ' ago';
                                        } else {
                                            timeSince = diffSeconds + ' second' + (diffSeconds > 1 ? 's' : '') + ' ago';
                                        }
                                    ">
                                    <p x-text="timeSince" class="text-[10px] text-[#5E5E5E] px-3"></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- View All Notifications Link -->
                    <a href="{{ route('admin.notifications') }}"
                       @click="activeLink = 'notifications'; isClicked = true; localStorage.setItem('activeLink', 'notifications')"
                       class="flex justify-center items-center">
                        <div
                            class="fixed -mt-10 px-24 py-1 bg-[#4AA76F] text-sm text-white hover:bg-[#2AA76F] font-medium rounded-[4px]"
                            role="menuitem">
                            <p class="text-[12px]">
                                View All Notifications
                            </p>
                        </div>
                    </a>
                </div>
            </div>
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
            class="relative mt-[4px]">

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


            {{ $admin_profile_name }}

        </div>
    </div>
</header>
