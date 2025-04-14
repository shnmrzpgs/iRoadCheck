<div class="flex flex-col mb-5"
     x-data="{
        scale: 1,
        scaleStep: 0.2,
        offsetX: 0,
        offsetY: 0,
        isGrabbing: false,
        preventMove: false,
        startX: 0,
        startY: 0,
        maxOffsetX: 0,
        maxOffsetY: 0,

        zoomIn() {
            this.scale = Math.min(this.scale + this.scaleStep, 3);
            this.updateMaxOffsets();
        },

        zoomOut() {
            this.scale = Math.max(this.scale - this.scaleStep, 1);
            this.updateMaxOffsets();
            this.restrictPosition();
        },

        resetZoom() {
            this.scale = 1;
            this.offsetX = 0;
            this.offsetY = 0;
            this.updateMaxOffsets();
        },

        grabStart(event) {
            if (this.scale > 1) { // Only activate if zoomed in
                this.grabTimer = setTimeout(() => {
                    this.isGrabbing = true;
                    this.startX = event.clientX - this.offsetX;
                    this.startY = event.clientY - this.offsetY;
                    document.body.style.cursor = 'grabbing';
                }, 10); // Prolonged click delay

                // Prevent movement before 500ms
                this.preventMove = true;

                setTimeout(() => {
                    this.preventMove = false; // Allow movement after prolonged click
                }, 500);
            }
        },

        grabMove(event) {
            if (this.isGrabbing && !this.preventMove) {
                this.offsetX = event.clientX - this.startX;
                this.offsetY = event.clientY - this.startY;
                this.restrictPosition();
            }
        },

        grabEnd() {
            clearTimeout(this.grabTimer);
            this.isGrabbing = false;
            this.preventMove = false;
            document.body.style.cursor = '';
        },

        restrictPosition() {
            const zoomFactor = this.scale - 1;
            this.maxOffsetX = (zoomFactor * 100) / 2;
            this.maxOffsetY = (zoomFactor * 80) / 2;

            this.offsetX = Math.max(-this.maxOffsetX, Math.min(this.offsetX, this.maxOffsetX));
            this.offsetY = Math.max(-this.maxOffsetY, Math.min(this.offsetY, this.maxOffsetY));
        },

        updateMaxOffsets() {
            const zoomFactor = this.scale - 1;
            this.maxOffsetX = (zoomFactor * 100) / 2;
            this.maxOffsetY = (zoomFactor * 90) / 2;
        }
    }">

    <div class="text-gray-700 italic my-2 block text-center text-xs">{{ $image_title }}</div>
    <div class="relative border border-gray-300 rounded-md overflow-hidden w-[100%] h-[35vh] min-h-[20vh] max-h-[60vh] mb-1">
        <div
            class="overflow-hidden w-full h-full relative cursor-grab"
            @mousedown.prevent="grabStart"
            @mousemove="grabMove"
            @mouseup="grabEnd"
            @mouseleave="grabEnd"
        >
            {{ $image }}
        </div>
    </div>
    <div class="relative flex justify-center items-center gap-1 w-full">
        <button
            @click="zoomIn"
            class="bg-green-500/80 backdrop-blur-md text-white text-xs px-2 py-1 rounded-lg hover:bg-green-600/80 transition flex items-center gap-2 shadow-md"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 448 512" fill="currentColor">
                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
            </svg>
            <span class="font-medium">Zoom In</span>
        </button>
        <button
            @click="zoomOut"
            class="bg-red-500/80 backdrop-blur-md text-white text-xs px-2 py-1 rounded-lg hover:bg-red-600/80 transition flex items-center gap-2 shadow-md"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 448 512" fill="currentColor">
                <path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/>
            </svg>
            <span class="font-medium">Zoom Out</span>
        </button>
        <button
            @click="resetZoom"
            class="bg-blue-500/80 backdrop-blur-md text-white text-xs px-2 py-1 rounded-lg hover:bg-blue-600/80 transition flex items-center gap-2 shadow-md"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512" fill="currentColor">
                <path d="M142.9 142.9c-17.5 17.5-30.1 38-37.8 59.8c-5.9 16.7-24.2 25.4-40.8 19.5s-25.4-24.2-19.5-40.8C55.6 150.7 73.2 122 97.6 97.6c87.2-87.2 228.3-87.5 315.8-1L455 55c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 128c0 13.3-10.7 24-24 24l-8.4 0c0 0 0 0 0 0L344 224c-9.7 0-18.5-5.8-22.2-14.8s-1.7-19.3 5.2-26.2l41.1-41.1c-62.6-61.5-163.1-61.2-225.3 1zM16 312c0-13.3 10.7-24 24-24l7.6 0 .7 0L168 288c9.7 0 18.5 5.8 22.2 14.8s1.7 19.3-5.2 26.2l-41.1 41.1c62.6 61.5 163.1 61.2 225.3-1c17.5-17.5 30.1-38 37.8-59.8c5.9-16.7 24.2-25.4 40.8-19.5s25.4 24.2 19.5 40.8c-10.8 30.6-28.4 59.3-52.9 83.8c-87.2 87.2-228.3 87.5-315.8 1L57 457c-6.9 6.9-17.2 8.9-26.2 5.2S16 449.7 16 440l0-119.6 0-.7 0-7.6z"/>
            </svg>
            <span class="font-medium">Reset</span>
        </button>
    </div>
</div>
