<x-app-layout>
    <x-User.user-navigation page_title="Suggestion Reports">

        <div class="w-[90%] overflow-y-auto mt-0">
            <!-- Flex container for aligning items vertically on mobile and horizontally on web -->
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-4 lg:justify-center">
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

                <!-- Repeat the second and third report sections here -->
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

                <!-- Repeat the third report section here -->
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

                <!-- Repeat the fourth report section here -->
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

                <!-- Repeat the fifth report section here -->
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

                <!-- Repeat the sixth report section here -->
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
            </div>
        </div>

    </x-User.user-navigation>
</x-app-layout>
