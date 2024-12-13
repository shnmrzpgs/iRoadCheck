<x-app-layout>
    <div  x-data="{ 
                    activeTab: localStorage.getItem('activeTab') || 'dashboard', 
                    setActiveTab(tab) { 
                        this.activeTab = tab; 
                        localStorage.setItem('activeTab', tab); 
                    } 
                }"
        class="fixed bottom-0 sm:left-[10%] left-0 right-0 bg-white shadow-[0px_5px_40px_rgba(0,0,0,0.5)] flex justify-between items-center px-4 sm:py-2 py-2 sm:rounded-2xl rounded-t-2xl w-[100%] sm:w-[80%] sm:mb-2 z-50">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" @click="setActiveTab('dashboard')"><div
            @click="activeTab = 'dashboard'"
            class="relative flex flex-col items-center transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <!-- Wave Shape -->
            <div
                class="absolute top-0 left-0 w-full h-full z-0"
                :class="activeTab === 'dashboard' ? 'block' : 'hidden'">
                <svg
                    class="absolute md:-mt-5 -mt-8 md:w-[130px] md:h-[70px] w-[106px] h-[80px]"
                    viewBox="0 0 67 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M63.5002 0C47.4347 0 51.7801 24.9995 33.1106 24.9995C14.4412 24.9995 19.0618 0 4.00012 0C-11.0615 0 33.1105 0 33.1105 0C33.1105 0 79.5658 0 63.5002 0Z"
                        fill="#4AA76F" />
                </svg>
            </div>

            <div class="md:pl-8 pl-6">
                <!-- Icon -->
                <div
                    class="z-50 relative flex justify-center items-center mt-2 sm:-pb-4"
                    :class="activeTab === 'dashboard' ? '-top-3 md:-top-2 text-white' : 'text-[#4AA76F]'">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                        <defs>
                            <clipPath id="a3a56458c2">
                                <path d="M 45 100 L 331 100 L 331 357.609375 L 45 357.609375 Z M 45 100 " clip-rule="nonzero" />
                            </clipPath>
                        </defs>
                        <path fill="currentColor" d="M 359.261719 136.699219 L 301.542969 94.277344 L 301.542969 43.675781 C 301.542969 35.742188 295.097656 29.324219 287.171875 29.324219 L 263.808594 29.324219 C 255.871094 29.324219 249.4375 35.753906 249.4375 43.675781 L 249.4375 55.96875 L 205.425781 23.628906 C 195.878906 16.59375 180.246094 16.59375 170.695312 23.628906 L 16.863281 136.699219 C 7.3125 143.722656 5.253906 157.289062 12.285156 166.839844 L 16.535156 172.605469 C 23.554688 182.15625 37.128906 184.222656 46.667969 177.199219 L 170.695312 85.996094 C 180.246094 78.972656 195.878906 78.972656 205.425781 85.996094 L 329.445312 177.199219 C 338.996094 184.222656 352.558594 182.144531 359.578125 172.605469 L 363.839844 166.839844 C 370.859375 157.289062 368.800781 143.722656 359.261719 136.699219 Z M 359.261719 136.699219 "
                            fill-rule="nonzero" />
                        <g clip-path="url(#a3a56458c2)">
                            <path fill="currentColor" d="M 313.242188 185.132812 L 205.394531 105.492188 C 195.855469 98.449219 180.269531 98.449219 170.730469 105.492188 L 62.882812 185.132812 C 53.347656 192.179688 45.542969 202.484375 45.542969 208.070312 L 45.542969 323.535156 C 45.542969 342.28125 61.625 357.484375 81.476562 357.484375 L 147.335938 357.484375 L 147.335938 255.347656 C 147.335938 247.457031 153.804688 241.007812 161.699219 241.007812 L 214.402344 241.007812 C 222.296875 241.007812 228.765625 247.457031 228.765625 255.347656 L 228.765625 357.484375 L 294.636719 357.484375 C 314.476562 357.484375 330.550781 342.28125 330.550781 323.535156 L 330.550781 208.070312 C 330.5625 202.484375 322.777344 192.179688 313.242188 185.132812 Z M 313.242188 185.132812 " fill-opacity="1" fill-rule="nonzero" />
                        </g>
                    </svg>
                </div>

                <!-- Label -->
                <span
                    :class="activeTab === 'dashboard' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px]">
                    Dashboard
                </span>
            </div>
        </div></a>

        <!-- Report Road Issue -->
        <a href="{{ route('report-road-issue') }} " @click="setActiveTab('report-road-issue')"><div
            @click="activeTab = 'report-road-issue'"
            class="relative flex flex-col items-center transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <!-- Wave Shape -->
            <div
                class="absolute top-0 -left-4 lg:left-5 w-full h-full z-0"
                :class="activeTab === 'report-road-issue' ? 'block' : 'hidden'">
                <svg
                    class="absolute md:-mt-5 -mt-8 md:w-[130px] md:h-[70px] w-[106px] h-[80px]"
                    viewBox="0 0 67 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M63.5002 0C47.4347 0 51.7801 24.9995 33.1106 24.9995C14.4412 24.9995 19.0618 0 4.00012 0C-11.0615 0 33.1105 0 33.1105 0C33.1105 0 79.5658 0 63.5002 0Z"
                        fill="#4AA76F" />
                </svg>
            </div>

            <div class="md:pl-10 pl-5">
                <!-- Icon -->
                <div
                    class="z-50 relative flex justify-center items-center mt-2 sm:-pb-5"
                    :class="activeTab === 'report-road-issue' ? 'md:-top-2 -top-3 text-white' : 'text-[#4AA76F]'">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" fill-rule="nonzero" d="M9 7.6875C9.31065 7.6875 9.5625 7.93935 9.5625 8.25V9.1875H10.5C10.8107 9.1875 11.0625 9.43935 11.0625 9.75C11.0625 10.0607 10.8107 10.3125 10.5 10.3125H9.5625V11.25C9.5625 11.5607 9.31065 11.8125 9 11.8125C8.68935 11.8125 8.4375 11.5607 8.4375 11.25V10.3125H7.5C7.18934 10.3125 6.9375 10.0607 6.9375 9.75C6.9375 9.43935 7.18934 9.1875 7.5 9.1875H8.4375V8.25C8.4375 7.93935 8.68935 7.6875 9 7.6875Z" fill="#5A915E" />
                        <path fill="currentColor" fill-rule="nonzero" d="M7.33333 15.75H10.6666C13.0075 15.75 14.1778 15.75 15.0186 15.1985C15.3825 14.9597 15.695 14.6528 15.9382 14.2955C16.5 13.4701 16.5 12.3209 16.5 10.0227C16.5 7.72455 16.5 6.57541 15.9382 5.74995C15.695 5.39261 15.3825 5.08578 15.0186 4.84701C14.4783 4.4926 13.802 4.36592 12.7665 4.32064C12.2723 4.32064 11.8469 3.95301 11.75 3.47727C11.6046 2.76367 10.9664 2.25 10.2253 2.25H7.77472C7.03354 2.25 6.39536 2.76367 6.25 3.47727C6.15309 3.95301 5.72764 4.32064 5.2335 4.32064C4.198 4.36592 3.52166 4.4926 2.98143 4.84701C2.61746 5.08578 2.30496 5.39261 2.06177 5.74995C1.5 6.57541 1.5 7.72455 1.5 10.0227C1.5 12.3209 1.5 13.4701 2.06177 14.2955C2.30496 14.6528 2.61746 14.9597 2.98143 15.1985C3.82218 15.75 4.99256 15.75 7.33333 15.75ZM12 9.75C12 11.4068 10.6568 12.75 9 12.75C7.34314 12.75 6 11.4068 6 9.75C6 8.09318 7.34314 6.75 9 6.75C10.6568 6.75 12 8.09318 12 9.75ZM13.5 6.9375C13.1893 6.9375 12.9375 7.18934 12.9375 7.5C12.9375 7.81065 13.1893 8.0625 13.5 8.0625H14.25C14.5606 8.0625 14.8125 7.81065 14.8125 7.5C14.8125 7.18934 14.5606 6.9375 14.25 6.9375H13.5Z" fill="#5A915E" />
                    </svg>
                </div>

                <!-- Label -->
                <span
                    :class="activeTab === 'report-road-issue' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:block hidden sm:-pb-5">
                    Report Road Issue
                </span>
                <span
                    :class="activeTab === 'report-road-issue' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:hidden">
                    Report 
                </span>
            </div>
        </div></a>

        <!-- Suggestion Report -->
        <a href="{{ route('suggestion-reports') }}" @click="setActiveTab('suggestion-reports')"><div
            @click="activeTab = 'suggestion-reports'"
            class="relative flex flex-col items-center transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <!-- Wave Shape -->
            <div
                class="absolute top-0 -left-1 lg:left-5 w-full h-full z-0"
                :class="activeTab === 'suggestion-reports' ? 'block' : 'hidden'">
                <svg
                    class="absolute md:-mt-5 -mt-8 md:w-[130px] md:h-[70px] w-[106px] h-[80px]"
                    viewBox="0 0 67 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M63.5002 0C47.4347 0 51.7801 24.9995 33.1106 24.9995C14.4412 24.9995 19.0618 0 4.00012 0C-11.0615 0 33.1105 0 33.1105 0C33.1105 0 79.5658 0 63.5002 0Z"
                        fill="#4AA76F" />
                </svg>
            </div>

            <div class="md:pl-10 pl-5">
                <!-- Icon -->
                <div
                    class="z-50 relative flex justify-center items-center mt-2"
                    :class="activeTab === 'suggestion-reports' ? 'md:-top-1 -top-2 text-white' : 'text-[#4AA76F]'">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M16 6.5C16 10.0906 12.4187 13 8 13C7.01562 13 6.07187 12.8562 5.2 12.5906L0.5 14L1.77813 10.5875C0.665625 9.47187 0 8.05 0 6.5C0 2.90937 3.58125 0 8 0C12.4187 0 16 2.90937 16 6.5ZM11.5312 5.03125L12.0625 4.5L11 3.44063L10.4688 3.97188L7 7.44063L5.53125 5.97188L5 5.44063L3.94062 6.5L4.47188 7.03125L6.47188 9.03125L7.00313 9.5625L7.53438 9.03125L11.5312 5.03125Z" fill="#5A915E" />
                    </svg>
                </div>

                <!-- Label -->
                <span
                    :class="activeTab === 'suggestion-reports' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:block hidden" >
                    Suggestion Reports
                </span>
                <span
                    :class="activeTab === 'suggestion-reports' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:hidden">
                    Suggestions
                </span>
            </div>
        </div></a>

        <!-- Report History -->
        <a href="{{ route('report-history') }}" @click="setActiveTab('report-history')"><div
            @click="activeTab = 'report-history'"
            class="relative flex flex-col items-center transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <!-- Wave Shape -->
            <div
                class="absolute top-0 -left-4 w-full h-full z-0"
                :class="activeTab === 'report-history' ? 'block' : 'hidden'">
                <svg
                    class="absolute md:-mt-5 -mt-8 md:w-[130px] md:h-[70px] w-[106px] h-[80px]"
                    viewBox="0 0 67 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M63.5002 0C47.4347 0 51.7801 24.9995 33.1106 24.9995C14.4412 24.9995 19.0618 0 4.00012 0C-11.0615 0 33.1105 0 33.1105 0C33.1105 0 79.5658 0 63.5002 0Z"
                        fill="#4AA76F"/>
                </svg>
            </div>

            <div class="md:px-8 px-5">
                <!-- Icon -->
                <div
                    class="z-50 relative flex justify-center items-center mt-2"
                    :class="activeTab === 'report-history' ? 'md:-top-1 -top-2 text-white ' : 'text-[#4AA76F]'">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0ZM6.79688 3.51562V7.28613L5.03906 9.92285L4.64941 10.5088L5.81836 11.2881L6.20801 10.7021L8.08301 7.88965L8.2002 7.71387V7.5V3.51562V2.8125H6.79395V3.51562H6.79688Z" fill="#5A915E" />
                    </svg>
                </div>

                <!-- Label -->
                <span
                    :class="activeTab === 'report-history' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:block hidden">
                    Report History
                </span>
                <span
                    :class="activeTab === 'report-history' ? 'text-[#4AA76F] font-semibold' : 'text-[#4AA76F]'"
                    class=" text-[10px] lg:hidden">
                    History
                </span>
            </div>
        </div></a>
    </div>
</x-app-layout>