<div>
    <x-admin.crud-modal-content-base modal_name="view-user-modal">

        <x-slot:trigger>
            <div class="hidden"
                 x-on:show-{{ $identifier }}.window="open = true"
            ></div>
        </x-slot:trigger>

        <x-slot:header>
            View User Details
        </x-slot:header>

        <x-slot:body>
            <div class="flex mb-5">
                <!--Profile Picture-->
                <div class="relative h-16 w-16 flex-shrink-0 -mt-2">
                    <img
                        src="{{ asset('storage/icons/profile-graphics.png') }}"
                        alt="Profile Image"
                        class="h-16 w-16 rounded-full bg-gradient-to-r from-blue-500 to-green-500 p-[1px]"
                    />
                    <!-- Upload Photo Button -->
                    <label for="upload-photo" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full cursor-pointer text-white text-xs hover:bg-opacity-60">
                        Upload
                        <input
                            id="upload-photo"
                            type="file"
                            class="hidden"
                            @change="handlePhotoUpload($event)"
                        />
                    </label>
                </div>

                <!-- Full Name and Email Preview-->
                <div class="pl-4">
                    <!-- Preview Section -->
                    <div class="pl-4">
                        <div class="block text-lg font-medium text-gray-700">
                            <span x-text="`${formData.firstName} ${formData.middleName} ${formData.lastName}`.trim() || 'Full Name Preview'"></span>
                        </div>
                        <div class="block text-xs font-normal text-gray-700 italic">
                            <span x-text="formData.email || 'Email Preview'"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation -->
            <div class="flex text-xs mb-4">
                <!-- Tab Template -->
                <template x-for="(tab, index) in tabs" :key="index">
                    <div class="flex items-center space-x-1 mr-6">
                        <!-- Tab Indicator (Number or Check Icon) -->
                        <div
                            class="flex items-center justify-center h-6 w-6 rounded-full p-[1px] font-medium"
                            :class="visitedTabs.includes(tab.key)
                                                        ? 'bg-gradient-to-r from-blue-500 to-green-500'
                                                        : 'bg-gray-400'">
                                                    <span class="text-white">
                                                        <template x-if="visitedTabs.includes(tab.key)">
                                                            <span class="text-sm">✔</span>
                                                        </template>
                                                        <template x-if="!visitedTabs.includes(tab.key)">
                                                            <span x-text="index + 1" ></span>
                                                        </template>
                                                    </span>
                        </div>
                        <!-- Tab Label -->
                        <div class="relative">
                            <button
                                class="text-xs font-medium relative z-10"
                                :class="activeTab === tab.key
                                                            ? 'text-[#676767] font-semibold'
                                                            : 'text-gray-400' && visitedTabs.includes(tab.key)
                                                            ? 'text-green-600'
                                                            : 'text-gray-400'"
                                @click="activateTab(tab.key)">
                                <span x-text="tab.label"></span>
                            </button>
                            <!-- Highlight Line -->
                            <span
                                class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                x-show="activeTab === tab.key"
                                x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                x-transition:enter-start="opacity-0 transform translate-y-1"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-1">
                                                    </span>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Basic Information Page -->
            <form x-show="activeTab === 'basic-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto space-y-6 mt-4 bg-[#FBFBFB] shadow px-3 py-10 text-xs">
                <!-- Name Fields -->
                <div class="flex space-x-4 grid grid-cols-3">
                    <div>
                        <label class="block font-medium text-gray-700">First Name</label>
                        <input x-model="formData.firstName"
                               placeholder="First name" type="text"
                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Middle Name</label>
                        <input x-model="formData.middleName"
                               placeholder="Middle name" type="text"
                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Last Name</label>
                        <input x-model="formData.lastName"
                               placeholder="Last name" type="text"
                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                    </div>
                </div>
                <!-- Other Fields -->
                <div class="flex space-x-4 grid grid-cols-2">
                    <div>
                        <label class="block font-medium text-gray-700">Gender</label>
                        <select x-model="formData.gender"
                                class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Email address</label>
                        <input x-model="formData.email"
                               placeholder="Enter your email" type="email"
                               class="w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm md:text-sm text-xs">
                    </div>
                </div>
            </form>

            <!-- Access Control Page -->
            <div x-show="activeTab === 'access-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto mt-4 bg-[#FBFBFB] shadow px-3 py-4 text-sm">

                <!-- user Type Dropdown -->
                <div class="px-2 mb-4">
                    <label for="userType" class="block font-medium text-gray-700">User Role</label>
                    <select id="userType" x-model="formData.userType" @change="assignPermissions"
                            class="rounded border border-gray-300 focus:outline-none focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full shadow-sm sm:text-sm">
                        <option value="" disabled selected>Select a user type</option>
                        <template x-for="(permissions, type) in userTypePermissions" :key="type">
                            <option :value="type" x-text="type"></option>
                        </template>
                    </select>
                </div>

                <!-- Permissions Selection -->
                <div class="px-3 py-2 text-sm">
                    <div class="block font-normal text-gray-700 mb-4 text-sm">
                        The permissions and capabilities assigned to this user type are listed below.
                    </div>
                    <label class="block font-medium text-gray-700 mb-2 border-b border-gray-300">Permissions</label>
                    <ul class="list-disc pl-6 mt-2 py-2 leading-8">
                        <template x-for="permission in filteredPermissions" :key="permission.id">
                            <li
                                class="transition-all duration-200 hover:text-green-600"
                                :class="{'text-green-600': formData.assignedPermissions.includes(permission.id)}"
                            >
                                <span x-text="permission.name"></span>
                            </li>
                        </template>
                    </ul>
                </div>

            </div>

            <!-- Account Settings Page -->
            <div x-show="activeTab === 'account-info'" class="min-h-[35vh] max-h-[35vh] overflow-y-auto bg-[#FBFBFB] shadow px-3 py-4 text-xs">
                <!-- Account Status -->
                <div class="mb-6 border-b border-gray-300">
                    <!-- Label -->
                    <label class="block font-medium text-gray-700 mb-1">Account Status</label>

                    <!-- Toggle for Account Status -->
                    <div
                        class="flex items-center justify-between w-full sm:text-sm p-2 space-x-24"
                    >
                        <!-- Status Indicator -->
                        <div
                            class="text-sm font-semibold"
                            :class="isAccountDisabled ? 'text-red-500' : 'text-green-500' "
                        >
                            <span x-text="isAccountDisabled ?  'Disabled' : 'Enabled' "></span>
                        </div>

                        <!-- Toggle Button -->
                        <label class="relative inline-flex items-center cursor-pointer ">
                            <!-- Hidden Checkbox -->
                            <input type="checkbox" x-model="isAccountDisabled" class="sr-only">

                            <!-- Background of the Toggle -->
                            <div
                                class="w-10 h-5 bg-green-500 rounded-full transition-colors duration-300"
                                :class="{ 'bg-red-500': isAccountDisabled }"
                            ></div>

                            <!-- Circle inside the Toggle -->
                            <div
                                class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300"
                                :class="{ '-translate-x-5': isAccountDisabled }"
                            ></div>
                        </label>
                    </div>
                </div>

                <!-- ID Number Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 text-xs">ID Number</label>
                    <input
                        x-model="formData.idNumber"
                        placeholder="ID number"
                        type="text"
                        class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm"
                    >
                </div>

                <!-- Password Field with Toggle Visibility -->
                <div class="relative mt-6">
                    <label class="block text-sm font-medium text-gray-700 text-xs">New Password</label>
                    <div class="flex space-x-4">
                        <div>
                            <input
                                :type="isPasswordVisible ? 'text' : 'password'"
                                x-model="formData.password"
                                placeholder="Generated password will appear here"
                                readonly
                                class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm bg-gray-100 pr-10"
                            >
                            <!-- Eye Icon for Toggling -->
                            <button
                                type="button"
                                @click="isPasswordVisible = !isPasswordVisible"
                                class="float-right -mt-7 mr-2 text-gray-500 hover:text-gray-700"
                            >
                                                <span x-show="!isPasswordVisible">
                                                    <!-- Closed Eye Icon -->
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                        <defs><clipPath id="f7a7acdade"><path d="M 11 71 L 364 71 L 364 324.042969 L 11 324.042969 Z M 11 71 " clip-rule="nonzero"/></clipPath></defs>
                                                        <g clip-path="url(#f7a7acdade)">
                                                            <path fill="currentColor"  d="M 359.273438 184.5 C 348.402344 167.085938 325.5 136.277344 289.753906 112.980469 L 309.460938 93.25 C 314.371094 88.332031 314.371094 80.371094 309.460938 75.457031 C 304.554688 70.539062 296.597656 70.539062 291.691406 75.457031 L 64.847656 302.566406 C 59.9375 307.484375 59.9375 315.445312 64.847656 320.359375 C 67.300781 322.820312 70.515625 324.046875 73.734375 324.046875 C 76.949219 324.046875 80.164062 322.820312 82.621094 320.359375 L 107.253906 295.699219 C 129.800781 306.417969 156.328125 313.589844 187.15625 313.589844 C 285.046875 313.589844 340.257812 241.777344 359.273438 211.3125 C 364.390625 203.125 364.390625 192.691406 359.273438 184.5 Z M 187.15625 273.40625 C 170.867188 273.40625 155.851562 268.167969 143.539062 259.367188 L 170.953125 231.921875 C 175.855469 234.292969 181.332031 235.65625 187.15625 235.65625 C 207.980469 235.65625 224.859375 218.757812 224.859375 197.910156 C 224.859375 192.078125 223.496094 186.597656 221.128906 181.6875 L 248.542969 154.242188 C 257.332031 166.566406 262.5625 181.601562 262.5625 197.910156 C 262.566406 239.605469 228.800781 273.40625 187.15625 273.40625 Z M 114.425781 217.597656 C 112.730469 211.3125 111.746094 204.730469 111.746094 197.910156 C 111.746094 156.210938 145.507812 122.410156 187.15625 122.410156 C 193.96875 122.410156 200.542969 123.398438 206.820312 125.09375 L 241.574219 90.296875 C 225.136719 85.304688 207.074219 82.226562 187.15625 82.226562 C 89.261719 82.226562 34.050781 154.039062 15.035156 184.5 C 9.921875 192.691406 9.921875 203.125 15.035156 211.3125 C 23.6875 225.175781 39.929688 247.574219 64.183594 267.898438 Z M 114.425781 217.597656 "/>
                                                        </g>
                                                    </svg>
                                                </span>
                                <span x-show="isPasswordVisible" style="display: none;">
                                                    <!-- Open Eye Icon -->
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                        <defs><clipPath id="1f8a6b186c"><path d="M 6 78.503906 L 369 78.503906 L 369 315.503906 L 6 315.503906 Z M 6 78.503906 " clip-rule="nonzero"/></clipPath></defs>
                                                        <g clip-path="url(#1f8a6b186c)">
                                                            <path fill="currentColor"  d="M 364.394531 183.273438 C 344.859375 152.066406 288.148438 78.507812 187.597656 78.507812 C 87.042969 78.507812 30.332031 152.066406 10.800781 183.273438 C 5.546875 191.660156 5.546875 202.347656 10.800781 210.734375 C 30.332031 241.941406 87.042969 315.5 187.597656 315.5 C 288.148438 315.5 344.859375 241.941406 364.394531 210.734375 C 369.648438 202.347656 369.648438 191.660156 364.394531 183.273438 Z M 187.597656 274.339844 C 144.816406 274.339844 110.136719 239.714844 110.136719 197.003906 C 110.136719 154.292969 144.816406 119.667969 187.597656 119.667969 C 230.375 119.667969 265.054688 154.292969 265.054688 197.003906 C 265.054688 239.714844 230.375 274.339844 187.597656 274.339844 Z M 213.417969 184.113281 C 206.289062 184.113281 200.507812 178.34375 200.507812 171.226562 C 200.507812 167.710938 201.933594 164.539062 204.21875 162.214844 C 199.164062 159.800781 193.574219 158.335938 187.597656 158.335938 C 166.207031 158.335938 148.867188 175.648438 148.867188 197.003906 C 148.867188 218.359375 166.207031 235.671875 187.597656 235.671875 C 208.988281 235.671875 226.328125 218.359375 226.328125 197.003906 C 226.328125 191.039062 224.859375 185.453125 222.445312 180.410156 C 220.113281 182.691406 216.9375 184.113281 213.417969 184.113281 Z M 213.417969 184.113281 "/>
                                                        </g>
                                                    </svg>
                                                </span>
                            </button>
                        </div>

                        <!-- Generate Password Button -->
                        <div class="mt-2">
                            <button
                                @click="generatePassword()"
                                class="px-4 py-2 text-[#4AA76F] rounded-full border border-[#4AA76F]  bg-[#4AA76F] bg-opacity-5 hover:bg-[#3AA76F] hover:bg-opacity-10 text-xs transition-all active:translate-y-[2px] active:shadow-none"
                            >
                                Generate Password
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </x-slot:body>

        <x-slot:footer>
            <!-- Optional Footer (add buttons if needed) -->
        </x-slot:footer>

    </x-admin.crud-modal-content-base>
</div>
