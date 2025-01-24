<!-- Web screens Sidebar -->
<aside
    :class="expanded ? 'w-60' : 'w-24'"
    class="bg-[#FBFBFB] hidden h-[95vh] lg:block rounded-xl drop-shadow-md transition-all duration-300 ease-in-out mx-4 mt-5">

    <!-- Arrow Icon -->
    <svg @click="toggleSidebar"
         xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 448 512"
         :class="expanded ? 'rotate-180' : 'rotate-0'"
         class="w-5 h-5 absolute -right-2 top-9 bg-[#FBFBFB] p-1 rounded-full transition-transform duration-300 ease-in-out cursor-pointer">
        <path
            d="M422.6 278.6L445.3 256l-22.6-22.6-144-144L256 66.7 210.8 112l22.6 22.6L322.8 224 32 224 0 224l0 64 32 0 290.7 0-89.4 89.4L210.8 400 256 445.3l22.6-22.6 144-144z"/>
    </svg>

    <!-- Logo and Title -->
    <div class="text-2xl font-bold mb-2 flex flex-col items-center justify-center p-3">
        <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
             class="lazyload w-10 h-10 inline-block mb-2"/>
        <div x-show="expanded" class="text-[#4D4F50] font-pop text-[17px]">iRoadCheck</div>
    </div>

    <!-- Custom Horizontal Line -->
    <div class="relative pb-[16px]" x-show="expanded">
        <div class="absolute w-full h-[1px] bg-gray-300"></div>
    </div>

    <nav class="mt-4 space-y-4 flex-1 text-[13px] overflow-x-auto h-[76vh] px-4 leading-6">
        {{ $navbar_links }}
    </nav>
</aside>
