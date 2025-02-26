<x-app-layout>
    <div>
        <div class="absolute bg-[#000000] inset-0 flex items-center justify-center z-0">
            <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" class="opacity-50 object-cover w-full h-full" alt="">
        </div>

        <div class="flex justify-center items-center h-screen">
            <!-- White Container (Card) -->
            <div class="mx-5 bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10">

                <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-1 w-1/5 sm:w-1/6 lg:w-1/8">
                <div class="text-[#4D4F50] mb-4 font-semibold text-[18px]">iRoadCheck</div>
                <h2 class="text-2xl font-bold mb-4 text-[#5A915E]">Install iRoadCheck App</h2>

                <!-- Install PWA Button -->
                <button id="installPWAButton"
                        class="w-3/4 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:scale-105 hover:drop-shadow-md text-white p-3 font-semibold mt-6 mb-3 rounded-full transition-all duration-300">
                    Install
                </button>
            </div>
        </div>
    </div>

        <script>
            let deferredPrompt;

            // Capture the PWA install event
            window.addEventListener('beforeinstallprompt', (e) => {
                e.preventDefault();
                deferredPrompt = e;
                document.getElementById('installPWAButton').style.display = 'block';
            });

            // Handle button click
            document.getElementById('installPWAButton').addEventListener('click', async () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    const { outcome } = await deferredPrompt.userChoice;
                    if (outcome === 'accepted') {
                        console.log('User accepted the PWA installation');
                    }
                    deferredPrompt = null;
                }
            });
        </script>


</x-app-layout>
