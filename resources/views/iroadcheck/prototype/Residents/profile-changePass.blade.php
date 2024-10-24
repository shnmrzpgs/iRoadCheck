<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white ">
        <!-- White Background Header Container -->
        <div class="w-full bg-white shadow-sm p-4 border-b-2 border-gray-200 lg:w-full">
            <!-- Header -->
            <div class="flex justify-between items-center ">
                <div class="flex -mb-2 ml-2">
                    <img src="{{ asset('storage/images/IRoadCheck_Logo.png') }}" alt="graphicsLogo"
                        class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[40px]" />
                    <div class="mt-2 text-[#4D4F50] font-bold text-[17px]">iRoadCheck</div>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-[#6AA76F]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-6 h-6 rounded-full border border-customGreen bg-green-500">
                </div>
            </div>
        </div>

        <div class="w-[90%] bg-transparent rounded-lg p-6 mt-6 lg:-ml-22 lg:w-full">
            <!-- Flex container to align image and text horizontally -->
            <div class="flex items-center">
                <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-20 h-20 rounded-full border border-customGreen bg-green-500">

                <!-- User Greeting -->
                <div class="ml-4 text-left">
                    <p class="text-xl text-customGreen font-semibold">Sheena Mariz Pagas</p>
                    <p class="text-gray-600">Resident</p>
                </div>
            </div>
        </div>

        <div class="w-full bg-white py-6 lg:w-full">
            <!-- Navigation Tabs -->
            <div class="flex whitespace-nowrap lg:w-full">
                <button x-data @click="window.location.href='{{ route('profile-info') }}'" class="px-3 py-1 bg-white text-customGreen border-customGreen  text-[14px] border rounded-full ml-4 shadow-md">Personal Info</button>
                <button x-data @click="window.location.href='{{ route('profile-contact-info') }}'" class="px-3 py-1 bg-white text-customGreen border border-customGreen rounded-full ml-1 text-[14px] shadow-md">Contact Info</button>
                <button class="px-3 py-1  border text-[14px]  bg-customGreen text-white rounded-full ml-1 shadow-md">Change Password</button>

            </div>
        </div>

        <!-- Personal information Section -->
        <div class="mt-6 bg-white w-[80%] shadow-lg rounded-lg p-1 border border-gray-100 lg:h-[200px]">
            <div class="w-full bg-transparent h-10 py-2 px-3 border-b-2 border-[#F8A15E] items-center">
                <p class="text-[#F8A15E] font-semibold text-center">Change Password</p>
            </div>
            <form action="" method="POST" class="mt-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap lg:space-x-4"
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

                <!-- Password Input -->
                <div x-data="{ isFocused: false }" class="relative mb-4">
                    <label :class="{
                                'text-[#6AA76F]': isFocused || password.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && password.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || password.length > 0
                            }"
                        class="transition-all duration-200 bg-white px-1 pointer-events-none">
                        Current Password
                    </label>
                    <input :type="showPassword ? 'text' : 'password'"
                        x-model="password"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        required @input="validatePassword()"
                        class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all ">

                    <!-- Show/Hide Password Toggle -->
                    <img src="{{ asset('storage/icons/show-password.png') }}"
                        class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer "
                        x-show="!showPassword"
                        @click="showPassword = true"
                        alt="Show Password">
                    <img src="{{ asset('storage/icons/hide-password.png') }}"
                        class="absolute right-2.5 top-[10px] h-5 w-5 cursor-pointer"
                        x-show="showPassword"
                        @click="showPassword = false"
                        alt="Hide Password">
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
                        New Password
                    </label>
                    <input :type="showPassword ? 'text' : 'password'"
                        x-model="password"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        required @input="validatePassword()"
                        class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all ">

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
                <div class="relative text-sm mb-2">
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
                <div x-data="{ isFocused: false }" class="relative mb-4">
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
                        class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all">

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
                <div class="text-center relative text-sm">
                    <p x-show="confirmPassword && !checkConfirmPassword()" class="text-red-500 text-sm mb-2">Passwords do not match.</p>

                </div>
            </form>
        </div>
        <div class="flex-grow -mb-2"></div>

        <!-- Report Road Issue Button -->
         <div class="w-[75%] text-center mb-12 lg:w-[20%]"> 
            <button class="px-6 py-4 w-full lg:text-[16px] lg:py-2 lg:mb-2 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-xl font-semibold text-white shadow-md rounded-full">
                Update Password
            </button>
        </div>


    </div>
</x-app-layout>