<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white">
        <!-- White Background Header Container -->
        <div class="w-full max-w-lg bg-white shadow-sm p-4 border-b-2 border-gray-200 fixed top-0 z-10">
            <!-- Header -->
            <div class="flex justify-between items-center ">
                <div class="flex -mb-2 ml-2">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                        class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]" />
                    <div class="mt-2 text-[#4D4F50] font-bold text-[17px]">iRoadCheck</div>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-6 h-6 rounded-full border border-customGreen bg-green-500">
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="w-full max-w-md bg-white py-6 fixed top-[60px] shadow-sm">
            <div class="flex overflow-x-auto whitespace-nowrap p-1" style="scrollbar-width: none; -ms-overflow-style: none; overflow-x: auto;">
                <button x-data @click="window.location.href='{{ route('dashboard') }}'" class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-6 shadow-md">Dashboard</button>
                <button x-data @click="window.location.href='{{ route('report-road-issue-step1') }}'" class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Report Road Issue</button>
                <button class="px-4 py-1 bg-customGreen text-[14px] text-white border border-customGreen rounded-full ml-2 shadow-md">Suggestion Report</button>
                <button  x-data @click="window.location.href='{{ route('report-history') }}'" class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Report History</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-[90%] overflow-y-auto mt-[140px]">
            <!-- Report History Section -->
            <div class="mt-8 bg-white w-full max-w-md shadow-sm rounded-lg border-2 border-gray-300">
                <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-2">
                    <h2 class="text-[15px] text-red-500 font-semibold ml-2">Is this the same as your report now?</h2>
                </div>
                <div class="p-3">
                    <div class="text-gray-500 text-sm mb-3 ml-2">
                        <span>Current Report Status: 2 days ago</span>
                    </div>

                    <!-- Captured Road Photo -->
                    <div class="flex mb-2">
                        <div class="w-1/3">
                            <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="w-full" />
                        </div>
                        <!-- Report Details -->
                        <div class="w-2/3 ml-4">
                            <div class="text-sm">
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Location: </span>
                                    <span>Apokon Street, Tagum City</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Type of Defect: </span>
                                    <span>Pothole</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Report Count: </span>
                                    <span>02</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yes and No Buttons -->
                    <div class="flex justify-center space-x-4 mt-4 px-4 mb-2">
                        <button class="px-4 py-2 bg-customGreen text-white w-full font-semibold rounded-full shadow-md hover:bg-green-600">YES</button>
                        <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">NO</button>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-white w-full max-w-md shadow-sm rounded-lg border-2 border-gray-300">
                <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-2">
                    <h2 class="text-[15px] text-red-500 font-semibold ml-2">Is this the same as your report now?</h2>
                </div>
                <div class="p-3">
                    <div class="text-gray-500 text-sm mb-3 ml-2">
                        <span>Current Report Status: 2 days ago</span>
                    </div>

                    <!-- Captured Road Photo -->
                    <div class="flex mb-2">
                        <div class="w-1/3">
                            <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="w-full" />
                        </div>
                        <!-- Report Details -->
                        <div class="w-2/3 ml-4">
                            <div class="text-sm">
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Location: </span>
                                    <span>Apokon Street, Tagum City</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Type of Defect: </span>
                                    <span>Pothole</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Report Count: </span>
                                    <span>02</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yes and No Buttons -->
                    <div class="flex justify-center space-x-4 mt-4 px-4 mb-2">
                        <button class="px-4 py-2 bg-customGreen text-white w-full font-semibold rounded-full shadow-md hover:bg-green-600">YES</button>
                        <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">NO</button>
                    </div>
                </div>
            </div>
            <div class="mt-6 bg-white w-full max-w-md shadow-sm rounded-lg border-2 border-gray-300">
                <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-2">
                    <h2 class="text-[15px] text-red-500 font-semibold ml-2">Is this the same as your report now?</h2>
                </div>
                <div class="p-3">
                    <div class="text-gray-500 text-sm mb-3 ml-2">
                        <span>Current Report Status: 2 days ago</span>
                    </div>

                    <!-- Captured Road Photo -->
                    <div class="flex mb-2">
                        <div class="w-1/3">
                            <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="w-full" />
                        </div>
                        <!-- Report Details -->
                        <div class="w-2/3 ml-4">
                            <div class="text-sm">
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Location: </span>
                                    <span>Apokon Street, Tagum City</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Type of Defect: </span>
                                    <span>Pothole</span>
                                </div>
                                <div class="mb-1">
                                    <span class="font-semibold text-green-500">Report Count: </span>
                                    <span>02</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yes and No Buttons -->
                    <div class="flex justify-center space-x-4 mt-4 px-4 mb-2">
                        <button class="px-4 py-2 bg-customGreen text-white w-full font-semibold rounded-full shadow-md hover:bg-green-600">YES</button>
                        <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">NO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
