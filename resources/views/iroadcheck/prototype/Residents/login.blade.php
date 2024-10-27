<x-app-layout>
    <div class="relative bg-black h-screen font-poppins  flex items-center justify-center">

        <!-- Background Image -->
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Background" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover -z-1">

        <!-- White Container (Card) -->
        <div class="bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-1 w-1/5 sm:w-1/6 lg:w-1/8">
            <div class="text-[#4D4F50] mb-4 font-semibold text-[18px]">iRoadCheck</div>
            <h2 class="text-2xl font-bold mb-4 text-[#5A915E]">Log In</h2>

            <form x-data="{ showPassword: false }" action="" method="POST" class="flex flex-col items-center w-full">
                <div class="relative mb-2">
                    <input class="w-full text-[14px] py-2 pl-10 pr-10 border rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E]"
                        type="email" placeholder="Email" required>
                    <img src="{{ asset('storage/icons/user.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="user">
                </div>

                <div class="relative mb-4">
                    <input :type="showPassword ? 'text' : 'password'" placeholder="Password" required
                        class="w-full py-2 pl-10 pr-10 border text-[14px] rounded-lg focus:outline-none focus:border-[#5A915E] focus:ring-[#5A915E]">
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="lock">

                    <!-- Show/Hide Password Toggle Icons -->
                    <img src="{{ asset('storage/icons/show-password.png') }}"
                        class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                        x-show="!showPassword"
                        @click="showPassword = true"
                        alt="Show Password">

                    <img src="{{ asset('storage/icons/hide-password.png') }}"
                        class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                        x-show="showPassword"
                        @click="showPassword = false"
                        alt="Hide Password">

                </div>


                <div class="text-left mb-4">
                    <a href="{{ route('forgotPassword') }}" class="text-[#5A915E] text-[14px] italic underline hover:underline">Forgot Password?</a>
                </div>

                <button @click="window.location.href = '{{ route('dashboard') }}'" class="w-full bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white text-[14px] p-3 font-semibold rounded-full">Log In</button>
                <button @click="window.location.href = '{{ route('signup') }}'" class="w-full p-3 rounded-lg font-semibold text-[14px] text-[#F8A15E] border border-transparent">Sign Up</button>
            </form>
        </div>
    </div>

</x-app-layout>