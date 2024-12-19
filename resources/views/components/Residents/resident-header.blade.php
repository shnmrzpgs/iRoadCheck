@props(['page_title' => '', 'main_class' => ''])

<div class="w-full bg-white shadow-sm p-4 border-b-2 border-gray-200 sticky top-0 left-0 z-50">
    <div class="flex justify-between items-center">
        <a href="{{ route('dashboard') }}">
            <div class="flex -mb-2 ml-2">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                    class="w-28 sm:w-32 md:w-48 lg:w-56 max-w-[40px]" />
                <div class="mt-2 text-[#4D4F50] font-bold text-[15px]">iRoadCheck</div>
            </div>
        </a>
        <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <a href="{{ route('profile-info') }}">
                <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image"
                    class="w-6 h-6 rounded-full border border-customGreen bg-green-500">
            </a>
        </div>
    </div>
</div>