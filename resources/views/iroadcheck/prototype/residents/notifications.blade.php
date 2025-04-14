<x-app-layout>
    <x-residents.residents-navigation>
        <div class="flex flex-col justify-center items-center mb-28 w-full lg:w-[90%] lg:ml-16 xl:ml-20">

            <!-- Notifications Header -->
            <div class="sticky -top-2 py-4 w-full bg-[#4AA76F] shadow rounded-b-md z-10">
                <p class="text-md md:text-lg text-white font-medium text-center tracking-wider">Notifications</p>
            </div>

            <!-- Scrollable Content -->
            <div class="mt-8 w-full">

                <!-- Today Section -->
                <div class="w-full">
                    <p class="text-[14px] text-black font-semibold">Today</p>

                    <!-- Notifications 1 -->
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow-md p-4 mt-4">
                        <!-- Image Section -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                 class="w-14 h-14 object-cover shadow rounded-lg">
                        </div>
                        <!-- Text Section -->
                        <div class="ml-4">
                            <p class="text-black font-normal text-sm">
                                Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.
                            </p>
                            <p class="text-gray-500 text-xs mt-1">
                                8 hours ago
                            </p>
                        </div>
                    </div>

                    <!-- Notifications 2 -->
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow-md p-4 mt-4">
                        <!-- Image Section -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                 class="w-14 h-14 object-cover shadow rounded-lg">
                        </div>
                        <!-- Text Section -->
                        <div class="ml-4">
                            <p class="text-black font-normal text-sm">
                                Your report of debris on Main Avenue, dated July 20, 2024, has been resolved.
                            </p>
                            <p class="text-gray-500 text-xs mt-1">
                                12 hours ago
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 w-full">

                    <!-- Section Title -->
                    <p class="text-[14px    ] font-normal text-gray-800 mb-4">Earlier</p>

                    <!-- Notifications Cards -->
                    <div class="space-y-4">

                        <div class="flex items-center bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                            <!-- Image Section -->
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                     class="w-14 h-14 object-cover shadow rounded-lg">
                            </div>
                            <!-- Text Section -->
                            <div class="ml-4">
                                <p class="text-black font-normal text-sm">
                                    Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.
                                </p>
                                <p class="text-gray-500 text-xs mt-1">Fri at 15:37</p>
                            </div>
                        </div>

                        <div class="flex items-center bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                     class="w-14 h-14 object-cover shadow rounded-lg">
                            </div>
                            <div class="ml-4">
                                <p class="text-black font-normal text-sm">
                                    Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.
                                </p>
                                <p class="text-gray-500 text-xs mt-1">June 21 at 10:37</p>
                            </div>
                        </div>

                        <div class="flex items-center bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                     class="w-14 h-14 object-cover shadow rounded-lg">
                            </div>
                            <div class="ml-4">
                                <p class="text-black font-normal text-sm">
                                    Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.
                                </p>
                                <p class="text-gray-500 text-xs mt-1">June 4 at 11:00</p>
                            </div>
                        </div>

                        <div class="flex items-center bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                     class="w-14 h-14 object-cover shadow rounded-lg">
                            </div>
                            <div class="ml-4">
                                <p class="text-black font-normal text-sm">
                                    Your report of the cracked road in Apokon Street, dated July 21, 2024, has been canceled.
                                </p>
                                <p class="text-gray-500 text-xs mt-1">May 31 at 10:20</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-residents.residents-navigation>
</x-app-layout>
