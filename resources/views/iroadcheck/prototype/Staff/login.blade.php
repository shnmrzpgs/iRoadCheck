<x-app-layout>
    <div class="absolute bg-[#000000] inset-0 flex items-center justify-center z-0">
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" class="opacity-50 object-cover w-full h-full" alt="">
    </div>

    <div class="flex justify-center items-center h-screen" x-data="{ loading: false }">
        <div class="w-[400px] py-5 bg-[#FFFFF9] drop-shadow-lg rounded-[15px] z-10 px-10 mx-10"
             x-data="{
                timeout: {{ $errors->first('timeout') ?? 'null' }},
                secondsRemaining: {{ $errors->first('timeout') ?? 'null' }},
                countdown() {
                    if (this.secondsRemaining && this.secondsRemaining > 0) {
                        const interval = setInterval(() => {
                            this.secondsRemaining--;
                            if (this.secondsRemaining <= 0) {
                                clearInterval(interval);
                                this.timeout = null;
                            }
                        }, 1000);
                    }
                }
             }"
             x-init="countdown">

            <!-- Login Form -->
            <form action="{{ route('staff-sign-in') }}" method="POST"
                  @submit.prevent="loading = true; $nextTick(() => $el.submit())"
                  class="flex flex-col items-center w-full"
                  x-data="{ showPassword: false }">
                @csrf

                <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                     class="xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]"/>
                <div class="text-[#4D4F50] font-semibold text-[18px]">iRoadCheck</div>
                <h2 class="text-[#4D4F50] text-[25px] font-bold mt-8 mb-2">Log in</h2>
                <h4 class="text-[#4D4F50] text-sm font-medium mb-4 italic">as Staff</h4>

                {{-- 🔒 Show only "inactive staff" error --}}
                @if ($errors->has('username') && $errors->first('username') === 'This staff account is inactive. Please contact the administrator.')
                    <div class="flex bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative mb-2" role="alert">
                        <svg class="fill-current text-red-700 w-7 h-7 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                        </svg>
                        <span class="block sm:inline text-[12px] italic">{{ $errors->first('username') }}</span>
                    </div>
                @endif


                <!-- Timeout Message -->
                <template x-if="timeout">
                    <div class="text-red-700 bg-red-100 text-sm font-medium text-center rounded py-2 px-4 w-full mb-4">
                        Too many login attempts. Please try again in
                        <span x-text="secondsRemaining"></span> seconds.
                        <div class="text-[11px] italic text-red mt-1">
                            Forgot your password? Contact the administrator.
                        </div>
                    </div>
                </template>

                <!-- Username -->
                <div class="relative mb-3 w-full" x-data="{ hasError: {{ $errors->has('username') ? 'true' : 'false' }} }">
                    <input
                        class="rounded border text-sm text-gray-600 w-full py-2 pl-8 pr-10 bg-[#FFFFF9] focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] {{ $errors->has('username') ? 'border-red-500 ring-red-300' : 'border-gray-300' }}"
                        type="text" name="username" id="username" placeholder="Username"
                        value="{{ old('username') }}" required
                        autocomplete="off"
                        @input="hasError = false"
                    >
                    <img src="{{ asset('storage/icons/user.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="user">
                    @error('username')
                    @if ($message !== 'This staff account is inactive. Please contact the administrator.')
                        <p x-show="hasError" class="text-red-600 text-xs mt-1 italic" x-cloak>{{ $message }}</p>
                    @endif
                    @enderror

                </div>

                <!-- Password -->
                <div class="relative w-full" x-data="{ hasError: {{ $errors->has('password') ? 'true' : 'false' }} }">
                    <input
                        :type="showPassword ? 'text' : 'password'"
                        name="password" id="password" placeholder="Password" required
                        @input="hasError = false"
                        class="rounded border text-sm text-gray-600 w-full py-2 pl-8 pr-10 bg-[#FFFFF9] focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] {{ $errors->has('password') ? 'border-red-500 ring-red-300' : 'border-gray-300' }}"
                    >
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="lock">

                    <!-- Toggle show/hide -->
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

                    @error('password')
                    <p x-show="hasError" class="text-red-600 text-xs mt-1 italic" x-cloak>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-3/4 hover:scale-105 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-full transition-all duration-300"
                        :disabled="timeout"
                        :class="timeout ? 'opacity-60 cursor-not-allowed' : ''">
                    Log In
                </button>
            </form>
        </div>

        <!-- Loading Overlay -->
        <div x-show="loading"
             x-cloak
             class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="h-16 w-16 border-4 border-white border-dashed rounded-full animate-spin"></div>
        </div>
    </div>
</x-app-layout>
