<x-app-layout>

    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
         class="fixed -left-[650px] -top-[800px] w-[1300px] opacity-15 -rotate-90 hidden sm:block" />

    <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
         class="fixed -right-[400px] top-28 w-[1000px] opacity-15 -rotate-90 hidden sm:block" />


    <div class="relative h-screen font-poppins flex items-center justify-center overflow-hidden">

        <div class="absolute inset-0 flex">
            <img src="{{ asset('storage/icons/road.png') }}" alt="Background" class="absolute w-[100%] h-[70%] ml-0 bottom-0 max-w-4xl z-0 block md:hidden">
        </div>

        <div class="flex items-center justify-center h-screen">
            <div x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                container: $refs.lottieAnimation, // the DOM element
                renderer: 'svg', // render as SVG
                loop: true, // loop the animation
                autoplay: true, // start playing the animation
                path: '{{ asset("animations/Animation - 1726948674471.json") }}'
                })" class="bg-white shadow-lg rounded-2xl px-5 md:px-10 py-4 w-full max-w-xs sm:max-w-sm text-center relative z-10 mx-5 " style="box-shadow: 0 0 200px rgba(0, 0, 0, 0.2);">

                <div class="top-0 w-full text-center z-20 my-4">
                    <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck"
                         class="mx-auto mb-1 w-1/10 sm:w-1/10 lg:w-1/10">
                    <h1 class="text-[15px] text-[#4D4F50] lg:text-md font-bold mb-6">iRoadCheck</h1>
                </div>

                <h2 class="text-2xl text-[#6AA76F] font-bold lg:text-[20px]">Forgot Password</h2>

                <form action="" method="POST" class="flex flex-col items-center w-full">

                    <!-- Lottie Animation Container -->
                    <div x-ref="lottieAnimation" class="w-24 sm:w-32 md:w-36 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>

                    <h2 class="text-[14px] mb-4 mt-6 text-black">Enter Code</h2>

                    <div class="mb-2">
                        <input type="number" placeholder="0000" required
                        class="w-full py-2 pl-10 pr-10 border rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] text-center text-[25px] font-semibold focus:border-[#5A915E] tracking-wider font-mono">
                    </div>

                    <!-- Button -->
                    <a href="{{ route('createNewPass') }}" class="w-full text-[14px] bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mb-4 rounded-full text-center block mt-4 transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                        Verify
                    </a>
                </form>

            </div>
        </div>


    </div>
</x-app-layout>
