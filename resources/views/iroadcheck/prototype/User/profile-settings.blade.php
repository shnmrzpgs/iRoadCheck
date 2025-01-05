<x-app-layout>

    <x-User.user-navigation page_title="Profile Settings">

        <div class="w-full h-full relative rounded-[6px] font-pop">

            <div class="bg-none rounded-[4px]">

                <!--image bg-->
                <div class="relative overflow-hidden rounded-[10px] shadow w-full h-[100px]">
                    <img src="{{ asset('storage/images/bg-profileName.png') }}" alt="profile name background"
                         class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                </div>

                <!--Profile Name -->
                <div class="absolute flex items-start p-2">
                    <div class="relative ml-10 -mt-20">
                        <img src="{{ asset('storage/icons/profile2-graphics.png') }}" alt="Profile Picture"
                             class="w-[110px] h-[110px] rounded-full object-cover mb-2 bg-none z-50 drop-shadow-lg">
                    </div>
                    <div class="relative text-start text-[#4D4F50] ml-6 -mt-20">
                        <h2 class="text-[20px] font-semibold">Sheena Mariz Pagas</h2>
                        <p class="text-[14px]">Patcher</p>
                    </div>
                </div>
            </div>

            <!--Profile Information -->
            <div class="pl-10 mt-16 w-full"
                 x-data="{
                    activeTab: 'basic-info',
                    hoveredTab: null,
                    showCurrentPassword: false,
                    showNewPassword: false,
                    showConfirmPassword: false
                 }" >
                <div class="lg:grid lg:place-items-start">
                    <div class="flex w-full items-center justify-start text-[14px]">
                        <!-- Basic Information Tab -->
                        <div class="relative inline-block mr-6">
                            <button
                                class="font-medium text-[#676767] hover:text-[#676767]"
                                @click="activeTab = 'basic-info'"
                                @mouseenter="hoveredTab = 'basic-info'"
                                @mouseleave="hoveredTab = null"
                                :class="activeTab === 'basic-info' ? 'text-[#676767] font-semibold' : 'text-[#00A79D]'">
                                Basic Information
                            </button>
                            <span
                                class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                x-show="activeTab === 'basic-info' || hoveredTab === 'basic-info'"
                                x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                x-transition:enter-start="opacity-0 transform translate-y-1"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-1"
                            ></span>
                        </div>

                        <!-- Access Control Tab -->
                        <div class="relative inline-block mr-6">
                            <button
                                class="font-medium text-[#676767] hover:text-[#676767]"
                                @click="activeTab = 'access-control'"
                                @mouseenter="hoveredTab = 'access-control'"
                                @mouseleave="hoveredTab = null"
                                :class="activeTab === 'access-control' ? 'text-[#676767] font-semibold' : 'text-[#00A79D]'">
                                Access Control Settings
                            </button>
                            <span
                                class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                x-show="activeTab === 'access-control' || hoveredTab === 'access-control'"
                                x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                x-transition:enter-start="opacity-0 transform translate-y-1"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-1"
                            ></span>
                        </div>

                        <!-- Account Settings Tab -->
                        <div class="relative inline-block">
                            <button
                                class="font-medium text-[#676767] hover:text-[#676767]"
                                @click="activeTab = 'account-info'"
                                @mouseenter="hoveredTab = 'account-info'"
                                @mouseleave="hoveredTab = null"
                                :class="activeTab === 'account-info' ? 'text-[#676767] font-semibold' : 'text-[#00A79D]'">
                                Account Settings
                            </button>
                            <span
                                class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                x-show="activeTab === 'account-info' || hoveredTab === 'account-info'"
                                x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                x-transition:enter-start="opacity-0 transform translate-y-1"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-1"
                            ></span>
                        </div>
                    </div>

                    <div class="text-[13px] z-10 mt-6 py-5 h-full max-h-[500px] w-full max-w-[1330px] rounded-md bg-[#FBFBFB] px-7 drop-shadow-lg">

                        <!-- Basic Information -->
                        <div x-show="activeTab === 'basic-info'">
                            <div class="pt-10 pl-5 text-[13px] italic text-gray-900">
                                Below is your basic information as the administrator of iRoadCheck.
                            </div>
                            <form action=""
                                  method="POST"
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="opacity-0 transform scale-80"
                                  x-transition:enter-end="opacity-100 transform scale-100">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 mt-8 mb-2 space-x-6 px-4 ">
                                    <!--First Name-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="first_name" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            First Name
                                        </label>
                                        <input type="text" name="first_name" id="first_name"
                                               class="w-7/10 border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                               placeholder="First Name" >
                                    </div>
                                    <!--Middle Name-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="middle_name" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            Middle Name
                                        </label>
                                        <input type="text" name="middle_name" id="middle_name"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                               placeholder="Middle Name" >
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 mb-2 space-x-6 px-4">
                                    <!--Last Name-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="last_name" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            Last Name
                                        </label>
                                        <input type="text" name="last_name" id="last_name"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                               placeholder="Last Name" >
                                    </div>
                                    <!--Sex-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="sex" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            Sex
                                        </label>
                                        <select  name="sex_id" id="sex_id"
                                                 class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow over:bg[#4AA76F]">
                                            <option class="text-[14px] font-normal text-gray-900 hover:bg[#4AA76F] w-7/10 ">
                                                Male
                                            </option>
                                            <option class="text-[14px] font-normal text-gray-900 hover:bg[#4AA76F]  w-7/10 ">
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="grid grid-cols-2 mb-10 space-x-6 px-4 ">--}}
{{--                                    <!--Email Address-->--}}
{{--                                    <div class="flex gap-4 p-2 w-full">--}}
{{--                                        <label for="email" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">--}}
{{--                                            Email Address--}}
{{--                                        </label>--}}
{{--                                        <input type="email" name="email" id="email"--}}
{{--                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"--}}
{{--                                               placeholder="admin@example.com" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="float-right pt-10 pr-8">
                                    <button type="submit" name="saveChanges" id="saveChanges" value="saveChanges"
                                            class="w-auto gap-x-[8px] text-[14px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#4D9B62] hover:shadow-xl">
                                        <span class="mt-[2px] px-2">Save Changes</span>
                                    </button>
                                </div>

                            </form>
                        </div>

                        <!-- Access Control Information -->
                        <div x-show="activeTab === 'access-control'">
                            <div class="pt-10 pl-5 text-[13px] italic text-gray-900">
                                Below is your access control information as the staff of iRoadCheck.
                            </div>
                            <form action=""
                                  method="POST"
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="opacity-0 transform scale-80"
                                  x-transition:enter-end="opacity-100 transform scale-100">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 mt-8 mb-2 space-x-6 px-4 ">
                                    <!--Role-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="role" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            Role
                                        </label>
                                        <input type="text" name="role_id" id="role_id"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                               placeholder="Patcher" disabled>
                                    </div>

                                    <!--Middle Name-->
                                    <div class="flex gap-4 p-2 w-full">
                                        <label for="middle_name" class="w-2/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                            Permissions
                                        </label>
                                        <input type="text" name="middle_name" id="middle_name"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-7/10 rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                               disabled>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div  x-show="activeTab === 'account-info'">
                            <!-- Account Information -->
                            <div class="mt-8 pl-5 text-[13px] italic text-gray-900">
                                Below is your account information as the administrator of iRoadCheck.
                            </div>
                            <form action="" method="POST"
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="opacity-0 transform scale-80"
                                  x-transition:enter-end="opacity-100 transform scale-100">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 mt-6 space-x-6 px-4 ">
                                    <div class="w-full p-2">
                                        {{--                                        <div class="flex items-center space-x-2 mb-2">--}}
                                        {{--                                            <label for="idNum" class="w-3/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">--}}
                                        {{--                                                ID Number--}}
                                        {{--                                            </label>--}}
                                        {{--                                            <input type="number" id="idNum"--}}
                                        {{--                                                   class="mb-2 flex-1 border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"--}}
                                        {{--                                                   placeholder="Enter ID Number">--}}
                                        {{--                                        </div>--}}
                                        <div class="flex items-center space-x-2 mb-2">
                                            <label for="email" class="w-3/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                                Email Address
                                            </label>
                                            <input type="email" name="email" id="email"
                                                   class="mb-2 flex-1 border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                                   placeholder="Enter Email Address">
                                        </div>
                                        <div class="flex items-center space-x-2 mb-2">
                                            <label for="currentPassword" class="w-3/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                                Current Password
                                            </label>
                                            <div class="relative flex-1">
                                                <input :type="showCurrentPassword ? 'text' : 'password'" id="currentPassword"
                                                       class="mb-2 w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                                       placeholder="Enter Current Password">

                                                <!-- Toggle SVG for show/hide password -->
                                                <div @click="showCurrentPassword = !showCurrentPassword"
                                                     class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">

                                                    <!-- Visible icon when password is shown -->
                                                    <svg x-show="showCurrentPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-500">
                                                        <path fill="gray"
                                                              d="M 364.394531 183.273438 C 344.859375 152.066406 288.148438 78.507812 187.597656 78.507812 C 87.042969 78.507812 30.332031 152.066406 10.800781 183.273438 C 5.546875 191.660156 5.546875 202.347656 10.800781 210.734375 C 30.332031 241.941406 87.042969 315.5 187.597656 315.5 C 288.148438 315.5 344.859375 241.941406 364.394531 210.734375 C 369.648438 202.347656 369.648438 191.660156 364.394531 183.273438 Z M 187.597656 274.339844 C 144.816406 274.339844 110.136719 239.714844 110.136719 197.003906 C 110.136719 154.292969 144.816406 119.667969 187.597656 119.667969 C 230.375 119.667969 265.054688 154.292969 265.054688 197.003906 C 265.054688 239.714844 230.375 274.339844 187.597656 274.339844 Z M 213.417969 184.113281 C 206.289062 184.113281 200.507812 178.34375 200.507812 171.226562 C 200.507812 167.710938 201.933594 164.539062 204.21875 162.214844 C 199.164062 159.800781 193.574219 158.335938 187.597656 158.335938 C 166.207031 158.335938 148.867188 175.648438 148.867188 197.003906 C 148.867188 218.359375 166.207031 235.671875 187.597656 235.671875 C 208.988281 235.671875 226.328125 218.359375 226.328125 197.003906 C 226.328125 191.039062 224.859375 185.453125 222.445312 180.410156 C 220.113281 182.691406 216.9375 184.113281 213.417969 184.113281 Z M 213.417969 184.113281 "/>
                                                    </svg>

                                                    <!-- Visible icon when password is hidden -->
                                                    <svg x-show="!showCurrentPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-600">
                                                        <path fill="gray"
                                                              d="M 359.273438 184.5 C 348.402344 167.085938 325.5 136.277344 289.753906 112.980469 L 309.460938 93.25 C 314.371094 88.332031 314.371094 80.371094 309.460938 75.457031 C 304.554688 70.539062 296.597656 70.539062 291.691406 75.457031 L 64.847656 302.566406 C 59.9375 307.484375 59.9375 315.445312 64.847656 320.359375 C 67.300781 322.820312 70.515625 324.046875 73.734375 324.046875 C 76.949219 324.046875 80.164062 322.820312 82.621094 320.359375 L 107.253906 295.699219 C 129.800781 306.417969 156.328125 313.589844 187.15625 313.589844 C 285.046875 313.589844 340.257812 241.777344 359.273438 211.3125 C 364.390625 203.125 364.390625 192.691406 359.273438 184.5 Z M 187.15625 273.40625 C 170.867188 273.40625 155.851562 268.167969 143.539062 259.367188 L 170.953125 231.921875 C 175.855469 234.292969 181.332031 235.65625 187.15625 235.65625 C 207.980469 235.65625 224.859375 218.757812 224.859375 197.910156 C 224.859375 192.078125 223.496094 186.597656 221.128906 181.6875 L 248.542969 154.242188 C 257.332031 166.566406 262.5625 181.601562 262.5625 197.910156 C 262.566406 239.605469 228.800781 273.40625 187.15625 273.40625 Z M 114.425781 217.597656 C 112.730469 211.3125 111.746094 204.730469 111.746094 197.910156 C 111.746094 156.210938 145.507812 122.410156 187.15625 122.410156 C 193.96875 122.410156 200.542969 123.398438 206.820312 125.09375 L 241.574219 90.296875 C 225.136719 85.304688 207.074219 82.226562 187.15625 82.226562 C 89.261719 82.226562 34.050781 154.039062 15.035156 184.5 C 9.921875 192.691406 9.921875 203.125 15.035156 211.3125 C 23.6875 225.175781 39.929688 247.574219 64.183594 267.898438 Z M 114.425781 217.597656 "/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2 mb-2">
                                            <label for="currentPassword" class="w-3/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                                New Password
                                            </label>
                                            <div class="relative flex-1">
                                                <input :type="showNewPassword ? 'text' : 'password'" id="newPassword"
                                                       class="mb-2 w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                                       placeholder="Enter Current Password">

                                                <!-- Toggle SVG for show/hide password -->
                                                <div @click="showNewPassword = !showNewPassword"
                                                     class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">

                                                    <!-- Visible icon when password is shown -->
                                                    <svg x-show="showNewPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-500">
                                                        <path fill="gray"
                                                              d="M 364.394531 183.273438 C 344.859375 152.066406 288.148438 78.507812 187.597656 78.507812 C 87.042969 78.507812 30.332031 152.066406 10.800781 183.273438 C 5.546875 191.660156 5.546875 202.347656 10.800781 210.734375 C 30.332031 241.941406 87.042969 315.5 187.597656 315.5 C 288.148438 315.5 344.859375 241.941406 364.394531 210.734375 C 369.648438 202.347656 369.648438 191.660156 364.394531 183.273438 Z M 187.597656 274.339844 C 144.816406 274.339844 110.136719 239.714844 110.136719 197.003906 C 110.136719 154.292969 144.816406 119.667969 187.597656 119.667969 C 230.375 119.667969 265.054688 154.292969 265.054688 197.003906 C 265.054688 239.714844 230.375 274.339844 187.597656 274.339844 Z M 213.417969 184.113281 C 206.289062 184.113281 200.507812 178.34375 200.507812 171.226562 C 200.507812 167.710938 201.933594 164.539062 204.21875 162.214844 C 199.164062 159.800781 193.574219 158.335938 187.597656 158.335938 C 166.207031 158.335938 148.867188 175.648438 148.867188 197.003906 C 148.867188 218.359375 166.207031 235.671875 187.597656 235.671875 C 208.988281 235.671875 226.328125 218.359375 226.328125 197.003906 C 226.328125 191.039062 224.859375 185.453125 222.445312 180.410156 C 220.113281 182.691406 216.9375 184.113281 213.417969 184.113281 Z M 213.417969 184.113281 "/>
                                                    </svg>

                                                    <!-- Visible icon when password is hidden -->
                                                    <svg x-show="!showNewPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-600">
                                                        <path fill="gray"
                                                              d="M 359.273438 184.5 C 348.402344 167.085938 325.5 136.277344 289.753906 112.980469 L 309.460938 93.25 C 314.371094 88.332031 314.371094 80.371094 309.460938 75.457031 C 304.554688 70.539062 296.597656 70.539062 291.691406 75.457031 L 64.847656 302.566406 C 59.9375 307.484375 59.9375 315.445312 64.847656 320.359375 C 67.300781 322.820312 70.515625 324.046875 73.734375 324.046875 C 76.949219 324.046875 80.164062 322.820312 82.621094 320.359375 L 107.253906 295.699219 C 129.800781 306.417969 156.328125 313.589844 187.15625 313.589844 C 285.046875 313.589844 340.257812 241.777344 359.273438 211.3125 C 364.390625 203.125 364.390625 192.691406 359.273438 184.5 Z M 187.15625 273.40625 C 170.867188 273.40625 155.851562 268.167969 143.539062 259.367188 L 170.953125 231.921875 C 175.855469 234.292969 181.332031 235.65625 187.15625 235.65625 C 207.980469 235.65625 224.859375 218.757812 224.859375 197.910156 C 224.859375 192.078125 223.496094 186.597656 221.128906 181.6875 L 248.542969 154.242188 C 257.332031 166.566406 262.5625 181.601562 262.5625 197.910156 C 262.566406 239.605469 228.800781 273.40625 187.15625 273.40625 Z M 114.425781 217.597656 C 112.730469 211.3125 111.746094 204.730469 111.746094 197.910156 C 111.746094 156.210938 145.507812 122.410156 187.15625 122.410156 C 193.96875 122.410156 200.542969 123.398438 206.820312 125.09375 L 241.574219 90.296875 C 225.136719 85.304688 207.074219 82.226562 187.15625 82.226562 C 89.261719 82.226562 34.050781 154.039062 15.035156 184.5 C 9.921875 192.691406 9.921875 203.125 15.035156 211.3125 C 23.6875 225.175781 39.929688 247.574219 64.183594 267.898438 Z M 114.425781 217.597656 "/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2 mb-2">
                                            <label for="currentPassword" class="w-3/10 mb-2 mt-3 block text-[13px] font-medium text-gray-900">
                                                Confirm Password
                                            </label>
                                            <div class="relative flex-1">
                                                <input :type="showConfirmPassword ? 'text' : 'password'" id="confirmPassword"
                                                       class="mb-2 w-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] block rounded-md bg-none text-[14px] font-normal text-gray-900 shadow"
                                                       placeholder="Enter Current Password">

                                                <!-- Toggle SVG for show/hide password -->
                                                <div @click="showConfirmPassword = !showConfirmPassword"
                                                     class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">

                                                    <!-- Visible icon when password is shown -->
                                                    <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-500">
                                                        <path fill="gray"
                                                              d="M 364.394531 183.273438 C 344.859375 152.066406 288.148438 78.507812 187.597656 78.507812 C 87.042969 78.507812 30.332031 152.066406 10.800781 183.273438 C 5.546875 191.660156 5.546875 202.347656 10.800781 210.734375 C 30.332031 241.941406 87.042969 315.5 187.597656 315.5 C 288.148438 315.5 344.859375 241.941406 364.394531 210.734375 C 369.648438 202.347656 369.648438 191.660156 364.394531 183.273438 Z M 187.597656 274.339844 C 144.816406 274.339844 110.136719 239.714844 110.136719 197.003906 C 110.136719 154.292969 144.816406 119.667969 187.597656 119.667969 C 230.375 119.667969 265.054688 154.292969 265.054688 197.003906 C 265.054688 239.714844 230.375 274.339844 187.597656 274.339844 Z M 213.417969 184.113281 C 206.289062 184.113281 200.507812 178.34375 200.507812 171.226562 C 200.507812 167.710938 201.933594 164.539062 204.21875 162.214844 C 199.164062 159.800781 193.574219 158.335938 187.597656 158.335938 C 166.207031 158.335938 148.867188 175.648438 148.867188 197.003906 C 148.867188 218.359375 166.207031 235.671875 187.597656 235.671875 C 208.988281 235.671875 226.328125 218.359375 226.328125 197.003906 C 226.328125 191.039062 224.859375 185.453125 222.445312 180.410156 C 220.113281 182.691406 216.9375 184.113281 213.417969 184.113281 Z M 213.417969 184.113281 "/>
                                                    </svg>

                                                    <!-- Visible icon when password is hidden -->
                                                    <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 375 375"
                                                         class="fill-current text-gray-600">
                                                        <path fill="gray"
                                                              d="M 359.273438 184.5 C 348.402344 167.085938 325.5 136.277344 289.753906 112.980469 L 309.460938 93.25 C 314.371094 88.332031 314.371094 80.371094 309.460938 75.457031 C 304.554688 70.539062 296.597656 70.539062 291.691406 75.457031 L 64.847656 302.566406 C 59.9375 307.484375 59.9375 315.445312 64.847656 320.359375 C 67.300781 322.820312 70.515625 324.046875 73.734375 324.046875 C 76.949219 324.046875 80.164062 322.820312 82.621094 320.359375 L 107.253906 295.699219 C 129.800781 306.417969 156.328125 313.589844 187.15625 313.589844 C 285.046875 313.589844 340.257812 241.777344 359.273438 211.3125 C 364.390625 203.125 364.390625 192.691406 359.273438 184.5 Z M 187.15625 273.40625 C 170.867188 273.40625 155.851562 268.167969 143.539062 259.367188 L 170.953125 231.921875 C 175.855469 234.292969 181.332031 235.65625 187.15625 235.65625 C 207.980469 235.65625 224.859375 218.757812 224.859375 197.910156 C 224.859375 192.078125 223.496094 186.597656 221.128906 181.6875 L 248.542969 154.242188 C 257.332031 166.566406 262.5625 181.601562 262.5625 197.910156 C 262.566406 239.605469 228.800781 273.40625 187.15625 273.40625 Z M 114.425781 217.597656 C 112.730469 211.3125 111.746094 204.730469 111.746094 197.910156 C 111.746094 156.210938 145.507812 122.410156 187.15625 122.410156 C 193.96875 122.410156 200.542969 123.398438 206.820312 125.09375 L 241.574219 90.296875 C 225.136719 85.304688 207.074219 82.226562 187.15625 82.226562 C 89.261719 82.226562 34.050781 154.039062 15.035156 184.5 C 9.921875 192.691406 9.921875 203.125 15.035156 211.3125 C 23.6875 225.175781 39.929688 247.574219 64.183594 267.898438 Z M 114.425781 217.597656 "/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <!-- Password requirements -->
                                        <div class="w-full pb-6 px-6">
                                            <div class="text-gray-600 text-[14px] font-semibold mb-4">Password Requirements</div>
                                            <div class="text-[13px] text-gray-500 mb-1">Please follow this guide for a strong password:</div>
                                            <ul class="list-disc pl-10 leading-6">
                                                <li class="text-[13px] text-gray-500">Minimum 8 characters</li>
                                                <li class="text-[13px] text-gray-500">At least one uppercase letter</li>
                                                <li class="text-[13px] text-gray-500">At least one lowercase letter</li>
                                                <li class="text-[13px] text-gray-500">At least one number</li>
                                                <li class="text-[13px] text-gray-500">At least one special character</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="float-right pr-8">
                                    <button type="submit" name="updateAccount" id="updateAccount" value="updateAccount"
                                            class="w-auto gap-x-[8px] text-[14px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#4D9B62] hover:shadow-xl">
                                        <span class="mt-[2px] px-2">Update Account</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-User.user-navigation>
</x-app-layout>
