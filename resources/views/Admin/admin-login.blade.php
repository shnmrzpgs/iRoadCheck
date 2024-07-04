<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/IRoadCheck_Logo.png" />
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <title>Sign Up as Super Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate Poppins">

    <div class="flex w-full h-full z-0">

        <!-- Sign in Form-->
        <div class="flex items-center justify-start w-6/12 h-screen max-lg mt-[100]">
            <div action="" class="relative p-10 w-50 bg-none md:max-lg:w-[300px]">

                <div class="flex items-center justify-center mt-[-300]">
                    <img src="/img/headerLogo.png" alt="headerLogo" class="w-3/12" />
                </div>
                <div class="mt-[-45] text-center form-title text-[#2E3031] xxs:max-sm:text-lg">
                    <p>
                        <p class="text-[22px] font-semibold">Register</p>Super Admin
                    </p>
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
                                <div class="w-full md:w-1/3 px-0">
                                    <div class="form-group">
                                        <label for="firstName" class="block text-gray-700 leading-8">First Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName" class="block text-gray-700 leading-8">Middle
                                            Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName" class="block text-gray-700  leading-8">Last Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate" class="block text-gray-700  leading-8">Birthdate</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="block text-gray-700  leading-8">Gender</label>
                                    </div>
                                </div>
                                <!-- Container for input fields -->
                                <div class="w-full md:w-2/3 px-0">
                                    <div class="form-group">
                                        <input type="text" id="firstName" class="w-full p-2 border rounded"
                                            placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="middleName" class="w-full p-2 border rounded"
                                            placeholder="Enter Middle Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="lastName" class="w-full p-2 border rounded"
                                            placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="birthdate" class="w-full p-2 border rounded" required>
                                    </div>
                                    <div class="form-group">
                                        <select id="gender" class="w-full p-2 border rounded" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Next button -->
                            <div class="flex justify-end mt-5">
                                <button type="button"
                                    class="next bg-yellow-500 text-white px-10 py-2 rounded">NEXT</button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 2: Contact Information -->
                    <div class="step hidden">
                        <form>
                            <div class="flex flex-wrap">
                                <!-- Container for labels -->
                                <div class="w-full md:w-1/3 px-3">
                                    <div class="form-group">
                                        <label for="phone" class="block text-gray-700">Phone Number</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="block text-gray-700">Country</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="province" class="block text-gray-700">Province</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="block text-gray-700">City/Municipality</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="barangay" class="block text-gray-700">Barangay</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class="block text-gray-700">Street Address</label>
                                    </div>
                                </div>
                                <!-- Container for input fields -->
                                <div class="w-full md:w-2/3 px-0">
                                    <div class="form-group">
                                        <input type="text" id="phone" class="w-full p-2 border rounded"
                                            style="margin-bottom: 28px;" placeholder="Enter phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <select id="country" class="w-full p-2 border rounded" required
                                            onchange="updateProvinces()">
                                            <option value="">Select country</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="province" class="w-full p-2 border rounded" required
                                            onchange="updateCities()">
                                            <option value="">Select province</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="city" class="w-full p-2 border rounded" required>
                                            <option value="">Select city/municipality</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select id="barangay" class="w-full p-2 border rounded" required>
                                            <option value="">Select barangay</option>
                                            <option value="Barangay 1">Barangay 1</option>
                                            <option value="Barangay 2">Barangay 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="street" class="w-full p-2 border rounded"
                                            placeholder="Enter street address" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Navigation buttons -->
                            <div class="flex justify-between mt-5">
                                <button type="button"
                                    class="prev bg-gray-500 text-white px-5 py-2 rounded">PREVIOUS</button>
                                <button type="button"
                                    class="next bg-yellow-500 text-white px-10 py-2 rounded">NEXT</button>
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
                                        <input type="email" id="email" class="w-full p-2 border rounded"
                                            placeholder="Enter Email" required>
                                        <p id="email-error" class="invisible text-xs text-pink-600">Please provide a
                                            valid email address.</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="w-full p-2 border rounded"
                                            placeholder="Enter Password" required>
                                        <p id="password-error" class="invisible text-xs text-pink-600">Please follow
                                            this guide for a strong password.</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="confirmPassword" class="w-full p-2 border rounded"
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
                                    class="prev bg-gray-500 text-white px-6 py-2 rounded">PREVIOUS</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-6 py-2 rounded">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end of Sign In form-->
        <div class="hidden md:flex md:max-semi 2xl:w-30 absolute top-0 right-0 h-full">
            <div class="h-full">
                <img src="/img/Point2Left_SignUp.png" alt="manGraphic" class="w-full h-full object-cover"
                    style="transform: scaleX(-1);" />
            </div>
        </div>
    </div>

</body>
<script src="/Tailwindcss/Tailwind-config.js"></script>
<script src="/js/PasswordChecker.js"></script>
<script src="/js/signUp.js"></script>
<script src="/js/signUpDefer.js" defer></script>

</html>