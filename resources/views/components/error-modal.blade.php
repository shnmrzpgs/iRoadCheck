<div x-cloak x-data="{
    openErrorModal: false,
    errorMessage: @json($errorMessage)
}">
    <!-- Error Modal -->
    <div
        x-show="openErrorModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30 px-5"
        x-init="
            lottie.loadAnimation({
                container: $refs.lottieAnimation,
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: '{{ asset('animations/Animation - 1732451860692.json') }}'
            });
            if (openErrorModal) {
                setTimeout(() => {
                    openErrorModal = false;
                }, 3000); // Automatically closes the modal after 3 seconds
            }
        "
    >
        <div class="p-1 bg-red-500 border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm mx-10">
            <div class="bg-white rounded-lg shadow-lg">

                <!-- Modal Body -->
                <div class="p-6 flex flex-col items-center space-y-2">
                    <!-- Error Message -->
                    <p class="text-center text-red-500 font-bold text-2xl">ERROR</p>

                    <!-- Lottie Animation Container -->
                    <div x-ref="lottieAnimation" class="w-28 sm:w-28 md:w-28 lg:w-32 max-w-[110px] mt-4 mb-0 drop-shadow-lg"></div>

                    <!-- Error Message -->
                    <p class="text-center text-gray-600 text-sm">
                        <span>{{ $errorMessage }}</span>
                    </p>
                </div>

                <!-- Horizontal Line with Animation -->
                <div class="relative overflow-hidden shadow-lg w-full h-[4px]">
                    <img src="{{ asset('storage/images/line-errorLoading.png') }}" alt="loading"
                         class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                </div>

                <!-- Modal Footer -->
                <div @click="openErrorModal = false" class="flex flex-col items-center px-6 py-2 bg-red-50 hover:bg-red-100 rounded-b-lg transition-all active:translate-y-[1px] active:shadow-none">
                    <button class="px-4 py-2 text-red-500 text-sm font-medium rounded">
                        Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
