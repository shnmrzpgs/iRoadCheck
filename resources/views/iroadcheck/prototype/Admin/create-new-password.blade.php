<x-app-layout>

    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
         class="absolute -left-[650px] -top-[600px] w-[1300px] opacity-10 -rotate-90" />
    <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
         class="absolute -right-[400px] top-28 w-[1000px] opacity-10 -rotate-90"/>

    <div class="flex text-start justify-start">
        <div class="flex mt-4 -mb-5 ml-5 mr-auto">
            <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                 class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]"/>
            <div class="mt-2 text-[#4D4F50] font-semibold text-[18px]">iRoadCheck</div>
        </div>
        <div class="flex mt-4 ml-5 mr-auto">
            <h1 class="hover:scale-110 transform transition-transform duration-300 ease-in-out absolute right-5 top-6 text-[14px] font-medium bg-gradient-to-r from-[#5A915E] via-[#F8A15E] to-[#F8A15E] bg-clip-text text-transparent flex items-center group">
                <span class="font-bold">Back to Log In</span>
                <svg class="w-6 h-6" fill="#F8A15E" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </h1>
        </div>
    </div>

    <div class="flex justify-center items-center h-screen">
        <div class="w-[400px] py-8 bg-white bg-blend-multiply drop-shadow-2xl rounded-[15px] z-10 px-10 mx-6"
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
                checkConfirmPassword() {
                    return this.password === this.confirmPassword;
                },
                firstInvalidRequirementIndex() {
                    return this.requirements.findIndex(req => !req.isValid);
                }
            }">
            <form action="" method="POST" class="flex flex-col items-center w-full"
                  x-init="lottie.loadAnimation({
                      container: $refs.lottieAnimation,
                      renderer: 'svg',
                      loop: true,
                      autoplay: true,
                      path: '{{ asset("animations/Animation - 1726949704632.json") }}'
                  })">
                <div class="text-[#6AA76F] font-bold text-[22px]">Create New Password</div>

                <!-- Lottie Animation Container -->
                <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>

                <p class="text-[#4D4F50] text-[16px] font-medium mt-6 mb-2">OTP Verification</p>

                <div class="relative mb-1">
                    <input :type="showPassword ? 'text' : 'password'"
                           class="rounded border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
                           x-model="password" placeholder="Password" required @input="validatePassword()">
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

                <!-- Dynamic Password Requirements -->
                <div class="text-sm mb-2">
                    <div x-show="firstInvalidRequirementIndex() !== -1">
                        <span :class="{'text-red-500': !requirements[firstInvalidRequirementIndex()].isValid, 'text-green-500': requirements[firstInvalidRequirementIndex()].isValid}"
                              x-text="requirements[firstInvalidRequirementIndex()].text">
                        </span>
                    </div>
                </div>

                <div class="relative mb-2">
                    <input :type="showConfirmPassword ? 'text' : 'password'"
                           class="rounded border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-white"
                           x-model="confirmPassword" placeholder="Confirm Password" required>
                    <img src="{{ asset('storage/icons/lock.svg') }}" class="absolute left-2.5 top-3 h-4 w-4" alt="lock">

                    <!-- Show/Hide Confirm Password Toggle Icons -->
                    <img src="{{ asset('storage/icons/show-password.png') }}"
                         class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                         x-show="!showConfirmPassword"
                         @click="showConfirmPassword = true"
                         alt="Show Password">

                    <img src="{{ asset('storage/icons/hide-password.png') }}"
                         class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                         x-show="showConfirmPassword"
                         @click="showConfirmPassword = false"
                         alt="Hide Password">
                </div>

                <!-- Confirm Password Match Validation -->
                <p x-show="confirmPassword && !checkConfirmPassword()" class="text-red-500 text-sm mb-2">Passwords do not match.</p>

                <button :disabled="!requirements.every(req => req.isValid) || !checkConfirmPassword()"
                        class="w-3/4 hover:scale-110 transform transition-transform duration-300 ease-in-out bg-gradient-to-r from-[#5A915E] to-[#F8A15E] hover:drop-shadow-md text-white p-3 font-semibold mt-6 rounded-full">Send Code</button>
            </form>
        </div>
    </div>
</x-app-layout>
