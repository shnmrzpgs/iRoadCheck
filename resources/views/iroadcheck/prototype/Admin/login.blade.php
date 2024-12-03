<x-app-layout>
    <div class="bg-[#000000]">
        <div class="absolute inset-0 flex items-center justify-center z-0 opacity-50">
            <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" class="object-cover w-full h-full" alt="">
        </div>

        <div class="flex justify-center items-center h-screen">
            <div class="w-[400px] py-5 bg-[#FFFFF9] bg-blend-multiply drop-shadow-lg rounded-[15px] z-10 px-10 mx-6">
                <form action="{{route('admin-sign-in')}}" method="POST" class="flex flex-col items-center w-full" x-data="{ showPassword: false }">
                    @csrf
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                         class="xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]"/>
                    <div class="text-[#4D4F50] font-semibold text-[18px]">iRoadCheck</div>
                    <h2 class="text-[#4D4F50] text-[25px] font-bold mt-8 mb-4">Log in</h2>

                    <div class="relative mb-2">
                        <input class="rounded border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
                               name="email" id="email" type="email" placeholder="Email address" required>
                        <img src="{{ asset('storage/icons/user.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="user">
                    </div>

                    <div class="relative">
                        <input type="password" class="rounded border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
                               name="password" id="password" placeholder="Password" required>
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

                    @if ($errors->any())
                        <div class="text-red-500 text-sm w-25 mt-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button class="w-3/4 hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-full">Log In</button>
                    <a href="" class="hover:font-medium text-[#6AA76F] text-[12px] font-light italic underline mt-2 mb-1">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

