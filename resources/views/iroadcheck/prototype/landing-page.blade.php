<x-app-layout>

{{--        <!-- Header -->--}}
{{--        <header class="absolute inset-x-0 top-0 z-50">--}}
{{--            <nav class="mx-auto flex max-full items-center justify-between p-6 lg:px-8" aria-label="Global">--}}
{{--                <div class="flex lg:flex-1">--}}
{{--                    <a href="#" class="p-1.5 -m-1.5 flex">--}}
{{--                        <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block -mt-2" />--}}
{{--                        <span class="text-[#4D4F50] font-pop text-[17px]">--}}
{{--                            iRoadCheck--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="flex lg:hidden">--}}
{{--                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">--}}
{{--                        <span class="sr-only">Open main menu</span>--}}
{{--                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="hidden lg:flex lg:flex-1 lg:justify-end">--}}
{{--                    <a href="#" class="text-sm font-semibold leading-6 text-white">Log in <span aria-hidden="true">&rarr;</span></a>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </header>--}}

{{--        <main class="relative isolate">--}}
{{--            <!-- Background -->--}}
{{--            <div class="absolute inset-x-0 top-4 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">--}}
{{--                <div class="aspect-[1108/632] w-[69.25rem] flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>--}}
{{--            </div>--}}

{{--            <!-- About Us -->--}}
{{--            <div class="px-6 pt-14 lg:px-8">--}}
{{--                <div class="mx-auto max-w-2xl pt-24 text-center sm:pt-40">--}}
{{--                    <h2 class="text-4xl font-bold tracking-tight text-white sm:text-7xl">About Us</h2>--}}
{{--                    <p class="mt-6 text-xl leading-8 text-gray-300">--}}
{{--                        We are BSIT Students from the University of Southeastern Philippines (USeP) - Tagum Campus,--}}
{{--                        brought together during our practicum to create E-Library Hub Logger.--}}
{{--                        Our journey is driven by a passion for technology and a commitment to excellence.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Content section -->--}}
{{--            <div class="mx-auto mt-20 max-w-7xl px-6 lg:px-8">--}}
{{--                <div x-data="{ visible: false }" x-intersect:enter="visible = true" class="mx-auto max-w-2xl lg:max-w-none items-center text-center pop-in" :class="{ 'visible': visible }">--}}
{{--                    <div class="flex justify-center gap-x-6 flex-wrap">--}}
{{--                        <div>--}}
{{--                            <img src="{{ asset('storage/images/portrait-1-elibAboutUs.jpg') }}" alt="elibPhoto" class="w-[300px] mb-4 rounded-[8px]" />--}}
{{--                            <span class="text-gray-300 font-bold text-[16px]">Digital Gateway</span>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <img src="{{ asset('storage/images/portrait-2-elibAboutUs.jpg') }}" alt="elibPhoto" class="w-[300px] mb-4 rounded-[8px]" />--}}
{{--                            <span class="text-gray-300 font-bold text-[16px]">Knowledge Center</span>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <img src="{{ asset('storage/images/portrait-3-elibAboutUs.jpg') }}" alt="elibPhoto" class="w-[300px] mb-4 rounded-[8px]" />--}}
{{--                            <span class="text-gray-300 font-bold text-[16px]">Resource Hub</span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Image section -->--}}
{{--            <div class="relative mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8 pop-in"--}}
{{--                 x-data="{ visible: false }" x-intersect:enter="visible = true" :class="{ 'visible': visible }">--}}
{{--                <img src="{{ asset('storage/images/landscape-1-elibAboutUs.jpg') }}" alt="elibPhoto" class="aspect-[9/4] w-full object-cover xl:rounded-3xl" />--}}

{{--                <!-- Overlay text -->--}}
{{--                <div class="absolute inset-0 flex flex-col items-center justify-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50 rounded-3xl p-4">--}}
{{--                    <div class="text-[20px] font-semibold mb-2">E-Library Hub</div>--}}
{{--                    <div class="text-[14px] font-medium shadow-lg">Located at University of Southeastern Philippines - Tagum Campus</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Team section -->--}}
{{--            <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-8">--}}
{{--                <div class="mx-auto max-w-full lg:mx-0 text-center px-40 mb-14">--}}
{{--                    <h2 class="md:text-5xl font-bold tracking-tight text-gray-300 sm:text-4xl">Our team</h2>--}}
{{--                    <p class="mt-6 text-lg leading-8 text-gray-300">We are dedicated group of developers passionate about creating innovative solutions and driving technological advancements. Our team is composed of individuals with diverse skill sets and experiences, all working together to build E-Library Hub Logger System.</p>--}}
{{--                </div>--}}

{{--                <ul role="list" class="mx-auto mt-24 grid grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-1 lg:grid-cols-2">--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[-10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/KisaiahGraceTorrenueva-formalPic.jpg') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Kisaiah Grace I. Torrenueva</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Project Manager</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Bachelor of Science in Information Technology student at the University of Southeastern Philippines with both technical skills for system development and soft skills for project overseeing. Possess knowledge in both back-end and front-end development, computer system servicing, technical writing, and experience in people management. Currently, I’m managing the entirety and assist in front-end and back-end development of the E-Library Logger System at USEP Tagum-Mabini Campus.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-975-591-8720</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[11px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>kgitorrenueva00366@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/JohnfritzAntipuesto-formalPic.png') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Johnfritz P. Antipuesto</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Lead Backend Developer</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I’m a backend developer with a passion for crafting efficient solutions. I started with Java, then delved into PHP and JavaScript, developing diverse projects like School Management System. My focus now is on Laravel, where I've built a Clinic Appointment System and continue to expand my expertise.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-977-315-4164</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>jpantipuesto00104@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[-10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/MariaSofiaLagdamin-formalPic.jpg') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Maria Sofia B. Lagdamin</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Backend Developer</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Bachelor of Science in Information Technology student at the University of Southeastern Philippines - Tagum Unit. As a junior web developer, I have experience in PHP, JavaScript, HTML, and CSS. Currently, I contribute to the E-Library Hub System at USEP Tagum-Mabini Campus as a Junior Backend Developer Specialist, focusing on backend development and assisting in frontend development. I am dedicated to continuous learning and delivering high-quality, user-friendly web applications.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-985-232-7289</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>msblagdamin00018@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/MarianJoyCorpuz-formalPic.png') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Marian Joy G. Corpuz</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Lead Frontend Developer and UI/UX Designer</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am a front-end developer and UI/UX designer of E-library Hub System at the University of Southeastern Philippines - Tagum Unit. I create and design interfaces tailored to the needs of admin and super admin user. I also work with the other designers and back-end developers to make sure our projects are visually appealing and work well for the users.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-967-147-0078</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>mjgcorpuz00362@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[-10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/AngelJoyAbuloc-formalPic.jpg') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Angel Joy Abuloc</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Lead Documentation Specialist & Frontend Developer</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am the Lead Documentation Specialist and contribute to frontend development for the E-Library Hub System at the University of Southeastern Philippines-Tagum Unit. My responsibilities include maintaining all documentation and individual reports, keeping our activity tracker up to date every day, and assisting the frontend lead with developing the frontend prototype.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-916-592-5217</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>aj-abuloc00361@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li x-data="{ show: false }" x-intersect="show = true" class="relative">--}}
{{--                        <div x-show="show"--}}
{{--                             class="top-0 left-0 w-full p-10 bg-[#202020] rounded-lg shadow-lg z-10 transition-all duration-700 ease-in-out h-[530px]"--}}
{{--                             x-transition:enter="transform transition duration-700"--}}
{{--                             x-transition:enter-start="translate-x-[10%] opacity-0"--}}
{{--                             x-transition:enter-end="translate-x-0 opacity-100">--}}
{{--                            <div class="absolute bg-[#303030] w-28 h-28 rounded-full "><img src="{{ asset('storage/images/MeaveVillanueva-formalPic.jpg') }}" alt="formal-pic" class="absolute ml-2 mt-2 w-24 h-24 rounded-full flex justified-center items-center"/></div>--}}

{{--                            <div>--}}
{{--                                <h3 class="text-lg font-semibold tracking-tight text-gray-300 pl-32 mt-4">Meave R. Villanueva</h3>--}}
{{--                                <p class="text-[14px] text-gray-300 pl-32">Frontend Developer</p>--}}
{{--                                <p class="text-sm leading-6 text-gray-500  pl-32 mb-5">4th Year, BSIT Student</p> <br/>--}}
{{--                            </div>--}}

{{--                            <p class="text-base leading-7 text-gray-300 text-justify italic">--}}
{{--                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Bachelor of Science in Information Technology student at the University of Southeastern Philippines with both technical skills for system development and soft skills for project overseeing. Possess knowledge in both back-end and front-end development, computer system servicing, technical writing, and experience in people management. Currently, I’m managing the entirety and assist in front-end and back-end development of the E-Library Logger System at USEP Tagum-Mabini Campus.--}}
{{--                            </p>--}}

{{--                            <div class="absolute right-0 bottom-4 pr-10 mt-9">--}}
{{--                                <div class="text-[#727272] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>Contact Information</span>--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>+63-991-676-6040</span>--}}
{{--                                    <img src="{{ asset('storage/icons/phone-icon.png') }}" alt="phone-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                                <div class="text-[#E37575] mb-2 text-[12px] flex justify-end items-end space-x-3">--}}
{{--                                    <span>mrvillanueva@usep.edu.ph</span>--}}
{{--                                    <img src="{{ asset('storage/icons/email-icon.png') }}" alt="email-icon" class="w-4 h-4 inline-block" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}


{{--            <!-- CTA section -->--}}
{{--            <div class="relative isolate -z-10 sm:mt-32 pop-in"--}}
{{--                 x-data="{ visible: false }" x-intersect:enter="visible = true" :class="{ 'visible': visible }">--}}
{{--                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">--}}
{{--                    <div class="mx-auto flex max-w-2xl flex-col gap-16 bg-white/5 px-6 py-16 ring-1 ring-white/10 sm:rounded-3xl sm:p-8 lg:mx-0 lg:max-w-none lg:flex-row lg:items-center lg:py-20 xl:gap-x-20 xl:px-20">--}}
{{--                        <img src="{{ asset('storage/images/BSITstudents.jpg') }}" alt="elibPhoto" class="h-96 w-full flex-none rounded-2xl object-cover shadow-xl lg:aspect-square lg:h-auto lg:max-w-sm" />--}}
{{--                        <div class="w-full flex-auto">--}}
{{--                            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-5xl">Our Project</h2>--}}
{{--                            <p class="mt-6 text-xl leading-8 text-gray-300">During our practicum, we developed the e-Library Hub Logger system to streamline library operations and enhance user experience.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="absolute inset-x-0 -top-16 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">--}}
{{--                    <div class="aspect-[1318/752] w-[82.375rem] flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </main>--}}

{{--        <!-- Return to the Previous Page-->--}}
{{--        <div class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">--}}
{{--            <div class="hidden lg:flex lg:flex-1 lg:justify-end">--}}
{{--                <a href="#" class="text-sm font-semibold leading-6 text-white">Back to the Previous Page <span aria-hidden="true">&rarr;</span></a>--}}
{{--            </div>--}}
{{--        </div>--}}

    <!-- Navbar -->
    <header class="fixed w-full bg-[#F5F5F5] z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="p-1.5 -m-1.5 flex">
                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-10 h-10 inline-block -mt-2" />
                <span class="text-[#4D4F50] font-pop text-[17px]">
                    iRoadCheck
                </span>
            </a>

            <div x-data="{
                    tabs: [
                        { key: 'home', label: 'HOME', target: '#home' },
                        { key: 'how-it-works', label: 'HOW IT WORKS', target: '#how-it-works' },
                        { key: 'features', label: 'FEATURES', target: '#features' },
                        { key: 'contact-us', label: 'CONTACT US', target: '#contact-us' }
                    ],
                    activeTab: 'home',
                    setActiveTab(tabKey) {
                        this.activeTab = tabKey;
                    }
                }" class="flex text-sm space-x-8 z-50">
                <template x-for="tab in tabs" :key="tab.key">
                    <a
                        :href="tab.target"
                        @click.prevent="setActiveTab(tab.key)"
                        class="relative font-medium group transition duration-300"
                        :class="activeTab === tab.key
                        ? 'text-[#4AA76F] font-semibold hover:text-[#676767]'
                        : 'text-gray-600 hover:text-[#676767] hover:font-semibold'"
                    >
                        <!-- Tab Label -->
                        <span x-text="tab.label" class="transition duration-300"></span>

                        <!-- Highlight Line -->
                        <span
                            x-show="activeTab === tab.key"
                            class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-transform duration-300 origin-left"
                            x-transition:enter="transition ease-out duration-300 transform scale-x-0"
                            x-transition:enter-start="scale-x-0"
                            x-transition:enter-end="scale-x-100"
                            x-transition:leave="transition ease-in duration-200 transform scale-x-100"
                            x-transition:leave-start="scale-x-100"
                            x-transition:leave-end="scale-x-0"
                        ></span>
                    </a>
                </template>
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

    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
         class="absolute -left-[650px] -top-[600px] w-[1300px] opacity-10 -rotate-90 z-0" />

    <!-- Hero Section -->
    <section id="home" class="bg-[#F5F5F5] px-16 pt-32 pb-32 z-0">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center space-x-24">
            <div class="md:w-1/2 px-6">
                <!--Search-->
                <div class="flex w-full items-start justified-end pr-36 mr-auto z-0">
                    <form class="relative flex flex-1 h-9 rounded-[4px] border-[#F8F7F7] mb-8" action="#" method="GET">
                        <label for="search-field" class="sr-only">Search</label>
                        <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-5 text-gray-400 ml-2 z-10 top-0.5" viewBox="0 0 20 20" fill="#4AA76F" aria-hidden="false">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        <input id="search-field"
                               class="z-0 border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] drop-shadow-md focus:bg-white bg-white rounded-[4px] border-none block h-full w-full py-5 pl-10 text-gray-900 placeholder:text-gray-400 xs:text-[10px] sm:text-[12px] md:text-[14px] lg:text-[16px]"
                               placeholder="Search" type="search" name="search">
                    </form>
                </div>
                <h1 class="text-5xl font-bold text-[#4D4F50] italic leading-normal">"Together, We Make Roads Safer"</h1>
                <p class="text-md text-gray-600 mt-6 mb-4">Start reporting road defects today and help make roads safer.</p>
                <button class="w-2/4 hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-full">REPORT ROAD EFFECT</button>
            </div>
            <div class="md:w-1/2 mt-0 md:mt-0">
                <div class="relative flex items-center justify-center">
                    <!-- Gradient Rectangle -->
                    <div class="ml-10 absolute top-4 rounded-lg bg-gradient-to-b from-green-200 to-yellow-200 w-[600px] h-[500px] animate-wipe-left"></div>

                    <!-- Image -->
                    <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Road Safety"
                         class="relative rounded-lg shadow-lg w-[600px] h-[500px] object-cover z-10 animate-wipe-right">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-center text-3xl font-medium text-[#4D4F50] mb-8">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center space-x-8 mt-10 px-32">
                <div class="space-y-4 shadow-[0px_5px_40px_rgba(0,0,0,0.2)] py-10 rounded-xl">
                    <img src="{{ asset('storage/icons/spotDefect-icon.png') }}" alt="Road Safety" class="h-36 w-36 mx-auto">
                    <h3 class="text-xl text-[#4AA76F] font-semibold">Spot a Defect</h3>
                    <div class="text-gray-600 text-center px-10">Identify road defects in your community.</div>
                </div>
                <div class="space-y-4 shadow-[0px_5px_40px_rgba(0,0,0,0.2)] py-10 rounded-xl">
                    <img src="{{ asset('storage/icons/reportRoadDefect-icon.png') }}" alt="Report" class="h-36 w-36 mx-auto">
                    <h3 class="text-xl text-[#4AA76F] font-semibold">Report It</h3>
                    <div class="text-gray-600 text-center">Submit your report with details.</div>
                </div>
                <div class="space-y-4 shadow-[0px_5px_40px_rgba(0,0,0,0.2)] py-10 rounded-xl">
                    <img src="{{ asset('storage/icons/trackProgress-icon.png') }}" alt="Track" class="h-36 w-36 mx-auto">
                    <h3 class="text-xl text-[#4AA76F] font-semibold">Track Progress</h3>
                    <div class="text-gray-600 text-center">Monitor the status of your reports.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 mt-20">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="text-2xl font-semibold text-gray-600 leading-10">WHY CHOOSE</div>
            <div class="text-3xl font-bold text-[#4D4F50]">iRoadCheck?</div>
        </div>

        <!-- Content -->
        <div class="flex flex-col justify-center items-center">

            <div class="flex items-center space-x-32 mb-8 md:mb-0">
                <img src="{{ asset('storage/icons/easy-reporting-graphics.png') }}" alt="Easy Reporting" class="h-[500px] w-[500px]  animate-wipe-right">
                <div class="left">
                    <h4 class="text-3xl font-semibold text-[#4AA76F]">EASY REPORTING</h4>
                    <p class="text-gray-600 mt-2 text-lg">Quickly capture and send defect reports with just a few taps.</p>
                </div>
            </div>
            <div class="flex items-center space-x-32">
                <div class=" animate-wipe-right">
                    <h4 class="text-3xl font-semibold text-[#4AA76F] text-end">REAL-TIME UPDATES</h4>
                    <p class="text-gray-600 mt-2 text-end text-lg">Receive instant updates on the status of reported defects.</p>
                </div>
                <img src="{{ asset('storage/icons/real-time-updates-graphics.png') }}" alt="Real-Time Updates" class="h-[500px] w-[500px]  animate-wipe-left">
            </div>
            <div class="flex items-center space-x-32">
                <img src="{{ asset('storage/icons/community-impact-graphics.png') }}" alt="Community Impact" class="h-[500px] w-[500px] animate-wipe-right">
                <div class="animate-wipe-left">
                    <h4 class="text-3xl font-semibold text-[#4AA76F]">COMMUNITY IMPACT</h4>
                    <p class="text-gray-600 mt-2 text-lg">Make a difference by contributing to safer roads in your community.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center py-10 px-0 mt-12 mb-20">
        <p class="text-3xl font-medium text-gray-600 mb-4">Want to explore more?</p>
        <button class="mt-4 px-8 py-2 hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-[4px] shadow-lg">
            SIGN UP NOW
        </button>
        <p class="mt-2 text-sm text-gray-500">We will not share your information once you sign up.</p>
    </div>


    <!-- Footer -->
    <footer id="contact-us" class="text-gray-300 p-3 animate-none">
        <div class="container bg-[#4AA76F] py-8 px-12 rounded-xl animate-none w-full mx-auto">
            <div class="flex justify-start">
                <div class="mr-auto">
                    <div class="text-sm font-semibold text-[#F5F5F5] mb-4">Have questions or need assistance? We're here for you!</div>
                    <div class="text-2xl font-bold text-white tracking-wider">CONTACT US</div>
                    <div class="flex mt-5 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 mr-2 fill-current text-white">
                            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>
                        <p class="text-white text-sm italic ">iRoadCheck@gmail.com</p>
                    </div>
                    <div class="flex mt-4 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5 mr-2 fill-current text-white">
                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/>
                        </svg>
                        <p class="text-white text-sm italic ">facebook.com/iRoadCheck.2024</p>
                    </div>
                    <div class="flex mt-4 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 mr-2 fill-current text-white">
                            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                        </svg>
                        <p class="text-white text-sm italic ">+63-912-345-6789</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row space-x-24 mr-auto">
                    <div class="space-y-4 mt-9">
                        <h3 class="text-lg font-semibold text-white">Quick Links</h3>
                        <ul>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">Home</a></li>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">How it works</a></li>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">Features</a></li>
                        </ul>
                    </div>
                    <div class="space-y-4 mt-8">
                        <h3 class="text-lg font-semibold text-white">The Company</h3>
                        <ul>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">Careers</a></li>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">About Us</a></li>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="space-y-4 mt-8 ">
                        <h3 class="text-lg font-semibold text-white">Social Media</h3>
                        <ul>
                            <li><a href="#" class="hover:underline text-[#F5F5F5] text-sm">Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-xs float-right">
                © 2024 iRoadCheck. All rights reserved. Privacy and Policy | Terms and Conditions
            </div>
        </div>
    </footer>

</x-app-layout>
