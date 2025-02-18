<!-- Hamburger Menu for Mobile -->
<div class="lg:hidden z-20">
    <button @click="toggleMobileSidebar"
            class="ml-2 fixed text-gray-700 mt-5 hover:bg-gray-200 flex items-center justified-center flex-col p-2 rounded-md">
        <div class="text-xs font-medium">Menu</div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" stroke-width="2"
             stroke="currentColor" class="w-6 h-6">
            <path
                d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
        </svg>
    </button>
</div>

<!-- Mobile Sidebar -->
<div x-cloak
     x-show="mobileOpen"
     @click.away="mobileOpen = false"
     class="fixed z-20 inset-0 bg-gray-800 bg-opacity-50 lg:hidden"
>
    <aside
        class="bg-[#FBFBFB] w-64 h-full py-4 rounded-xl drop-shadow-md transition-all duration-300 ease-in-out animate-wipe-right"
    >
        <div>
            <!-- X Button -->
            <button @click="mobileOpen = false"
                    class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Logo and Title -->
            <div class="text-2xl font-bold mb-2 flex flex-col items-center justify-center p-3">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                     class="w-10 h-10 inline-block mb-2"/>
                <div class="text-[#4D4F50] font-pop text-[17px]">iRoadCheck</div>
            </div>

            <!-- Custom Horizontal Line -->
            <div class="relative pb-[16px]">
                <div class="absolute w-full h-[1px] bg-gray-300"></div>
            </div>

            <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[65vh] px-4 leading-6 z-50">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('admin.dashboard') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Dashboard
                    </p>
                </a>
                <!-- Road Defect Reports -->
                <a href="{{ route('admin.road-defect-reports') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('admin.road-defect-reports') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 527 455"
                          class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('admin.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M164.541 227.5H109.499C101.414 227.5 94.8604 233.159 94.8604 240.139V360.461C94.8604 367.441 101.414 373.1 109.499 373.1H164.541C172.626 373.1 179.18 367.441 179.18 360.461V240.139C179.18 233.159 172.626 227.5 164.541 227.5Z"/>
                        <path d="M291.021 81.9004H235.979C227.894 81.9004 221.34 87.559 221.34 94.5393V360.462C221.34 367.442 227.894 373.1 235.979 373.1H291.021C299.106 373.1 305.66 367.442 305.66 360.462V94.5393C305.66 87.559 299.106 81.9004 291.021 81.9004Z"/>
                        <path d="M417.501 178.967H362.459C354.374 178.967 347.82 184.625 347.82 191.606V360.461C347.82 367.442 354.374 373.1 362.459 373.1H417.501C425.586 373.1 432.14 367.442 432.14 360.461V191.606C432.14 184.625 425.586 178.967 417.501 178.967Z"/>
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('admin.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Road Defect Reports
                    </p>
                </a>
                <!-- Manage Staffs -->
                <a href="{{ route('admin.manage-users-table') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('admin.manage-users-table') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('admin.manage-users-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('admin.manage-users-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Manage Staffs
                    </p>
                </a>
                <!-- staff Role -->
                <a href="{{ route('admin.staff-roles-table') }}" loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('admin.staff-roles-table') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('admin.staff-roles-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('admin.staff-roles-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Staff Role
                    </p>
                </a>
                <!-- Logs -->
                <div class=" relative" loading="lazy" >
                    <!-- Parent Navigation for Logs -->
                    <a @click="openLogs()" href="javascript:void(0)"
                       class="group flex items-center block py-2.5 px-5 rounded font-medium
                            {{ request()->routeIs('admin.admin-logs-table', 'admin.staff-logs-table', 'admin.resident-logs-table', 'admin.system-logs-table') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">

                        <!-- Icon always visible -->
                        <svg viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg" class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('admin.admin-logs-table') || request()->routeIs('admin.staff-logs-table') || request()->routeIs('admin.resident-logs-table') || request()->routeIs('admin.system-logs-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                            <path d="M-0.000703125 18.75C-0.000703125 19.1833 0.149297 19.5583 0.449297 19.875C0.749297 20.1917 1.1243 20.3417 1.5743 20.325H3.1243C3.1243 21.625 3.58263 22.725 4.4993 23.625C5.41596 24.525 6.5243 24.9833 7.8243 25H13.0493C11.9326 24.2167 11.0326 23.175 10.3493 21.875H7.8243C7.39096 21.875 7.01596 21.725 6.6993 21.425C6.38263 21.125 6.23263 20.7583 6.2493 20.325V4.7C6.2493 4.26667 6.3993 3.9 6.6993 3.6C6.9993 3.3 7.3743 3.14167 7.8243 3.125H20.3243C20.741 3.125 21.1076 3.28333 21.4243 3.6C21.741 3.91667 21.891 4.28333 21.8743 4.7V10.35C23.1743 11.0333 24.216 11.9333 24.9993 13.05V4.7C24.9993 3.4 24.541 2.29167 23.6243 1.375C22.7076 0.458333 21.6076 0 20.3243 0H7.8243C6.5243 0 5.41596 0.458333 4.4993 1.375C3.58263 2.29167 3.1243 3.4 3.1243 4.7H1.5743C1.14096 4.7 0.765964 4.85 0.449297 5.15C0.13263 5.45 -0.0173698 5.81667 -0.000703125 6.25C0.0159635 6.68333 0.165964 7.05833 0.449297 7.375C0.73263 7.69167 1.10763 7.84167 1.5743 7.825H3.1243V10.95H1.5743C1.14096 10.95 0.765964 11.1 0.449297 11.4C0.13263 11.7 -0.0173698 12.0667 -0.000703125 12.5C0.0159635 12.9333 0.165964 13.3083 0.449297 13.625C0.73263 13.9417 1.10763 14.0917 1.5743 14.075H3.1243V17.2H1.5743C1.14096 17.2 0.765964 17.35 0.449297 17.65C0.13263 17.95 -0.0173698 18.3167 -0.000703125 18.75ZM7.8243 18.75H9.4493C9.4493 18.7167 9.44096 18.6083 9.4243 18.425C9.40763 18.2417 9.39096 18.0917 9.3743 17.975C9.35763 17.8583 9.3743 17.7167 9.4243 17.55C9.4743 17.3833 9.48263 17.2667 9.4493 17.2H7.8243V18.75ZM7.8243 15.625H9.7493C9.8993 15.0583 10.0993 14.5417 10.3493 14.075H7.8243V15.625ZM7.8243 12.5H11.3993C11.916 11.8667 12.466 11.35 13.0493 10.95H7.8243V12.5ZM7.8243 9.375H20.3243V7.825H7.8243V9.375ZM7.8243 6.25H20.3243V4.7H7.8243V6.25ZM10.9493 17.975C10.9493 18.925 11.1326 19.8333 11.4993 20.7C11.866 21.5667 12.366 22.3167 12.9993 22.95C13.6326 23.5833 14.3826 24.0833 15.2493 24.45C16.116 24.8167 17.0243 25 17.9743 25C18.9243 25 19.8326 24.8167 20.6993 24.45C21.566 24.0833 22.316 23.5833 22.9493 22.95C23.5826 22.3167 24.0826 21.5667 24.4493 20.7C24.816 19.8333 24.9993 18.925 24.9993 17.975C24.9993 17.025 24.816 16.1167 24.4493 15.25C24.0826 14.3833 23.5826 13.6333 22.9493 13C22.316 12.3667 21.566 11.8667 20.6993 11.5C19.8326 11.1333 18.9243 10.95 17.9743 10.95C17.0243 10.95 16.116 11.1333 15.2493 11.5C14.3826 11.8667 13.6326 12.3667 12.9993 13C12.366 13.6333 11.866 14.3833 11.4993 15.25C11.1326 16.1167 10.9493 17.025 10.9493 17.975ZM14.0743 17.975C14.0743 16.8917 14.4493 15.975 15.1993 15.225C15.9493 14.475 16.8743 14.0917 17.9743 14.075C19.0743 14.0583 19.991 14.4417 20.7243 15.225C21.4576 16.0083 21.841 16.925 21.8743 17.975C21.8743 19.0583 21.491 19.975 20.7243 20.725C19.9576 21.475 19.041 21.8583 17.9743 21.875C16.9076 21.8917 15.9826 21.5083 15.1993 20.725C14.416 19.9417 14.041 19.025 14.0743 17.975ZM17.1993 17.975C17.1993 18.1917 17.2743 18.375 17.4243 18.525C17.5743 18.675 17.7576 18.75 17.9743 18.75H19.5243C19.741 18.75 19.9243 18.675 20.0743 18.525C20.2243 18.375 20.3076 18.1917 20.3243 17.975C20.341 17.7583 20.2576 17.575 20.0743 17.425C19.891 17.275 19.7076 17.2 19.5243 17.2H18.7493V16.425C18.7493 16.2083 18.6743 16.025 18.5243 15.875C18.3743 15.725 18.191 15.6417 17.9743 15.625C17.7576 15.6083 17.5743 15.6917 17.4243 15.875C17.2743 16.0583 17.1993 16.2417 17.1993 16.425V17.975Z"/>
                        </svg>
                        <!-- Text only when expanded -->
                        <p class="ml-2 mr-auto
                            {{ request()->routeIs('admin.admin-logs-table') || request()->routeIs('admin.staff-logs-table') || request()->routeIs('admin.resident-logs-table') || request()->routeIs('admin.system-logs-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                            Logs
                        </p>
                        <svg :class="{ 'rotate-180': isOpen }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                             class="lazyload w-3 h-3 transform transition-transform
                                {{ request()->routeIs('admin.admin-logs-table') || request()->routeIs('admin.staff-logs-table') || request()->routeIs('admin.resident-logs-table') || request()->routeIs('admin.system-logs-table') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>

                    <!-- Child Navigation for Logs -->
                    <div x-show="isOpen" class="ml-8 mt-2 space-y-2">
                        <a href="{{ route('admin.admin-logs-table') }}"
                           class=" block py-2 px-5
                                {{ request()->routeIs('admin.admin-logs-table') ? 'text-green-600 font-bold border-l-4 border-[#4AA76F]' : 'text-[#4D4F50] hover:text-green-600 hover:font-semibold hover:border-l-4 hover:border-[#4AA76F] transition duration-200 ease-in-out ' }}">
                            Admin Logs
                        </a>
                        <a href="{{ route('admin.staff-logs-table') }}"
                           class=" block py-2 px-5
                                {{ request()->routeIs('admin.staff-logs-table') ? 'text-green-600 font-bold border-l-4 border-[#4AA76F]' : 'text-[#4D4F50] hover:text-green-600 hover:font-semibold hover:border-l-4 hover:border-[#4AA76F] transition duration-200 ease-in-out ' }}">
                            Staff Logs
                        </a>
                        <a href="{{ route('admin.resident-logs-table') }}"
                           class=" block py-2 px-5
                                {{ request()->routeIs('admin.resident-logs-table') ? 'text-green-600 font-bold border-l-4 border-[#4AA76F]' : 'text-[#4D4F50] hover:text-green-600 hover:font-semibold hover:border-l-4 hover:border-[#4AA76F] transition duration-200 ease-in-out ' }}">
                            Resident Logs
                        </a>
                        <a href="{{ route('admin.system-logs-table') }}"
                           class=" block py-2 px-5
                                {{ request()->routeIs('admin.system-logs-table') ? 'text-green-600 font-bold border-l-4 border-[#4AA76F]' : 'text-[#4D4F50] hover:text-green-600 hover:font-semibold hover:border-l-4 hover:border-[#4AA76F] transition duration-200 ease-in-out ' }}">
                            System Logs
                        </a>
                    </div>
                </div>
                <!-- Logout Button -->
                <a href="javascript:void(0);"
                   @click="logout"
                   class="group flex items-center block py-2.5 px-5 rounded hover:text-[#4AA76F] hover:shadow-md font-medium text-[#4D4F50]">

                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         class="w-5 h-5 fill-current">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>

                    <!-- Text -->
                    <p class="ml-2">Logout</p>
                </a>
            </nav>
        </div>
    </aside>
</div>
