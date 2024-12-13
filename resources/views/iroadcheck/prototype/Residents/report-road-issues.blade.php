<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white" x-data="{ step: 1 }">
        <!--  header -->
        <x-residents.resident-header />
        <!--  Navigation Tabs -->
        <x-residents.residents-navigation-tab />

        <div class="flex items-center justify-center text-center">
            <template x-if="step === 1">
                <div>
                    <p class="text-red-500 text-sm font-medium mt-6">Step 1: Choose the name of the road defect issue.</p>

                    <!-- Report History Section -->
                    <div x-data="{ selected: null }" class="mt-6 mx-auto bg-white w-full lg:w-full shadow-sm rounded-lg  border-2 border-gray-300 h-[500px] lg:h-[450px]">
                        <div class="w-full bg-white shadow-lg rounded-lg p-4">
                            <h2 class=" text-[14px] font-semibold">Type of Road Issue Concern</h2>
                        </div>
                        <div class="lg:h-[52vh] h-[55vh] overflow-y-auto">
                            <div @click="selected = 'pothole'" :class="{ 'bg-gray-100': selected === 'pothole' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                <img src="{{ asset('storage/images/pothole.png') }}" alt="Pothole" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Pothole</p>
                            </div>
                            <div @click="selected = 'raveling'" :class="{ 'bg-gray-100': selected === 'raveling' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                <img src="{{ asset('storage/images/raveling.png') }}" alt="Raveling" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Raveling</p>
                            </div>
                            <div @click="selected = 'block-cracking'" :class="{ 'bg-gray-100': selected === 'block-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                <img src="{{ asset('storage/images/block craking.png') }}" alt="Block Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Block Cracking</p>
                            </div>
                            <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                            </div>
                            <div @click="selected = 'slippage-cracking2'" :class="{ 'bg-gray-100': selected === 'slippage-cracking2' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                            </div>
                            <div @click="selected = 'slippage-cracking3'" :class="{ 'bg-gray-100': selected === 'slippage-cracking3' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                            </div>

                        </div>
                    </div>


                    <!-- Report Road Issue Button -->
                    <div class="mt-9 w-[75%] text-center mx-auto max-w-lg lg:absolute lg:top-16 lg:right-0 lg:left-[85%] lg:m-6 lg:w-[auto] lg:max-w-[200px] md:mb-50 sm:mb-50">
                        <button @click="step = 2"
                            class="px-6 py-4 lg:py-1 lg:text-[14px] w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400 md:mb-50">
                            NEXT
                        </button>
                    </div>
                </div>
            </template>

            <!-- Step 2 -->
            <template x-if="step === 2">
                <div>
                    <p class="text-red-500 text-sm font-medium mt-6">Step 2: Capture actual road condition.</p>

                    <div x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                        container: $refs.lottieAnimation, // the DOM element
                        renderer: 'svg', // render as SVG
                        loop: true, // loop the animation
                        autoplay: true, // start playing the animation
                        path: '{{ asset("animations/Animation - Capturing.json") }}'
                        })" class="relative mt-8 bg-white w-[90%] max-w-md shadow-md rounded-lg overflow-hidden" style="height: 445px;">

                        <div x-ref="lottieAnimation" background="transparent" speed="1"
                            class="absolute w-full h-full object-cover left-0 top-0 transform scale-125" direction="1" playMode="normal" loop autoplay></div>
                    </div>

                    <!-- Report Road Issue Button -->
                    <div class="mt-9 w-[75%] text-center">
                        <button class="px-6 text-[12px] py-4 w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline-block mr-2" fill="currentColor" viewBox="0 0 30 30">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12.8125C15.5178 12.8125 15.9375 13.2323 15.9375 13.75V15.3125H17.5C18.0178 15.3125 18.4375 15.7323 18.4375 16.25C18.4375 16.7678 18.0178 17.1875 17.5 17.1875H15.9375V18.75C15.9375 19.2678 15.5178 19.6875 15 19.6875C14.4823 19.6875 14.0625 19.2678 14.0625 18.75V17.1875H12.5C11.9822 17.1875 11.5625 16.7678 11.5625 16.25C11.5625 15.7323 11.9822 15.3125 12.5 15.3125H14.0625V13.75C14.0625 13.2323 14.4823 12.8125 15 12.8125Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2222 26.25H17.7778C21.6791 26.25 23.6297 26.25 25.031 25.3308C25.6375 24.9328 26.1584 24.4214 26.5637 23.8259C27.5 22.4501 27.5 20.5349 27.5 16.7045C27.5 12.8743 27.5 10.959 26.5637 9.58325C26.1584 8.98768 25.6375 8.4763 25.031 8.07835C24.1305 7.48766 23.0034 7.27654 21.2775 7.20108C20.4539 7.20108 19.7449 6.58835 19.5834 5.79545C19.341 4.60611 18.2774 3.75 17.0421 3.75H12.9579C11.7226 3.75 10.6589 4.60611 10.4167 5.79545C10.2551 6.58835 9.54606 7.20108 8.7225 7.20108C6.99666 7.27654 5.86944 7.48766 4.96905 8.07835C4.36244 8.4763 3.8416 8.98768 3.43628 9.58325C2.5 10.959 2.5 12.8743 2.5 16.7045C2.5 20.5349 2.5 22.4501 3.43628 23.8259C3.8416 24.4214 4.36244 24.9328 4.96905 25.3308C6.3703 26.25 8.32094 26.25 12.2222 26.25ZM20 16.25C20 19.0114 17.7614 21.25 15 21.25C12.2386 21.25 10 19.0114 10 16.25C10 13.4886 12.2386 11.25 15 11.25C17.7614 11.25 20 13.4886 20 16.25ZM22.5 11.5625C21.9822 11.5625 21.5625 11.9822 21.5625 12.5C21.5625 13.0178 21.9822 13.4375 22.5 13.4375H23.75C24.2677 13.4375 24.6875 13.0178 24.6875 12.5C24.6875 11.9822 24.2677 11.5625 23.75 11.5625H22.5Z" />
                            </svg>
                            <span>OPEN CAMERA</span>
                        </button>
                    </div>

                    <div class="mt-3 w-[75%] text-center">
                        <button @click="step = 3"
                            class="px-6 py-4 w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400">
                            NEXT
                        </button>
                    </div>
                </div>
            </template>

            <!-- Step 3 -->
            <template x-if="step === 3">
                <div>
                    <p class="text-red-500 text-sm font-medium mt-6">Step 3: View your Report Road Concern Information</p>

                    <!-- Report History Section -->
                    <div class="mt-6 bg-white w-[80%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 p-4 h-[550px] lg:h-[600px]">

                        <!-- Captured Road Photo -->
                        <div class=" text-center">
                            <span class="font-semibold text-customGreen">Actual Captured Road Photo:</span>
                            <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="relative w-full " />
                        </div>

                        <!-- Type of Defect -->
                        <div class="mb-6 text-center">
                            <span class="font-semibold text-customGreen">Type of Defect:</span>
                            <span>Pothole</span>
                        </div>

                        <!-- Report ID -->
                        <div class="mb-2">
                            <span class="font-semibold text-customGreen">Report ID:</span>
                            <span class="ml-2">00001</span>
                        </div>

                        <!-- Date and Time -->
                        <div class="mb-2">
                            <span class="font-semibold text-customGreen">Date and Time:</span>
                            <span class="ml-2 mr-8">10/12/2024</span>
                            <span class="ml-[46%]">08:34:02 AM</span>
                        </div>

                        <!-- Location -->
                        <div class="mb-6">
                            <span class="font-semibold text-customGreen">Location:</span>
                            <span class="ml-1">Apokon Street, Tagum City</span>
                        </div>


                    </div>

                    <!-- Report Road Issue Button -->
                    <div class="mt-9 w-[75%] text-center">
                        <button x-data @click="window.location.href='{{ route('suggestion-reports') }}'" class="px-6 py-4 w-full bg-[#FFAD20] text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-yellow-400">
                            SUBMIT REPORT
                        </button>
                    </div>
                </div>
            </template>

        </div>
    </div>
</x-app-layout>