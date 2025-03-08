<!-- Modal Background -->
<div x-data="{ showModal: @entangle('showModal') }">
    <div x-show="showModal" class="fixed inset-0 z-[1000] flex items-center justify-center bg-black bg-opacity-50">
        <div x-data="{
            currentIndex: 0,
            startX: 0,
            endX: 0,
            images: [
                { url: '{{ asset('storage/images/do-and-dont-1.png') }}', label: 'Blurry or low-quality images cannot be accurately analyzed.' },
                { url: '{{ asset('storage/images/do-and-dont-2.png') }}', label: 'Road defects captured from a distance of more than 2 meters may not be detected precisely.' },
                { url: '{{ asset('storage/images/do-and-dont-3.png') }}', label: 'Road surfaces without visible cracks, potholes, or deformations are not considered defective.' },
                { url: '{{ asset('storage/images/do-and-dont-4.png') }}', label: 'Too dark or too bright can make details hard to see.' },
                { url: '{{ asset('storage/images/do-and-dont-5.png') }}', label: 'Shadows, reflections, or obstructions in the image can interfere with defect detection.' },
                { url: '{{ asset('storage/images/do-and-dont-6.png') }}', label: 'AI may identify false positives, mistaking elements like leaves, water stains, or dirt for actual road damage.' }
            ],
            handleTouchStart(event) {
                this.startX = event.touches[0].clientX;
            },
            handleTouchMove(event) {
                this.endX = event.touches[0].clientX;
            },
            handleTouchEnd() {
                if (this.startX - this.endX > 50) {
                    this.currentIndex = (this.currentIndex < this.images.length - 1) ? this.currentIndex + 1 : 0;
                } else if (this.endX - this.startX > 50) {
                    this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.images.length - 1;
                }
            }
        }"
             class="bg-white rounded-lg shadow-lg p-6 max-w-sm relative mx-5">

            <!-- Modal Header -->
            <h2 class="text-md font-bold text-center text-green-600 mb-2">How to Capture Road Issues Properly?</h2>

            <!-- Do's and Don'ts -->
            <div class="relative w-full max-w-lg mx-auto"
                 @touchstart="handleTouchStart"
                 @touchmove="handleTouchMove"
                 @touchend="handleTouchEnd">

                <!-- Image Display (With Swipe Events) -->
                <div class="overflow-hidden rounded-sm">
                    <img :src="images[currentIndex].url" loading="eager" class="w-full h-auto transition-transform duration-300 ease-in-out"/>
                </div>

                <!-- Image Label -->
                <label class="block text-center mt-2 text-gray-700 font-semibold text-sm">
                    <span x-text="images[currentIndex].label"></span>
                </label>

                <!-- Page Indicators (Circles) -->
                <div class="flex justify-center mt-3 gap-2">
                    <template x-for="(image, index) in images" :key="index">
                        <div class="w-3 h-3 rounded-full border border-gray-400"
                             :class="currentIndex === index ? 'bg-gray-700' : 'bg-transparent'">
                        </div>
                    </template>
                </div>

            </div>

            <!-- Navigation Buttons -->

            <!-- Left Arrow Button -->
            <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-1 rounded-full flex items-center justify-center w-8 h-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="w-5 h-5 fill-current transform scale-x-[-1]">
                    <path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                </svg>
            </button>

            <!-- Right Arrow Button -->
            <button @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-1 rounded-full flex items-center justify-center w-8 h-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="w-5 h-5 fill-current">
                    <path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/>
                </svg>
            </button>

            <div class="mt-4 flex justify-center items-center space-x-3">
                <button wire:click="closeModal" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 duration-300">
                    Continue
                </button>
            </div>
        </div>
    </div>
</div>
