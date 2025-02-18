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
                <a href="{{ route('staff.dashboard') }}" loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.dashboard') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Dashboard
                    </p>
                </a>
                <!-- Manage Tagging -->
                <a href="{{ route('staff.manage-tagging') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.manage-tagging') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.manage-tagging') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3L576 152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6L416 503zM15.1 187.3C6 191 0 199.8 0 209.6L0 480.4c0 17 17.1 28.6 32.9 22.3L160 451.8l0-251.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77l0 194.4 192 54.9L384 255z"/>
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.manage-tagging') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Manage Tagging
                    </p>
                </a>
                <!-- Road Defect Reports -->
                <a href="{{ route('staff.road-defect-reports') }}" loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.road-defect-reports') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 527 455"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M164.541 227.5H109.499C101.414 227.5 94.8604 233.159 94.8604 240.139V360.461C94.8604 367.441 101.414 373.1 109.499 373.1H164.541C172.626 373.1 179.18 367.441 179.18 360.461V240.139C179.18 233.159 172.626 227.5 164.541 227.5Z"/>
                        <path d="M291.021 81.9004H235.979C227.894 81.9004 221.34 87.559 221.34 94.5393V360.462C221.34 367.442 227.894 373.1 235.979 373.1H291.021C299.106 373.1 305.66 367.442 305.66 360.462V94.5393C305.66 87.559 299.106 81.9004 291.021 81.9004Z"/>
                        <path d="M417.501 178.967H362.459C354.374 178.967 347.82 184.625 347.82 191.606V360.461C347.82 367.442 354.374 373.1 362.459 373.1H417.501C425.586 373.1 432.14 367.442 432.14 360.461V191.606C432.14 184.625 425.586 178.967 417.501 178.967Z"/>
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Road Defect Reports
                    </p>
                </a>
                <!-- Capture Road Defect -->
                <a href="{{ route('staff.capture-road-defect') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.capture-road-defect') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.capture-road-defect') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path fill="currentColor"  fill-rule="nonzero" d="M9 7.6875C9.31065 7.6875 9.5625 7.93935 9.5625 8.25V9.1875H10.5C10.8107 9.1875 11.0625 9.43935 11.0625 9.75C11.0625 10.0607 10.8107 10.3125 10.5 10.3125H9.5625V11.25C9.5625 11.5607 9.31065 11.8125 9 11.8125C8.68935 11.8125 8.4375 11.5607 8.4375 11.25V10.3125H7.5C7.18934 10.3125 6.9375 10.0607 6.9375 9.75C6.9375 9.43935 7.18934 9.1875 7.5 9.1875H8.4375V8.25C8.4375 7.93935 8.68935 7.6875 9 7.6875Z"/>
                        <path fill="currentColor" fill-rule="nonzero" d="M7.33333 15.75H10.6666C13.0075 15.75 14.1778 15.75 15.0186 15.1985C15.3825 14.9597 15.695 14.6528 15.9382 14.2955C16.5 13.4701 16.5 12.3209 16.5 10.0227C16.5 7.72455 16.5 6.57541 15.9382 5.74995C15.695 5.39261 15.3825 5.08578 15.0186 4.84701C14.4783 4.4926 13.802 4.36592 12.7665 4.32064C12.2723 4.32064 11.8469 3.95301 11.75 3.47727C11.6046 2.76367 10.9664 2.25 10.2253 2.25H7.77472C7.03354 2.25 6.39536 2.76367 6.25 3.47727C6.15309 3.95301 5.72764 4.32064 5.2335 4.32064C4.198 4.36592 3.52166 4.4926 2.98143 4.84701C2.61746 5.08578 2.30496 5.39261 2.06177 5.74995C1.5 6.57541 1.5 7.72455 1.5 10.0227C1.5 12.3209 1.5 13.4701 2.06177 14.2955C2.30496 14.6528 2.61746 14.9597 2.98143 15.1985C3.82218 15.75 4.99256 15.75 7.33333 15.75ZM12 9.75C12 11.4068 10.6568 12.75 9 12.75C7.34314 12.75 6 11.4068 6 9.75C6 8.09318 7.34314 6.75 9 6.75C10.6568 6.75 12 8.09318 12 9.75ZM13.5 6.9375C13.1893 6.9375 12.9375 7.18934 12.9375 7.5C12.9375 7.81065 13.1893 8.0625 13.5 8.0625H14.25C14.5606 8.0625 14.8125 7.81065 14.8125 7.5C14.8125 7.18934 14.5606 6.9375 14.25 6.9375H13.5Z" />
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.capture-road-defect') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Capture Road Defect
                    </p>
                </a>
                <!-- Suggestion Reports -->
                <a href="{{ route('staff.suggestion-reports') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.suggestion-reports') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         class="lazyload w-5 h-5 fill-current mt-1.5
                        {{ request()->routeIs('staff.suggestion-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path  fill="currentColor" d="M16 6.5C16 10.0906 12.4187 13 8 13C7.01562 13 6.07187 12.8562 5.2 12.5906L0.5 14L1.77813 10.5875C0.665625 9.47187 0 8.05 0 6.5C0 2.90937 3.58125 0 8 0C12.4187 0 16 2.90937 16 6.5ZM11.5312 5.03125L12.0625 4.5L11 3.44063L10.4688 3.97188L7 7.44063L5.53125 5.97188L5 5.44063L3.94062 6.5L4.47188 7.03125L6.47188 9.03125L7.00313 9.5625L7.53438 9.03125L11.5312 5.03125Z"/>
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.suggestion-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Suggestion Reports
                    </p>
                </a>
                <!-- Report History -->
                <a href="{{ route('staff.report-history') }}" loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.report-history') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         class="lazyload w-5 h-5 fill-current mt-1.5
                        {{ request()->routeIs('staff.report-history') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path fill="currentColor" d="M7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0ZM6.79688 3.51562V7.28613L5.03906 9.92285L4.64941 10.5088L5.81836 11.2881L6.20801 10.7021L8.08301 7.88965L8.2002 7.71387V7.5V3.51562V2.8125H6.79395V3.51562H6.79688Z"/>
                    </svg>
                    <p class="ml-2
                        {{ request()->routeIs('staff.report-history') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Report History
                    </p>
                </a>

                <!-- Logout Button -->
                <a href="javascript:void(0);"
                   @click="logoutStaff"
                   class="group flex items-center block py-2.5 px-5 rounded hover:text-[#4AA76F] hover:shadow-md font-medium text-[#4D4F50]">

                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         class="w-5 h-5 fill-current">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>

                    <!-- Text -->
                    <p  class="ml-2">Logout</p>
                </a>
            </nav>
        </div>
    </aside>
</div>
