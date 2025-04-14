<x-app-layout>

    <!-- Decorative Backgrounds -->
    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
         class="absolute -left-[650px] -top-[900px] w-[1300px] opacity-10 -rotate-90" />
    <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
         class="absolute -right-[400px] top-28 w-[1000px] opacity-10 -rotate-90"/>

    <!-- Main Split Layout -->
    <div class="flex flex-col lg:flex-row justify-center items-center h-screen px-4 sm:px-10">

        <!-- Left: Form Card -->
        <div class="w-full lg:w-1/2 max-w-lg bg-white rounded-[15px] drop-shadow-2xl p-8 z-10">

            <form method="POST" action="{{ route('staff.password.update') }}"
                  x-cloak
                  class="flex flex-col items-center space-y-4"
                  x-data="{
                        showPassword: false,
                        showConfirmPassword: false,
                        password: '',
                        confirmPassword: '',
                        requirements: [
                            { text: 'At least 8 characters', isValid: false },
                            { text: 'At least 1 uppercase letter', isValid: false },
                            { text: 'At least 1 lowercase letter', isValid: false },
                            { text: 'At least 1 number', isValid: false },
                            { text: 'At least 1 special character (!@#$%^&*)', isValid: false }
                        ],
                        validatePassword() {
                            this.requirements[0].isValid = this.password.length >= 8;
                            this.requirements[1].isValid = /[A-Z]/.test(this.password);
                            this.requirements[2].isValid = /[a-z]/.test(this.password);
                            this.requirements[3].isValid = /[0-9]/.test(this.password);
                            this.requirements[4].isValid = /[!@#$%^&*]/.test(this.password);
                        },
                        allValid() {
                            return this.requirements.every(r => r.isValid);
                        },
                        passwordsMatch() {
                            return this.password === this.confirmPassword;
                        }
                    }"
            >
                @csrf

                <div class="flex flex-col items-center space-x-2">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo" class="w-6 sm:w-10 md:w-12" />
                    <div class="text-[#4D4F50] font-semibold text-[15px]">iRoadCheck</div>
                </div>

                <h2 class="text-2xl font-bold text-[#6AA76F] text-center">Create New Password</h2>
                <p class="text-sm text-gray-500 text-center">Please create your new password.</p>

                <!-- Errors -->
                @if ($errors->any())
                    <div class="text-red-600 text-sm text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Password Input -->
                <div class="relative w-full">
                    <input :type="showPassword ? 'text' : 'password'" name="password"
                           class="rounded border text-sm text-gray-600 w-full py-2 px-10 bg-white focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] {{ $errors->has('password') ? 'border-red-500 ring-red-300' : 'border-gray-300' }}"
                           placeholder="Create New Password" required x-model="password">
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-3 top-3 h-4 w-4" alt="lock">
                    <img :src="!showPassword ? '{{ asset('storage/icons/hide-password.png') }}' : '{{ asset('storage/icons/show-password.png') }}'"
                         class="absolute right-3 top-1.5 h-5 w-5 cursor-pointer"
                         @click="showPassword = !showPassword" alt="Toggle Password">

                    <!-- Live Password Requirements -->
                    <div class="w-full text-left mt-2"
                         x-init="$watch('password', () => validatePassword())"
                         x-show="!allValid()"
                         x-transition>
                        <div class="text-sm text-gray-500 space-y-1">
                            <template x-for="(req, index) in requirements" :key="index">
                                <p :class="{'text-red-500': !req.isValid, 'text-green-500': req.isValid}">
                                    <span x-text="req.text"></span>
                                </p>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div class="relative w-full">
                    <input :type="showConfirmPassword ? 'text' : 'password'"
                           name="password_confirmation"
                           class="rounded border text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-white focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F]"
                           placeholder="Re-type New Password"
                           required
                           x-model="confirmPassword">
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="lock">
                    <img :src="!showConfirmPassword ? '{{ asset('storage/icons/hide-password.png') }}' : '{{ asset('storage/icons/show-password.png') }}'"
                         class="absolute right-3 top-1.5 h-5 w-5 cursor-pointer"
                         @click="showConfirmPassword = !showConfirmPassword" alt="Toggle Password">

                    <!-- Confirm Password Match Validation -->
                    <p x-show="confirmPassword && !passwordsMatch()" class="text-red-500 text-sm mt-1 text-left" x-transition>
                        Passwords do not match.
                    </p>
                </div>

                <!-- Submit -->
                <button type="submit"
                        :disabled="!allValid() || !passwordsMatch()"
                        class="w-full hover:scale-105 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold my-6 rounded-full transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                    Create New Password
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
