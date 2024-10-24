<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white">
        <!-- White Background Header Container -->
        <div class="w-full bg-white shadow-sm p-4 border-b-2 border-gray-200 lg:w-full">
            <!-- Header -->
            <div class="flex justify-between items-center ">
                <div class="flex -mb-2 ml-2">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                        class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]" />
                    <div class="mt-2 text-[#4D4F50] font-bold text-[17px]">iRoadCheck</div>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image"
                        class="w-6 h-6 rounded-full border border-customGreen bg-green-500">
                </div>
            </div>
        </div>

        <!-- Notifications Header -->
        <div class="mt-6 bg-white w-[90%] shadow-lg rounded-lg px-2 py-3 border border-gray-100">
            <p class="text-xl text-customGreen font-medium text-center">Notifications</p>
        </div>

        <!-- Today Section -->
        <div class="mt-8 ml-4 w-[90%]">
            <p class="text-[16px] text-black font-medium">Today</p>

            <!-- Today's Notification Card -->
            <div class="flex items-center mt-4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                <img src="{{ asset('storage/icons/notification-icon.png') }}" alt="Notification Icon"
                    class="w-10 h-10">
                <div class="ml-3">
                    <p class="text-black">Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.</p>
                    <p class="text-gray-500 text-sm">8 hours ago</p>
                </div>
            </div>
        </div>

        <!-- Earlier Section -->
        <div class="mt-8 ml-4 w-[90%]">
            <p class="text-[16px] text-black font-medium">Earlier</p>

            <!-- Earlier Notifications -->
            <div class="flex items-center mt-4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                <img src="{{ asset('storage/icons/notification-icon.png') }}" alt="Notification Icon"
                    class="w-10 h-10">
                <div class="ml-3">
                    <p class="text-black">Your report of the raveling road in Magugpo North, dated June 4, 2024, has already been fixed.</p>
                    <p class="text-gray-500 text-sm">Fri at 15:37</p>
                </div>
            </div>

            <div class="flex items-center mt-4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                <img src="{{ asset('storage/icons/notification-icon.png') }}" alt="Notification Icon"
                    class="w-10 h-10">
                <div class="ml-3">
                    <p class="text-black">Your report of the pothole road in Magugpo South, dated May 25, 2024, has already been fixed.</p>
                    <p class="text-gray-500 text-sm">June 21 at 10:37</p>
                </div>
            </div>

            <div class="flex items-center mt-4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                <img src="{{ asset('storage/icons/notification-icon.png') }}" alt="Notification Icon"
                    class="w-10 h-10">
                <div class="ml-3">
                    <p class="text-black">You have successfully submitted your road issue report at 10:59 pm.</p>
                    <p class="text-gray-500 text-sm">June 4 at 11:00</p>
                </div>
            </div>

            <div class="flex items-center mt-4 bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                <img src="{{ asset('storage/icons/notification-icon.png') }}" alt="Notification Icon"
                    class="w-10 h-10">
                <div class="ml-3">
                    <p class="text-black">Your report of the cracked road in Apokon Street, dated May 25, 2024, has been canceled.</p>
                    <p class="text-gray-500 text-sm">May 31 at 10:20</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
