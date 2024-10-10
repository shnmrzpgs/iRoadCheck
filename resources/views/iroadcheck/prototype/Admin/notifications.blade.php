<x-app-layout>
    <x-admin.navigation>
        <div class="text-[#202020] bg-white pt-4 px-4 h-full rounded-lg drop-shadow" x-data="{ addUserModal: false, editUserModal: false, successAddModal: false, successEditModal: false, errorModal: false }">

            <div class="w-full relative font-pop grid-cols-1 md:grid-cols-2">
            <div class="flex">

                <div class="absolute left-0 w-full mx-auto bg-[#202020] p-8 rounded-[6px]">

                    <div class="flex mb-6">

                        <!--Page description and Add button-->
                        <div class="px-4">
                            <div class="flex sm:flex sm:items-baseline">

                                <div class="flex flex-col mr-auto">
                                    <!--Page Title-->
                                    <div class="text-[#4D4F50] font-semibold">Notifications</div>
                                    <!--Page description-->
                                    <div class="sm:flex-auto">
                                        <p class="mt-2 text-[12px] text-primary-800">
                                            A list of all notifcations for the users in iRoadCheck System.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Notifications Content-->
                    <div class="bg-[#303030] rounded-[6px] p-4">

                        <div x-data="{ activeTab: 'all' }" class="flex justify-start">

                            <!-- All Tab -->
                            <div
                                :class="{
                                    'bg-[#202020] text-[#E37878]': activeTab === 'all',
                                    'text-[#989898]': activeTab !== 'all'
                                }"
                                @click="activeTab = 'all'"
                                class="flex text-[12px] py-1 px-6 text-center justify-around rounded-t-[4px] cursor-pointer"
                            >
                                <span class="font-semibold pt-1">All</span>
                            </div>

                            <!-- Unread Tab -->
                            <div
                                :class="{
                                    'bg-[#202020] text-[#E37878]': activeTab === 'unread',
                                    'text-[#989898]': activeTab !== 'unread'
                                }"
                                @click="activeTab = 'unread'"
                                class="flex text-[12px] py-1 px-4 text-center justify-around rounded-t-[4px] cursor-pointer"
                            >
                                <span class="font-semibold pt-1">Unread</span>
                            </div>

                            <!-- Read Tab -->
                            <div
                                :class="{
                                    'bg-[#202020] text-[#E37878]': activeTab === 'read',
                                    'text-[#989898]': activeTab !== 'read'
                                }"
                                @click="activeTab = 'read'"
                                class="flex text-[12px] py-1 px-4 text-center justify-around rounded-t-[4px] mr-auto cursor-pointer"
                            >
                                <span class="font-semibold pt-1">Read</span>
                            </div>

                            <!-- Clear All -->
                            <div class="flex text-[12px] py-1 pr-2 text-center justify-around rounded-[4px] cursor-pointer">
                                <span class="font-semibold text-gray-500 pt-1 hover:text-[#E37878]">
                                    Clear All
                                </span>
                            </div>

                        </div>


                        <!-- Notifications List -->
                        <div class="w-full p-3 rounded-b-[4px] bg-[#202020] h-[420px] overflow-auto">

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <div class="border-b border-b-[#303030] flex px-2 py-4">
                                <div class="w-10 h-10 border rounded-full border-gray-400 flex items-center justify-center">
                                    <img src="{{ asset('storage/icons/message-icon.png') }}" alt="message-icon"
                                         class="w-5 h-5">
                                </div>
                                <div class="pl-3 mr-auto">
                                    <p class="text-[13px]">
                                        <span class="text-[#E6E6E6]">James Doe</span>                 <!-- client/users name -->
                                        <span class="text-[#E6E6E6] font-semibold">replied a</span>   <!-- notification detail/activities made -->
                                        <span class="text-[#E6E6E6]">message.</span>
                                    </p>

                                    <!-- client computer name used -->
                                    <span class="text-xs leading-3 pt-1 text-gray-400">
                                        from
                                    </span>
                                    <span class="text-xs leading-3 pt-1 text-gray-400 italic">
                                        Computer 2
                                    </span>
                                </div>

                                <div x-data="{
                                        now: new Date(),
                                        options: {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            hour12: true
                                        },
                                         get formattedDate() {
                                            const day = this.now.toLocaleDateString('en-GB', { day: '2-digit' });
                                            const month = this.now.toLocaleDateString('en-GB', { month: 'short' });
                                            const year = this.now.toLocaleDateString('en-GB', { year: 'numeric' });
                                            const time = this.now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: true });
                                            return `${day} ${month} ${year} at ${time}`;
                                        }
                                    }">
                                    <div class="flex items-center space-x-2 text-gray-200 dark:text-gray-400 text-[12px]">
                                        <!-- Clock Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <!-- Timestamp -->
                                        <span x-text="formattedDate"></span>
                                    </div>
                                </div>




                            </div>

                            <!--add more notifications here-->

                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </x-admin.navigation>
</x-app-layout>
