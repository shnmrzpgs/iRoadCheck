<x-app-layout>
    <div class="absolute bg-[#000000] inset-0 flex items-center justify-center z-0">
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" class=" opacity-50 object-cover w-full h-full" alt="">
    </div>

    <div class="flex justify-center items-center h-screen">
        <div class="w-[400px] py-5 bg-[#FFFFF9] bg-blend-multiply drop-shadow-lg rounded-[15px] z-10 px-10 mx-10">
            <form action="{{route('staff-sign-in')}}" method="POST" class="flex flex-col items-center w-full" x-data="{ showPassword: false }">
                @csrf

                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                     class="xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]"/>
                <div class="text-[#4D4F50] font-semibold text-[18px]">iRoadCheck</div>
                <h2 class="text-[#4D4F50] text-[25px] font-bold mt-8 mb-2">Log in</h2>
                <h4 class="text-[#4D4F50] text-sm font-medium mb-4 italic">as Staff</h4>

                <!-- Username -->
                <div class="relative mb-2">
                    <input class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
                           type="text" name="username" id="username" placeholder="Enter your username" required>
                    <img src="{{ asset('storage/icons/user.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="user">
                </div>

                <!-- Password -->
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
                           name="password" id="password" placeholder="Password" required>
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="lock">

                    <!-- Show/Hide Password Toggle Icons -->
                    <img src="{{ asset('storage/icons/show-password.png') }}"
                         class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                         x-show="showPassword"
                         @click="showPassword = false"
                         alt="Show Password">

                    <img src="{{ asset('storage/icons/hide-password.png') }}"
                         class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                         x-show="!showPassword"
                         @click="showPassword = true"
                         alt="Hide Password">
                </div>

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="animate-bounce-once bg-red-100 border border-red-400 text-red-700 py-3 rounded relative text-sm mt-4 px-4" role="alert">
                        <div class="flex border-b border-red-300 mb-2">
                            <svg class="fill-current text-red-700 w-5 h-5 mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <span class="text-md font-semibold ml-2">Error</span>
                        </div>
                        <ul class="list-disc pl-5 text-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button class="w-3/4 hover:scale-105 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-full hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">Log In</button>
            </form>
        </div>
    </div>
</x-app-layout>

