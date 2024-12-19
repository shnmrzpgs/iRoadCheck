<x-app-layout>
    <div class="min-h-screen flex flex-col items-center bg-white " x-data="{ step: 1 }">
        <!--  header -->
        <x-residents.resident-header />

        <form>
            <div class="w-full bg-transparent rounded-lg p-6 mt-6 lg:-ml-22 lg:w-full">
                <!-- Flex container to align image and text horizontally -->
                <div class="flex justify-start items-center">
                    <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="w-20 h-20 rounded-full border border-customGreen bg-green-500">

                    <!-- user Greeting -->
                    <div class="ml-4 text-left">
                        <p class="text-xl text-customGreen font-semibold">Sheena Mariz Pagas</p>
                        <p class="text-sm text-gray-600">Resident</p>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white py-6 lg:w-full mx-auto">
                <!-- Navigation Tabs -->
                <div class="flex whitespace-nowrap lg:w-full">
                    <!-- Personal Info Button -->
                    <button
                        @click="step = 1"
                        :class="step === 1 ? 'bg-customGreen text-white' : 'bg-white text-customGreen border-customGreen'"
                        type="button"
                        class="px-3 py-1 border text-[13px] rounded-full shadow-md">
                        Personal Info
                    </button>

                    <!-- Contact Info Button -->
                    <button
                        @click="step = 2"
                        :class="step === 2 ? 'bg-customGreen text-white' : 'bg-white text-customGreen border-customGreen'"
                        type="button"
                        class="px-3 py-1 border text-xs rounded-full ml-1 shadow-md">
                        Contact Info
                    </button>

                    <!-- Change Password Button -->
                    <button
                        @click="step = 3"
                        :class="step === 3 ? 'bg-customGreen text-white' : 'bg-white text-customGreen border-customGreen'"
                        type="button"
                        class="px-3 py-1 border text-xs rounded-full ml-1 shadow-md">
                        Change Password
                    </button>
                </div>
            </div>


            <template x-if="step === 1">
                <div>
                    <!-- Personal information Section -->
                    <div class="mt-6 bg-white w-[80%] shadow-lg rounded-lg h-auto px-2 pt-2 pb-4 border border-gray-100 lg:h-[200px] mx-auto">
                        <div class="w-full bg-transparent h-10 py-2 px-3 border-b-2 border-[#F8A15E] items-center">
                            <p class="text-[#F8A15E] font-semibold text-center">Personal Information</p>
                        </div>
                        <div class="mt-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap lg:space-x-4 lg:justify-center">
                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <!-- Floating Label -->
                                <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                                    class="transition-all duration-200 bg-white px-1">
                                    First Name
                                </label>

                                <!-- Input Field -->
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[13px] py-2 pl-10 pr-10  border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">

                            </div>

                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <label :class="{
                                'text-[#6AA76F]': isFocused || inputValue.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || inputValue.length > 0
                            }"
                                    class="transition-all duration-200 bg-white px-1">
                                    Middle Name
                                </label>
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[13px] py-2 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">
                            </div>

                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <!-- Floating Label -->
                                <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                                    class="transition-all duration-200 bg-white px-1">
                                    Last Name
                                </label>

                                <!-- Input Field -->
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[13px] py-2 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">

                            </div>

                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <!-- Floating Label -->
                                <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                                    class="transition-all duration-200 bg-white px-1">
                                    Gender
                                </label>

                                <!-- Input Field -->
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[13px] py-2 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">

                            </div>
                        </div>
                    </div>


                    <!-- Report Road Issue Button -->
                    <div x-data="{ showModal: false }"   class="mt-12 w-[75%] text-center lg:w-[20%] mx-auto">
                        <button @click="showModal = true" class="px-4 py-3 w-full bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-lg font-semibold lg:text-[16px] lg:py-2 lg:mb-2 text-white shadow-md rounded-full">
                            Save Changes
                        </button>

                        <div
                            x-show="showModal"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90"
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white w-[90%] max-w-md p-6 rounded-lg shadow-lg">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-[#5A915E]">Changes Saved</h3>
                                    <button @click="showModal = false" class="text-gray-500 hover:text-gray-700">
                                        &times;
                                    </button>
                                </div>
                                <p class="mt-4 text-sm text-gray-600">Your changes have been successfully saved.</p>
                                <div class="mt-6 text-right">
                                    <button @click="showModal = false" class="px-4 py-2 bg-[#5A915E] text-white rounded-lg shadow hover:bg-[#4B804D]">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Step 2 -->
            <template x-if="step === 2">
                <div>
                    <div class="mt-6 bg-white w-[80%] shadow-lg rounded-lg h-auto px-2 pt-2 pb-4 border border-gray-100 lg:h-[200px] mx-auto">
                        <div class="w-full bg-transparent h-10 py-2 px-3 border-b-2 border-[#F8A15E] items-center">
                            <p class="text-[#F8A15E] font-semibold text-center">Contact Information</p>
                        </div>

                        <div class="mt-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap lg:space-x-4 lg:justify-center">
                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <!-- Floating Label -->
                                <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                                    class="transition-all duration-200 bg-white px-1">
                                    Phone Number
                                </label>

                                <!-- Input Field -->
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all capitalize">

                            </div>

                            <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                                <label :class="{
                                'text-[#6AA76F]': isFocused || inputValue.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || inputValue.length > 0
                            }"
                                    class="transition-all duration-200 bg-white px-1">
                                    Email Address
                                </label>
                                <input type="text"
                                    x-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="w-full text-[14px] py-4 pl-10 pr-10 border font-medium rounded-lg focus:outline-none focus:ring-1 focus:ring-[#5A915E] focus:border-[#5A915E] bg-white transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Report Road Issue Button -->
                    <div class="mt-12 w-[75%] text-center lg:w-[20%] lg:mt-9 mx-auto">
                        <button class="px-4 py-3 w-full lg:text-[16px] lg:py-2 lg:mb-2 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-lg font-semibold text-white shadow-md rounded-full">
                            Save Changes
                        </button>
                    </div>

                </div>
            </template>

            <!-- Step 3 -->
            <template x-if="step === 3">
                <div>
                    <!-- Personal information Section -->
                    <div class="mt-6 bg-white w-[80%] shadow-lg rounded-lg p-1 border border-gray-100 lg:h-[200px] mx-auto">
                        <div class="w-full bg-transparent h-10 py-2 px-3 border-b-2 border-[#F8A15E] items-center">
                            <p class="text-[#F8A15E] font-semibold text-center">Change Password</p>
                        </div>
                        <div class="mt-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap lg:space-x-4"
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
                        </div>
                    </div>

                    <!-- Report Road Issue Button -->
                    <div class="w-[75%] text-center mb-12 lg:w-[20%] mt-12 mx-auto">
                        <button class="px-4 py-3 w-full lg:text-[16px] lg:py-2 lg:mb-2 bg-gradient-to-r from-[#5A915E] to-[#F8A15E] text-lg font-semibold text-white shadow-md rounded-full">
                            Update Password
                        </button>
                    </div>
                </div>
            </template>

        </form>
    </div>
</x-app-layout>