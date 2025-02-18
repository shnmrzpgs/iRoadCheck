<x-app-layout>
    <div class="lg:mt-0 flex-1 rounded-md mb-4 mx-1 lg:mx-0 bg-none h-screen overflow-y-auto overflow-x-hidden">
        <!-- Navbar -->
        <header class="fixed w-full bg-[#F5F5F5] z-50">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#" class="p-1.5 -m-1.5 flex">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block -mt-2" />
                    <span class="text-[#4D4F50] font-pop text-[17px]">
                        iRoadCheck
                    </span>
                </a>
                <!-- Tabs -->
                <div class="flex text-sm space-x-8 z-50">
                    <button
                        @click="activeTab = 'home'; document.getElementById('home').scrollIntoView({ behavior: 'smooth', block: 'end' }); "
                        :class="activeTab === 'home' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F] ' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px] ">
                        Home
                    </button>
                    <button
                        @click="activeTab = 'how-it-works'; document.getElementById('how-it-works').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'how-it-works' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        How It Works
                    </button>
                    <button
                        @click="activeTab = 'features'; document.getElementById('features').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'features' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        Features
                    </button>
                    <button
                        @click="activeTab = 'contact-us'; document.getElementById('contact-us').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'contact-us' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        Contact Us
                    </button>
                </div>
                <div class="hidden md:flex space-x-4 font-medium">
                    <a href="#" class="text-xs text-orange-500 px-4 py-2 rounded hover:underline">LOG IN</a>
                    <a href="#" class="text-xs bg-green-500 text-white px-4 py-2 rounded hover:bg-[#4AA76F]">SIGN UP</a>
                </div>
                <button class="md:hidden text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="bg-transparent px-16 pt-32 pb-32 z-0">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center space-x-24">
                Hello
            </div>
        </section>

    </div>


</x-app-layout>
