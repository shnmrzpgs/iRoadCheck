@props(['page_title' => '', 'main_class' => ''])

<div class="bg-none m-2 font-pop text-white 0 p-0 " x-data="{ open: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }">

    <div class="flex h-auto">

        <!-- Sidebar -->
        <aside :class="open ? 'block' : 'hidden md:block'" class="w-64 bg-white h-full py-4 md:block rounded-xl mr-5 drop-shadow-md">
            <div class="text-2xl font-bold mb-2 flex flex-col items-center justify-center p-3">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block mb-2" />
                <div class="text-[#4D4F50] font-pop text-[17px]">iRoadCheck</div>
            </div>
            <!-- Custom Horizontal Line -->
            <div class="relative pb-[16px]">
                <div class="absolute w-full h-[1px] bg-gray-300"></div>
            </div>

            <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[69vh] px-4 leading-6" x-data="{
                    activeLink: localStorage.getItem('activeLink') || '',
                    activeChildLink: localStorage.getItem('activeChildLink') || ''
                }">
                <!-- Dashboard -->
                <a href=""
                   @click="activeLink = 'dashboard'; activeChildLink = ''; localStorage.setItem('activeLink', 'dashboard'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#6AA76F] text-white drop-shadow font-bold': activeLink === 'dashboard' }"
                   class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#6AA76F] hover:text-[#4D4F50] hover:bg-opacity-20 font-medium text-[#4D4F50]">

                    <p class="ml-2">Dashboard</p>
                </a>

                <!-- Manage Users -->
                <a href=""
                   @click="activeLink = 'manageUsers'; activeChildLink = ''; localStorage.setItem('activeLink', 'manageUsers'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#6AA76F] text-white drop-shadow font-bold': activeLink === 'manageUsers' }"
                   class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#6AA76F] hover:text-[#4D4F50] hover:bg-opacity-20 font-medium text-[#4D4F50]">

                    <p class="ml-2">Manage Users</p>
                </a>


                <!-- User Type -->
                <a href=""
                   @click="activeLink = 'userType'; activeChildLink = ''; localStorage.setItem('activeLink', 'userType'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#6AA76F] text-white drop-shadow font-bold': activeLink === 'userType' }"
                   class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#6AA76F] hover:text-[#4D4F50] hover:bg-opacity-20 font-medium text-[#4D4F50]">
                    <p class="ml-2">User Type</p>
                </a>

                <!-- Activity Logs -->
                <a href=""
                   @click="activeLink = 'activityLogs'; activeChildLink = ''; localStorage.setItem('activeLink', 'activityLogs'); localStorage.setItem('activeChildLink', '')"
                   :class="{ 'bg-[#6AA76F] text-white drop-shadow font-bold': activeLink === 'activityLogs' }"
                   class="mx-2 flex items-center block py-2.5 px-4 rounded hover:bg-[#6AA76F] hover:text-[#4D4F50] hover:bg-opacity-20 font-medium text-[#4D4F50]">
                    <p class="ml-2">Activity Logs</p>
                </a>
            </nav>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header for large screens -->
            <header class="flex w-full">
                <div  class="bg-white rounded-md md:flex w-6/10 mb-4 drop-shadow-lg pl-14 mr-5 pt-8">

                    <!--Current Profile-->
                    <div class="flex justify-center items-center w-[61px] h-[61px] bg-[#2F7D55] rounded-full">
                        <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt=" "
                             class="w-14 h-14 rounded-full">
                    </div>

                    <!--Account Name-->
                    <div class="relative flex flex-col ml-5 pt-2 leading-6 mr-auto">
                        <h1 class="text-[#2F7D55] text-[24px] font-semibold">Good Morning!</h1>
                        <a class="text-[#2F7D55] text-[14px] font-normal ml-1">Sheena Mariz Pagas</a>
                    </div>

                    <!--Search-->
                    <div class="flex w-80 items-center mb-10 px-10">
                        <form class="relative flex flex-1  h-8 rounded-[4px]  border-[2px] border-[#F8F7F7]" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <svg class="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#0BAA67" aria-hidden="false">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                            <input id="search-field"
                                   class="focus:bg-gray-100 bg-white drop-shadow-sm rounded-md border-none block h-full w-full py-0 pl-8 pr-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 xs:text-[10px] sm:text-[10px] md:text-[12px] lg:text-[12px]"
                                   placeholder="Search" type="search" name="search">
                        </form>
                    </div>


                </div>
                <div class="bg-white rounded-md p-4 md:flex w-4/10 mb-4 drop-shadow-lg relative">
                    <!--Notification-->
                    <div class="w-full">
                        <div class="flex justify-between border-b-[#757575] border-b-[2px]">
                            {{--Notification Title--}}
                            <div><h1 class="text-[14px] px-2 font-medium text-[#202020]">NOTIFICATIONS</h1></div>
                           {{--See More Button--}}
                            <div class="flex justify-end pr-3">
                                <a href="" class="text-[12px] text-blue-500 font-medium hover:underline">
                                    See More
                                </a>
                            </div>
                        </div>
                        <ul class="overflow-y-auto overflow-x-hidden max-h-[60px] mt-2 px-2">
                            <!-- Notification Items -->
                            <li class="block text-sm text-[#4D4F50] space-y-4 rounded-md">
                                <div class="border-b border-b-[#D5D5D5] hover:bg-gray-100 flex justify-between py-2">
                                    <div class="flex pl-3 items-center space-x-3">
                                        <!-- Notification Message Icon -->
                                        <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                                        </div>
                                        <!-- Notification Message -->
                                        <div class="text-[12px] text-[#202020]">
                                            <span>Successfully</span>
                                            <span class="font-semibold">add Users</span>
                                        </div>
                                    </div>

                                    <!-- Time of Notification Message Occur (aligned to the very right) -->
                                    <div x-data="{
                                        now: new Date(),
                                        notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                            get timeAgo() {
                                                const diffMs = this.now - this.notificationDate;
                                                const diffMins = Math.floor(diffMs / 60000);
                                                const diffHours = Math.floor(diffMins / 60);
                                                const diffDays = Math.floor(diffHours / 24);

                                                if (diffMins < 1) {
                                                    return 'just now';
                                                } else if (diffMins < 60) {
                                                    return `${diffMins} mins ago`;
                                                } else if (diffHours < 24) {
                                                    return `${diffHours} hours ago`;
                                                } else {
                                                    return `${diffDays} days ago`;
                                                }
                                            }
                                        }" class="flex items-center text-[#202020] text-[12px] pr-3">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Time Ago -->
                                        <span x-text="timeAgo" class="ml-1"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="block text-sm text-[#4D4F50]  rounded-md">
                                <div class="border-b border-b-[#D5D5D5] hover:bg-gray-100 flex justify-between py-2">
                                    <div class="flex pl-3 items-center space-x-3">
                                        <!-- Notification Message Icon -->
                                        <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                                        </div>
                                        <!-- Notification Message -->
                                        <div class="text-[12px] text-[#202020]">
                                            <span>Successfully</span>
                                            <span class="font-semibold">add Users</span>
                                        </div>
                                    </div>

                                    <!-- Time of Notification Message Occur (aligned to the very right) -->
                                    <div x-data="{
                                        now: new Date(),
                                        notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                            get timeAgo() {
                                                const diffMs = this.now - this.notificationDate;
                                                const diffMins = Math.floor(diffMs / 60000);
                                                const diffHours = Math.floor(diffMins / 60);
                                                const diffDays = Math.floor(diffHours / 24);

                                                if (diffMins < 1) {
                                                    return 'just now';
                                                } else if (diffMins < 60) {
                                                    return `${diffMins} mins ago`;
                                                } else if (diffHours < 24) {
                                                    return `${diffHours} hours ago`;
                                                } else {
                                                    return `${diffDays} days ago`;
                                                }
                                            }
                                        }" class="flex items-center text-[#202020] text-[12px] pr-3">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Time Ago -->
                                        <span x-text="timeAgo" class="ml-1"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="block text-sm text-[#4D4F50]  rounded-md">
                                <div class="border-b border-b-[#D5D5D5] hover:bg-gray-100 flex justify-between py-2">
                                    <div class="flex pl-3 items-center space-x-3">
                                        <!-- Notification Message Icon -->
                                        <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                                        </div>
                                        <!-- Notification Message -->
                                        <div class="text-[12px] text-[#202020]">
                                            <span>Successfully</span>
                                            <span class="font-semibold">add Users</span>
                                        </div>
                                    </div>

                                    <!-- Time of Notification Message Occur (aligned to the very right) -->
                                    <div x-data="{
                                        now: new Date(),
                                        notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                            get timeAgo() {
                                                const diffMs = this.now - this.notificationDate;
                                                const diffMins = Math.floor(diffMs / 60000);
                                                const diffHours = Math.floor(diffMins / 60);
                                                const diffDays = Math.floor(diffHours / 24);

                                                if (diffMins < 1) {
                                                    return 'just now';
                                                } else if (diffMins < 60) {
                                                    return `${diffMins} mins ago`;
                                                } else if (diffHours < 24) {
                                                    return `${diffHours} hours ago`;
                                                } else {
                                                    return `${diffDays} days ago`;
                                                }
                                            }
                                        }" class="flex items-center text-[#202020] text-[12px] pr-3">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Time Ago -->
                                        <span x-text="timeAgo" class="ml-1"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="block text-sm text-[#4D4F50]  rounded-md">
                                <div class="border-b border-b-[#D5D5D5] hover:bg-gray-100 flex justify-between py-2">
                                    <div class="flex pl-3 items-center space-x-3">
                                        <!-- Notification Message Icon -->
                                        <div class="w-8 h-8 border rounded-full border-[#FFAD20] flex items-center justify-center">
                                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                                        </div>
                                        <!-- Notification Message -->
                                        <div class="text-[12px] text-[#202020]">
                                            <span>Successfully</span>
                                            <span class="font-semibold">add Users</span>
                                        </div>
                                    </div>

                                    <!-- Time of Notification Message Occur (aligned to the very right) -->
                                    <div x-data="{
                                        now: new Date(),
                                        notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                            get timeAgo() {
                                                const diffMs = this.now - this.notificationDate;
                                                const diffMins = Math.floor(diffMs / 60000);
                                                const diffHours = Math.floor(diffMins / 60);
                                                const diffDays = Math.floor(diffHours / 24);

                                                if (diffMins < 1) {
                                                    return 'just now';
                                                } else if (diffMins < 60) {
                                                    return `${diffMins} mins ago`;
                                                } else if (diffHours < 24) {
                                                    return `${diffHours} hours ago`;
                                                } else {
                                                    return `${diffDays} days ago`;
                                                }
                                            }
                                        }" class="flex items-center text-[#202020] text-[12px] pr-3">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Time Ago -->
                                        <span x-text="timeAgo" class="ml-1"></span>
                                    </div>
                                </div>
                            </li>

                            <!-- Add other notification items here -->
                        </ul>
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
