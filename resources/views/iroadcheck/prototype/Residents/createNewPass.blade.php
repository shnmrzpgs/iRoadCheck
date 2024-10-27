<x-app-layout>

    <img src="{{ asset('storage/icons/bg-graphics-orange.png') }}" alt="bgGraphics"
        class="fixed -left-[650px] -top-[600px] w-[1300px] opacity-15 -rotate-90 hidden sm:block" />

    <img src="{{ asset('storage/icons/bg-graphics-green.png') }}" alt="bgGraphics"
        class="fixed -right-[400px] top-28 w-[1000px] opacity-15 -rotate-90 hidden sm:block" />


    <div class="relative h-screen font-poppins flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 flex h-screen lg:hidden">
            <img src="{{ asset('storage/images/road.png') }}" alt="Background" class="absolute h-[60%] ml-[-50%] mt-[90%] z-0 max-w-4xl">
        </div>

        <div class="absolute top-10 w-full text-center z-20 mt-14 max-w-xs sm:max-w-sm lg:mb-8 lg:mt-6">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck"
                class="mx-auto mb-1 w-1/5 sm:w-1/6 lg:w-1/8">
            <h1 class="text-[18px] text-[#4D4F50] lg:text-md font-bold mb-6">iRoadCheck</h1>
        </div>

        <div class="flex items-center justify-center h-screen">
            <div
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
                }" class="bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10 " style="box-shadow: 0 0 200px rgba(0, 0, 0, 0.2);">

                <form action="" method="POST" class="flex flex-col items-center w-full"
                    x-data="{ animation: null }" x-init="animation = lottie.loadAnimation({
                container: $refs.lottieAnimation, // the DOM element
                renderer: 'svg', // render as SVG
                loop: true, // loop the animation
                autoplay: true, // start playing the animation
                path: '{{ asset("animations/Animation - 1726949704632.json") }}'
                })">

                    <h2 class="text-2xl text-[#6AA76F] font-bold lg:text-[20px]">Create New Password</h2>
                    <!-- Lottie Animation Container -->
                    <div x-ref="lottieAnimation" class="w-28 sm:w-26 md:w-38 lg:w-46 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>


                    <div class="relative mb-2">
                        <input :type="showPassword ? 'text' : 'password'"
                            class="rounded-lg border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9]"
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

                    <!-- Validation message - hidden at first, shown after typing -->
                    <div class="text-sm mb-2">
                        <div x-show="password.length > 0 && firstInvalidRequirementIndex() !== -1">
                            <span :class="{
                                    'text-red-500': !requirements[firstInvalidRequirementIndex()].isValid,
                                    'text-green-500': requirements[firstInvalidRequirementIndex()].isValid
                                }"
                                x-text="requirements[firstInvalidRequirementIndex()].text">
                            </span>
                        </div>
                    </div>

                    <div class="relative mb-4">
                        <input :type="showConfirmPassword ? 'text' : 'password'"
                            class="rounded-lg border border-gray-400 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 focus:outline-none text-[14px] text-gray-600 w-full py-2 pl-10 pr-10 bg-white"
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

                    <p x-show="confirmPassword && !checkConfirmPassword()" class="text-red-500 text-sm mb-2">Passwords do not match.</p>

                    <!-- Button -->
                    <button
                        :disabled="!requirements.every(req => req.isValid) || !checkConfirmPassword()"
                        class="w-full text-[14px]  bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-white p-3 font-semibold mb-4 rounded-full mt-4">Change Password</button>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>