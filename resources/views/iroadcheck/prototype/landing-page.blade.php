<x-app-layout>
    <div x-data="{
        open: false,
        activeTab: 'home',
        tabs: [
            { key: 'home', label: 'Home', target: '#home' },
            { key: 'how-it-works', label: 'How It Works', target: '#how-it-works' },
            { key: 'features', label: 'Features', target: '#features' },
            { key: 'contact-us', label: 'Contact Us', target: '#contact-us' }
        ]
    }"
         class="lg:mt-0 flex-1 bg-none h-screen overflow-y-auto overflow-x-hidden">

        <!-- Dark Overlay (Backdrop) -->
        <div
            x-show="open"
            @click="open = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        ></div>

        <!-- Navbar -->
        <header class="fixed w-full bg-[#F5F5F5] z-50 shadow-md" x-cloak>
            <div class="container mx-auto px-4 py-4 flex justify-between items-center z-[10000]">
                <a href="#" class="p-1.5 -m-1.5 flex items-center space-x-2">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block +" />
                    <span class="text-[#4D4F50] font-pop text-[14px] md:text-[12px] lg:text-[17px]">
                        iRoadCheck
                    </span>
                </a>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden text-orange-500" id="menuButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <!-- Tabs -->
                <div :class="{'hidden': !open, 'flex': open}" class="shadow-[inset_0_4px_6px_-4px_rgba(0,0,0,0.2)] md:shadow-none flex-col md:flex md:flex-row text-sm space-y-4 md:space-y-0 md:space-x-8 absolute md:relative top-16 md:top-0 w-full md:w-auto left-0 bg-[#F5F5F5] md:bg-transparent p-4 md:p-0 z-50">
                    <template x-for="tab in tabs" :key="tab.key">
                        <button
                            @click="activeTab = tab.key; open = false; document.querySelector(tab.target).scrollIntoView({ behavior: 'smooth', block: 'start' });"
                            :class="activeTab === tab.key ? 'text-[#4AA76F] border-b-2 border-[#4AA76F]' : 'text-gray-700'"
                            class="px-2 py-2 font-medium text-[14px] md:text-[12px]">
                            <span x-text="tab.label"></span>
                        </button>
                    </template>
                    <!-- Mobile LOG IN and SIGN UP buttons -->
                    <div class="flex flex-col space-y-2 md:hidden pt-4">
                        <a href="#" @click="open = false" class="text-center text-orange-500 px-4 py-2 rounded hover:underline">LOG IN</a>
                        <a href="#" @click="open = false" class="text-center bg-green-500 text-white px-4 py-2 rounded hover:bg-[#4AA76F]">SIGN UP</a>
                    </div>
                </div>

                <!-- Desktop LOG IN and SIGN UP buttons -->
                <div class="hidden md:flex space-x-4 font-medium">
                    <a href="#" class="text-xs text-orange-500 px-4 py-2 rounded hover:underline">LOG IN</a>
                    <a href="#" class="text-xs bg-green-500 text-white px-4 py-2 rounded hover:bg-[#4AA76F]">SIGN UP</a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section id="home" x-intersect="activeTab = 'home'" class="min-h-screen relative bg-transparent m-0 md:px-16 mt-0 md:pt-32 md:pb-32 z-10">

            <!-- Background Image -->
            <div class="h-[450px] md:h-[500px] lg:h-screen absolute inset-0 bg-no-repeat bg-center bg-fixed shadow-[inset_0_-40px_40px_-10px_rgba(0,0,0,0.5)]"
                 style="
                    background-image: url('{{ asset('storage/images/bg-tagumRoad-image.jpg') }}');
                    background-size: cover;
                    background-position: center -110px;
                    opacity: 0.95;
                    ">
                <div class="absolute inset-0 bg-black/40 lg:bg-black/60"></div> <!-- Dark overlay -->
            </div>


            <div class="container mx-auto flex flex-col md:flex-row items-center justify-center md:space-x-24 relative z-30 mb-10 md:mb-0">
                <div class="px-10 md:px-0 mt-8 lg:mt-20 flex flex-col w-full items-center justify-center">
                    <!-- Search -->
                    <div class="flex w-full md:w-5/10 items-center justify-center mx-auto mt-20 md:mt-auto">
                        <form class="relative flex w-full h-10 rounded-md border border-gray-300 mb-4 md:mb-8 bg-white shadow-lg" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <svg class="pointer-events-none absolute inset-y-0 left-2 h-full w-5 text-gray-400 top-1/2 transform -translate-y-1/2" viewBox="0 0 20 20" fill="#4AA76F" aria-hidden="false">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                            <input id="search-field"
                                   class="border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#4AA76F] focus:border-[#4AA76F] bg-white rounded-md block h-full w-full py-3 pl-10 text-gray-900 placeholder:text-gray-400 text-sm md:text-base"
                                   placeholder="Search" type="search" name="search">
                        </form>
                    </div>

                    <!-- Heading -->
                    <h1 class="text-center text-[#F5F5F5] text-2xl md:text-3xl lg:text-5xl font-bold italic leading-snug drop-shadow-[2px_2px_10px_rgba(0,0,0,0.5)] md:mb-2 lg:mt-5">
                        "Together, We Make Roads Safer"
                    </h1>

                    <div class="text-sm font-medium lg:text-lg text-gray-200 mt-36 md:mt-0 mb-0 text-center drop-shadow-[6px_5px_10px_rgba(0,0,0,0.5)]">
                        Start reporting road defects today and help make roads safer.
                    </div>

                    <!-- Scroll Down Arrow -->
                    <div class="flex justify-center mt-1 md:hidden block">
                        <button onclick="scrollToReport()" class="animate-bounce text-white text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="24" height="24" fill="currentColor">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Report Section -->
            <div class="flex justify-center items-center bg-transparent flex-col relative overflow-visible w-full">
                <div id="report-section" class="lg:w-1/2 mt-20 md:mt-5 mb-10 md:mb-[50vh] flex flex-col items-center relative w-full">
                    <!-- Floating Dots -->
                    <div class="absolute inset-0 flex justify-center items-center z-0">
                        <div class="relative w-full h-full block md:hidden">
                            <!-- Green Dots -->
                            <div class="absolute w-4 h-4 bg-[#4AA76F] rounded-full top-[-10px] left-10 floating-dot1"></div>
                            <div class="absolute w-5 h-5 bg-[#4AA76F] rounded-full top-20 right-16 floating-dot2"></div>
                            <div class="absolute w-2 h-2 bg-[#4AA76F] rounded-full bottom-20 right-20 floating-dot3"></div>
                            <div class="absolute w-2 h-2 bg-[#4AA76F] rounded-full top-20 left-24 floating-dot4"></div>
                            <div class="absolute w-2 h-2 bg-[#4AA76F] rounded-full top-10 left-24 floating-dot1"></div>

                            <!-- Orange Dots -->
                            <div class="absolute w-3 h-3 bg-[#F8A15E] rounded-full top-6 right-6 floating-dot2"></div>
                            <div class="absolute w-4 h-4 bg-[#F8A15E] rounded-full bottom-20 right-1/2 floating-dot1"></div>
                            <div class="absolute w-2 h-2 bg-[#F8A15E] rounded-full bottom-8 left-3 floating-dot3"></div>
                            <div class="absolute w-3 h-3 bg-[#F8A15E] rounded-full bottom-14 left-1/3 floating-dot4"></div>
                        </div>
                    </div>

                    <!-- Report Button -->
                    <button class="relative w-3/4 md:w-1/2 lg:w-2/4 md:shadow hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-4 md:p-4 font-semibold my-4 md:my-6 rounded-full">
                        Report Road Defect
                    </button>
                </div>

                <!-- Text Box with Alpine.js -->
                <div class="bg-white shadow-lg md:bg-transparent md:shadow-none rounded-lg mx-5 px-7 py-10 text-center mt-14 md:-mt-10 lg:mb-24 lg:mt-48 relative pop-in"
                     x-data="{ visible: false }" x-intersect:enter="visible = true"  x-intersect:leave="visible =  false" :class="{ 'visible': visible }">
                    <!-- Floating Dots-->
                    <div class="absolute inset-0 hidden md:flex justify-center items-center z-0">
                        <div class="relative w-full h-full">
                            <!-- Green Dots (Wider Spacing) -->
                            <div class="absolute w-6 h-6 bg-[#4AA76F] rounded-full top-[-100px] left-[-50px] floating-dot1"></div>
                            <div class="absolute w-7 h-7 bg-[#4AA76F] rounded-full top-[300px] right-48 floating-dot2"></div>
                            <div class="absolute w-3 h-3 bg-[#4AA76F] rounded-full top-[200px] right-10 floating-dot3"></div>
                            <div class="absolute w-3 h-3 bg-[#4AA76F] rounded-full top-[-30px] left-80 floating-dot4"></div>
                            <div class="absolute w-3 h-3 bg-[#4AA76F] rounded-full bottom-[-10px] left-[-50px] floating-dot3"></div>

                            <!-- Orange Dots (Wider Spacing) -->
                            <div class="absolute w-5 h-5 bg-[#F8A15E] rounded-full top-[30px] right-[-100px] floating-dot2"></div>
                            <div class="absolute w-6 h-6 bg-[#F8A15E] rounded-full bottom-80 right-[20%] floating-dot1"></div>
                            <div class="absolute w-2 h-2 bg-[#F8A15E] rounded-full bottom-60 left-[10%] floating-dot4"></div>
                            <div class="absolute w-2 h-2 bg-[#F8A15E] rounded-full top-[250px] left-[30%] floating-dot4"></div>
                        </div>
                    </div>
                    <div class="text-lg md:text-4xl lg:text-5xl font-bold md:leading-loose relative z-10">
                        <span class="text-green-700">We build this for</span>
                        <span class="text-orange-500"> you</span>
                        <span class="text-green-700"> and for</span>
                        <br>
                        <span class="text-orange-500">your safety</span>
                        <span class="text-green-700">.</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" x-intersect="activeTab = 'how-it-works'" class="min-h-screen py-32 lg:px-32 relative" x-data="{}">
            <div class="container mx-none">
                <h2 class="text-center text-4xl lg:text-3xl font-medium text-[#4D4F50] pb-14">How It Works</h2>

                <!-- Scrollable Wrapper for Mobile & Tablet -->
                <div class="relative" x-data="{ canScrollLeft: false, canScrollRight: false }" x-init="
                        $nextTick(() => {
                            let container = document.getElementById('scroll-container');
                            canScrollRight = container.scrollWidth > container.clientWidth;

                            container.addEventListener('scroll', () => {
                                canScrollLeft = container.scrollLeft > 0;
                                canScrollRight = container.scrollLeft < container.scrollWidth - container.clientWidth;
                            });
                        });
                    ">
                    <!-- Left Shadow Background -->
                    <div class="absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-black/10 via-transparent to-transparent z-10 pointer-events-none md:hidden"
                         x-show="canScrollLeft"></div>

                    <!-- Left Navigation Button (Mobile & Tablet) -->
                    <button @click="document.getElementById('scroll-container').scrollBy({ left: -300, behavior: 'smooth' })"
                            class="absolute left-0 top-1/2 -translate-y-1/2 p-3 z-20 md:hidden text-gray-500"
                            x-show="canScrollLeft">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="w-5 h-5 fill-current transform scale-x-[-1]">
                            <path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                        </svg>
                    </button>

                    <div id="scroll-container" class="bg-none flex space-x-2 overflow-x-auto no-scrollbar snap-x snap-mandatory px-4 py-4 md:grid md:grid-cols-3 md:space-x-10 md:overflow-visible pop-in"
                         x-data="{ visible: false }" x-intersect:enter="visible = true" x-intersect:leave="visible = false" :class="{ 'visible': visible }"
                    >
                        <!-- Spot a Defect -->
                        <div class="flex-shrink-0 w-8/10 md:w-auto space-y-4 py-10 rounded-xl text-center snap-center border border-gray-300 lg:shadow-[0px_5px_40px_rgba(0,0,0,0.2)] lg:border-none">
                            <h3 class="text-xl text-[#4AA76F] font-semibold">Spot a Defect</h3>
                            <img src="{{ asset('storage/icons/spotDefect-icon.png') }}" alt="Road Safety" class="h-36 w-36 mx-auto">
                            <div class="text-gray-600 text-center px-6">Identify road defects in your community.</div>
                        </div>

                        <!-- Report It -->
                        <div class="flex-shrink-0 w-8/10 md:w-auto space-y-4 py-10 rounded-xl text-center snap-center border border-gray-300 lg:shadow-[0px_5px_40px_rgba(0,0,0,0.2)] lg:border-none">
                            <h3 class="text-xl text-[#4AA76F] font-semibold">Report It</h3>
                            <img src="{{ asset('storage/icons/reportRoadDefect-icon.png') }}" alt="Report" class="h-36 w-36 mx-auto">
                            <div class="text-gray-600 text-center px-6">Submit your report with details.</div>
                        </div>

                        <!-- Track Progress -->
                        <div class="flex-shrink-0 w-8/10 md:w-auto space-y-4 py-10 rounded-xl text-center snap-center border border-gray-300 lg:shadow-[0px_5px_40px_rgba(0,0,0,0.2)] lg:border-none">
                            <h3 class="text-xl text-[#4AA76F] font-semibold">Track Progress</h3>
                            <img src="{{ asset('storage/icons/trackProgress-icon.png') }}" alt="Track" class="h-36 w-36 mx-auto">
                            <div class="text-gray-600 text-center px-6">Monitor the status of your reports.</div>
                        </div>
                    </div>

                    <!-- Right Navigation Button (Mobile & Tablet) -->
                    <button @click="document.getElementById('scroll-container').scrollBy({ left: 300, behavior: 'smooth' })"
                            class="absolute right-0 top-1/2 -translate-y-1/2 p-3 z-20 md:hidden text-gray-500"
                            x-show="canScrollRight">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="w-5 h-5 fill-current">
                            <path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                        </svg>
                    </button>

                    <!-- Right Shadow Background -->
                    <div class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-black/10 via-transparent to-transparent z-10 pointer-events-none md:hidden"
                         x-show="canScrollRight"></div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="pt-20 min-h-screen" x-data="{ show: false }" x-intersect="() => { show = true; activeTab = 'features'; }">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-2xl lg:text-4xl font-semibold text-gray-600 leading-10">WHY CHOOSE</div>
                <div class="text-3xl lg:text-5xl font-bold text-[#4D4F50]">iRoadCheck?</div>
            </div>

            <!-- Content -->
            <div class="flex flex-col justify-center items-center space-y-12 mx-10 lg:mx-0">
                <!-- Feature 1 - Slide from left -->
                <div x-data="{ show: false }"
                    x-intersect:enter="show = true"
                    x-intersect:leave="show = false">
                    <div class="shadow-[0px_5px_40px_rgba(0,0,0,0.2)] md:shadow-none py-10 px-5 rounded-xl flex flex-col-reverse md:flex-row items-center lg:space-x-32 md:space-x-16 sm:space-x-8 text-center md:text-left transition-all duration-700 ease-in-out"
                         x-show="show"
                         x-transition:enter="transform transition duration-700"
                         x-transition:enter-start="translate-x-[-10%] opacity-0"
                         x-transition:enter-end="translate-x-0 opacity-100"
                         x-transition:leave="transform transition duration-700"
                         x-transition:leave-start="translate-x-0 opacity-100"
                         x-transition:leave-end="translate-x-[-10%] opacity-0">
                        <div class="md:w-6/10">
                            <h4 class="text-md md:text-3xl font-bold text-[#4AA76F] tracking-widest">EASY REPORTING</h4>
                            <p class="text-gray-600 mt-2 text-md md:text-lg">Quickly capture and send defect reports with just a few taps.</p>
                        </div>
                        <img src="{{ asset('storage/icons/easy-reporting-graphics.png') }}" alt="Easy Reporting"
                             class="max-w-full md:w-4/10 lg:w-[500px] h-auto">
                    </div>
                </div>

                <!-- Feature 2 - Slide from right -->
                <div x-data="{ show: false }"
                     x-intersect:enter="show = true"
                     x-intersect:leave="show = false">
                    <div class="shadow-[0px_5px_40px_rgba(0,0,0,0.2)] md:shadow-none py-10 px-5 rounded-xl flex flex-col md:flex-row items-center lg:space-x-32 md:space-x-16 sm:space-x-8 text-center md:text-right transition-all duration-700 ease-in-out"
                     x-show="show"
                     x-transition:enter="transform transition duration-700"
                     x-transition:enter-start="translate-x-[10%] opacity-0"
                     x-transition:enter-end="translate-x-0 opacity-100">
                    <img src="{{ asset('storage/icons/real-time-updates-graphics.png') }}" alt="Real-Time Updates"
                         class="max-w-full md:w-3/10 lg:w-[500px] h-auto">
                    <div class="md:w-7/10">
                        <h4 class="text-md md:text-3xl font-bold text-[#4AA76F] mt-2 tracking-widest">REAL-TIME UPDATES</h4>
                        <p class="text-gray-600 mt-2 text-md md:text-lg">Receive instant updates on the status of reported defects.</p>
                    </div>
                </div>
                </div>

                <!-- Feature 3 - Slide from left -->
                <div x-data="{ show: false }"
                     x-intersect:enter="show = true"
                     x-intersect:leave="show = false">
                    <div class="shadow-[0px_5px_40px_rgba(0,0,0,0.2)] md:shadow-none py-10 px-5 rounded-xl flex flex-col-reverse md:flex-row items-center lg:space-x-32 md:space-x-16 sm:space-x-8 text-center md:text-left transition-all duration-700 ease-in-out"
                         x-show="show"
                         x-transition:enter="transform transition duration-700"
                         x-transition:enter-start="translate-x-[-10%] opacity-0"
                         x-transition:enter-end="translate-x-0 opacity-100"
                         x-transition:leave="transform transition duration-700"
                         x-transition:leave-start="translate-x-0 opacity-100"
                         x-transition:leave-end="translate-x-[-10%] opacity-0">
                    <div class="md:w-6/10">
                        <h4 class="text-md md:text-3xl font-bold text-[#4AA76F] tracking-widest">COMMUNITY IMPACT</h4>
                        <p class="text-gray-600 mt-2 text-md md:text-lg">Make a difference by contributing to safer roads in your community.</p>
                    </div>
                    <img src="{{ asset('storage/icons/community-impact-graphics.png') }}" alt="Community Impact"
                         class="max-w-full md:w-3/10 lg:w-[500px] h-auto">
                    </div>
                </div>
            </div>
        </section>

        <!-- Want to explore more section -->
        <div class="text-center py-24">
            <p class="text-3xl font-medium text-gray-600 mb-4">Want to explore more?</p>
            <button class="mt-4 px-8 py-2 hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold rounded-[4px] shadow-[0_4px_10px_rgba(90,145,94,0.7)]">
                SIGN UP NOW
            </button>
            <p class="mt-4 mx-10 text-sm text-gray-500">We will not share your information once you sign up.</p>
        </div>

        <!-- Contact Us Section -->
        <section id="contact-us" x-intersect="activeTab = 'contact-us'" class="w-full p-0 text-gray-30 lg:p-3">
            <div class="container bg-[#4AA76F] pt-20 px-8 md:pt-5 rounded-t-[50px] lg:rounded-xl w-full h-full flex justify-center items-center flex-col ">
                <div class="text-center text-sm md:text-md font-semibold text-[#F5F5F5] mb-10 md:mb-5">
                    Have questions or need assistance? We're here for you!
                </div>

                <div class="text-center text-2xl md:text-3xl font-bold text-white tracking-wider mb-10 md:mb-5">CONTACT US</div>

                <!-- Contact Icons -->
                <div class="flex flex-col md:flex-row items-center justify-center mb-10 space-y-3 md:space-y-0 md:space-x-10">
                    <div class="flex flex-col md:flex-row items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-8 w-8 md:h-5 md:w-5 md:mr-2 fill-current text-white hidden md:block">
                            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>
                        <p class="text-white text-sm italic">iRoadCheck@gmail.com</p>
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-8 w-8 md:h-5 md:w-5 md:mr-2 fill-current text-white hidden md:block">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/>
                        </svg>
                        <p class="text-white text-sm italic">facebook.com/iRoadCheck.2024</p>
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 w-7 md:h-5 md:w-5 md:mr-2 fill-current text-white hidden md:block">
                            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                        </svg>
                        <p class="text-white text-sm italic">+63-912-345-6789</p>
                    </div>
                </div>

                <!-- Links -->
                <div class="block md:hidden grid grid-cols-1 md:grid-cols-2 lg:gap-8 text-center text-white mt-10 md:-mt-10">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a @click="activeTab = 'home'; document.getElementById('home').scrollIntoView({ behavior: 'smooth', block: 'start' })" class="hover:underline cursor-pointer">
                                Home
                            </a>
                        </li>
                        <li>
                            <a @click="activeTab = 'how-it-works'; document.getElementById('how-it-works').scrollIntoView({ behavior: 'smooth', block: 'start' })" class="hover:underline cursor-pointer">
                                How it Works
                            </a>
                        </li>
                        <li>
                            <a @click="activeTab = 'features'; document.getElementById('features').scrollIntoView({ behavior: 'smooth', block: 'start' })" class="hover:underline cursor-pointer">
                                Features
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Footer -->
                <div class="text-xs text-center w-full lg:mt-0 text-[#F5F5F5] pb-5 mt-10">
                    © 2024 iRoadCheck. All rights reserved.
                    <span class="mx-2">|</span>
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="hover:underline">Terms and Conditions</a>
                </div>
            </div>
        </section>
    </div>

    <script>
        function scrollToReport() {
            document.getElementById("report-section").scrollIntoView({
                behavior: 'smooth',
                block: 'center' // Ensures the section is centered but not overly scrolled
            });
        }
        document.getElementById("menuButton").addEventListener("click", function () {
            localStorage.clear();
            sessionStorage.clear();
        });
        document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll("section");

            const options = {
                root: null,
                rootMargin: "-10% 0px -20% 0px", // Adjusted for faster triggering
                threshold: 0.3 // Now detects as soon as 30% of the section is visible
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        window.activeTab = entry.target.id; // Update Alpine.js state
                    }
                });
            }, options);

            sections.forEach(section => observer.observe(section));
        });
    </script>
</x-app-layout>
