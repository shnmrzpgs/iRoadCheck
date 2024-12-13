<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white">
        <!--  header -->
        <x-residents.resident-header />
        <!--  Navigation Tabs -->
        <x-residents.residents-navigation-tab />

        <div class="w-[90%] overflow-y-auto mt-20">
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
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
                            <button class="px-4 py-2 bg-[#FF7070] text-white w-full font-semibold rounded-full shadow-md hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 inline-block mr-1 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 45 45">
                                    <path d="M 11.5 6 C 8.4802259 6 6 8.4802259 6 11.5 L 6 36.5 C 6 39.519774 8.4802259 42 11.5 42 L 36.5 42 C 39.519774 42 42 39.519774 42 36.5 L 42 11.5 C 42 8.4802259 39.519774 6 36.5 6 L 11.5 6 z M 11.5 9 L 36.5 9 C 37.898226 9 39 10.101774 39 11.5 L 39 36.5 C 39 37.898226 37.898226 39 36.5 39 L 11.5 39 C 10.101774 39 9 37.898226 9 36.5 L 9 11.5 C 9 10.101774 10.101774 9 11.5 9 z M 30.486328 15.978516 A 1.50015 1.50015 0 0 0 29.439453 16.439453 L 24 21.878906 L 18.560547 16.439453 A 1.50015 1.50015 0 0 0 17.484375 15.984375 A 1.50015 1.50015 0 0 0 16.439453 18.560547 L 21.878906 24 L 16.439453 29.439453 A 1.50015 1.50015 0 1 0 18.560547 31.560547 L 24 26.121094 L 29.439453 31.560547 A 1.50015 1.50015 0 1 0 31.560547 29.439453 L 26.121094 24 L 31.560547 18.560547 A 1.50015 1.50015 0 0 0 30.486328 15.978516 z"></path>
                                </svg>
                                NO
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>