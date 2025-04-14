<div class="w-full h-full relative rounded-[6px] font-pop">

    <div class="bg-none rounded-[4px]">

        <!-- Image Background -->
        <div loading="eager" class="relative overflow-hidden rounded-[10px] shadow w-full h-[110px] x-cloak">
            <img src="{{ asset('storage/images/profile-backgroundImage2.png') }}"
                 alt="profile name background" x-cloak
                 class="absolute top-0 left-0 w-full h-full object-cover"
                 loading="eager">
        </div>

        <!--Profile Name -->
        <div class="absolute flex items-start p-2">
            <div class="relative ml-10 -mt-24">
                {{ $profile_picture }}
            </div>
            <div class="relative text-start text-[#4D4F50] ml-6 -mt-[90px]">
                {{ $preview_names_and_user_type }}
            </div>
        </div>
    </div>

    <!--Profile Information -->
    <div class="pl-5 mt-16 w-full"
         x-data="{
                    activeTab: 'basic-info',
                    hoveredTab: null,
                    showCurrentPassword: false,
                    showNewPassword: false,
                    showConfirmPassword: false
                 }" >
        <div class="z-0 lg:grid lg:place-items-start">
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

                <!-- Access Control Information Tab -->
                <div class="relative inline-block mr-6">
                    <button
                        class="font-medium text-[#676767] hover:text-[#676767]"
                        @click="activeTab = 'access-control-info'"
                        @mouseenter="hoveredTab = 'access-control-info'"
                        @mouseleave="hoveredTab = null"
                        :class="activeTab === 'access-control-info' ? 'text-[#676767] font-semibold' : 'text-[#00A79D]'">
                        Access Control Information
                    </button>
                    <span
                        class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                        x-show="activeTab === 'access-control-info' || hoveredTab === 'access-control-info'"
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

            <div class="text-[13px] z-10 mt-6 h-full max-h-[420px] w-full max-w-[1330px] rounded-md bg-[#FBFBFB] px-7 pb-7 drop-shadow-lg">

                <!-- Basic Information -->
                <div x-show="activeTab === 'basic-info'">
                    <div class="pt-10 pl-5 text-[13px] italic text-gray-900">
                        Below is your basic information as the administrator of iRoadCheck.
                    </div>
                    <div  x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 transform scale-80"
                          x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 px-4 mt-8 mb-2">
                            <div class="flex gap-4 p-2 w-full">
                                {{ $first_name }}
                            </div>
                            <div class="flex gap-4 p-2 w-full">
                                {{ $middle_name }}
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 px-4 mb-2">
                            <div class="flex gap-4 p-2 w-full">
                                {{ $last_name }}
                            </div>
                            <div class="flex gap-4 p-2 w-full">
                                {{ $sex }}
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 px-4 mb-10">
                            <div class="flex gap-4 p-2 w-full">
                                {{ $user_type }}
                            </div>
                            <div class="flex gap-4 p-2 w-full">
                                {{ $birthdate }}
                            </div>
                        </div>

                        <div class="float-right pr-8">
                            {{ $save_button_container }}
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'access-control-info'">
                    <div class="pt-10 pl-5 text-[13px] italic text-gray-900">
                        Below is your access control information as the staff of iRoadCheck.
                    </div>
                    <div wire:submit.prevent="save" x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 transform scale-80"
                          x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="flex flex-col mt-8 mb-2 px-4">
                            <!-- Staff Role -->
                            <div class="flex items-center gap-2 mb-3">
                                {{ $staff_role }}
                            </div>

                            <div class="flex flex-col mb-2">
                                {{ $permissions }}
                            </div>
                        </div>
                    </div>
                </div>

                <div  x-show="activeTab === 'account-info'">
                    <!-- Account Information -->
                    <div class="mt-8 pl-5 text-[13px] italic text-gray-900">
                        Below is your account information as the administrator of iRoadCheck.
                    </div>
                    <div  x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 transform scale-80"
                          x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="grid grid-cols-2 my-6 space-x-6 px-4 ">
                            <div class="w-full p-2">
                                <div class="flex items-start space-x-2 mb-2">
                                    {{ $username }}
                                </div>
                                <div class="flex items-start space-x-2 mb-2">
                                    {{ $current_password }}
                                </div>
                                <div class="flex items-start space-x-2 mb-2">
                                    {{ $new_password }}
                                </div>
                                <div class="flex items-start space-x-2 mb-2">
                                    {{ $confirm_password }}
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

                        <div class="absolute right-10 bottom-10">
                            {{ $update_button_container }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

