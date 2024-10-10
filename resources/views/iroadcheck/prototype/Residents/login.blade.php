<x-app-layout>
    <div class="relative bg-black h-screen font-poppins  flex items-center justify-center">

        <!-- Background Image -->
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Background" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover -z-1">

        <!-- White Container (Card) -->
        <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-xs sm:max-w-sm text-center relative z-10">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-4 w-1/5 sm:w-1/6 lg:w-1/8">
            <h1 class="text-1xl font-bold mb-6">iRoadCheck</h1>
            <h2 class="text-2xl font-bold mb-6 text-[#5A915E]">Log In</h2>
            <form action="" method="POST" class="flex flex-col items-center w-full">
                <div class="mb-4">
                    <input type="email" placeholder="Email" class="w-full p-3 border rounded-lg focus:outline-none focus:border-[#5A915E]">
                </div>

                <div class="mb-4">
                    <input type="password" placeholder="Password" class="w-full p-3 border rounded-lg focus:outline-none focus:border-[#5A915E] focus:ring-[#5A915E]">
                </div>


                <div class="text-left mb-6">
                    <a href="{{ route('forgotPassword') }}" class="text-[#5A915E] italic underline hover:underline">Forgot Password?</a>
                </div>

                <button class="w-full bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mb-4 rounded-full">Log In</button>
                <button @click="window.location.href = '{{ route('signup') }}'" class="w-full p-3 rounded-lg font-semibold text-[#F8A15E] border border-transparent">Sign Up</button>
            </form>
        </div>
    </div>

</x-app-layout>