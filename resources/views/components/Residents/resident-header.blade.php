@props(['page_title' => '', 'main_class' => ''])

<div class="w-full bg-white shadow-sm px-4 py-2 border-b-2 border-gray-200 sticky top-0 left-0 z-50 ">

    <div class="flex justify-between items-center">

        <!-- iRoadCheck Logo -->
        <a href="{{ route('residents-dashboard') }}" title="Go to Dashboard">
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                     class="w-8 max-w-10 mr-1" />
                <div class="mt-0 text-[#4D4F50] font-bold text-[15px]">iRoadCheck</div>
            </div>
        </a>

        <!-- Notifications and Profile Icon -->
        <div class="flex items-center space-x-3"
             x-data="{
                isClicked: false,
                handleClick() {
                    this.isClicked = true;
                    setTimeout(() => this.isClicked = false, 150); // Reset scale after 150ms
                    }
                }">

            <a href="{{ route('notifications') }}"
               @click="activeLink = ''; localStorage.setItem('activeLink', '');">
                <svg
                    class="w-6 h-6 hover:text-[#6AA76F] {{ request()->routeIs('notifications') ? 'text-[#6AA76F]' : 'text-gray-400' }}"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    fill="{{ request()->routeIs('notifications') ? '#6AA76F' : 'currentColor' }}"
                    stroke="{{ request()->routeIs('notifications') ? '#6AA76F' : 'currentColor' }}">
                    <path
                        fill="fillCurrent"
                        d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg>
            </a>

            <!-- Profile Icon -->
            <a href="{{ route('profile-info') }}">
                <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image"
                    class="w-7 h-7 rounded-full border border-customGreen bg-green-500"
                     @click="handleClick()"
                     :class="{ 'scale-105 animate-bounce-once': isClicked }">
            </a>
        </div>
    </div>

</div>
