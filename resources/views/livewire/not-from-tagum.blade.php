<div>
    <div
        x-data="{ isOpen: @entangle('isOpen') }"
        x-show="isOpen"
        x-transition.opacity
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/60 backdrop-blur-sm"
        x-cloak
    >
        <div
            class="bg-white w-3/4 max-w-md p-8 rounded-2xl shadow-2xl relative text-center space-y-6"
            x-transition.scale
        >
            <!-- Close Button -->
            <button @click="isOpen = false"
                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Modal Title -->
            <h2 class="text-2xl font-extrabold text-red-600">ONLY IN TAGUM CITY!</h2>

            <!-- Description (optional) -->
            <p class="text-gray-600 text-sm">Please make sure your current location is within Tagum City before submitting.</p>

            <!-- Action Buttons -->
            <div class="flex justify-center gap-4 pt-2">
                <button @click="isOpen = false, retryCapture()"
                        class="px-5 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition">
                    Retry
                </button>
                <button @click="isOpen = false"
                        class="px-5 py-2 bg-gray-400 text-gray-800 rounded-lg font-medium hover:bg-gray-300 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
