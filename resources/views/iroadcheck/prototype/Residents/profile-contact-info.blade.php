<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white ">
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
                    <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-6 h-6 rounded-full border border-customGreen bg-green-500">
                </div>
            </div>
        </div>

        <div class="w-[90%] bg-transparent rounded-lg p-6 mt-6 lg:-ml-22 lg:w-full">
            <!-- Flex container to align image and text horizontally -->
            <div class="flex items-center">
                <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-20 h-20 rounded-full border border-customGreen bg-green-500">

                <!-- User Greeting -->
                <div class="ml-4 text-left">
                    <p class="text-xl text-customGreen font-semibold">Sheena Mariz Pagas</p>
                    <p class="text-gray-600">Resident</p>
                </div>
            </div>
        </div>

        <div class="w-full bg-white py-6 lg:w-full">
            <!-- Navigation Tabs -->
            <div class="flex whitespace-nowrap lg:w-full">
                <button x-data @click="window.location.href='{{ route('profile-info') }}'" class="px-3 py-1 bg-white text-customGreen border-customGreen  text-[14px] border rounded-full ml-4 shadow-md">Personal Info</button>
                <button class="px-3 py-1  border text-[14px]  bg-customGreen text-white rounded-full ml-1 shadow-md">Contact Info</button>
                <button x-data @click="window.location.href='{{ route('profile-changePass') }}'" class="px-3 py-1 bg-white text-customGreen border border-customGreen rounded-full ml-1 text-[14px] shadow-md">Change Password</button>
            </div>
        </div>

        <!-- Personal information Section -->
        <div class="mt-6 bg-white w-[80%] shadow-lg rounded-lg p-1 border border-gray-100 lg:h-[200px]">
            <div class="w-full bg-transparent h-10 py-2 px-3 border-b-2 border-[#F8A15E] items-center">
                <p class="text-[#F8A15E] font-semibold text-center">Contact Information</p>
            </div>
            <form action="" method="POST" class="mt-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap lg:space-x-4 lg:justify-center">
                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                    <!-- Floating Label -->
                    <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                        class="transition-all duration-200 bg-white px-1">
                        Phone Number
                    </label>

                    <!-- Input Field -->
                    <input type="text"
                        x-model="inputValue"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">

                </div>

                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                    <label :class="{
                                'text-[#6AA76F]': isFocused || inputValue.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || inputValue.length > 0
                            }"
                        class="transition-all duration-200 bg-white px-1">
                        Email Address
                    </label>
                    <input type="text"
                        x-model="inputValue"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all">
                </div>

            </form>
        </div>


        <!-- Report Road Issue Button -->
        <div class="mt-[50%] w-[75%] text-center lg:w-[20%] lg:mt-9">
            <button x-data @click="window.location.href='{{ route('report-road-issue-step1') }}'" class="px-6 py-4 w-full lg:text-[16px] lg:py-2 lg:mb-2 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-xl font-semibold text-white shadow-md rounded-full">
                Save Changes
            </button>
        </div>


    </div>
</x-app-layout>