<x-app-layout title="iRoadCheck | Update Road Defect">
    <x-Staff.staff-navigation page_title="Update Road Defect">
        <div class="flex flex-col items-center justify-center w-full mb-10 lg:hidden" x-data="{  step: 1, selected: '', cameraOpen: false, photoCaptured: false, photo: null, locationCaptured: false}">
            <div class="w-full md:w-[85%] flex flex-col justify-center items-center">

                <!-- Breadcrumbs Report Road Issue Steps -->
                <nav class="sticky z-10 -top-3 py-3 overflow-hidden bg-[#F5F5F5] left-0 w-full flex flex-col justify-center items-center text-gray-700 rounded-lg lg:pl-4">

                    <!-- Steps Description -->
                    <div class="text-center text-[13px] md:text-sm">
                        <div :class="step === 1 ? 'text-gray-500 font-medium' : 'hidden'">Capture road defect updates.</div>
                        <div :class="step === 2 ? 'text-gray-500 font-medium' : 'hidden'">View your Report Road Concern Information</div>
                    </div>

                </nav>

                <!-- Steps Content -->
                <div class="w-full flex justify-center items-center mx-auto">

                    <!-- Step 1 | Capture Road Defect -->
                    <template x-if="step === 1 && !showModal">
                        <div class="flex items-center justify-center flex-col mt-2 mb-2 bg-none w-full mx-auto h-[55vh] relative" x-data="captureHandler()">

                            <div class="z-0 relative w-full bg-white border-2 border-gray-300 shadow-md rounded-lg overflow-hidden">
                                <x-residents.svg-report-road-issue/>
                            </div>
                            <livewire:flash-message />
                            <livewire:review-update/>
                            <livewire:no-defect-modal/>
{{--                            <livewire:first-login-modal/>--}}

                            <!-- "How to Capture Road Issue" link to reopen modal -->
{{--                            <button wire:click="$dispatch('openFirstLoginModal')" class="mt-3 text-blue-600 underline text-sm">--}}
{{--                                How to Capture Road Issues Properly?--}}
{{--                            </button>--}}

                            <!-- Report Road Issue Button -->
                            <div class="mt-10 w-[85%] text-center mx-auto max-w-md">
                                <button @click="openCamera()" class="px-4 text-[12px] py-3 w-full bg-orange-400 bg-opacity-90 text-lg lg:text-[14px] font-semibold text-white shadow-md rounded-full border-2 flex items-center justify-center space-x-2 transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block mr-2" fill="currentColor" viewBox="0 0 30 30">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12.8125C15.5178 12.8125 15.9375 13.2323 15.9375 13.75V15.3125H17.5C18.0178 15.3125 18.4375 15.7323 18.4375 16.25C18.4375 16.7678 18.0178 17.1875 17.5 17.1875H15.9375V18.75C15.9375 19.2678 15.5178 19.6875 15 19.6875C14.4823 19.6875 14.0625 19.2678 14.0625 18.75V17.1875H12.5C11.9822 17.1875 11.5625 16.7678 11.5625 16.25C11.5625 15.7323 11.9822 15.3125 12.5 15.3125H14.0625V13.75C14.0625 13.2323 14.4823 12.8125 15 12.8125Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2222 26.25H17.7778C21.6791 26.25 23.6297 26.25 25.031 25.3308C25.6375 24.9328 26.1584 24.4214 26.5637 23.8259C27.5 22.4501 27.5 20.5349 27.5 16.7045C27.5 12.8743 27.5 10.959 26.5637 9.58325C26.1584 8.98768 25.6375 8.4763 25.031 8.07835C24.1305 7.48766 23.0034 7.27654 21.2775 7.20108C20.4539 7.20108 19.7449 6.58835 19.5834 5.79545C19.341 4.60611 18.2774 3.75 17.0421 3.75H12.9579C11.7226 3.75 10.6589 4.60611 10.4167 5.79545C10.2551 6.58835 9.54606 7.20108 8.7225 7.20108C6.99666 7.27654 5.86944 7.48766 4.96905 8.07835C4.36244 8.4763 3.8416 8.98768 3.43628 9.58325C2.5 10.959 2.5 12.8743 2.5 16.7045C2.5 20.5349 2.5 22.4501 3.43628 23.8259C3.8416 24.4214 4.36244 24.9328 4.96905 25.3308C6.3703 26.25 8.32094 26.25 12.2222 26.25ZM20 16.25C20 19.0114 17.7614 21.25 15 21.25C12.2386 21.25 10 19.0114 10 16.25C10 13.4886 12.2386 11.25 15 11.25C17.7614 11.25 20 13.4886 20 16.25ZM22.5 11.5625C21.9822 11.5625 21.5625 11.9822 21.5625 12.5C21.5625 13.0178 21.9822 13.4375 22.5 13.4375H23.75C24.2677 13.4375 24.6875 13.0178 24.6875 12.5C24.6875 11.9822 24.2677 11.5625 23.75 11.5625H22.5Z" />
                                    </svg>
                                    <span class="text-sm">Open Camera</span>
                                </button>
                            </div>

                            <!-- Fullscreen Modal Camera -->
                            <div x-show="cameraOpen"
                                 class="fixed inset-0 z-[1000] bg-black flex flex-col items-center justify-center"
                                 style="display: none;"
                                 @keydown.window.escape="cameraOpen = false; if (videoStream) videoStream.getTracks().forEach(track => track.stop());">

                                <!-- Close Button -->
                                <button @click="cameraOpen = false; if (videoStream) videoStream.getTracks().forEach(track => track.stop());"
                                        class="absolute z-[1000] top-0 right-0 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-10 w-10"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <!-- Camera Preview -->
                                <video id="camera-stream" autoplay playsinline class="w-full h-full object-contain"></video>

                                <!-- Flash Button -->
                                <button @click="toggleFlash()"
                                        class="absolute bottom-10 left-7 bg-gray-500 hover:bg-gray-600 text-white flex justify-center items-center w-12 h-12 rounded-full shadow-lg transition-all transform hover:scale-110 active:scale-95 active:bg-gray-700">
                                    <!-- Flash Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" stroke="currentColor" class="w-6 h-6 pt-1 text-white">
                                        <path d="M296 160h-120l32-128c3.4-13.7-8-26-21.9-26-5.9 0-11.8 2.7-15.9 7.7L8.1 212.1C-3.2 226.4 5.4 248 23.1 248h120l-32 128c-3.4 13.7 8 26 21.9 26 5.9 0 11.8-2.7 15.9-7.7L311.9 179.9C323.2 165.6 314.6 144 296 144z"/>
                                    </svg>
                                </button>


                                <!-- Capture Button -->
                                <button @click="capturePhotoAndLocation()"
                                        class="absolute  px-5 py-2.5 bottom-10 w-16 h-16 bg-gradient-to-r from-[#2C8B4A] via-[#4AA76F] to-[#4AA76F] hover:bg-green-600 text-white flex justify-center items-center rounded-full shadow-lg transition-all transform duration-500 hover:ring-offset-2 active:ring-2 active:ring-[#4AA76F]">
                                    <!-- Camera Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline-block" fill="currentColor" viewBox="0 0 30 30">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12.8125C15.5178 12.8125 15.9375 13.2323 15.9375 13.75V15.3125H17.5C18.0178 15.3125 18.4375 15.7323 18.4375 16.25C18.4375 16.7678 18.0178 17.1875 17.5 17.1875H15.9375V18.75C15.9375 19.2678 15.5178 19.6875 15 19.6875C14.4823 19.6875 14.0625 19.2678 14.0625 18.75V17.1875H12.5C11.9822 17.1875 11.5625 16.7678 11.5625 16.25C11.5625 15.7323 11.9822 15.3125 12.5 15.3125H14.0625V13.75C14.0625 13.2323 14.4823 12.8125 15 12.8125Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2222 26.25H17.7778C21.6791 26.25 23.6297 26.25 25.031 25.3308C25.6375 24.9328 26.1584 24.4214 26.5637 23.8259C27.5 22.4501 27.5 20.5349 27.5 16.7045C27.5 12.8743 27.5 10.959 26.5637 9.58325C26.1584 8.98768 25.6375 8.4763 25.031 8.07835C24.1305 7.48766 23.0034 7.27654 21.2775 7.20108C20.4539 7.20108 19.7449 6.58835 19.5834 5.79545C19.341 4.60611 18.2774 3.75 17.0421 3.75H12.9579C11.7226 3.75 10.6589 4.60611 10.4167 5.79545C10.2551 6.58835 9.54606 7.20108 8.7225 7.20108C6.99666 7.27654 5.86944 7.48766 4.96905 8.07835C4.36244 8.4763 3.8416 8.98768 3.43628 9.58325C2.5 10.959 2.5 12.8743 2.5 16.7045C2.5 20.5349 2.5 22.4501 3.43628 23.8259C3.8416 24.4214 4.36244 24.9328 4.96905 25.3308C6.3703 26.25 8.32094 26.25 12.2222 26.25ZM20 16.25C20 19.0114 17.7614 21.25 15 21.25C12.2386 21.25 10 19.0114 10 16.25C10 13.4886 12.2386 11.25 15 11.25C17.7614 11.25 20 13.4886 20 16.25ZM22.5 11.5625C21.9822 11.5625 21.5625 11.9822 21.5625 12.5C21.5625 13.0178 21.9822 13.4375 22.5 13.4375H23.75C24.2677 13.4375 24.6875 13.0178 24.6875 12.5C24.6875 11.9822 24.2677 11.5625 23.75 11.5625H22.5Z" />
                                    </svg>
                                </button>
                                <!-- Toggle Camera Button -->
                                <button @click="toggleCamera"
                                        class="absolute bottom-10 right-7 bg-orange-400 bg-opacity-90 hover:bg-orange-400 hover:bg-opacity-90 text-white flex justify-center items-center w-12 h-12 rounded-full shadow-lg transition-all transform hover:scale-110 active:scale-95 active:bg-yellow-700">
                                    <span class="text-2xl">
                                        <!-- Icon (SVG for rotating camera) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" stroke="currentColor" class="w-6 h-6 text-white">
                                            <path d="M260.8 32c-20.7 0-39 13.2-45.5 32.8L204.9 96 128 96c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-76.9 0L424.7 64.8C418.2 45.2 399.8 32 379.2 32L260.8 32zM230.5 69.9C234.8 56.8 247.1 48 260.8 48l118.3 0c13.8 0 26 8.8 30.4 21.9l12.2 36.6c1.1 3.3 4.1 5.5 7.6 5.5l82.7 0c26.5 0 48 21.5 48 48l0 256c0 26.5-21.5 48-48 48l-384 0c-26.5 0-48-21.5-48-48l0-256c0-26.5 21.5-48 48-48l82.7 0c3.4 0 6.5-2.2 7.6-5.5l12.2-36.6zM224 312c-4.4 0-8 3.6-8 8l0 64c0 4.4 3.6 8 8 8s8-3.6 8-8l0-44.7L259.7 367c16 16 37.7 25 60.3 25c36.2 0 68-18.5 86.7-46.5c2.4-3.7 1.4-8.6-2.2-11.1s-8.6-1.4-11.1 2.2C377.6 360.4 350.6 376 320 376c-18.4 0-36-7.3-49-20.3L243.3 328l44.7 0c4.4 0 8-3.6 8-8s-3.6-8-8-8l-64 0zm200-56l0-64c0-4.4-3.6-8-8-8s-8 3.6-8 8l0 44.7L380.3 209c-16-16-37.7-25-60.3-25c-36.2 0-68 18.5-86.7 46.5c-2.4 3.7-1.4 8.6 2.2 11.1s8.6 1.4 11.1-2.2C262.4 215.6 289.4 200 320 200c18.4 0 36 7.3 49 20.3L396.7 248 352 248c-4.4 0-8 3.6-8 8s3.6 8 8 8l64 0c4.4 0 8-3.6 8-8z"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>

                            <!-- Photo and Address Preview -->
                            <div x-show="photoCaptured" class="fixed inset-0 z-[1000] bg-black flex flex-col items-center justify-center text-center">

                                <!-- Header -->
                                <div class="flex flex-col justify-center items-center mb-4 -mt-10">
                                    <!--Page Title-->
                                    <div class="text-[#4AA76F] font-medium text-md mb-3">Photo Preview and Information</div>

                                    <!-- Captured Photo Preview -->
                                    <div class="border border-[#4AA76F] rounded-lg mb-3">
                                        <img :src="photo" alt="Captured photo" class="w-full h-[30vh] max-w-md mx-auto rounded-lg shadow">
                                    </div>

                                    <!-- Retry Button -->
                                    <button @click="retryCapture()"
                                            class="float-right bg-orange-400 bg-opacity-90 hover:bg-orange-400 hover:bg-opacity-90 text-white px-4 py-1 rounded-full shadow flex w-auto mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-5 h-5 pt-1 text-white -rotate-90 mr-1 -pl-1">
                                            <path d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/>
                                        </svg>
                                        <div class="text-sm">Retry</div>
                                    </button>
                                </div>

                                <!-- Body -->
                                <div
                                    class="h-[30vh] w-full flex flex-col justify-center items-center overflow-y-auto space-y-4 mx-auto text-start"
                                >
                                    {{--                                <!-- Type of Defect -->--}}
                                    {{--                                <div class="text-sm flex justify-start items-start w-3/4">--}}
                                    {{--                                    <div class="w-1/2 text-gray-300">Type of Defect:</div>--}}
                                    {{--                                    <div class="w-1/2 font-semibold text-[#4AA76F]">Pothole</div>--}}
                                    {{--                                </div>--}}
                                    <!-- Type of Defect -->
                                    <div class="text-sm flex justify-start items-start w-3/4">
                                        {{--                                    <div class="w-1/2 text-gray-300">Type of Defect:</div>--}}
                                        {{--                                    <div class="w-1/2 font-semibold text-[#4AA76F]">Pothole</div>--}}
                                    </div>

                                    <!-- Report ID -->
                                    <div class="text-sm flex justify-start items-start w-3/4">
                                        {{--                                    <div class="w-1/2 text-gray-300">Report ID:</div>--}}
                                        {{--                                    <div class="w-1/2 font-semibold text-[#4AA76F]">00001</div>--}}
                                    </div>

                                    <!-- Date and Time -->
                                    <div class="text-sm flex justify-start items-start w-3/4">
                                        <div class="w-1/2 text-gray-300">Date Reported:</div>
                                        <div class="w-1/2 font-semibold text-[#4AA76F]" x-text="date"></div>
                                    </div>
                                    <div class="text-sm flex justify-start items-start w-3/4">
                                        <div class="w-1/2 text-gray-300">Time Reported:</div>
                                        <div class="w-1/2 font-semibold text-[#4AA76F]" x-text="time"></div>
                                    </div>

                                    <!-- Location -->
                                    <div class="text-sm flex flex-col justify-start items-start w-3/4">
                                        <div class="text-gray-300 font-medium text-md italic mb-1"></div>
                                        <div class="text-sm flex justify-start items-start w-full">
                                            <div class="w-1/2 text-gray-300">Location</div>
                                            <div class="w-1/2 font-semibold text-[#4AA76F]" x-text="address"></div>
                                        </div>
                                        <div class="text-sm flex justify-start items-start w-full">
                                            <div class="w-1/2 text-gray-300">Latitude:</div>
                                            <div class="w-1/2 font-semibold text-[#4AA76F]" x-text="latitude"></div>
                                        </div>
                                        <div class="text-sm flex justify-start items-start w-full">
                                            <div class="w-1/2 text-gray-300">Longitude:</div>
                                            <div class="w-1/2 font-semibold text-[#4AA76F]" x-text="longitude"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Confirm Button (Now inside the form) -->

                                <!-- Submit Report Button -->
                                <form action="{{ route('staff.temporary-update') }}" id="reportForm"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="latitude" x-bind:value="latitude">
                                    <input type="hidden" name="longitude" x-bind:value="longitude">
{{--                                    <input type="hidden" name="address" x-bind:value="address">--}}
{{--                                    <input type="hidden" name="purok" x-bind:value="purok">--}}
{{--                                    <input type="hidden" name="street" x-bind:value="street">--}}
{{--                                    <input type="hidden" name="barangay" x-bind:value="barangay">--}}
                                    <input type="hidden" name="date" x-bind:value="date">
                                    <input type="hidden" name="time" x-bind:value="time">
                                    <input type="hidden" name="photo" x-bind:value="photo">

                                    <!-- Full-Screen Loading Overlay (Initially Hidden) -->
                                    <div id="loadingOverlay" class="fixed inset-0 flex items-center justify-center bg-black backdrop-blur-sm bg-opacity-60 hidden z-50">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="inline-block h-20 w-20 animate-spin rounded-full border-8 border-solid border-green-600 border-e-transparent"
                                                role="status">
                                            </div>
                                            <p class="text-white text-lg font-semibold mt-4">Uploading image and finding nearest reports...</p>
                                        </div>
                                    </div>
                                    {{--                                <button type="submit" class="w-full text-sm md:text-md bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mt-6 rounded-full transition-transform transform hover:scale-105 hover:drop-shadow-md active:-translate-y-1 active:scale-95">--}}
                                    {{--                                    Submit Report--}}
                                    {{--                                </button>--}}

                                    <!-- Confirm Button -->
                                    <button id="submitBtn" type="submit"
                                            class="flex justify-center items-center w-3/4 hover:scale-105 bottom-5 bg-[#4AA76F] hover:drop-shadow-md text-white py-2 px-10 tex font-semibold mt-6 mb-3 rounded-full hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                                        Confirm
                                    </button>
                                </form>
                                <script>
                                    document.getElementById('reportForm').addEventListener('submit', function() {
                                        document.getElementById('submitBtn').classList.add('hidden'); // Hide the button
                                        document.getElementById('loadingOverlay').classList.remove('hidden'); // Show full-screen loading
                                    });
                                </script>

                            </div>

                        </div>
                    </template>

                    <!-- Step 2 -->
                    <template x-if="step === 2">
                        <!-- Review Road Report Information -->
                        <div class="mt-0 pt-2 pb-4 mx-auto bg-white w-full flex flex-col items-center justify-center h-full max-w-md shadow-sm rounded-lg border-2 border-gray-300 lg:h-[600px]">

                            <!-- Captured Road Photo -->
                            <div class="text-center text-sm flex flex-col items-center my-3">
                                <span class="font-semibold text-[#4AA76F] mb-2">Actual Captured Road Photo</span>
                                <img :src="photo" alt="Road Defect" class="w-[80%]" />
                            </div>

                            <!-- Report Details -->
                            <div class="space-y-3 text-start w-10/12">
                                {{--                            <!-- Type of Defect -->--}}
                                {{--                            <div class="text-xs md:text-sm flex">--}}
                                {{--                                <div class="w-2/5 text-gray-600">Type of Defect:</div>--}}
                                {{--                                <div class="w-3/5 font-semibold text-[#4AA76F]">Pothole</div>--}}
                                {{--                            </div>--}}

                                <!-- Report ID -->
                                <div class="text-xs md:text-sm flex">
                                    <div class="w-2/5 text-gray-600">Report ID:</div>
                                    <div class="w-3/5 font-semibold text-[#4AA76F]">00001</div>
                                </div>

                                <!-- Date and Time -->
                                <div class="text-xs md:text-sm flex">
                                    <div class="w-2/5 text-gray-600">Date Reported:</div>
                                    <div class="w-3/5 font-semibold text-[#4AA76F]" x-text="date"></div>
                                </div>
                                <div class="text-xs md:text-sm flex">
                                    <div class="w-2/5 text-gray-600">Time Reported:</div>
                                    <div class="w-3/5 font-semibold text-[#4AA76F]" x-text="time"></div>
                                </div>

                                <!-- Location -->
                                <div class="text-xs md:text-sm flex flex-col">
                                    <div class="text-gray-600 font-medium italic mb-1">Location</div>
                                    <div class="text-xs md:text-sm flex">
                                        <div class="w-2/5 text-gray-600">Address:</div>
                                        <div class="w-3/5 font-semibold text-[#4AA76F]" x-text="address"></div>
                                    </div>
                                    <div class="text-xs md:text-sm flex">
                                        <div class="w-2/5 text-gray-600">Latitude:</div>
                                        <div class="w-3/5 font-semibold text-[#4AA76F]" x-text="latitude"></div>
                                    </div>
                                    <div class="text-xs md:text-sm flex">
                                        <div class="w-2/5 text-gray-600">Longitude:</div>
                                        <div class="w-3/5 font-semibold text-[#4AA76F]" x-text="longitude"></div>
                                    </div>
                                </div>
                            </div>

                            {{--                        <!-- Submit Report Button -->--}}
                            {{--                        <form action="{{ route('temp.submit.report') }}" id="reportForm"  method="POST" enctype="multipart/form-data">--}}
                            {{--                            @csrf--}}
                            {{--                            <input type="hidden" name="latitude" x-bind:value="latitude">--}}
                            {{--                            <input type="hidden" name="longitude" x-bind:value="longitude">--}}
                            {{--                            <input type="hidden" name="address" x-bind:value="address">--}}
                            {{--                            <input type="hidden" name="purok" x-bind:value="purok">--}}
                            {{--                            <input type="hidden" name="street" x-bind:value="street">--}}
                            {{--                            <input type="hidden" name="barangay" x-bind:value="barangay">--}}
                            {{--                            <input type="hidden" name="date" x-bind:value="date">--}}
                            {{--                            <input type="hidden" name="time" x-bind:value="time">--}}
                            {{--                            <input type="hidden" name="photo" x-bind:value="photo">--}}

                            {{--                            <button type="submit" class="w-full text-sm md:text-md bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mt-6 rounded-full transition-transform transform hover:scale-105 hover:drop-shadow-md active:-translate-y-1 active:scale-95">--}}
                            {{--                                Submit Report--}}
                            {{--                            </button>--}}
                            {{--                        </form>--}}
                            {{--                        <button--}}
                            {{--                            x-on:click="submitReport; openSuccessModal = true; setTimeout(() => location.reload(), 2000);"--}}
                            {{--                            class="w-2/4 text-sm md:text-md: bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mt-6 rounded-full transition-transform transform hover:scale-105 hover:drop-shadow-md active:-translate-y-1 active:scale-95">--}}
                            {{--                            Submit Report--}}
                            {{--                        </button>--}}

                            <!-- Success Modal -->
                            {{--                        <x-success-modal successMessage="Your report road concern submitted successfully." x-show="openSuccessModal"></x-success-modal>--}}

                            <!-- Error Modal | This should be pop up if the user inputs is not valid-->
                            <x-error-modal errorMessage='Oops! No road issues found, please retry!.' x-show="openErrorModal"></x-error-modal>

                        </div>

                    </template>

                </div>

            </div>
        </div>
        <!-- Message for large screens -->
        <div class="hidden lg:flex flex-col items-center justify-center w-[85%] ml-32 text-center p-4 bg-gray-100 text-gray-700">
            <p class="text-lg font-semibold">This feature is available only on mobile and tablets.</p>
        </div>


    </x-Staff.staff-navigation>
</x-app-layout>
        <script>

            function captureHandler() {
                return {
                    cameraOpen: false,
                    photoCaptured: false,
                    locationCaptured: false,
                    // latitude: null,
                    // longitude: null,
                    // photo: null,
                    videoStream: null,
                    // address: '',
                    isFrontCamera: true, // Tracks whether the front camera is active
                    stream: null, // Stores the media stream
                    submitReport() {
                        document.getElementById('reportForm').submit();
                    },

                    // Open Camera
                    openCamera() {
                        this.cameraOpen = true;
                        document.body.classList.add('overflow-hidden');
                        const video = document.getElementById('camera-stream');
                        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                            .then(stream => {
                                this.videoStream = stream;
                                video.srcObject = stream;
                            })
                            .catch(err => {
                                console.error('Error accessing camera:', err);
                                alert('Unable to access the camera.');
                                this.cameraOpen = false;
                                document.body.classList.remove('overflow-hidden');
                            });
                        // Capture location
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                position => {
                                    this.latitude = position.coords.latitude;
                                    this.longitude = position.coords.longitude;
                                    this.locationCaptured = true;

                                    // Capture the current date and time
                                    const currentDateTime = new Date();
                                    this.date = currentDateTime.toLocaleDateString('en-US', {
                                        month: 'long', // Full month name (e.g., January)
                                        day: 'numeric', // Numeric day (e.g., 11)
                                        year: 'numeric', // Full year (e.g., 2003)
                                    });
                                    this.time = currentDateTime.toLocaleTimeString(); // Format: HH:MM:SS AM/PM

                                    const accessToken = 'pk.eyJ1IjoicGlyYXRpY2FtZSIsImEiOiJjbTZyb25ubzYwMTYwMmxxMWFwcmgyd203In0.JGlK5yEI3UaL7NmNP0kh7w';
                                    const mapboxUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${this.longitude},${this.latitude}.json?access_token=${accessToken}`;

                                    // fetch(mapboxUrl)
                                    //     .then(response => response.json())
                                    //     .then(data => {
                                    //         if (data.features && data.features.length > 0) {
                                    //             this.address = data.features[0].place_name; // Correctly extract address
                                    //             console.log(`Address: ${this.address}\nLatitude: ${this.latitude}\nLongitude: ${this.longitude}`);
                                    //         } else {
                                    //             alert('Unable to get the location name.');
                                    //         }
                                    //     })
                                    //     .catch(error => {
                                    //         console.error('Error with geocoding request:', error);
                                    //         alert('Unable to retrieve location name.');
                                    //     });
                                    const fetchLocation = (retries = 3) => {
                                        fetch(mapboxUrl)
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.features && data.features.length > 0) {
                                                    this.address = data.features[0].place_name;
                                                    console.log(`Address: ${this.address}\nLatitude: ${this.latitude}\nLongitude: ${this.longitude}`);
                                                } else if (retries > 0) {
                                                    console.warn(`Retrying... (${3 - retries + 1})`);
                                                    setTimeout(() => fetchLocation(retries - 1), 500); // Wait 2s before retrying
                                                } else {
                                                    console.error("Failed to get location after multiple attempts.");
                                                }
                                            })
                                            .catch(error => {
                                                console.error("Error with geocoding request:", error);
                                                if (retries > 0) {
                                                    console.warn(`Retrying... (${3 - retries + 1})`);
                                                    setTimeout(() => fetchLocation(retries - 1), 500); // Wait 2s before retrying
                                                } else {
                                                    console.error("Unable to retrieve location after multiple attempts.");
                                                }
                                            });
                                    };

                                    // Call the function
                                    fetchLocation();

                                },
                                error => {
                                    console.error('Error getting location:', error);
                                    alert('Unable to retrieve your location. Please enable GPS.');
                                }

                            );

                        } else {
                            alert('Geolocation is not supported by your browser.');
                        }
                    },

                    // Capture Photo
                    capturePhotoAndLocation() {
                        const video = document.getElementById('camera-stream');
                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        canvas.getContext('2d').drawImage(video, 0, 0);
                        this.photo = canvas.toDataURL('image/png');
                        this.photoCaptured = true;

                        if (this.videoStream) {
                            this.videoStream.getTracks().forEach(track => track.stop());
                        }
                        this.cameraOpen = false;
                        document.body.classList.remove('overflow-hidden');
                        // Capture location
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                position => {
                                    this.latitude = position.coords.latitude;
                                    this.longitude = position.coords.longitude;
                                    this.locationCaptured = true;

                                    // Capture the current date and time
                                    const currentDateTime = new Date();
                                    this.date = currentDateTime.toLocaleDateString('en-US', {
                                        month: 'long', // Full month name (e.g., January)
                                        day: 'numeric', // Numeric day (e.g., 11)
                                        year: 'numeric', // Full year (e.g., 2003)
                                    });
                                    this.time = currentDateTime.toLocaleTimeString(); // Format: HH:MM:SS AM/PM

                                    {{--const apiKey = "{{ env('GOOGLE_MAP_API') }}";--}}
                                    {{--const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${this.latitude},${this.longitude}&key=${apiKey}`;--}}

                                    const accessToken = 'pk.eyJ1IjoicGlyYXRpY2FtZSIsImEiOiJjbTZyb25ubzYwMTYwMmxxMWFwcmgyd203In0.JGlK5yEI3UaL7NmNP0kh7w';
                                    const mapboxUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${this.longitude},${this.latitude}.json?access_token=${accessToken}`;

                                    // fetch(mapboxUrl)
                                    //     .then(response => response.json())
                                    //     .then(data => {
                                    //         if (data.features.length > 0) {
                                    //             this.address = data.features[0].place_name;
                                    //         } else {
                                    //             alert('Unable to get the location name.');
                                    //         }
                                    //     })
                                    fetch(mapboxUrl)
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.features.length > 0) {
                                                const feature = data.features[0];
                                                this.fullAddress = feature.place_name;

                                                let street = feature.text; // Primary name is usually the street
                                                let purok = '';
                                                let barangay = '';
                                                let city = '';
                                                let province = '';
                                                let country = '';

                                                // Iterate through context array to find relevant components
                                                feature.context.forEach(item => {
                                                    if (item.id.includes('address')) street = item.text;
                                                    if (item.id.includes('neighborhood')) purok = item.text;
                                                    if (item.id.includes('place')) city = item.text;
                                                    if (item.id.includes('locality')) barangay = item.text; // Sometimes barangay is under locality
                                                    if (item.id.includes('region')) province = item.text;
                                                    if (item.id.includes('country')) country = item.text;
                                                });
                                                // If purok is empty, find closest match
                                                if (!purok) {
                                                    const fallbackPurok = data.features.find(f => f.id.includes('neighborhood'));
                                                    purok = fallbackPurok ? fallbackPurok.text : 'N/A';
                                                }

// If still no purok, use Mapbox Reverse Geocoding
//                                         if (!purok) {
//                                             const mapboxToken = accessToken;
//                                             const query = `${street}, ${barangay}, ${city}, ${province}, ${country}`;
//                                             const mapboxUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(query)}.json?access_token=${mapboxToken}&types=neighborhood`;
//
//                                             fetch(mapboxUrl)
//                                                 .then(response => response.json())
//                                                 .then(data => {
//                                                     if (data.features.length > 0) {
//                                                         purok = data.features[0].text;
//                                                     } else {
//                                                         purok = "N/A"; // Fallback if no match is found
//                                                     }
//                                                 })
//                                                 .catch(error => {
//                                                     console.error("Error fetching from Mapbox:", error);
//                                                     purok = "N/A";
//                                                 });
//                                         }

                                                // Adjust if barangay and city are swapped
                                                if (barangay.toLowerCase() === city.toLowerCase()) {
                                                    barangay = 'La Filipina'; // Hardcode if pattern consistently wrong
                                                    city = 'Tagum City';
                                                }

                                                // Save cleaned-up components
                                                this.street = street || 'N/A';
                                                this.purok = purok || 'N/A';
                                                this.barangay = barangay || 'N/A';
                                                this.city = city || 'N/A';
                                                this.province = province || 'N/A';
                                                this.country = country || 'N/A';
                                                // alert(`Full Address: ${this.fullAddress}
                                                //     Street: ${this.street}
                                                //     Purok: ${purok}
                                                //     Barangay: ${barangay}
                                                //     City: ${city}
                                                //     Province: ${province}
                                                //     Country: ${country}`);
                                                // } else {
                                                // alert('Unable to get the location name.');
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error with geocoding request:', error);
                                            alert('Unable to retrieve location name.');
                                        });

                                },
                                error => {
                                    console.error('Error getting location:', error);
                                    alert('Unable to retrieve your location. Please enable GPS.');
                                }

                            );

                        } else {
                            alert('Geolocation is not supported by your browser.');
                        }

                    },

                    // Retry Photo Capture
                    retryCapture() {
                        this.photoCaptured = false;
                        this.latitude = null;
                        this.longitude = null;
                        this.address = '';
                        this.openCamera();

                    },

                    // Confirm Photo Capture
                    confirmCapture() {
                        alert(`Address: ${this.address}\nLatitude: ${this.latitude}\nLongitude: ${this.longitude}`);
                    },

                    // Toggle Between Cameras
                    async toggleCamera() {
                        // Stop the current stream
                        if (this.stream) {
                            this.stream.getTracks().forEach(track => track.stop());
                        }

                        try {
                            // Toggle camera state
                            this.isFrontCamera = !this.isFrontCamera;
                            const facingMode = this.isFrontCamera ? "user" : "environment";

                            // Request a new stream with the desired facing mode
                            this.stream = await navigator.mediaDevices.getUserMedia({
                                video: { facingMode: facingMode },
                                audio: false,
                            });

                            // Update video source
                            const videoElement = document.querySelector("#camera-stream");
                            if (videoElement) {
                                videoElement.srcObject = this.stream;
                                await videoElement.play();
                            }
                        } catch (error) {
                            console.error("Error toggling the camera:", error);
                        }
                    },


                    toggleFlash() {
                        if (!this.videoStream) {
                            console.error("No video stream available.");
                            return;
                        }

                        const tracks = this.videoStream.getVideoTracks();
                        if (!tracks.length) {
                            console.error("No video tracks found.");
                            return;
                        }

                        const track = tracks[0];
                        const capabilities = track.getCapabilities();

                        if (!capabilities.torch) {
                            console.error("Torch mode is not supported on this device.");
                            alert("Flashlight is not supported on your camera.");
                            return;
                        }

                        // Toggle the torch state
                        this.flashOn = !this.flashOn; // Keep track of flash state

                        track.applyConstraints({
                            advanced: [{ torch: this.flashOn }]
                        }).catch(err => {
                            console.error("Error toggling flash:", err);
                            alert("Failed to toggle flashlight.");
                        });
                    }
                };
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                @if(session('step') == 2)
                window.Alpine.store('step', 2);
                @endif
            });
        </script>

