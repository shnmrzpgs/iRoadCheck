<x-app-layout>

    <div class="relative bg-black h-screen font-poppins flex items-center justify-center">

        <!-- Background Image -->
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Background" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover -z-1">

        <!-- Logo and Title Section -->
        <div class="absolute top-10 w-full text-center items-center z-20 mt-12">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-4 w-1/6 sm:w-1/8 lg:w-1/12">
            <h1 class="text-[16px] text-white font-medium mb-6">iRoadCheck</h1>
            <p class="text-white font-medium text-[22px]">Sign Up</p>
        </div>

        <!-- White Container (Card) -->
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white shadow-lg rounded-lg p-10 py-6 w-full max-w-xs sm:max-w-sm text-center relative z-10 mt-[50%]">
                <h2 class="text-[18px] mb-4 font-medium text-[#F8A15E]">iRoadCheck Account</h2>

                <div class="flex w-1/2 justify-center ml-16 mb-6">
                    <hr class="border-t-4 border-[#6AA76F] border-text-[18px] w-1/3 mr-2">
                    <hr class="border-t-4 border-[#F8A15E] border-text-[18px] w-1/3 ml-2">
                </div>

                <!-- Form -->
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
                    }"
                >

                    <!-- Email Input -->
                    <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                        <label :class="{
                                'text-[#6AA76F]': isFocused || inputValue.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,
                                'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                            class="transition-all duration-200 bg-white px-1">
                            Email Address
                        </label>
                        <input type="text" 
                            x-model="inputValue" 
                            @focus="isFocused = true" 
                            @blur="isFocused = false"
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all">
                    </div>

                    <!-- Password Input -->
                    <div x-data="{ isFocused: false }" class="relative mb-2">
                        <label :class="{
                                'text-[#6AA76F]': isFocused || password.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && password.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || password.length > 0
                            }"
                            class="transition-all duration-200 bg-white px-1 pointer-events-none">
                            Create Password
                        </label>
                        <input :type="showPassword ? 'text' : 'password'"
                            x-model="password" 
                            @focus="isFocused = true" 
                            @blur="isFocused = false" 
                            required @input="validatePassword()"
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all ">
                        
                        <!-- Show/Hide Password Toggle -->
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
                    <div x-data="{ isFocused: false }" class="relative mb-6">
                        <label :class="{
                                'text-[#6AA76F]': isFocused || confirmPassword.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && confirmPassword.length === 0,
                                'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || confirmPassword.length > 0 }"
                            class="transition-all duration-200 bg-white px-1">
                            Confirm Password
                        </label>
                        <input :type="showConfirmPassword ? 'text' : 'password'"
                            x-model="confirmPassword" 
                            @focus="isFocused = true" 
                            @blur="isFocused = false" 
                            required 
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all">
                        
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
                    <button class="w-full text-[18px] bg-gradient-to-r from-[#5A915E] to-[#F8A15E] shadow-lg text-white p-3 font-medium mb-2 mt-2 rounded-full">Sign Up</button>
                    <button class="w-full p-3 rounded-lg font-semibold text-[#F8A15E] border border-transparent">Log in</button>

                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>
