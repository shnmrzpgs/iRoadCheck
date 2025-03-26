<div>
    <div
        x-data="{ isOpen: @entangle('isOpen') }"
        x-show="isOpen"
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
        x-cloak
        style="display: none;"
    >
        <div class="bg-white w-3/4 max-w-md p-6 rounded-lg shadow-lg relative text-center">
            <!-- Close Button -->
            <button @click="isOpen = false" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 text-2xl">
                &times;
            </button>

            <!-- Modal Content -->
            <h2 class="text-2xl font-bold text-red-600 mb-4">NO DEFECT FOUND!</h2>

            <!-- Try Again Button -->
            <button @click="isOpen = false, retryCapture()"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700  transition-all">
                Retry
            </button>
            <button @click="isOpen = false"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all">
                Cancel
            </button>
        </div>
    </div>

</div>
