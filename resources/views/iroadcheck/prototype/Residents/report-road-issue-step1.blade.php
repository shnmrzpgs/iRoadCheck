<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white">
        <!-- White Background Header Container -->
        <div class="w-full max-w-lg bg-white shadow-sm p-4 border-b-2 border-gray-200">
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

        <div class="w-full max-w-md bg-white py-6 ">
            <!-- Navigation Tabs -->
            <div class="flex overflow-x-auto whitespace-nowrap p-1" style="scrollbar-width: none; -ms-overflow-style: none; overflow-x: auto;">
                <button  x-data @click="window.location.href='{{ route('dashboard') }}'"  class="px-4 py-1  bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-6 shadow-md">Dashboard</button>
                <button class="px-4 py-1 bg-customGreen  text-[14px] text-white border rounded-full ml-2 shadow-md">Report Road Issue</button>
                <button class="px-4 py-1 bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Suggestion Report</button>
                <button class="px-4 py-1 bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Report History</button>
            </div>

        </div>
        <div class="ml-4 text-center">
            <p class="text-red-500 text-sm font-medium mt-6">Step 1: Choose the name of the road defect issue.</p>
        </div>



        <!-- Report History Section -->
        <div  x-data="{ selected: null }" class="mt-6 bg-white w-[80%] max-w-md shadow-sm rounded-lg  border-2 border-gray-300" style="height: 550px;">
            <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-4">
                <h2 class=" text-[16px] font-semibold">Type of Road Issue Concern</h2>
            </div>
            <div class="h-[50vh] overflow-y-auto">
                <div @click="selected = 'pothole'" :class="{ 'bg-gray-100': selected === 'pothole' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                    <img src="{{ asset('storage/images/pothole.png') }}" alt="Pothole" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Pothole</p>
                </div>
                <div  @click="selected = 'raveling'" :class="{ 'bg-gray-100': selected === 'raveling' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                    <img src="{{ asset('storage/images/raveling.png') }}" alt="Raveling" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Raveling</p>
                </div>
                <div  @click="selected = 'block-cracking'" :class="{ 'bg-gray-100': selected === 'block-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                    <img src="{{ asset('storage/images/block craking.png') }}" alt="Block Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Block Cracking</p>
                </div>
                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                </div>
                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                </div>
                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                </div>
                
            </div>
        </div>


        <!-- Report Road Issue Button -->
        <div class="mt-9 w-[75%] text-center">
            <button x-data @click="window.location.href='{{ route('report-road-issue-step2') }}'" class="px-6 py-4 w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400">       
               NEXT
            </button>
        </div>


    </div>
</x-app-layout>