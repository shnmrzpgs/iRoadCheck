@props(['page_title' => '','action' => '', 'placeholder' => '', 'name' => '', 'main_class' => ''])

<div class="bg-none ml-4 mr-2 mt-0 pt-3 font-pop text-white 0 p-0 "
     x-data="{
        open: false,
        activeLink: localStorage.getItem('activeLink') || '',
        activeChildLink: localStorage.getItem('activeChildLink') || '',
        expanded: JSON.parse(localStorage.getItem('sidebarExpanded')) ?? true,
        mobileOpen: false,
        toggleSidebar() {
        this.expanded = !this.expanded;
        localStorage.setItem('sidebarExpanded', JSON.stringify(this.expanded));
        },
        toggleMobileSidebar() {
        this.mobileOpen = !this.mobileOpen;
        }
     }">

    <div class="flex">

        <!-- Web screens Sidebar -->
        <aside
            :class="expanded ? 'w-64' : 'w-24'"
            class="bg-[#FBFBFB] hidden h-[96vh] py-4 lg:block rounded-xl mr-5 drop-shadow-md transition-all duration-300 ease-in-out">

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

            <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[80vh] px-4 leading-6">

                <!-- Dashboard -->
                <a href="{{ route('Staff.dashboard') }}"
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
                <a href="{{ route('Staff.manage-tagging') }}"
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
                <a href="{{ route('Staff.reports') }}"
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

                <!-- Report Road Issue-->
                <a href="{{ route('Staff.report-road-issue') }}"
                   @click="activeLink = 'reportRoadIssue'; activeChildLink = ''; localStorage.setItem('activeLink', 'reportRoadIssue'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'reportRoadIssue',
                   'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'reportRoadIssue'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                          :class="{ 'text-white': activeLink === 'reportRoadIssue', 'text-[#4D4F50]': activeLink !== 'reportRoadIssue',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'reportRoadIssue'}"
                          class="w-5 h-5 fill-current">>
                        <path fill="currentColor"  fill-rule="nonzero" d="M9 7.6875C9.31065 7.6875 9.5625 7.93935 9.5625 8.25V9.1875H10.5C10.8107 9.1875 11.0625 9.43935 11.0625 9.75C11.0625 10.0607 10.8107 10.3125 10.5 10.3125H9.5625V11.25C9.5625 11.5607 9.31065 11.8125 9 11.8125C8.68935 11.8125 8.4375 11.5607 8.4375 11.25V10.3125H7.5C7.18934 10.3125 6.9375 10.0607 6.9375 9.75C6.9375 9.43935 7.18934 9.1875 7.5 9.1875H8.4375V8.25C8.4375 7.93935 8.68935 7.6875 9 7.6875Z"/>
                        <path fill="currentColor" fill-rule="nonzero" d="M7.33333 15.75H10.6666C13.0075 15.75 14.1778 15.75 15.0186 15.1985C15.3825 14.9597 15.695 14.6528 15.9382 14.2955C16.5 13.4701 16.5 12.3209 16.5 10.0227C16.5 7.72455 16.5 6.57541 15.9382 5.74995C15.695 5.39261 15.3825 5.08578 15.0186 4.84701C14.4783 4.4926 13.802 4.36592 12.7665 4.32064C12.2723 4.32064 11.8469 3.95301 11.75 3.47727C11.6046 2.76367 10.9664 2.25 10.2253 2.25H7.77472C7.03354 2.25 6.39536 2.76367 6.25 3.47727C6.15309 3.95301 5.72764 4.32064 5.2335 4.32064C4.198 4.36592 3.52166 4.4926 2.98143 4.84701C2.61746 5.08578 2.30496 5.39261 2.06177 5.74995C1.5 6.57541 1.5 7.72455 1.5 10.0227C1.5 12.3209 1.5 13.4701 2.06177 14.2955C2.30496 14.6528 2.61746 14.9597 2.98143 15.1985C3.82218 15.75 4.99256 15.75 7.33333 15.75ZM12 9.75C12 11.4068 10.6568 12.75 9 12.75C7.34314 12.75 6 11.4068 6 9.75C6 8.09318 7.34314 6.75 9 6.75C10.6568 6.75 12 8.09318 12 9.75ZM13.5 6.9375C13.1893 6.9375 12.9375 7.18934 12.9375 7.5C12.9375 7.81065 13.1893 8.0625 13.5 8.0625H14.25C14.5606 8.0625 14.8125 7.81065 14.8125 7.5C14.8125 7.18934 14.5606 6.9375 14.25 6.9375H13.5Z" />
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'reportRoadIssue', 'text-[#4D4F50]': activeLink !== 'reportRoadIssue',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'reportRoadIssue'}"
                       class="ml-2">Report Road Issue</p>
                </a>

                <!-- Suggestion Reports -->
                <a href="{{ route('Staff.suggestion-reports') }}"
                   @click="activeLink = 'suggestionReports'; activeChildLink = ''; localStorage.setItem('activeLink', 'suggestionReports'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'suggestionReports',
                   'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'suggestionReports'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                          :class="{ 'text-white': activeLink === 'suggestionReports', 'text-[#4D4F50]': activeLink !== 'suggestionReports',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'suggestionReports'}"
                          class="w-5 h-5 fill-current">
                        <path  fill="currentColor" d="M16 6.5C16 10.0906 12.4187 13 8 13C7.01562 13 6.07187 12.8562 5.2 12.5906L0.5 14L1.77813 10.5875C0.665625 9.47187 0 8.05 0 6.5C0 2.90937 3.58125 0 8 0C12.4187 0 16 2.90937 16 6.5ZM11.5312 5.03125L12.0625 4.5L11 3.44063L10.4688 3.97188L7 7.44063L5.53125 5.97188L5 5.44063L3.94062 6.5L4.47188 7.03125L6.47188 9.03125L7.00313 9.5625L7.53438 9.03125L11.5312 5.03125Z"/>
                    </svg>

                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'suggestionReports', 'text-[#4D4F50]': activeLink !== 'suggestionReports',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'suggestionReports'}"
                       class="ml-2">Suggestion Reports</p>
                </a>

                <!-- Report History -->
                <a href="{{ route('Staff.report-history') }}"
                   @click="activeLink = 'reportHistory'; activeChildLink = ''; localStorage.setItem('activeLink', 'reportHistory'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'reportHistory',
                    'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'reportHistory'}"
                   class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                    <!-- Icon always visible -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         :class="{ 'text-white': activeLink === 'reportHistory', 'text-[#4D4F50]': activeLink !== 'reportHistory',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'reportHistory'}"
                         class="w-5 h-5 fill-current">
                        <path fill="currentColor" d="M7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0ZM6.79688 3.51562V7.28613L5.03906 9.92285L4.64941 10.5088L5.81836 11.2881L6.20801 10.7021L8.08301 7.88965L8.2002 7.71387V7.5V3.51562V2.8125H6.79395V3.51562H6.79688Z"/>
                    </svg>


                    <!-- Text only when expanded -->
                    <p x-show="expanded"
                       :class="{ 'text-white': activeLink === 'reportHistory', 'text-[#4D4F50]': activeLink !== 'reportHistory',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'reportHistory'}"
                       class="ml-2">Report History</p>
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

        <!-- Hamburger Menu for Mobile -->
        <div class="lg:hidden">
            <button @click="toggleMobileSidebar" class="text-gray-700 mt-5 hover:bg-gray-200 flex items-center justified-center flex-col p-2 rounded-md">
                <div class="text-xs">Menu</div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Sidebar -->
        <div
            x-show="mobileOpen"
            @click.away="mobileOpen = false"
            class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 lg:hidden"
        >
            <aside
                class="bg-[#FBFBFB] w-64 h-full py-4 rounded-xl drop-shadow-md transition-all duration-300 ease-in-out animate-wipe-right"
            >
                <div>
                    <!-- X Button -->
                    <button @click="mobileOpen = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Logo and Title -->
                    <div class="text-2xl font-bold mb-2 flex flex-col items-center justify-center p-3">
                        <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block mb-2" />
                        <div class="text-[#4D4F50] font-pop text-[17px]">iRoadCheck</div>
                    </div>

                    <!-- Custom Horizontal Line -->
                    <div class="relative pb-[16px]">
                        <div class="absolute w-full h-[1px] bg-gray-300"></div>
                    </div>
                    <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[80vh] px-4 leading-6">

                            <!-- Dashboard -->
                            <a href="{{ route('Staff.dashboard') }}"
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
                        <a href="{{ route('Staff.manage-tagging') }}"
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
                        <a href="{{ route('Staff.reports') }}"
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

                        <!-- Report Road Issue-->
                        <a href="{{ route('Staff.report-road-issue') }}"
                           @click="activeLink = 'reportRoadIssue'; activeChildLink = ''; localStorage.setItem('activeLink', 'reportRoadIssue'); localStorage.setItem('activeChildLink', '')"
                           :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'reportRoadIssue',
                            'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'reportRoadIssue'}"
                           class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                            <!-- Icon always visible -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 :class="{ 'text-white': activeLink === 'reportRoadIssue', 'text-[#4D4F50]': activeLink !== 'reportRoadIssue',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'reportRoadIssue'}"
                                 class="w-5 h-5 fill-current">>
                                <path fill="currentColor"  fill-rule="nonzero" d="M9 7.6875C9.31065 7.6875 9.5625 7.93935 9.5625 8.25V9.1875H10.5C10.8107 9.1875 11.0625 9.43935 11.0625 9.75C11.0625 10.0607 10.8107 10.3125 10.5 10.3125H9.5625V11.25C9.5625 11.5607 9.31065 11.8125 9 11.8125C8.68935 11.8125 8.4375 11.5607 8.4375 11.25V10.3125H7.5C7.18934 10.3125 6.9375 10.0607 6.9375 9.75C6.9375 9.43935 7.18934 9.1875 7.5 9.1875H8.4375V8.25C8.4375 7.93935 8.68935 7.6875 9 7.6875Z"/>
                                <path fill="currentColor" fill-rule="nonzero" d="M7.33333 15.75H10.6666C13.0075 15.75 14.1778 15.75 15.0186 15.1985C15.3825 14.9597 15.695 14.6528 15.9382 14.2955C16.5 13.4701 16.5 12.3209 16.5 10.0227C16.5 7.72455 16.5 6.57541 15.9382 5.74995C15.695 5.39261 15.3825 5.08578 15.0186 4.84701C14.4783 4.4926 13.802 4.36592 12.7665 4.32064C12.2723 4.32064 11.8469 3.95301 11.75 3.47727C11.6046 2.76367 10.9664 2.25 10.2253 2.25H7.77472C7.03354 2.25 6.39536 2.76367 6.25 3.47727C6.15309 3.95301 5.72764 4.32064 5.2335 4.32064C4.198 4.36592 3.52166 4.4926 2.98143 4.84701C2.61746 5.08578 2.30496 5.39261 2.06177 5.74995C1.5 6.57541 1.5 7.72455 1.5 10.0227C1.5 12.3209 1.5 13.4701 2.06177 14.2955C2.30496 14.6528 2.61746 14.9597 2.98143 15.1985C3.82218 15.75 4.99256 15.75 7.33333 15.75ZM12 9.75C12 11.4068 10.6568 12.75 9 12.75C7.34314 12.75 6 11.4068 6 9.75C6 8.09318 7.34314 6.75 9 6.75C10.6568 6.75 12 8.09318 12 9.75ZM13.5 6.9375C13.1893 6.9375 12.9375 7.18934 12.9375 7.5C12.9375 7.81065 13.1893 8.0625 13.5 8.0625H14.25C14.5606 8.0625 14.8125 7.81065 14.8125 7.5C14.8125 7.18934 14.5606 6.9375 14.25 6.9375H13.5Z" />
                            </svg>

                            <!-- Text only when expanded -->
                            <p x-show="expanded"
                               :class="{ 'text-white': activeLink === 'reportRoadIssue', 'text-[#4D4F50]': activeLink !== 'reportRoadIssue',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'reportRoadIssue'}"
                               class="ml-2">Report Road Issue</p>
                        </a>

                        <!-- Suggestion Reports -->
                        <a href="{{ route('Staff.suggestion-reports') }}"
                           @click="activeLink = 'suggestionReports'; activeChildLink = ''; localStorage.setItem('activeLink', 'suggestionReports'); localStorage.setItem('activeChildLink', '')"
                           :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'suggestionReports',
                   'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'suggestionReports'}"
                           class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                            <!-- Icon always visible -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 :class="{ 'text-white': activeLink === 'suggestionReports', 'text-[#4D4F50]': activeLink !== 'suggestionReports',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'suggestionReports'}"
                                 class="w-5 h-5 fill-current">
                                <path  fill="currentColor" d="M16 6.5C16 10.0906 12.4187 13 8 13C7.01562 13 6.07187 12.8562 5.2 12.5906L0.5 14L1.77813 10.5875C0.665625 9.47187 0 8.05 0 6.5C0 2.90937 3.58125 0 8 0C12.4187 0 16 2.90937 16 6.5ZM11.5312 5.03125L12.0625 4.5L11 3.44063L10.4688 3.97188L7 7.44063L5.53125 5.97188L5 5.44063L3.94062 6.5L4.47188 7.03125L6.47188 9.03125L7.00313 9.5625L7.53438 9.03125L11.5312 5.03125Z"/>
                            </svg>

                            <!-- Text only when expanded -->
                            <p x-show="expanded"
                               :class="{ 'text-white': activeLink === 'suggestionReports', 'text-[#4D4F50]': activeLink !== 'suggestionReports',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'suggestionReports'}"
                               class="ml-2">Suggestion Reports</p>
                        </a>

                        <!-- Report History -->
                        <a href="{{ route('Staff.report-history') }}"
                           @click="activeLink = 'reportHistory'; activeChildLink = ''; localStorage.setItem('activeLink', 'reportHistory'); localStorage.setItem('activeChildLink', '')"
                           :class="{ 'bg-[#4AA76F] text-white shadow-md font-bold duration-300 ease-in-out': activeLink === 'reportHistory',
                    'group-hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md': activeLink !== 'reportHistory'}"
                           class="group mx-2 flex items-center block py-2.5 px-4 rounded font-medium text-[#4D4F50] hover:text-[#4AA76F]">

                            <!-- Icon always visible -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 :class="{ 'text-white': activeLink === 'reportHistory', 'text-[#4D4F50]': activeLink !== 'reportHistory',
                          'group-hover:text-[#4AA76F] group-hover:scale-105 duration-200 ease-in-out' : activeLink !== 'reportHistory'}"
                                 class="w-5 h-5 fill-current">
                                <path fill="currentColor" d="M7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0ZM6.79688 3.51562V7.28613L5.03906 9.92285L4.64941 10.5088L5.81836 11.2881L6.20801 10.7021L8.08301 7.88965L8.2002 7.71387V7.5V3.51562V2.8125H6.79395V3.51562H6.79688Z"/>
                            </svg>


                            <!-- Text only when expanded -->
                            <p x-show="expanded"
                               :class="{ 'text-white': activeLink === 'reportHistory', 'text-[#4D4F50]': activeLink !== 'reportHistory',
                          'group-hover:text-[#4AA76F] group-hover:font-semibold duration-200 ease-in-out': activeLink !== 'reportHistory'}"
                               class="ml-2">Report History</p>
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
                </div>
            </aside>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col" x-data="{ isClicked: false }"
        >
            <!-- Header-->
            <header class="flex w-full lg:my-6 my-4 mx-2">

                <div class="lg:flex lg:items-start lg:justified-start lg:ml-0 lg:mr-auto lg:flex-row flex flex-col items-center justify-center mx-auto ">
                    <h1 class="lg:text-[22px] text-md md:text-lg mt-1 font-semibold text-[#4AA76F]">{{$page_title}}</h1>

                    <!-- Search Bar -->
                    <div class="flex mt-2 lg:mt-0 w-60 lg:w-80 items-center px-0 lg:px-5">
                        <form class="relative flex flex-1 h-8 rounded-full border-[#F8F7F7]" action="{{ $action ?? '#' }}" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#4AA76F" aria-hidden="false">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                            <input id="search-field"
                                   class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] drop-shadow-md focus:bg-white bg-white rounded-full border-none block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 text-xs lg:text-[14px]"
                                   wire:model="userSearch" placeholder="{{ $placeholder ?? 'Search' }}" type="search" name="{{ $name ?? 'search' }}" value="{{ request($name ?? 'search') }}">
                        </form>

                    </div>
                </div>
                <div class="flex">
                    <!-- Notifications -->
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
                                    'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top',
                                    'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left',
                                    'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                                    'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right'
                                }" class="absolute w-auto text-sm" x-cloak>
                            <div x-show="tooltipVisible" x-transition
                                 class="relative px-2 py-1 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg bg-opacity-100">
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

                        <!--Notifications icon-->
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

                        <!-- Dropdown Notifications -->
                        <div x-show="dropdownVisible"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-100"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-1 mt-2 w-[350px] rounded-md shadow-[0px_5px_40px_rgba(0,0,0,0.3)]  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                             aria-orientation="vertical" aria-labelledby="notifications-info">

                            <div class="py-1 px-4 z-50">
                                <h1 class="text-[14px] pt-4 pb-2 px-1 border-b-[#4AA76F] border-b-[2px] text-[#4AA76F] font-semibold">Notifications</h1>

                                <!-- Notifications List -->
                                <ul class="overflow-y-auto overflow-x-hidden max-h-[320px] mt-2 mb-10 space-y-2 px-2">
                                    <li class="block text-sm text-[#4D4F50]">
                                        <div class="hover:bg-gray-200 flex justify-between py-4 rounded-md bg-gray-100">
                                            <div class="flex pl-3 items-center space-x-3">
                                                <!-- Notifications Message Icon -->
                                                <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                                    <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                                                </div>
                                                <!-- Notifications Message -->
                                                <div class="text-[12px] text-[#474747] font-semibold">
                                                    <span>Successfully</span>
                                                    <span>add Users</span>
                                                </div>
                                            </div>

                                            <!-- Time of Notifications Message -->
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
                                <a href="{{ route('Staff.notifications') }}"
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
                        <div x-ref="tooltip" x-show="tooltipVisible" :class="{
                                    'top-0 left-1/2 -translate-x-1/2 -mt-2 -translate-y-full' : tooltipPosition == 'top',
                                    'top-1/2 -translate-y-1/2 -ml-1 left-0 -translate-x-full' : tooltipPosition == 'left',
                                    'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom',
                                    'top-1/2 -translate-y-1/2 -mr-1 right-0 translate-x-full' : tooltipPosition == 'right'
                                }" class="absolute w-auto text-sm" x-cloak>
                            <div x-show="tooltipVisible" x-transition
                                 class="relative px-2 py-1 rounded bg-white text-[#4AA76F] border border-[#4AA76F] shadow-lg bg-opacity-100">
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

                        <!-- Profile Icon with Click and Bounce Microinteraction -->
                        <a x-ref="content"
                           href="{{ route('Staff.profile-settings') }}"
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
            </header>

            <!-- Content Area -->
            <main class="flex-1 rounded-md lg:mx-1 mb-4 -ml-12 pr-5 {{ ' '.$main_class }}">
                <!-- Main content here -->
                {{ $slot }}
            </main>

        </div>
    </div>
</div>
