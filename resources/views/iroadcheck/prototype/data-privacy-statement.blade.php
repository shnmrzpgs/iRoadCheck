<x-app-layout>
    <div class="lg:mt-0 flex-1 rounded-md mb-4 mx-1 lg:mx-0 bg-none h-screen overflow-y-auto overflow-x-hidden">

        <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
            class="fixed -left-[650px] -top-[600px] w-[1300px] opacity-15 -rotate-90 sm:block" />

        <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
            class="fixed -right-[400px] top-28 w-[1000px] opacity-25 -rotate-90 sm:block" />

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
                    <a href="{{ route('landing-page') }}#home"
                        class="px-2 py-2 font-medium text-[14px]">
                        Home
                    </a>
                    <a href="{{ route('landing-page') }}#how-it-works"
                        class="px-2 py-2 font-medium text-[14px]">
                        How It Works
                    </a>
                    <a href="{{ route('landing-page') }}#features"
                        class="px-2 py-2 font-medium text-[14px]">
                        Features
                    </a>
                    <a href="{{ route('landing-page') }}#contact-us"
                        class="px-2 py-2 font-medium text-[14px]">
                        Contact Us
                    </a>
                </div>

                <!-- Desktop Login/Signup Buttons -->
                <div class="hidden md:flex space-x-4 font-medium">
                    <a href="{{ route('residents-login') }}" class="text-xs text-orange-500 px-4 py-2 rounded hover:underline">LOG IN</a>
                    <a href="{{ route('residents-signup') }}" class="text-xs bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white px-4 py-2 rounded hover:bg-[#4AA76F]">SIGN UP</a>
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
                    <a href="{{ route('landing-page') }}#home"
                        class="py-2 font-medium text-[14px]">
                        Home
                    </a>
                    <a href="{{ route('landing-page') }}#how-it-works"
                        class="py-2 font-medium text-[14px]">
                        How It Works
                    </a>
                    <a href="{{ route('landing-page') }}#features"
                        class="py-2 font-medium text-[14px]">
                        Features
                    </a>
                    <a href="{{ route('landing-page') }}#contact-us"
                        class="py-2 font-medium text-[14px]">
                        Contact Us
                    </a>
                    <hr class="my-2">
                    <a href="{{ route('residents-login') }}" class="text-sm text-orange-500 py-2 text-center hover:underline">LOG IN</a>
                    <a href="{{ route('residents-signup') }}" class="text-sm bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white py-2 rounded text-center hover:bg-[#4AA76F]">SIGN UP</a>
                </div>
            </div>
        </header>


        <div class="bg-transparent px-4 pt-32 pb-32 z-10">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center space-x-24">
                <div class="px-2 z-10">
                    <h1 class="lg:text-3xl text-2xl font-bold text-[#4AA76F] italic leading-normal">iRoadCheck's Data Privacy Statement</h1>
                    <p class="mt-4 text-gray-700 lg:text-md text-sm ">The City Engineering Office of Tagum City values the right to privacy as a fundamental human right. In line with this, we are committed to protecting personal data by following key privacy principles and employing standard security measures in how we collect, process, share, and store personal information...</p>
                    <p class="mt-4 text-gray-700 lg:text-md text-sm ">This iRoadCheck Data Privacy Statement ("IDPS") provides an overview of how the Office manages data collected through iRoadCheck, a system used for monitoring and reporting road conditions...</p>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75] mb-2">What personal data does the iRoadCheck system collect and process?</h2>
                    <ul class="list-disc ml-6 text-gray-700 lg:text-md text-sm">
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
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75] mb-2">Why does iRoadCheck collect and process personal data?</h2>
                    <ul class="list-disc ml-6 text-gray-700 lg:text-md text-sm">
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
                    <p class="text-gray-700 lg:text-md text-sm mb-2">The Office applies physical, technical, and administrative security measures to protect collected data. Access to stored personal information is limited to authorized personnel who are bound by confidentiality agreements...</p>
                    <h2 class="mt-6 text-xl font-semibold text-[#4faf75]">How long does iRoadCheck retain personal data?</h2>
                    <p class="text-gray-700 lg:text-md text-sm mb-2">Personal information is stored only for as long as necessary to fulfill its intended purpose or comply with legal and regulatory obligations...</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>