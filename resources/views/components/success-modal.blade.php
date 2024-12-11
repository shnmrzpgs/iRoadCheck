<div
    x-show="openSuccessModal"
    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30"
    x-init="
        lottie.loadAnimation({
            container: $refs.lottieAnimation,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '{{ asset("animations/Animation - 1732372548058.json") }}'
        });
        if (openSuccessModal) {
            setTimeout(() => {
                openSuccessModal = false;
            }, 3000); // Automatically closes the modal after 3 seconds
        }
    "
>
    <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm">
        <div
            @click.away="openSuccessModal = false"
            class="bg-white rounded-lg shadow-lg"
        >

            <!-- Modal Body -->
            <div class="p-6 flex flex-col items-center space-y-2">

                <!-- Success Message -->
                <p class="text-center text-green-600 font-bold text-2xl">
                    SUCCESS
                </p>

                <!-- Lottie Animation Container -->
                <div x-ref="lottieAnimation" class="w-28 sm:w-28 md:w-28 lg:w-32 max-w-[110px] mt-4 mb-0 drop-shadow-lg"></div>

                <!-- Success Message -->
                <p class="text-center text-gray-600 text-sm">
                    {{ $successMessage }}
                </p>
            </div>

            <!-- Horizontal Line with Animation -->
            <div class="relative overflow-hidden shadow-lg w-full h-[4px] ">
                <img src="{{ asset('storage/images/line-successLoading.png') }}" alt="loading"
                     class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
            </div>

            <!-- Modal Footer -->
            <div
                @click="openSuccessModal = false" class="flex flex-col items-center px-6 py-2 bg-green-50 hover:bg-green-100 rounded-b-lg transition-all active:translate-y-[1px] active:shadow-none">

                <!-- Close Button -->
                <button
                    class="px-4 py-2 text-green-600 text-sm font-medium rounded"
                >
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
