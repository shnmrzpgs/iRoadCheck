@props(['page_title' => '', 'main_class' => ''])

<div class="bg-none m-2 font-pop text-white 0 p-0 " x-data="{ open: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }">
    <!-- Header with Menu Button for small screen -->
    <header class="p-4 flex items-start justify-start md:hidden mb-2 rounded-md">
        <!--Menu Icon-->
        <button @click="open = !open" class="text-red focus:outline-none mr-2">
            <svg width="22" height="22" viewBox="0 0 28 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0V3.5868H27.0833V0H0ZM0 10.6528V14.2396H27.0833V10.6528H0ZM0 21.4132V25H27.0833V21.4132H0Z" fill="#E37878" />
            </svg>
        </button>
        <!--Page title-->
        <h1 class="text-[16px] font-bold">{{ $page_title }}</h1>
    </header>
    <div class="flex h-[97vh]">
        <!-- Sidebar -->
        <aside :class="open ? 'block' : 'hidden md:block'" class="w-64 bg-[#202020] h-full py-4 pl-4 pr-2 md:block rounded-lg mr-3 pb-[8px]">
            <div class="text-2xl font-bold mb-4 flex items-center px-3">
                <img src="{{ asset('storage/images/ElibLogoGraphics.png') }}" alt="graphicsLogo" class="w-12 h-12 inline-block -mt-2" />
                <span>
                    <img src="{{ asset('storage/images/ElibLogoWord.png') }}" alt="wordLogo" class="w-full h-[45px] inline-block opacity-80" />
                </span>
            </div>
            <nav class="space-y-2 flex-1 text-[13px] overflow-x-auto h-[76vh]" x-data="{
                    activeLink: localStorage.getItem('activeLink') || '',
                    activeChildLink: localStorage.getItem('activeChildLink') || ''
                }">
                <!-- Dashboard -->
                <a href=""
                   @click="activeLink = 'dashboard'; activeChildLink = ''; localStorage.setItem('activeLink', 'dashboard'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#2D2D2D] bg-opacity-40 border-l-[#E37878] border-l-[5px] font-bold': activeLink === 'dashboard' }"
                   class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#2D2D2D] hover:bg-opacity-40 hover:border-l-[#E37878] hover:border-l-[5px]">
                    <img src="{{ asset('storage/icons/home-icon.png') }}" alt="home icon" class="w-4 h-4" />
                    <p class="ml-2">Dashboard</p>
                </a>

                <!-- Client -->
                <div class="relative" x-data="{ dropdownOpen: false }" x-init="dropdownOpen = activeLink === 'client'">
                    <!-- Parent -->
                    <a href="#"
                       @click="dropdownOpen = !dropdownOpen; activeLink = 'client'; localStorage.setItem('activeLink', 'client')"
                       :class="{ 'bg-[#2D2D2D] bg-opacity-40 border-l-[#E37878] border-l-[5px] font-bold': activeLink === 'client' || activeChildLink.startsWith('client-') }"
                       class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#2D2D2D] hover:border-l-[#E37878] hover:border-l-[5px]">
                        <img src="{{ asset('storage/icons/client-icon.png') }}" alt="client icon" class="w-4 h-4" />
                        <p class="ml-2 mr-auto">Client Account</p>
                        <svg class="w-3 h-3 transform transition-transform" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <!-- Child -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="bg-none ml-4 mt-2 rounded mx-2">
                        <a href=""
                           @click="activeChildLink = 'client-student-accounts'; localStorage.setItem('activeChildLink', 'client-student-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-student-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Student Accounts </a>
                        <a href=""
                           @click="activeChildLink = 'client-guest-accounts'; localStorage.setItem('activeChildLink', 'client-guest-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-guest-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Guest Accounts </a>
                        <a href=""
                           @click="activeChildLink = 'client-block-student-accounts'; localStorage.setItem('activeChildLink', 'client-block-student-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-block-student-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Block Student Accounts </a>
                        <a href=""
                           @click="activeChildLink = 'client-block-guest-accounts'; localStorage.setItem('activeChildLink', 'client-block-guest-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-block-guest-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Block Guest Accounts </a>
                        <a href=""
                           @click="activeChildLink = 'client-archived-student-accounts'; localStorage.setItem('activeChildLink', 'client-archived-student-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-archived-student-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Archived Students </a>
                        <a href=""
                           @click="activeChildLink = 'client-archived-guest-accounts'; localStorage.setItem('activeChildLink', 'client-archived-guest-accounts')"
                           :class="{ 'text-[#E37878] text-[14px] bg-opacity-40 font-bold': activeChildLink === 'client-archived-guest-accounts' }"
                           class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#2D2D2D] hover:text-[#E37878]"> Archived Guests </a>
                    </div>
                </div>

                <!-- Custom Horizontal Line -->
                <div class="relative pb-[15px] mt-6 mx-2">
                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1/4 h-[1px] bg-gradient-to-r from-transparent to-white"></div>
                    <div class="absolute left-1/4 top-1/2 transform -translate-y-1/2 w-2/4 h-[1px] bg-white"></div>
                    <div class="absolute right-0 top-1/2 transform -translate-y-1/2 w-1/4 h-[1px] bg-gradient-to-l from-transparent to-white"></div>
                </div>
                <!-- Logout -->
                <div class="pt-2 text-[13px] mx-2">
                    <a href="" @click="activeLink = 'logout'" :class="{ 'bg-[#2D2D2D] bg-opacity-40 border-l-[#E37878] border-l-[5px]': activeLink === 'logout' }" class="flex items-center py-2.5 px-4 rounded hover:bg-[#2D2D2D] hover:bg-opacity-40 hover:border-l-[#E37878] hover:border-l-[5px]">
                        <img src="{{ asset('storage/icons/logOut-icon.png') }}" alt="logOut icon" class="w-5 h-5 " />
                        <p class="ml-2">Logout</p>
                    </a>
                </div>
            </nav>
        </aside>
        <!--Developer | About Us-->
        <div class="absolute bottom-7 px-4 xs:hidden md:block">
            <div class="flex">
                <img src="{{ asset('storage/images/sitsLogo.png') }}" alt="sits Logo" class="w-7 h-7 mr-2" />
                <p class="text-[8px] font-light italic text-gray-400 mt-1">Developed By <br/> BSIT Students 2024 </p>
            </div>
            <div class="absolute -right-[95px] bottom-0">
                <!-- Use margin-top for spacing -->
                <a href="" @click="activeLink = 'aboutUs'" :class="{ 'bg-[#2D2D2D] bg-opacity-40': activeLink === 'aboutUs' }" class="font-normal text-[12px] text-gray-400 hover:text-[#E37878]"> About Us </a>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header for large screens -->
            <header class="bg-[#202020] rounded-md p-4 hidden md:flex w-full mb-4">
                <!-- Page title -->
                <h1 class="text-[20px] mt-[5px] font-bold mr-4">{{$page_title}} |</h1>
                <!-- Time -->
                <div class="relative mr-auto">
                    <!-- Current Time -->
                    <div x-data="{
                         currentTime: '',
                         updateTime() {
                         let now = new Date();
                         this.currentTime = now.toLocaleTimeString();
                         },
                         init() {
                         setInterval(() => {
                         this.updateTime();
                         }, 1000); // Update every second
                         this.updateTime(); // Initial call to display time immediately
                         }
                    }" x-init="init()">
                        <p x-text="currentTime" class="text-[14px] text-start"></p>
                    </div>
                    <!--Current Date-->
                    <div x-data="{
                                currentDate: '',
                                updateDate() {
                                    let now = new Date();
                                    this.currentDate = now.toDateString();
                                },
                                init() {
                                    this.updateDate(); // Initial call to display date immediately
                                }
                            }" x-init="init()">
                        <p x-text="currentDate" class="text-[14px] text-center"></p>
                    </div>
                </div>
                <div class="relative float-left flex">
                    <!-- Notification -->
                    <div class="flex mr-auto">
                        <!-- tooltip notification -->
                        <div x-data="{
                                tooltipVisible: false,
                                tooltipText: 'Notification',
                                tooltipArrow: true,
                                tooltipPosition: 'top',
                                dropdownVisible: false
                            }" x-init="$refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; }); $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });" class="relative mr-5">
                            <div x-ref="tooltip" x-show="tooltipVisible" :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top', 'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left', 'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom', 'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right' }" class="absolute w-auto text-sm" x-cloak>
                                <div x-show="tooltipVisible" x-transition class="relative px-2 py-1 text-white dark:bg-gray-800 rounded bg-opacity-90">
                                    <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap text-white"></p>
                                    <div x-ref="tooltipArrow" x-show="tooltipArrow" :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top', 'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left', 'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom', 'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right' }" class="absolute inline-flex items-center justify-center overflow-hidden">
                                        <div :class="{ 'origin-top-left -rotate-45' : tooltipPosition == 'top', 'origin-top-left rotate-45' : tooltipPosition == 'left', 'origin-bottom-left rotate-45' : tooltipPosition == 'bottom', 'origin-top-right -rotate-45' : tooltipPosition == 'right' }" class="w-1.5 h-1.5 transform dark:bg-gray-800 bg-opacity-90"></div>
                                    </div>
                                </div>
                            </div>
                            <!--Notification icon-->
                            <svg x-ref="content"
                                 @click="dropdownVisible = !dropdownVisible; activeLink = 'notification'; localStorage.setItem('activeLink', 'notification')"
                                 :class="{ 'cursor-pointer rounded-[4px] text-[#E37878]': activeLink === 'notification' }"
                                 class="cursor-pointer fill-current text-[#9B9B9B] hover:text-[#E37878] mt-[9px]"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="22"
                                 viewBox="0 0 375 374.999991"
                                 height="22"
                                 preserveAspectRatio="xMidYMid meet"
                                 version="1.0">
                                <defs>
                                    <clipPath id="ca934e5125">
                                        <path d="M 145 336 L 231 336 L 231 370.144531 L 145 370.144531 Z M 145 336 " clip-rule="nonzero" />
                                    </clipPath>
                                    <clipPath id="eacddd7118">
                                        <path d="M 22.175781 5.644531 L 353.675781 5.644531 L 353.675781 321 L 22.175781 321 Z M 22.175781 5.644531 " clip-rule="nonzero" />
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#ca934e5125)">
                                    <path fill="fill-current" d="M 229.59375 338.414062 C 228.78125 337.234375 227.160156 336.421875 226.125 336.570312 L 149.949219 337.015625 C 149.949219 337.015625 147.21875 337.75 146.480469 338.933594 C 145.742188 340.113281 145.59375 341.589844 146.183594 342.84375 C 153.417969 359.445312 169.878906 370.144531 187.964844 370.144531 C 206.34375 370.144531 222.804688 359.222656 229.964844 342.328125 C 230.480469 341 230.332031 339.523438 229.59375 338.414062 Z M 229.59375 338.414062 " fill-opacity="1" fill-rule="nonzero" />
                                </g>
                                <g clip-path="url(#eacddd7118)">
                                    <path fill="fill-current" d="M 350.722656 297.539062 L 304 258.578125 L 304 154.765625 C 304 102.15625 268.714844 57.664062 220.589844 43.496094 C 220.808594 41.945312 221.105469 40.398438 221.105469 38.773438 C 221.105469 20.476562 206.269531 5.644531 187.964844 5.644531 C 169.65625 5.644531 154.820312 20.476562 154.820312 38.773438 C 154.820312 40.398438 155.117188 41.945312 155.335938 43.496094 C 107.210938 57.664062 71.925781 102.082031 71.925781 154.765625 L 71.925781 258.578125 L 25.128906 297.539062 C 23.210938 299.089844 22.175781 301.449219 22.175781 303.882812 L 22.175781 312.148438 C 22.175781 316.722656 25.867188 320.414062 30.441406 320.414062 L 345.410156 320.414062 C 349.984375 320.414062 353.675781 316.722656 353.675781 312.148438 L 353.675781 303.882812 C 353.675781 301.449219 352.570312 299.089844 350.722656 297.539062 Z M 171.503906 40.101562 C 171.503906 39.660156 171.355469 39.214844 171.355469 38.773438 C 171.355469 29.625 178.808594 22.171875 187.964844 22.171875 C 197.117188 22.171875 204.496094 29.625 204.496094 38.773438 C 204.496094 39.214844 204.421875 39.660156 204.351562 40.101562 C 198.960938 39.363281 193.5 38.773438 187.890625 38.773438 C 182.277344 38.773438 176.890625 39.289062 171.503906 40.101562 Z M 171.503906 40.101562 " fill-opacity="1" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--Dropdown Notification-->
                            <div x-show="dropdownVisible"
                                 @click.away="dropdownVisible = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-100"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-1 mt-2 w-[350px] rounded-md shadow-xl bg-[#292929] ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                                 aria-orientation="vertical" aria-labelledby="notifications-info">
                                <div class="py-1 px-2">
                                    <h1 class="text-[14px] py-2 px-2 font-medium border-b-[#757575] border-b-[2px] text-[#D5D5D5]">Notification</h1>
                                    <ul class=" overflow-y-auto overflow-x-hidden h-[320px] mx-2 mt-2 mb-10">
                                        <li class="block px-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#202020]" role="menuitem">
                                            <div class="border-b border-b-[#373737] flex px-2 py-4">
                                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                                         class="w-5 h-5">
                                                </div>
                                                <div class="pl-3">

                                                    <p class="text-[12px]">
                                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                                        <span class="text-[#E6E6E6]">message.</span>
                                                    </p>

                                                    <!-- client computer name used -->
                                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                                        from
                                                    </span>
                                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                                        Computer 2
                                                    </span>

                                                    <!--time/notification occur-->
                                                    <span x-data="{
                                                        now: new Date(),
                                                        options: {
                                                            day: '2-digit',
                                                            month: 'short',
                                                            year: 'numeric',
                                                            hour: '2-digit',
                                                            minute: '2-digit',
                                                            hour12: true
                                                        },
                                                         get formattedDate() {
                                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                                            return `${day} ${month} ${year} at ${time}`;
                                                        }
                                                    }">
                                                        <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px] mt-2">
                                                            <!-- Clock Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <!-- Timestamp -->
                                                            <span x-text="formattedDate"></span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="block px-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#202020]" role="menuitem">
                                            <div class="border-b border-b-[#373737] flex px-2 py-4">
                                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                                         class="w-5 h-5">
                                                </div>
                                                <div class="pl-3">

                                                    <p class="text-[12px]">
                                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                                        <span class="text-[#E6E6E6]">message.</span>
                                                    </p>

                                                    <!-- client computer name used -->
                                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                                        from
                                                    </span>
                                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                                        Computer 2
                                                    </span>

                                                    <!--time/notification occur-->
                                                    <span x-data="{
                                                        now: new Date(),
                                                        options: {
                                                            day: '2-digit',
                                                            month: 'short',
                                                            year: 'numeric',
                                                            hour: '2-digit',
                                                            minute: '2-digit',
                                                            hour12: true
                                                        },
                                                         get formattedDate() {
                                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                                            return `${day} ${month} ${year} at ${time}`;
                                                        }
                                                    }">
                                                        <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px] mt-2">
                                                            <!-- Clock Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <!-- Timestamp -->
                                                            <span x-text="formattedDate"></span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="block px-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#202020]" role="menuitem">
                                            <div class="border-b border-b-[#373737] flex px-2 py-4">
                                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                                         class="w-5 h-5">
                                                </div>
                                                <div class="pl-3">

                                                    <p class="text-[12px]">
                                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                                        <span class="text-[#E6E6E6]">message.</span>
                                                    </p>

                                                    <!-- client computer name used -->
                                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                                        from
                                                    </span>
                                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                                        Computer 2
                                                    </span>

                                                    <!--time/notification occur-->
                                                    <span x-data="{
                                                        now: new Date(),
                                                        options: {
                                                            day: '2-digit',
                                                            month: 'short',
                                                            year: 'numeric',
                                                            hour: '2-digit',
                                                            minute: '2-digit',
                                                            hour12: true
                                                        },
                                                         get formattedDate() {
                                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                                            return `${day} ${month} ${year} at ${time}`;
                                                        }
                                                    }">
                                                        <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px] mt-2">
                                                            <!-- Clock Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <!-- Timestamp -->
                                                            <span x-text="formattedDate"></span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="block px-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-[#202020]" role="menuitem">
                                            <div class="border-b border-b-[#373737] flex px-2 py-4">
                                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                                         class="w-5 h-5">
                                                </div>
                                                <div class="pl-3">

                                                    <p class="text-[12px]">
                                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                                        <span class="text-[#E6E6E6]">message.</span>
                                                    </p>

                                                    <!-- client computer name used -->
                                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                                        from
                                                    </span>
                                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                                        Computer 2
                                                    </span>

                                                    <!--time/notification occur-->
                                                    <span x-data="{
                                                        now: new Date(),
                                                        options: {
                                                            day: '2-digit',
                                                            month: 'short',
                                                            year: 'numeric',
                                                            hour: '2-digit',
                                                            minute: '2-digit',
                                                            hour12: true
                                                        },
                                                         get formattedDate() {
                                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                                            return `${day} ${month} ${year} at ${time}`;
                                                        }
                                                    }">
                                                        <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px] mt-2">
                                                            <!-- Clock Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <!-- Timestamp -->
                                                            <span x-text="formattedDate"></span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <a href="" @click="activeLink = 'notification'; localStorage.setItem('activeLink', 'notification')" class="flex justified-center items-center" id="notification">
                                            <li class="fixed pl-24 -mt-16 px-4 text-sm text-[#e39090] hover:text-[#e37575] font-bold" role="menuitem">
                                                <p class="text-[12px]">
                                                    View All Notifications
                                                </p>
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Profile -->
                        <div x-data="{
                            tooltipVisible: false,
                            tooltipText: 'Profile',
                            tooltipArrow: true,
                            tooltipPosition: 'top',
                            }" x-init="$refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; }); $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });" class="relative mt-[4px] mr-5">
                            <div x-ref="tooltip" x-show="tooltipVisible" :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top', 'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left', 'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom', 'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right' }" class="absolute w-auto text-sm" x-cloak>
                                <div x-show="tooltipVisible" x-transition class="relative px-2 py-1 text-white dark:bg-gray-800 rounded bg-opacity-90">
                                    <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap text-white"></p>
                                    <div x-ref="tooltipArrow" x-show="tooltipArrow" :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top', 'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left', 'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom', 'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right' }" class="absolute inline-flex items-center justify-center overflow-hidden">
                                        <div :class="{ 'origin-top-left -rotate-45' : tooltipPosition == 'top', 'origin-top-left rotate-45' : tooltipPosition == 'left', 'origin-bottom-left rotate-45' : tooltipPosition == 'bottom', 'origin-top-right -rotate-45' : tooltipPosition == 'right' }" class="w-1.5 h-1.5 transform dark:bg-gray-800 bg-opacity-90"></div>
                                    </div>
                                </div>
                            </div>
                            <a x-ref="content" href="" @click="activeLink = 'profile'; localStorage.setItem('activeLink', 'profile')" class="-m-1.5 flex items-center p-1.5" id="profile">
                                <img class="h-8 w-8 rounded-full bg-gray-50 mr-2" src="{{ asset('storage/images/sampleProfile.png') }}" alt="Profile Picture">
                                <span class="flex flex-col items-left justify-left">
                                    <span class="text-sm font-semibold leading-4 text-white hidden lg:block">Nelson Diaz</span>
                                    <span class="text-xs leading-4 text-white hidden lg:block">Super Administrator</span>
                                </span>
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
