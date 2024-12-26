<x-app-layout>

    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
         class="absolute -left-[650px] -top-[900px] w-[1300px] opacity-10 -rotate-90" />
    <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
         class="absolute -right-[400px] top-28 w-[1000px] opacity-10 -rotate-90"/>

    <div class="flex text-start justify-start">
        <div class="flex mt-4 -mb-5 ml-5 mr-auto">
            <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                 class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]"/>
            <div class="mt-2 text-[#4D4F50] font-semibold text-[18px]">iRoadCheck</div>
        </div>
        <div class="flex mt-4 ml-5 mr-auto">
            <a href="{{ route('admin.login') }}">
                <h1 class="hover:scale-110 transform transition-transform duration-300 ease-in-out absolute right-5 top-6 text-[14px] font-medium bg-gradient-to-r from-[#5A915E] via-[#F8A15E] to-[#F8A15E] bg-clip-text text-transparent flex items-center group">
                    <span class="font-bold">Back to Log In</span>
                    <svg class="w-6 h-6 " fill="#F8A15E" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </h1>
            </a>
        </div>
    </div>

    <div class="flex justify-center items-center h-screen">
        <div class="w-[400px] py-8 bg-white bg-blend-multiply drop-shadow-2xl rounded-[15px] z-10 px-10 mx-6"
             x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                container: $refs.lottieAnimation, // the DOM element
                renderer: 'svg', // render as SVG
                loop: true, // loop the animation
                autoplay: true, // start playing the animation
                path: '{{ asset("animations/Animation - 1726948674471.json") }}'
            })">
            <form action="" method="POST" class="flex flex-col items-center w-full">
                <div class="text-[#6AA76F] font-bold text-[22px]">Forgot Password</div>

                <!-- Lottie Animation Container -->
                <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>

                <p class="text-[#4D4F50] text-[16px] font-medium mt-6 mb-2 ">OTP Verification</p>

                <div class="relative mb-2 px-10">
                    <input  class="w-full py-2 pl-10 pr-10 border rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] text-center text-[25px] font-semibold focus:border-[#5A915E] tracking-wider font-mono"
                    name="code" id="code" type="number" placeholder="Enter Code" required >
                </div>
                <!-- Button -->
                <a href="{{ route('admin.create-new-password') }}" class="w-3/4 text-[14px] bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mb-4 rounded-full text-center block mt-4 transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                    Verify
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
