<x-app-layout>
    <div class="flex w-full bg-white h-full xs:mt-0 sm:mt-20 md:mt-0 lg:mt-0 xl z-0">

        <!-- Sign in Form-->
        <div class="flex items-center justify-start w-6/12 h-screen max-lg mt-[100] ml-10">
            <div action="" class="relative p-10 w-full bg-none md:max-lg:w-[600px] md:mx-auto">

                <div class="flex items-center justify-center mt-[-300] mb-8">
                    <img src="{{ asset('/storage/images/iroadcheck header.png') }}" alt="headerLogo" class="w-5/12 sm:w-9/12 sm:mt-60 sm:ml-60 md:w-8/12 md:mt-0 md:ml-60 lg:w-5/12 lg:ml-0" />
                </div>
                <div class="text-center form-title text-[#2E3031] xxs:max-sm:text-lg mb-[-45]">
                <p class="text-[20px] font-semibold mb-1">Register</p>
                <p class="text-[15px]" >Super Admin</p>
                </div>

                <div class="mt-5 text-base font-medium text-cyan-950 ">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div>Personal Information</div>
                        <div>Contact Information</div>
                        <div>iRoadCheck Account</div>
                    </div>


                    <!-- Step 1: Personal Information -->
                    <div class="step">
                        <form>
                            <div class="flex flex-wrap">
                                <!-- Container for labels -->
                                <div class="w-2/10 h-1/10 pr-2 font-medium text-[12px] xs:mx-[14px] xs:text-[10px]">
                                    <div class="form-group">
                                        <label for="firstName" class="block text-gray-700 leading-6">First Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName" class="block text-gray-700 leading-7">Middle
                                            Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName" class="block text-gray-700  leading-7">Last Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate" class="block text-gray-700  leading-7">Birthdate</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="block text-gray-700  leading-6">Gender</label>
                                    </div>
                                </div>
                                <!-- Container for input fields -->
                                <div class="w-4/12 md:w-2/3 px-0">
                                    <div class="form-group">
                                        <input type="text" id="firstName" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="middleName" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter Middle Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="lastName" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="birthdate" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required>
                                    </div>
                                    <div class="form-group">
                                        <select id="gender" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Next button -->
                            <div class="flex justify-end mt-2">
                                <button type="button"
                                    class="next bg-yellow-500 text-white text-sm px-7 py-1 rounded">NEXT</button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 2: Contact Information -->
                    <div class="step hidden">
                        <form>
                            <div class="flex flex-wrap">
                                <!-- Container for labels -->
                                <div class="w-2/10 h-1/10 pr-2 font-medium text-[12px] xs:mx-[14px] xs:text-[10px]">
                                    <div class="form-group">
                                        <label for="phone" class="block text-gray-700 leading-6">Phone Number</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="block text-gray-700">Country</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="province" class="block text-gray-700 leading-5">Province</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="block text-gray-700 leading-4">City/Municipality</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="barangay" class="block text-gray-700 leading-4">Barangay</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class="block text-gray-700">Street Address</label>
                                    </div>
                                </div>
                                <!-- Container for input fields -->
                                <div class="step2 w-full md:w-2/3 px-0">
                                    <div class="form-group">
                                        <input type="number" id="phone" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <select id="country" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required
                                            onchange="updateProvinces()">
                                            <option value="">Select country</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="province" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required
                                            onchange="updateCities()">
                                            <option value="">Select province</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="city" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required>
                                            <option value="">Select city/municipality</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="barangay" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]" required>
                                            <option value="">Select barangay</option>
                                            <option value="Barangay 1">Barangay 1</option>
                                            <option value="Barangay 2">Barangay 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="street" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter street address" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Navigation buttons -->
                            <div class="flex justify-between mt-2">
                                <button type="button"
                                    class="prev bg-gray-500 text-white text-sm px-7 py-1 rounded text-sm font-light">PREVIOUS</button>
                                <button type="button"
                                    class="next bg-yellow-500 text-white text-sm px-7 py-1 rounded text-sm font-light">NEXT</button>
                            </div>
                        </form>
                    </div>


                    <!-- Step 3: iRoadCheck Account -->
                    <div class="step hidden">
                        <form>
                            <div class="flex flex-wrap">
                                <!-- Container for labels -->
                                <div class="w-full md:w-1/3 px-0">
                                    <div class="form-group">
                                        <label for="email" class="block text-gray-700 leading-8">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="block text-gray-700 leading-8">Password</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword" class="block text-gray-700  leading-8"
                                            style="width: 132px;">Confirm Password</label>
                                    </div>
                                </div>
                                <!-- Container for input fields -->
                                <div class="step3 w-full md:w-2/3 px-0">
                                    <div class="form-group">
                                        <input type="email" id="email" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter Email" required>
                                        <p id="email-error" class="invisible text-xs text-pink-600">Please provide a
                                            valid email address.</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Enter Password" required>
                                        <p id="password-error" class="invisible text-xs text-pink-600">Please follow
                                            this guide for a strong password.</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="confirmPassword" class="text-[12px] w-full p-2 border rounded border-slate-400 text-xs font-light focus:outline-none focus:border-[#6C6C6C] focus:ring-1 focus:ring-[#6C6C6C]"
                                            placeholder="Confirm Password" required>
                                        <p id="confirm-password-error" class="invisible text-xs text-pink-600">Passwords
                                            do not match.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <p id="password-requirements" class="mt-2 mb-2 text-xs text-gray-800 invisible">PASSWORD REQUIREMENT</br>
                                <span class="text-xs text-gray-600">Please follow this guide for a strong password:</span> </br>
                                <span id="special-char" class="text-gray-600">One special character</span>,</br>
                                <span id="min-char" class="text-gray-600">Minimum of 8 characters</span>,</br>
                                <span id="num-char" class="text-gray-600">Include One number (2 are recommended)</span>
                            </p>

                            <!-- Next button -->
                            <div class="flex justify-between">
                                <button type="button"
                                    class="prev bg-gray-500 text-white text-sm px-7 py-1 rounded">PREVIOUS</button>
                                <button type="submit"
                                    class="bg-green-500 text-white text-sm px-7 py-1 rounded">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end of Sign In form -->
        <div class="hidden lg:flex lg:max-semi 2xl:w-30 absolute top-0 right-0 h-full">
            <div class="h-full">
                <img src="{{ asset('/storage/images/Point2Right_LogIn.png') }}" alt="manGraphic" class="w-full h-full object-cover"
                    style="transform: scaleX(-1);" />
            </div>
        </div>
    </div>
    
    <script type="module"> 
        initializedSignUpDefer();
    </Script>
</x-app-layout>




<!--- </body>
<script src="/Tailwindcss/Tailwind-config.js"></script>
<script src="/js/PasswordChecker.js"></script>
<script src="/js/signUp.js"></script>
<script src="{{ asset('js/signUpDefer.js') }}" defer></script>

</html> --->