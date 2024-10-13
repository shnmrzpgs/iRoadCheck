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
                <button x-data @click="window.location.href='{{ route('dashboard') }}'" class="px-4 py-1  bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-6 shadow-md">Dashboard</button>
                <button class="px-4 py-1 bg-customGreen text-white text-[14px] border rounded-full ml-2 shadow-md">Report Road Issue</button>
                <button class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Suggestion Report</button>
                <button class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">Report History</button>
            </div>

        </div>
        <div class=" text-center">
            <p class="text-red-500 text-sm font-medium mt-6">Step 2: Capture actual road condition.</p>
        </div>

        <div class="relative mt-8 bg-white w-[90%] max-w-md shadow-md rounded-lg overflow-hidden" style="height: 445px;">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

            <dotlottie-player src="https://lottie.host/90b58433-c5af-47fe-a65a-911601208077/2jRvRvYMIR.json" background="transparent" speed="1"
                class="absolute w-full h-full object-cover left-0 top-0 transform scale-125" direction="1" playMode="normal" loop autoplay></dotlottie-player>
        </div>


        <!-- Report Road Issue Button -->
        <div class="mt-9 w-[75%] text-center">
            <button class="px-6 text-[12px] py-4 w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400 flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline-block mr-2" fill="currentColor" viewBox="0 0 30 30">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12.8125C15.5178 12.8125 15.9375 13.2323 15.9375 13.75V15.3125H17.5C18.0178 15.3125 18.4375 15.7323 18.4375 16.25C18.4375 16.7678 18.0178 17.1875 17.5 17.1875H15.9375V18.75C15.9375 19.2678 15.5178 19.6875 15 19.6875C14.4823 19.6875 14.0625 19.2678 14.0625 18.75V17.1875H12.5C11.9822 17.1875 11.5625 16.7678 11.5625 16.25C11.5625 15.7323 11.9822 15.3125 12.5 15.3125H14.0625V13.75C14.0625 13.2323 14.4823 12.8125 15 12.8125Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2222 26.25H17.7778C21.6791 26.25 23.6297 26.25 25.031 25.3308C25.6375 24.9328 26.1584 24.4214 26.5637 23.8259C27.5 22.4501 27.5 20.5349 27.5 16.7045C27.5 12.8743 27.5 10.959 26.5637 9.58325C26.1584 8.98768 25.6375 8.4763 25.031 8.07835C24.1305 7.48766 23.0034 7.27654 21.2775 7.20108C20.4539 7.20108 19.7449 6.58835 19.5834 5.79545C19.341 4.60611 18.2774 3.75 17.0421 3.75H12.9579C11.7226 3.75 10.6589 4.60611 10.4167 5.79545C10.2551 6.58835 9.54606 7.20108 8.7225 7.20108C6.99666 7.27654 5.86944 7.48766 4.96905 8.07835C4.36244 8.4763 3.8416 8.98768 3.43628 9.58325C2.5 10.959 2.5 12.8743 2.5 16.7045C2.5 20.5349 2.5 22.4501 3.43628 23.8259C3.8416 24.4214 4.36244 24.9328 4.96905 25.3308C6.3703 26.25 8.32094 26.25 12.2222 26.25ZM20 16.25C20 19.0114 17.7614 21.25 15 21.25C12.2386 21.25 10 19.0114 10 16.25C10 13.4886 12.2386 11.25 15 11.25C17.7614 11.25 20 13.4886 20 16.25ZM22.5 11.5625C21.9822 11.5625 21.5625 11.9822 21.5625 12.5C21.5625 13.0178 21.9822 13.4375 22.5 13.4375H23.75C24.2677 13.4375 24.6875 13.0178 24.6875 12.5C24.6875 11.9822 24.2677 11.5625 23.75 11.5625H22.5Z" />
                </svg>
                <span>OPEN CAMERA</span>
            </button>
        </div>

        <div class="mt-3 w-[75%] text-center">
            <button x-data @click="window.location.href='{{ route('report-road-issue-step3') }}'" class="px-6 py-4 w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400">
                NEXT
            </button>
        </div>
    </div>

</x-app-layout>