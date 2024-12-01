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
                    <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <a href="{{ route('profile-info') }}"><img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-6 h-6 rounded-full border border-customGreen bg-green-500"></a>
                </div>
            </div>
        </div>

        <div class="w-full bg-white py-6 lg:w-full">
            <!-- Navigation Tabs -->
            <div class="flex overflow-x-auto whitespace-nowrap p-1" style="scrollbar-width: none; -ms-overflow-style: none; overflow-x: auto;">
                <button x-data @click="window.location.href='{{ route('dashboard') }}'" class="px-4 py-1  bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-6 shadow-md">Dashboard</button>
                <button class="px-4 py-1 bg-customGreen  text-[14px] text-white border rounded-full ml-2 shadow-md">Report Road Issue</button>
                <button class="px-4 py-1 bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Suggestion Report</button>
                <button class="px-4 py-1 bg-white  text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Report History</button>
            </div>

        </div>
        <div class="ml-4 text-center">
            <p class="text-red-500 text-sm font-medium mt-6">Step 3: View your Report Road Concern Information</p>
        </div>

        <!-- Report History Section -->
        <div class="mt-6 bg-white w-[80%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 p-4 h-[550px] lg:h-[600px]">
            
            <!-- Captured Road Photo -->
            <div class=" text-center">
                <span class="font-semibold text-customGreen">Actual Captured Road Photo:</span>
                <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="relative w-full " />
            </div>

            <!-- Type of Defect -->
            <div class="mb-6 text-center">
                <span class="font-semibold text-customGreen">Type of Defect:</span>
                <span>Pothole</span>
            </div>

            <!-- Report ID -->
            <div class="mb-2">
                <span class="font-semibold text-customGreen">Report ID:</span>
                <span class="ml-2">00001</span>
            </div>

            <!-- Date and Time -->
            <div class="mb-2">
                <span class="font-semibold text-customGreen">Date and Time:</span>
                <span class="ml-2 mr-8">10/12/2024</span>
                <span class="ml-[46%]">08:34:02 AM</span>
            </div>

            <!-- Location -->
            <div class="mb-6">
                <span class="font-semibold text-customGreen">Location:</span>
                <span class="ml-1">Apokon Street, Tagum City</span>
            </div>


        </div>



        <!-- Report Road Issue Button -->
        <div class="mt-9 w-[75%] text-center">
            <button x-data @click="window.location.href='{{ route('suggestion-reports') }}'" class="px-6 py-4 w-full bg-[#FFAD20] text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-yellow-400">
                SUBMIT REPORT
            </button>
        </div>


    </div>
</x-app-layout>