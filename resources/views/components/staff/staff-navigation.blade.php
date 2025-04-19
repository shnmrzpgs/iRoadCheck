@php use Illuminate\Support\Facades\Route; @endphp
@props(['page_title' => '','action' => '', 'placeholder' => '', 'name' => '', 'main_class' => ''])

<div x-cloak
     class=" bg-none font-pop mx-0 px-0"
     x-data="{
        open: false,
        expanded: JSON.parse(localStorage.getItem('sidebarExpanded')) ?? true,
        mobileOpen: false,
        toggleSidebar() {
            this.expanded = !this.expanded;
            localStorage.setItem('sidebarExpanded', JSON.stringify(this.expanded));
        },
        toggleMobileSidebar() {
            this.mobileOpen = !this.mobileOpen;
        },
        isOpen: JSON.parse(localStorage.getItem('dropdownState')) || false,

        toggle() {
            // Toggle the dropdown only if the sidebar is expanded
            if (this.expanded) {
                this.isOpen = !this.isOpen;
                localStorage.setItem('dropdownState', JSON.stringify(this.isOpen));
            }
        },

        expandSidebar() {
            this.expanded = true;
            localStorage.setItem('sidebarExpanded', JSON.stringify(this.expanded));
        },

        openLogs() {
            // Check if the sidebar is already expanded
            if (!this.expanded) {
                // Expand the sidebar and open the dropdown
                this.expandSidebar();
                this.isOpen = true;
            } else {
                // If the sidebar is already expanded, toggle the dropdown
                this.isOpen = !this.isOpen;
            }
            localStorage.setItem('dropdownState', JSON.stringify(this.isOpen));
        }
     }">

    <div class="flex">

        <!-- Web screens Sidebar -->
        <x-Staff.staff-web-sidebar>
            <x-slot:navbar_links>
                <!-- Dashboard -->
                <a href="{{ route('staff.dashboard') }}" wire:navigate loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.dashboard') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <p x-show="expanded" class="ml-2
                        {{ request()->routeIs('staff.dashboard') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Dashboard
                    </p>
                </a>
{{--                <!-- Manage Tagging -->--}}
{{--                <a href="{{ route('staff.manage-tagging') }}" wire:navigate loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium--}}
{{--                    {{ request()->routeIs('staff.manage-tagging') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"--}}
{{--                         class="lazyload w-5 h-5 fill-current--}}
{{--                        {{ request()->routeIs('staff.manage-tagging') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">--}}
{{--                        <path d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3L576 152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6L416 503zM15.1 187.3C6 191 0 199.8 0 209.6L0 480.4c0 17 17.1 28.6 32.9 22.3L160 451.8l0-251.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77l0 194.4 192 54.9L384 255z"/>--}}
{{--                    </svg>--}}
{{--                    <p x-show="expanded" class="ml-2--}}
{{--                        {{ request()->routeIs('staff.manage-tagging') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">--}}
{{--                        Manage Tagging--}}
{{--                    </p>--}}
{{--                </a>--}}
                <!-- Road Defect Reports -->
                <a href="{{ route('staff.road-defect-reports') }}" wire:navigate loading="lazy" class="group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.road-defect-reports') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 527 455"
                         class="lazyload w-5 h-5 fill-current
                        {{ request()->routeIs('staff.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path d="M164.541 227.5H109.499C101.414 227.5 94.8604 233.159 94.8604 240.139V360.461C94.8604 367.441 101.414 373.1 109.499 373.1H164.541C172.626 373.1 179.18 367.441 179.18 360.461V240.139C179.18 233.159 172.626 227.5 164.541 227.5Z"/>
                        <path d="M291.021 81.9004H235.979C227.894 81.9004 221.34 87.559 221.34 94.5393V360.462C221.34 367.442 227.894 373.1 235.979 373.1H291.021C299.106 373.1 305.66 367.442 305.66 360.462V94.5393C305.66 87.559 299.106 81.9004 291.021 81.9004Z"/>
                        <path d="M417.501 178.967H362.459C354.374 178.967 347.82 184.625 347.82 191.606V360.461C347.82 367.442 354.374 373.1 362.459 373.1H417.501C425.586 373.1 432.14 367.442 432.14 360.461V191.606C432.14 184.625 425.586 178.967 417.501 178.967Z"/>
                    </svg>
                    <p x-show="expanded" class="ml-2
                        {{ request()->routeIs('staff.road-defect-reports') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Road Defect Reports
                    </p>
                </a>

                <!-- Update History -->
                <a href="{{ route('staff.report-history') }}" wire:navigate loading="lazy" class="lazyload group flex items-center block py-2.5 px-5 rounded font-medium
                    {{ request()->routeIs('staff.report-history') ? 'bg-[#4AA76F] text-white shadow-md font-bold' : 'text-[#4D4F50] hover:text-[#4AA76F] hover:bg-gray-50 hover:shadow-md' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         class="lazyload w-5 h-5 fill-current mt-1.5
                        {{ request()->routeIs('staff.report-history') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:scale-105 duration-200' }}">
                        <path fill="currentColor" d="M7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0ZM6.79688 3.51562V7.28613L5.03906 9.92285L4.64941 10.5088L5.81836 11.2881L6.20801 10.7021L8.08301 7.88965L8.2002 7.71387V7.5V3.51562V2.8125H6.79395V3.51562H6.79688Z"/>
                    </svg>
                    <p x-show="expanded" class="ml-2
                        {{ request()->routeIs('staff.report-history') ? 'text-white' : 'text-[#4D4F50] group-hover:text-[#4AA76F] group-hover:font-semibold' }}">
                        Update History
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
                    <p  x-show="expanded"
                        class="ml-2">Logout</p>
                </a>
            </x-slot:navbar_links>
        </x-Staff.staff-web-sidebar>

        <!-- Mobile screens Sidebar -->
        <x-Staff.staff-mobile-sidebar/>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">

            <x-Staff.staff-header>
                <x-slot:page_title_and_search_bar>
                    <h1 class="lg:text-[22px] text-md md:text-lg mt-0 font-semibold text-[#4AA76F] md:mt-3 md:mr-3 lg:mr-1">{{$page_title}}</h1>

                    @if (!request()->routeIs('staff.profile-edit') && !request()->routeIs('staff.dashboard') && !request()->routeIs('staff.road-defect-reports') && !request()->routeIs('staff.capture-road-defect') && !session('hideSearchBar'))
                    <!-- Search Bar -->
                        <div class="flex mt-2 lg:mt-3 w-48 lg:w-80 items-center px-0 lg:px-5">
                            <div class="relative flex flex-1 h-8 rounded-full">
                                <label for="search-field" class="sr-only">Search</label>
                                <svg   class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-0"
                                       xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#4AA76F">
                                    <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1l124 124 17 17L478.1 512l-17-17-124-124z"/>
                                </svg>
                                <input
                                    id="search-field"
                                    class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow-[0px_1px_5px_rgba(0,0,0,0.2)] focus:bg-white bg-white rounded-full block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 text-xs lg:text-[14px]"
                                    wire:model.live="search"
                                    placeholder="{{ $placeholder ?? 'Search...' }}"
                                    type="search"
                                />
                            </div>
                        </div>
                    @endif
                </x-slot:page_title_and_search_bar>

                <x-slot:notification_dropdown>
                    <livewire:staff.notification-dropdown/>
                </x-slot:notification_dropdown>

                <x-slot:staff_profile_name>
                    <!-- Profile Icon with Click and Bounce Microinteraction -->
                    <a x-ref="content"  wire:navigate
                       href="{{ route('staff.profile-edit') }}"
                       @click="handleClick()"
                       :class="{ 'scale-105 animate-bounce-once': isClicked }"
                       class="lazyload -my-1.5 flex items-center p-1.5 transition-transform duration-150 ease-in-out transform"
                       id="profile">
                        <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture"
                             class="h-8 w-8 rounded-full bg-gray-50 mr-2 border border-[#4AA76F] object-cover"/>
                        <span class="flex flex-col items-left justify-left">
                            <span class="text-sm font-semibold leading-4 text-[#202020] hidden lg:block">
                                {{ Auth::user()->name }}</span>
                            <span class="text-xs leading-4 text-[#202020] hidden lg:block">
                                {{ ucwords(Auth::user()->userTypes->type) }}
                            </span>
                        </span>
                    </a>
                </x-slot:staff_profile_name>


                <x-slot:mobile_notification_and_profile_header>
                    <!-- Notifications and Profile Icon -->
                    <div class="block md:hidden flex items-center space-x-3">

                        <livewire:staff.notification-dropdown/>

                        <div x-data="{ openDropdown: false }" class="relative">
                            <!-- Profile Icon -->
                            <a @click="openDropdown = !openDropdown; activeLink = ''"
                               class="cursor-pointer " >
                                <div :class="{
                                'border-2 border-customGreen rounded-full': openDropdown
                             }">
                                    <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile Image"
                                         class="w-8 h-8 rounded-full hover:bg-customGreen
                                {{ request()->routeIs('profile-info') ? 'border-2 border-customGreen bg-customGreen' : 'border border-gray-400' }}">
                                </div>
                            </a>

                            <!-- Dropdown Menu -->
                            <div x-show="openDropdown"
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white shadow-[0px_5px_40px_rgba(0,0,0,0.2)] rounded-lg z-50">

                                <ul class="space-y-2">
                                    <!-- Profile Info Link -->
                                    <li>
                                        <a href="{{ route('staff.profile-edit') }}" wire:navigate
                                           class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded-t-lg border-b border-gray-300 text-sm">
                                            Profile Settings
                                        </a>
                                    </li>
                                    <!-- Logout Option -->
                                    <li>
                                        <a href="javascript:void(0);"
                                           @click="logoutResident">
                                            <div method="POST" class="block rounded-b-lg px-4 py-2 text-gray-800 hover:bg-gray-100 text-sm">
                                                @csrf
                                                <button type="submit" class="w-full text-left">Logout</button>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </x-slot:mobile_notification_and_profile_header>
            </x-Staff.staff-header>




            <!-- Content Area -->
            <main
                class="mt-32 md:mt-24 lg:mt-0 flex-1 rounded-md mb-4 mx-1 lg:mx-0 lg:mr-5 bg-none {{ ' '.$main_class }}">
                <!-- Main content here -->
                {{ $slot }}
            </main>

        </div>

        <script>
            function logoutStaff() {
                // Create the logout form dynamically
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('logoutStaff') }}'; // Laravel logout route

                // Add CSRF token for security
                let csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}'; // Laravel CSRF token
                form.appendChild(csrfToken);

                // Append the form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            }
        </script>
    </div>
</div>
