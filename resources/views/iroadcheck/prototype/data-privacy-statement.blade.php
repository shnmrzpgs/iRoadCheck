<x-app-layout>
    <div class="lg:mt-0 flex-1 rounded-md mb-4 mx-1 lg:mx-0 bg-none h-screen overflow-y-auto overflow-x-hidden">
        <!-- Navbar -->
        <header x-data="{ mobileMenuOpen: false }" x-cloak class="fixed w-full bg-[#F5F5F5] z-50">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <!-- Title/Logo -->
                <a href="#" class="p-1.5 -m-1.5 flex items-center">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block -mt-2" />
                    <span class="text-[#4D4F50] font-pop text-[17px]">
                        iRoadCheck
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex text-sm space-x-8 z-50">
                    <button @click="activeTab = 'home'; document.getElementById('home').scrollIntoView({ behavior: 'smooth', block: 'end' }); "
                        :class="activeTab === 'home' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F] ' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        Home
                    </button>
                    <button @click="activeTab = 'how-it-works'; document.getElementById('how-it-works').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'how-it-works' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        How It Works
                    </button>
                    <button @click="activeTab = 'features'; document.getElementById('features').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'features' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        Features
                    </button>
                    <button @click="activeTab = 'contact-us'; document.getElementById('contact-us').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                        :class="activeTab === 'contact-us' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="px-2 py-2 font-medium text-[14px]">
                        Contact Us
                    </button>
                </div>

                <!-- Desktop Login/Signup Buttons -->
                <div class="hidden md:flex space-x-4 font-medium">
                    <a href="{{ route('residents-login') }}" class="text-xs text-orange-500 px-4 py-2 rounded hover:underline">LOG IN</a>
                    <a href="{{ route('residents-login') }}" class="text-xs bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white px-4 py-2 rounded hover:bg-[#4AA76F]">SIGN UP</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" class="md:hidden bg-white shadow-lg absolute w-full left-0 top-16 z-50">
                <div class="flex flex-col space-y-2 p-4">
                    <button @click="activeTab = 'home'; mobileMenuOpen = false; document.getElementById('home').scrollIntoView({ behavior: 'smooth', block: 'end' });"
                        :class="activeTab === 'home' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F] ' : 'text-gray-700'"
                        class="py-2 font-medium text-[14px]">
                        Home
                    </button>
                    <button @click="activeTab = 'how-it-works'; mobileMenuOpen = false; document.getElementById('how-it-works').scrollIntoView({ behavior: 'smooth', block: 'start' });"
                        :class="activeTab === 'how-it-works' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="py-2 font-medium text-[14px]">
                        How It Works
                    </button>
                    <button @click="activeTab = 'features'; mobileMenuOpen = false; document.getElementById('features').scrollIntoView({ behavior: 'smooth', block: 'start' });"
                        :class="activeTab === 'features' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="py-2 font-medium text-[14px]">
                        Features
                    </button>
                    <button @click="activeTab = 'contact-us'; mobileMenuOpen = false; document.getElementById('contact-us').scrollIntoView({ behavior: 'smooth', block: 'start' });"
                        :class="activeTab === 'contact-us' ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                        class="py-2 font-medium text-[14px]">
                        Contact Us
                    </button>
                    <hr class="my-2">
                    <a href="{{ route('residents-login') }}" class="text-sm text-orange-500 py-2 text-center hover:underline">LOG IN</a>
                    <a href="{{ route('residents-login') }}" class="text-sm bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white py-2 rounded text-center hover:bg-[#4AA76F]">SIGN UP</a>
                </div>
            </div>
        </header>


        <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
            class="absolute -left-[650px] -top-[600px] w-[1300px] opacity-10 -rotate-90 z-0" />

        <div class="bg-transparent px-4 pt-32 pb-32 z-0">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center space-x-24">
                <div class="px-2">
                    <h1 class="text-3xl font-bold text-[#4AA76F] italic leading-normal">iRoadCheck's Data Privacy Statement</h1>
                    <p class="mt-4 text-gray-700">The City Engineering Office of Tagum City values the right to privacy as a fundamental human right. In line with this, we are committed to protecting personal data by following key privacy principles and employing standard security measures in how we collect, process, share, and store personal information...</p>
                    <p class="mt-4 text-gray-700">This iRoadCheck Data Privacy Statement ("IDPS") provides an overview of how the Office manages data collected through iRoadCheck, a system used for monitoring and reporting road conditions...</p>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75]">What personal data does the iRoadCheck system collect and process?</h2>
                    <ul class="list-disc ml-6 text-gray-700">
                        <li>Name</li>
                        <li>Sex</li>
                        <li>Birthdate</li>
                        <li>Contact number</li>
                        <li>Email address</li>
                        <li>Location data (GPS coordinates)</li>
                        <li>Internet Protocol (IP) addresses</li>
                        <li>Images and videos submitted for road condition reporting</li>
                        <li>Session Cookie data</li>
                    </ul>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75]">Why does iRoadCheck collect and process personal data?</h2>
                    <ul class="list-disc ml-6 text-gray-700">
                        <li>To authenticate users submitting road condition reports</li>
                        <li>To enhance efficiency in road maintenance and monitoring</li>
                        <li>To generate insights and data-driven decisions for infrastructure planning</li>
                        <li>To strengthen security and validate submitted reports</li>
                        <li>To create reports required by government regulations</li>
                        <li>To support research and development in transportation infrastructure</li>
                        <li>To comply with legal and regulatory obligations</li>
                        <li>To establish, defend, or exercise legal claims</li>
                    </ul>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75]">How does the City Engineering Office protect personal data?</h2>
                    <p class="text-gray-700">The Office applies physical, technical, and administrative security measures to protect collected data. Access to stored personal information is limited to authorized personnel who are bound by confidentiality agreements...</p>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75]">How long does iRoadCheck retain personal data?</h2>
                    <p class="text-gray-700">Personal information is stored only for as long as necessary to fulfill its intended purpose or comply with legal and regulatory obligations...</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>