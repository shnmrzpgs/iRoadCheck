<x-app-layout>

    <div class="relative h-screen font-poppins flex items-center justify-center">
        <div class="absolute inset-0 flex h-screen lg:hidden">
            <img src="{{ asset('storage/images/road.png') }}" alt="Background" class="absolute h-[60%] ml-[-50%] mt-[90%] z-0 max-w-4xl">
        </div>

        <div class="absolute top-10 w-full text-center z-20 mt-12">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-4 w-1/6 sm:w-1/8 lg:w-1/12">
            <h1 class="text-[18px] lg:text-md font-bold mb-6">iRoadCheck</h1>
        </div>

        <div class="flex items-center justify-center h-screen">
            <div x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                container: $refs.lottieAnimation, // the DOM element
                renderer: 'svg', // render as SVG
                loop: true, // loop the animation
                autoplay: true, // start playing the animation
                path: '{{ asset("animations/Animation - 1726948674471.json") }}'
                })" class="bg-white shadow-lg rounded-3xl px-12 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10" style="box-shadow: 0 0 200px rgba(0, 0, 0, 0.2);">

                <form action="" method="POST" class="flex flex-col items-center w-full">
                    <h2 class="text-[22px] text-[#6AA76F] font-bold">Forgot Password</h2>

                    <!-- Lottie Animation Container -->
                    <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>

                    <h2 class="text-[16px] mb-4 mt-6 text-black">Enter Code</h2>
                    <div class="mb-4">
                        <input type="number" placeholder="0000" class="w-full p-3 border rounded-lg focus:outline-none focus:border-[#5A915E]">
                    </div>

                    <!-- Button -->
                    <a href="{{ route('createNewPass') }}" class="w-full bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mb-4 rounded-full text-center block mt-4">
                        Verify
                    </a>
                </form>

            </div>
        </div>


    </div>
</x-app-layout>