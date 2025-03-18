<x-app-layout>
    <x-Admin.admin-navigation page_title="Notifications">
        <div class="text-[#202020] bg-[#F9F9F9] p-8 h-full rounded-lg drop-shadow">

            <div class="w-full relative mx-auto bg-none rounded-[6px]">

                <div class="flex mb-4">

                    <!--Page description-->
                    <div class="flex sm:flex sm:items-baseline">

                        <div class="flex flex-col mr-auto">
                            <!--Page description-->
                            <div class="sm:flex-auto">
                                <p class="mt-2 text-[12px] text-primary-800">
                                    A list of all notifications for the users in iRoadCheck System.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Notifications Tabs-->
                <div class="bg-none rounded-[6px]">

                    <div x-data="{
                            activeTab: 'all',
                            activeTabWidth: 0,
                            activeTabPosition: 0,
                            setActiveTab(tab, event) {
                                this.activeTab = tab;
                                const tabElement = event.currentTarget;
                                this.activeTabWidth = tabElement.offsetWidth;
                                this.activeTabPosition = tabElement.offsetLeft;
                            }
                        }"
                        x-init="setTimeout(() => {
                            const initialTab = $refs.allTab;
                            this.activeTabWidth = initialTab.offsetWidth;
                            this.activeTabPosition = initialTab.offsetLeft;
                        }, 0);"
                         class="flex justify-start">

                        <!-- Active Tab Indicator -->
                        <div
                            class="absolute bottom-0 left-0 h-[2px] bg-[#6AA76F] transition-all duration-300"
                            :style="{ width: activeTabWidth + 'px', transform: `translateX(${activeTabPosition}px)` }">
                        </div>

                        <!-- All Tab -->
                        <div
                            :class="{
                                'text-[#6AA76F] font-semibold': activeTab === 'all',
                                'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'all'
                            }"
                            @click="setActiveTab('all', $event)"
                            class="flex text-[12px] py-1 px-7 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105"
                        >
                            <span>All</span>
                        </div>

                        <!-- Unread Tab -->
                        <div
                            :class="{
                                'text-[#6AA76F] font-semibold': activeTab === 'unread',
                                'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'unread'
                            }"
                            @click="setActiveTab('unread', $event)"
                            class="flex text-[12px] py-1 px-4 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105"
                        >
                            <span>Unread</span>
                        </div>

                        <!-- Read Tab -->
                        <div
                            :class="{
                            'text-[#6AA76F] font-semibold': activeTab === 'read',
                            'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'read'
                        }"
                            @click="setActiveTab('read', $event)"
                            class="flex text-[12px] py-1 px-6 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105"
                        >
                            <span>Read</span>
                        </div>

                        <!-- Clear All -->
                        <div class="flex text-[12px] py-1 pr-2 text-center justify-around cursor-pointer ml-auto">
                            <span class="font-semibold text-gray-500 pt-1 hover:text-[#E37878]">
                                Clear All
                            </span>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Notifications List -->
            <div class="w-full rounded-[4px] bg-none border border-gray-200 h-[480px] overflow-auto">
                {{-- Active: bg-gray-100 font-semibold, not active: bg:none --}}

                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 bg-gray-100 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747] font-semibold">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2 font-semibold">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>
                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 bg-gray-100 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747] font-semibold">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2 font-semibold">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>
                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747]">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>
                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747]">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>
                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747]">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>
                <div class=" border-b border-b-gray-200">

                    <div class="flex px-2 py-4 my-1 rounded-md">
                        <!-- Notifications Message Icon -->
                        <div class="w-10 h-10 border rounded-full border-[#FFAD20] flex items-center justify-center">
                            <img src="{{ asset('storage/icons/notification-message-icon.png') }}" alt="message-icon" class="w-4 h-4">
                        </div>

                        <!-- Notifications Message -->
                        <div class="pl-3 py-2 mr-auto text-[13px] text-[#474747]">
                            <span>Successfully</span>
                            <span>add Users</span>
                        </div>

                        <div x-data="{
                                now: new Date(),
                                notificationDate: new Date('2024-10-09T12:00:00'), // Replace with the actual notification date
                                    get timeAgo() {
                                        const diffMs = this.now - this.notificationDate;
                                        const diffMins = Math.floor(diffMs / 60000);
                                        const diffHours = Math.floor(diffMins / 60);
                                        const diffDays = Math.floor(diffHours / 24);

                                        if (diffMins < 1) {
                                            return 'just now';
                                        } else if (diffMins < 60) {
                                            return `${diffMins} mins ago`;
                                        } else if (diffHours < 24) {
                                            return `${diffHours} hours ago`;
                                        } else {
                                            return `${diffDays} days ago`;
                                        }
                                    }
                                }" class="flex items-center text-gray-400 text-[10px] pr-3 py-2">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <!-- Time Ago -->
                            <span x-text="timeAgo" class="ml-1"></span>
                        </div>
                    </div>

                </div>

                <!--add more notifications here-->

            </div>

        </div>
    </x-Admin.admin-navigation>
</x-app-layout>
