<x-app-layout>

    <div x-data="{ step: 1 }" class="relative bg-black h-screen font-poppins flex items-center justify-center">

        <!-- Background Image -->
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Background" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover -z-1">

        <form action="" method="POST" class="flex flex-col items-center w-full"
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
            <div x-show="step === 1" class="bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10">

                <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-1 xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]">
                <div class="text-[#4D4F50] mb-4 font-semibold text-[18px]">iRoadCheck</div>

                <h2 class="text-[20px] font-bold text-[#5A915E]">Sign Up</h2>
                <h2 class="text-sm mb-4 font-sm text-[#F8A15E]">Personal Information</h2>

                <div class="flex w-1/2 justify-center mx-auto mb-4">
                    <hr class="border-t-4 border-[#F8A15E] border-text-[24px] rounded-md w-1/3 mr-2">
                    <hr class="border-t-4 border-text-[24px] rounded-md w-1/3 ml-2">
                </div>


                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                    <!-- Floating Label -->
                    <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0, 'absolute': true, 'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */ 'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                        class="transition-all duration-200 bg-white px-1 text-sm text-[rgb(120,129,121)]">
                        First Name
                    </label>

                    <!-- Input Field -->
                    <input type="text" x-model="inputValue" @focus="isFocused = true" @blur="isFocused = false"
                        class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">
                </div>

                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                    <label :class="{'text-[#6AA76F]': isFocused || inputValue.length > 0, 'absolute': true, 'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0, 'text-xs top-[-10px] left-3': isFocused || inputValue.length > 0 }"
                        class="transition-all duration-200 bg-white px-1 text-sm text-[rgb(120,129,121)]">
                        Middle Name
                    </label>
                    <input type="text" x-model="inputValue" @focus="isFocused = true" @blur="isFocused = false"
                        class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">
                </div>

                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-6">
                    <!-- Floating Label -->
                    <label :class="{ 'text-[#6AA76F]': isFocused || inputValue.length > 0,'absolute': true, 'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */ 'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                        class="transition-all duration-200 bg-white px-1 text-sm text-[rgb(120,129,121)]">
                        Last Name
                    </label>

                    <!-- Input Field -->
                    <input type="text" x-model="inputValue" @focus="isFocused = true" @blur="isFocused = false"
                        class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">
                </div>

                <button @click="step = 2" class="w-full hover:scale-105 text-[14px] bg-[#5A915E] shadow-lg text-white p-3 font-medium mb-1 rounded-full hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">Next</button>
                <button
                    @click="window.location.href = '{{ route('residents-login') }}'"
                    class="relative overflow-hidden w-full p-3 text-[14px] rounded-full font-semibold text-[#F8A15E] border border-transparent bg-transparent group">
                    <span class="relative z-10 transition-[width] group-hover:text-white">
                        Log in
                    </span>
                    <span class="absolute inset-0 bg-[#F8A15E] transform rounded-full scale-x-0 origin-center transition-transform duration-200 group-hover:scale-x-100"></span>
                </button>
            </div>

            <div x-show="step === 2" class="bg-white shadow-lg rounded-2xl px-10 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10">

                <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-1 xs:-my-2 md:mb-1 md:mt-4 w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]">
                <div class="text-[#4D4F50] mb-4 font-semibold text-[18px]">iRoadCheck</div>

                <h2 class="text-[20px] font-bold text-[#5A915E]">Sign Up</h2>
                <h2 class="text-sm mb-4 font-sm text-[#F8A15E]">iRoadCheck Account</h2>

                <div class="flex w-1/2 justify-center mx-auto mb-4">
                    <hr class="border-t-4 border-[#F8A15E] border-text-[24px] rounded-md w-1/3 mr-2">
                    <hr class="border-t-4 border-[#F8A15E] border-text-[24px] rounded-md w-1/3 ml-2">
                </div>

                <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-2">
                    <label :class="{'text-[#6AA76F]': isFocused || inputValue.length > 0,'absolute': true,'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                        class="transition-all duration-200 bg-white px-1 text-sm text-[rgb(120,129,121)]">
                        Email Address
                    </label>
                    <input type="text" x-model="inputValue" @focus="isFocused = true" @blur="isFocused = false"
                        class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">
                </div>

                <!-- Password Input -->
                <div x-data="{ isFocused: false }" class="relative mb-2">
                    <label :class="{'text-[#6AA76F]': isFocused || password.length > 0,'absolute': true,'top-[50%] left-3 -translate-y-[50%]': !isFocused && password.length === 0,'text-xs top-[-10px] left-3': isFocused || password.length > 0}"
                        class="transition-all duration-200 bg-white px-1 pointer-events-none text-sm text-[rgb(120,129,121)]">
                        Create Password
                    </label>
                    <input :type="showPassword ? 'text' : 'password'" x-model="password" @focus="isFocused = true" @blur="isFocused = false" required @input="validatePassword()"
                        class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">

                    <!-- Show/Hide Password Toggle -->
                    <img src="{{ asset('storage/icons/show-password.png') }}" class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer" x-show="!showPassword" @click="showPassword = true" alt="Show Password">
                    <img src="{{ asset('storage/icons/hide-password.png') }}" class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer" x-show="showPassword" @click="showPassword = false" alt="Hide Password">
                </div>
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

                <!-- Confirm Password Input -->
                <div x-data="{ isFocused: false }" class="relative mb-2">
                        <label :class="{
                                'text-[#6AA76F]': isFocused || confirmPassword.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && confirmPassword.length === 0,
                                'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || confirmPassword.length > 0 }"
                            class="transition-all duration-200 bg-white px-1 text-sm text-[rgb(120,129,121)]">
                            Confirm Password
                        </label>
                        <input :type="showConfirmPassword ? 'text' : 'password'"
                            x-model="confirmPassword" 
                            @focus="isFocused = true" 
                            @blur="isFocused = false" 
                            required 
                            class="rounded border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] text-sm text-gray-600 w-full py-2 pl-10 pr-10 bg-[#FFFFF9] transition-all">
                        
                        <!-- Show/Hide Confirm Password Toggle -->
                        <img src="{{ asset('storage/icons/show-password.png') }}" 
                            class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer" 
                            x-show="!showConfirmPassword" 
                            @click="showConfirmPassword = true" 
                            alt="Show Confirm Password">
                        <img src="{{ asset('storage/icons/hide-password.png') }}" 
                            class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer" 
                            x-show="showConfirmPassword" 
                            @click="showConfirmPassword = false" 
                            alt="Hide Confirm Password">
                    </div>

                    <p x-show="confirmPassword && !checkConfirmPassword()" class="text-red-500 text-sm mb-2">Passwords do not match.</p>

                    <!-- Action Buttons -->
                    <button class="w-full hover:scale-105 text-[14px] bg-gradient-to-r from-[#5A915E] to-[#F8A15E] shadow-lg text-white p-3 font-medium mb-1 mt-2 rounded-full hover:ease-in-out hover:duration-300 transition-all duration-300 [transition-timing-function:cubic-bezier (0.175,0.885,0.32,1.275)] active:-translate-y-1 active:scale-x-90 active:scale-y-110">Sign Up</button>
                    <button
                    @click="window.location.href = '{{ route('residents-login') }}'"
                    class="relative overflow-hidden w-full p-3 text-[14px] rounded-full font-semibold text-[#F8A15E] border border-transparent bg-transparent group">
                    <span class="relative z-10 transition-[width] group-hover:text-white">
                        Log in
                    </span>
                    <span class="absolute inset-0 bg-[#F8A15E] transform rounded-full scale-x-0 origin-center transition-transform duration-200 group-hover:scale-x-100"></span>
                </button>
            </div>
        </form>
    </div>

</x-app-layout>