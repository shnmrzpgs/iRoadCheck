<x-app-layout>
    <x-residents.resident-header />
    <x-residents.residents-navigation-tab>
        <!-- Main Content -->
        <main class="flex-1">
            <div class="flex flex-col items-center justify-center w-full px-2 lg:px-0">
                <div class="min-h-[100vh] max-h-[150vh] flex flex-col items-center w-full overflow-y-auto mt-10 mb-20">

                    <!-- Profile container -->
                    <div class="w-full lg:w-[90%] bg-gray-100 rounded-lg p-6 lg:-ml-22" style="box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.25);">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-20 h-20 rounded-full border border-customGreen bg-green-500">
                            <div class="ml-4 text-left">
                                <p class="text-xl text-customGreen font-semibold">Hello!</p>
                                <p class="text-gray-600 text-sm">Sheena Mariz</p>
                            </div>
                        </div>
                    </div>

                    <!-- Report History container -->
                    <div class="mt-6 bg-white w-full lg:w-[90%] shadow-lg rounded-lg h-[400px] p-1 border border-gray-100">
                        <div class="w-full bg-transparent h-10 py-6 px-3 border-b-2 border-gray-500 flex justify-between items-center">
                            <p class="text-gray-500 font-semibold text-sm">Report History</p>
                            <a href="#" class="text-[#4362FF] text-sm flex items-center">
                                See More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <img src="{{ asset('storage/icons/clipboard.png') }}" alt="Profile Image" class="w-30 h-30 -mt-16">
                            <p class="text-gray-400 text-sm">No Report Road Issue yet</p>
                        </div>
                    </div>

                    <!-- Report Road Issue Button -->
                    <div class="mt-9 w-[90%] text-center max-w-lg lg:hidden mb-10">
                        <button x-data @click="window.location.href='{{ route('report-road-issue') }}'" class="px-4 py-3 w-full bg-white text-md font-semibold text-[#F8A15E] shadow-md rounded-full border-2 border-[#F8A15E] lg:px-4 lg:py-2 lg:text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block mr-2 lg:h-6 lg:w-6" fill="currentColor" viewBox="0 0 30 30">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12.8125C15.5178 12.8125 15.9375 13.2323 15.9375 13.75V15.3125H17.5C18.0178 15.3125 18.4375 15.7323 18.4375 16.25C18.4375 16.7678 18.0178 17.1875 17.5 17.1875H15.9375V18.75C15.9375 19.2678 15.5178 19.6875 15 19.6875C14.4823 19.6875 14.0625 19.2678 14.0625 18.75V17.1875H12.5C11.9822 17.1875 11.5625 16.7678 11.5625 16.25C11.5625 15.7323 11.9822 15.3125 12.5 15.3125H14.0625V13.75C14.0625 13.2323 14.4823 12.8125 15 12.8125Z" fill="#F8A15E" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2222 26.25H17.7778C21.6791 26.25 23.6297 26.25 25.031 25.3308C25.6375 24.9328 26.1584 24.4214 26.5637 23.8259C27.5 22.4501 27.5 20.5349 27.5 16.7045C27.5 12.8743 27.5 10.959 26.5637 9.58325C26.1584 8.98768 25.6375 8.4763 25.031 8.07835C24.1305 7.48766 23.0034 7.27654 21.2775 7.20108C20.4539 7.20108 19.7449 6.58835 19.5834 5.79545C19.341 4.60611 18.2774 3.75 17.0421 3.75H12.9579C11.7226 3.75 10.6589 4.60611 10.4167 5.79545C10.2551 6.58835 9.54606 7.20108 8.7225 7.20108C6.99666 7.27654 5.86944 7.48766 4.96905 8.07835C4.36244 8.4763 3.8416 8.98768 3.43628 9.58325C2.5 10.959 2.5 12.8743 2.5 16.7045C2.5 20.5349 2.5 22.4501 3.43628 23.8259C3.8416 24.4214 4.36244 24.9328 4.96905 25.3308C6.3703 26.25 8.32094 26.25 12.2222 26.25ZM20 16.25C20 19.0114 17.7614 21.25 15 21.25C12.2386 21.25 10 19.0114 10 16.25C10 13.4886 12.2386 11.25 15 11.25C17.7614 11.25 20 13.4886 20 16.25ZM22.5 11.5625C21.9822 11.5625 21.5625 11.9822 21.5625 12.5C21.5625 13.0178 21.9822 13.4375 22.5 13.4375H23.75C24.2677 13.4375 24.6875 13.0178 24.6875 12.5C24.6875 11.9822 24.2677 11.5625 23.75 11.5625H22.5Z" fill="#F8A15E" />
                            </svg>
                            Report Road Issue
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </x-residents.residents-navigation-tab>
</x-app-layout>