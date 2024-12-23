<div>

    <div class="absolute bg-[#000000] inset-0 flex items-center justify-center z-0">
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" class=" opacity-50 object-cover w-full h-full" alt="">
    </div>

    <div class="flex justify-center items-center h-screen">

        <!-- White Container (Card) -->
        <div class="mx-5 bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10">

            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-1 w-1/5 sm:w-1/6 lg:w-1/8">
            <div class="text-[#4D4F50] mb-4 font-semibold text-[18px]">iRoadCheck</div>
            <h2 class="text-2xl font-bold mb-4 text-[#5A915E]">Log In</h2>

            <!-- Flash Message Section -->
            <form wire:submit.prevent="login" x-data="{ showPassword: false }" class="flex flex-col items-center w-full">

                <!-- Error Message -->
                @if (session()->has('error'))
                    <div class="animate-bounce-once bg-red-100 border border-red-400 text-red-700 py-3 rounded relative text-sm my-3 px-4" role="alert">
                        <div class="flex border-b border-red-300 mb-2">
                            <svg class="fill-current text-red-700 w-5 h-5 mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <span class="text-md font-semibold ml-2">Error</span>
                        </div>
                        <ul class="list-disc pl-5 text-xs text-start">
                           <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif

                <!-- Email Input -->
                <div class="relative mb-2">
                    <input wire:model="email"
                           class="w-full text-[14px] py-2 pl-10 pr-10 border rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E]"
                           type="email"
                           placeholder="Email Address"
                           required>
                    <img src="{{ asset('storage/icons/user.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="user">
                </div>

                <!-- Password Input -->
                <div class="relative mb-4">
                    <input wire:model="password"
                           :type="showPassword ? 'text' : 'password'"
                           placeholder="Password"
                           required
                           class="w-full py-2 pl-10 pr-10 border text-[14px] rounded-lg focus:outline-none focus:border-[#5A915E] focus:ring-[#5A915E]">
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

                <!-- Forgot Password -->
                <div class="text-left mb-2">
                    <a href="{{ route('forgotPassword') }}" class="text-[#5A915E] text-[14px] italic underline hover:underline">Forgot Password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit"
                        class="w-3/4 hover:scale-105 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold mt-6 mb-3 rounded-full hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">
                    Log In
                </button>

                <!-- Sign Up Button -->
                <button @click="window.location.href = '{{ route('signup') }}'"
                        class="w-3/4 group relative inline-flex h-[calc(48px+4px)] items-center justify-center rounded-full bg-none border-none text-[#F8A15E] hover:text-white py-1 pl-6 pr-6 font-medium transition active:scale-95">
                    <span class="z-10 pr-2">Sign Up</span>
                    <div class="absolute right-1 inline-flex h-10 w-10 items-center justify-end rounded-full bg-[#F8A15E] transition-[width] group-hover:w-[calc(100%-8px)]">
                        <div class="mr-3 flex items-center justify-center">
                            <svg width="6" height="6" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-neutral-50">
                                <path d="M8.14645 3.14645C8.34171 2.95118 8.65829 2.95118 8.85355 3.14645L12.8536 7.14645C13.0488 7.34171 13.0488 7.65829 12.8536 7.85355L8.85355 11.8536C8.65829 12.0488 8.34171 12.0488 8.14645 11.8536C7.95118 11.6583 7.95118 11.3417 8.14645 11.1464L11.2929 8H2.5C2.22386 8 2 7.77614 2 7.5C2 7.22386 2.22386 7 2.5 7H11.2929L8.14645 3.85355C7.95118 3.65829 7.95118 3.34171 8.14645 3.14645Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </button>
            </form>

        </div>
    </div>

</div>
