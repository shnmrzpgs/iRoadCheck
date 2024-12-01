@props(['page_title' => '', 'main_class' => ''])

<div class="bg-none mx-4 mt-3 font-pop text-white 0 p-0 " x-data="{ open: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }">

    <div class="flex h-auto">

        <!-- Sidebar -->
        <aside x-data="{
                expanded: JSON.parse(localStorage.getItem('sidebarExpanded')) ?? true,
                toggleSidebar() {
                    this.expanded = !this.expanded;
                    localStorage.setItem('sidebarExpanded', JSON.stringify(this.expanded));
                }
            }"
               :class="expanded ? 'w-64' : 'w-24'"
               class="bg-[#FBFBFB] h-full py-4 md:block rounded-xl mr-5 drop-shadow-md transition-all duration-300 ease-in-out">

            <!-- Arrow Icon -->
            <svg @click="toggleSidebar"
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 448 512"
                 :class="expanded ? 'rotate-180' : 'rotate-0'"
                 class="w-5 h-5 absolute -right-2 top-9 bg-[#FBFBFB] p-1 rounded-full transition-transform duration-300 ease-in-out cursor-pointer">
                <path d="M422.6 278.6L445.3 256l-22.6-22.6-144-144L256 66.7 210.8 112l22.6 22.6L322.8 224 32 224 0 224l0 64 32 0 290.7 0-89.4 89.4L210.8 400 256 445.3l22.6-22.6 144-144z"/>
            </svg>

            <!-- Logo and Title -->
            <div class="text-2xl font-bold mb-2 flex flex-col items-center justify-center p-3">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block mb-2" />
                <div x-show="expanded" class="text-[#4D4F50] font-pop text-[17px]">iRoadCheck</div>
            </div>

            <!-- Custom Horizontal Line -->
            <div class="relative pb-[16px]" x-show="expanded">
                <div class="absolute w-full h-[1px] bg-gray-300"></div>
            </div>

            <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[73vh] px-4 leading-6">

                <!-- Dashboard -->
                <a href="{{ route('User.dashboard') }}"
                   @click="activeLink = 'dashboard'; activeChildLink = ''; localStorage.setItem('activeLink', 'dashboard'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'dashboard',
                    'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'dashboard'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible, changes color on hover -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                         :class="{ 'text-white': activeLink === 'dashboard', 'text-[#4D4F50]': activeLink !== 'dashboard',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'dashboard'}"
                         class="w-5 h-5 fill-current">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>

                    <!-- Text only when expanded, changes color on hover -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'dashboard', 'text-[#4D4F50]': activeLink !== 'dashboard',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'dashboard'}"
                       class="ml-2">Dashboard</p>
                </a>


                <!-- Manage Tagging-->
                <a href="{{ route('User.manage-tagging') }}"
                   @click="activeLink = 'manageTagging'; activeChildLink = ''; localStorage.setItem('activeLink', 'manageTagging'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'manageTagging',
                   'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'manageTagging'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                         :class="{ 'text-white': activeLink === 'manageTagging', 'text-[#4D4F50]': activeLink !== 'manageTagging',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'manageTagging'}"
                         class="w-5 h-5 fill-current">
                        <path d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3L576 152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6L416 503zM15.1 187.3C6 191 0 199.8 0 209.6L0 480.4c0 17 17.1 28.6 32.9 22.3L160 451.8l0-251.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77l0 194.4 192 54.9L384 255z"/>
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'manageTagging', 'text-[#4D4F50]': activeLink !== 'manageTapping',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'manageTagging'}"
                       class="ml-2">Tagging</p>
                </a>

                <!-- Reports -->
                <a href="{{ route('User.reports') }}"
                   @click="activeLink = 'reports'; activeChildLink = ''; localStorage.setItem('activeLink', 'reports'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'reports',
                   'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'reports'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 527 455"
                         :class="{ 'text-white': activeLink === 'reports', 'text-[#4D4F50]': activeLink !== 'reports',
                         'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'reports'}"
                         class="w-5 h-5 fill-current">
                        <path d="M164.541 227.5H109.499C101.414 227.5 94.8604 233.159 94.8604 240.139V360.461C94.8604 367.441 101.414 373.1 109.499 373.1H164.541C172.626 373.1 179.18 367.441 179.18 360.461V240.139C179.18 233.159 172.626 227.5 164.541 227.5Z"/>
                        <path d="M291.021 81.9004H235.979C227.894 81.9004 221.34 87.559 221.34 94.5393V360.462C221.34 367.442 227.894 373.1 235.979 373.1H291.021C299.106 373.1 305.66 367.442 305.66 360.462V94.5393C305.66 87.559 299.106 81.9004 291.021 81.9004Z"/>
                        <path d="M417.501 178.967H362.459C354.374 178.967 347.82 184.625 347.82 191.606V360.461C347.82 367.442 354.374 373.1 362.459 373.1H417.501C425.586 373.1 432.14 367.442 432.14 360.461V191.606C432.14 184.625 425.586 178.967 417.501 178.967Z"/>
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'reports', 'text-[#4D4F50]': activeLink !== 'reports',
                       'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'reports'}"
                       class="ml-2">Reports</p>
                </a>

                <!-- Activity Logs -->
                <a href="{{ route('User.activity-logs') }}"
                   @click="activeLink = 'activityLogs'; activeChildLink = ''; localStorage.setItem('activeLink', 'activityLogs'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'activityLogs',
                    'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'activityLogs'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"
                         :class="{ 'text-white': activeLink === 'activityLogs', 'text-[#4D4F50]': activeLink !== 'activityLogs',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'activityLogs'}"
                         class="w-5 h-5 fill-current">
                        <path d="M-0.000703125 18.75C-0.000703125 19.1833 0.149297 19.5583 0.449297 19.875C0.749297 20.1917 1.1243 20.3417 1.5743 20.325H3.1243C3.1243 21.625 3.58263 22.725 4.4993 23.625C5.41596 24.525 6.5243 24.9833 7.8243 25H13.0493C11.9326 24.2167 11.0326 23.175 10.3493 21.875H7.8243C7.39096 21.875 7.01596 21.725 6.6993 21.425C6.38263 21.125 6.23263 20.7583 6.2493 20.325V4.7C6.2493 4.26667 6.3993 3.9 6.6993 3.6C6.9993 3.3 7.3743 3.14167 7.8243 3.125H20.3243C20.741 3.125 21.1076 3.28333 21.4243 3.6C21.741 3.91667 21.891 4.28333 21.8743 4.7V10.35C23.1743 11.0333 24.216 11.9333 24.9993 13.05V4.7C24.9993 3.4 24.541 2.29167 23.6243 1.375C22.7076 0.458333 21.6076 0 20.3243 0H7.8243C6.5243 0 5.41596 0.458333 4.4993 1.375C3.58263 2.29167 3.1243 3.4 3.1243 4.7H1.5743C1.14096 4.7 0.765964 4.85 0.449297 5.15C0.13263 5.45 -0.0173698 5.81667 -0.000703125 6.25C0.0159635 6.68333 0.165964 7.05833 0.449297 7.375C0.73263 7.69167 1.10763 7.84167 1.5743 7.825H3.1243V10.95H1.5743C1.14096 10.95 0.765964 11.1 0.449297 11.4C0.13263 11.7 -0.0173698 12.0667 -0.000703125 12.5C0.0159635 12.9333 0.165964 13.3083 0.449297 13.625C0.73263 13.9417 1.10763 14.0917 1.5743 14.075H3.1243V17.2H1.5743C1.14096 17.2 0.765964 17.35 0.449297 17.65C0.13263 17.95 -0.0173698 18.3167 -0.000703125 18.75ZM7.8243 18.75H9.4493C9.4493 18.7167 9.44096 18.6083 9.4243 18.425C9.40763 18.2417 9.39096 18.0917 9.3743 17.975C9.35763 17.8583 9.3743 17.7167 9.4243 17.55C9.4743 17.3833 9.48263 17.2667 9.4493 17.2H7.8243V18.75ZM7.8243 15.625H9.7493C9.8993 15.0583 10.0993 14.5417 10.3493 14.075H7.8243V15.625ZM7.8243 12.5H11.3993C11.916 11.8667 12.466 11.35 13.0493 10.95H7.8243V12.5ZM7.8243 9.375H20.3243V7.825H7.8243V9.375ZM7.8243 6.25H20.3243V4.7H7.8243V6.25ZM10.9493 17.975C10.9493 18.925 11.1326 19.8333 11.4993 20.7C11.866 21.5667 12.366 22.3167 12.9993 22.95C13.6326 23.5833 14.3826 24.0833 15.2493 24.45C16.116 24.8167 17.0243 25 17.9743 25C18.9243 25 19.8326 24.8167 20.6993 24.45C21.566 24.0833 22.316 23.5833 22.9493 22.95C23.5826 22.3167 24.0826 21.5667 24.4493 20.7C24.816 19.8333 24.9993 18.925 24.9993 17.975C24.9993 17.025 24.816 16.1167 24.4493 15.25C24.0826 14.3833 23.5826 13.6333 22.9493 13C22.316 12.3667 21.566 11.8667 20.6993 11.5C19.8326 11.1333 18.9243 10.95 17.9743 10.95C17.0243 10.95 16.116 11.1333 15.2493 11.5C14.3826 11.8667 13.6326 12.3667 12.9993 13C12.366 13.6333 11.866 14.3833 11.4993 15.25C11.1326 16.1167 10.9493 17.025 10.9493 17.975ZM14.0743 17.975C14.0743 16.8917 14.4493 15.975 15.1993 15.225C15.9493 14.475 16.8743 14.0917 17.9743 14.075C19.0743 14.0583 19.991 14.4417 20.7243 15.225C21.4576 16.0083 21.841 16.925 21.8743 17.975C21.8743 19.0583 21.491 19.975 20.7243 20.725C19.9576 21.475 19.041 21.8583 17.9743 21.875C16.9076 21.8917 15.9826 21.5083 15.1993 20.725C14.416 19.9417 14.041 19.025 14.0743 17.975ZM17.1993 17.975C17.1993 18.1917 17.2743 18.375 17.4243 18.525C17.5743 18.675 17.7576 18.75 17.9743 18.75H19.5243C19.741 18.75 19.9243 18.675 20.0743 18.525C20.2243 18.375 20.3076 18.1917 20.3243 17.975C20.341 17.7583 20.2576 17.575 20.0743 17.425C19.891 17.275 19.7076 17.2 19.5243 17.2H18.7493V16.425C18.7493 16.2083 18.6743 16.025 18.5243 15.875C18.3743 15.725 18.191 15.6417 17.9743 15.625C17.7576 15.6083 17.5743 15.6917 17.4243 15.875C17.2743 16.0583 17.1993 16.2417 17.1993 16.425V17.975Z"/>
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'activityLogs', 'text-[#4D4F50]': activeLink !== 'activityLogs',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'activityLogs'}"
                       class="ml-2">Activity Logs</p>
                </a>

                <!-- Logout -->
                <a @click="activeLink = 'logOut'; activeChildLink = ''; localStorage.setItem('activeLink', 'logOut'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'logOut',
                    'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'logOut'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         :class="{ 'text-white': activeLink === 'logOut', 'text-[#4D4F50]': activeLink !== 'logOut',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'logOut'}"
                         class="w-5 h-5 fill-current">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'logOut', 'text-[#4D4F50]': activeLink !== 'logOut',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'logOut'}"
                       class="ml-2">Logout</p>
                </a>
            </nav>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header for large screens -->
            <header class="flex w-full my-6 mx-2">

                <h1 class="text-[22px] mt-2 font-semibold text-[#6AA76F]">{{$page_title}}</h1>
                <!--Search-->
                @if (in_array(Route::currentRouteName(), ['User.dashboard', 'User.activity-logs']))
                    <x-search-bar action="{{ route('search') }}" method="GET" placeholder="Search..." />
                @endif

                <div class="relative float-left flex ml-auto">

                    <div class="flex mr-auto">
                        <!-- Notification -->
                        <div x-data="{
                                tooltipVisible: false,
                                tooltipText: 'Notification',
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
                                    'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top',
                                    'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left',
                                    'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                                    'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right'
                                }" class="absolute w-auto text-sm" x-cloak>
                                <div x-show="tooltipVisible" x-transition class="relative px-2 py-1 text-white dark:bg-gray-800 rounded bg-opacity-90">
                                    <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap text-white"></p>
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
                                        }" class="w-1.5 h-1.5 transform dark:bg-gray-800 bg-opacity-90"></div>
                                    </div>
                                </div>
                            </div>

                            <!--Notification icon-->
                            <svg
                                x-ref="content"
                                @click="dropdownVisible = !dropdownVisible; activeLink = 'notifications'; localStorage.setItem('activeLink', 'notifications')"
                                :class="{ 'cursor-pointer rounded-[4px] text-[#6AA76F]': activeLink === 'notifications' }"
                                class="cursor-pointer fill-current text-customGreen hover:text-[#6AA76F] mt-[9px]"
                                xmlns="http://www.w3.org/2000/svg"
                                data-name="Layer 1"
                                width="22"
                                viewBox="0 0 24 24"
                                height="22"
                                preserveAspectRatio="xMidYMid meet"
                                version="1.0">
                                <path fill="fill-current" d="M4.068,18H19.724a3,3,0,0,0,2.821-4.021L19.693,6.094A8.323,8.323,0,0,0,11.675,0h0A8.321,8.321,0,0,0,3.552,6.516l-2.35,7.6A3,3,0,0,0,4.068,18Z"/>
                                <path fill="fill-current" d="M7.1,20a5,5,0,0,0,9.8,0Z"/>
                            </svg>

                            <!-- Dropdown Notification -->
                            <div x-show="dropdownVisible"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-100"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-1 mt-2 w-[350px] rounded-md shadow-xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                                 aria-orientation="vertical" aria-labelledby="notifications-info">

                                <div class="py-1 px-4 z-50">
                                    <h1 class="text-[14px] pt-4 pb-2 px-1 border-b-[#4AA76F] border-b-[2px] text-[#4AA76F] font-semibold">Notification</h1>

                                    <!-- Notification List -->
                                    <ul class="overflow-y-auto overflow-x-hidden max-h-[320px] mt-2 mb-10 space-y-2 px-2">
                                        <li class="block text-sm text-[#4D4F50]">
                                            <div class="hover:bg-gray-200 flex justify-between py-4 rounded-md bg-gray-100">
                                                <div class="flex pl-3 items-center space-x-3">
                                                    <!-- Notification Message Icon -->
                                                    <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                                        <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
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
                                    <a href="{{ route('User.notifications') }}"
                                       @click="activeLink = 'notifications'; isClicked = true; localStorage.setItem('activeLink', 'notifications')"
                                       class="flex justify-center items-center">
                                        <div class="fixed -mt-10 px-24 py-1 bg-[#4AA76F] text-sm text-white hover:bg-[#2AA76F] font-medium rounded-[4px]" role="menuitem">
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
                            class="relative mt-[4px] mr-5">

                            <!-- Tooltip -->
                            <div
                                x-ref="tooltip" x-show="tooltipVisible"
                                :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top',
                                        'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left',
                                        'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                                        'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right' }"
                                class="absolute w-auto text-sm transform transition-transform duration-150 ease-in-out"
                                x-cloak>
                                <div x-show="tooltipVisible" x-transition.scale.origin.top
                                     class="px-2 py-1 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg transform transition-transform duration-150 ease-in-out"
                                     style="animation: zoomIn 0.3s ease forwards;">
                                    <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap"></p>
                                    <div x-ref="tooltipArrow" x-show="tooltipArrow"
                                         :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top',
                                            'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left',
                                            'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom',
                                            'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right' }"
                                         class="absolute inline-flex items-center justify-center overflow-hidden">
                                        <div :class="{ 'origin-top-left -rotate-45' : tooltipPosition == 'top',
                                               'origin-top-left rotate-45' : tooltipPosition == 'left',
                                               'origin-bottom-left rotate-45' : tooltipPosition == 'bottom',
                                               'origin-top-right -rotate-45' : tooltipPosition == 'right' }"
                                             class="w-1.5 h-1.5 transform bg-white border border-[#4AA76F]"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Icon with Click and Bounce Microinteraction -->
                            <a x-ref="content"
                               href="{{ route('User.profile-settings') }}"
                               @click="activeLink = 'profile'; localStorage.setItem('activeLink', 'profile'); handleClick()"
                               :class="{ 'scale-105 animate-bounce-once': isClicked }"
                               class="-m-1.5 flex items-center p-1.5 transition-transform duration-150 ease-in-out transform"
                               id="profile">
                                <img class="h-8 w-8 rounded-full bg-gray-50 mr-2 border border-[#4AA76F]"
                                     src="{{ asset('storage/icons/profile2-graphics.png') }}"
                                     alt="Profile Picture">
                            </a>
                        </div>
                    </div>
                </div>

            </header>
            <!-- Content Area -->
            <main class="flex-1 rounded-md mx-1 mb-4 {{ ' '.$main_class }}">
                <!-- Main content here -->
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
