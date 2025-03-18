<x-Admin.admin-navigation page_title="Notifications" action="{{ route('admin.notifications') }}" placeholder="Search..." id="search" name="search" wire:model.live="search">

    <x-Admin.notification-page-content-base>

        <x-slot:page_description>
            <p class="mt-0 lg:text-sm text-xs text-[#656565] pl-3">
                A list of all notifications for the users in iRoadCheck System.
            </p>
        </x-slot:page_description>

        <x-slot:notification_tabs>
            <!-- Active Tab Indicator -->
            <div loading="lazy"
                class="absolute bottom-0 left-0 h-[2px] bg-[#6AA76F] transition-all duration-300"
                :style="{ width: activeTabWidth + 'px', transform: `translateX(${activeTabPosition}px)` }">
            </div>

            <!-- Tabs -->
            <div x-ref="allTab"
                 :class="{
                    'text-[#6AA76F] font-semibold': activeTab === 'all',
                    'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'all'
                }"
                 @click="setActiveTab('all', $event)"
                 wire:click="setFilter('all')"
                 loading="lazy"
                 class="flex text-[12px] py-1 px-7 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105">
                <span>All</span>
            </div>

            <div
                :class="{
                    'text-[#6AA76F] font-semibold': activeTab === 'unread',
                    'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'unread'
                }"
                @click="setActiveTab('unread', $event)"
                wire:click="setFilter('unread')"
                loading="lazy"
                class="flex text-[12px] py-1 px-4 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105">
                <span>Unread</span>
            </div>

            <div
                :class="{
                    'text-[#6AA76F] font-semibold': activeTab === 'read',
                    'text-[#989898] hover:text-[#6AA76F]': activeTab !== 'read'
                }"
                @click="setActiveTab('read', $event)"
                wire:click="setFilter('read')"
                loading="lazy"
                class="flex text-[12px] py-1 px-6 text-center justify-around cursor-pointer transition-transform transform duration-300 hover:scale-105">
                <span>Read</span>
            </div>

            <button wire:click="markAllAsRead"
                :class="{
                    'flex': activeTab === 'unread' || activeTab === 'all',
                    'hidden': activeTab === 'read'
                }"
                loading="lazy"
                class="text-[12px] py-1 pr-2 text-center justify-around rounded-[4px] cursor-pointer ml-auto">
                <span class="font-semibold text-gray-500 hover:text-[#E37878]">
                    Mark all as Read
                </span>
            </button>
        </x-slot:notification_tabs>


        <x-slot:notification_lists>
            <!-- Notifications List -->
            <div class="w-full rounded-[4px] bg-none border border-gray-200 h-[480px]">
                @forelse($notifications as $notification)
                    @if($notification->is_read)
                        <!-- Read Notifications -->
                        <div
                            class="border-b border-b-gray-200 flex px-4 py-4 cursor-pointer hover:bg-gray-100"
                            wire:click="viewNotification({{ $notification->id }})">

                            <!-- Notifications Icon -->
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon" loading="lazy"
                                     class="lazyload w-14 h-14 object-cover shadow rounded-lg">
                            </div>

                            <!-- Notifications Details -->
                            <div class="pl-3 mr-auto text-[13px] text-[#474747]">
                                <p>
                                    <span class="font-semibold">{{ $notification->title }}</span> <br/> {{ $notification->message }}
                                </p>
                            </div>

                            <!-- Time Ago -->
                            <div class="flex items-center space-x-2 text-gray-400 text-[10px]">
                                <svg xmlns="http://www.w3.org/2000/svg" loading="lazy" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @else
                        <!-- Unread Notifications -->
                        <div
                            class="border-b border-b-gray-200 bg-gray-200 flex px-4 py-4 cursor-pointer hover:bg-gray-100"
                            wire:click="viewNotification({{ $notification->id }})">

                            <!-- Notifications Icon -->
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon" loading="lazy"
                                     class="lazyload w-14 h-14 object-cover shadow rounded-lg">
                            </div>

                            <!-- Notifications Details -->
                            <div class="pl-3 mr-auto text-[13px] text-[#474747] font-semibold">
                                <p>
                                    <span class="font-semibold">{{ $notification->title }}</span> <br/> {{ $notification->message }}
                                </p>
                            </div>

                            <!-- Time Ago -->
                            <div class="flex items-center space-x-2 text-gray-400 text-[10px]">
                                <svg xmlns="http://www.w3.org/2000/svg" loading="lazy" class="lazyload h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-8V6a1 1 0 112 0v4h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center h-full">
                        <img src="{{ asset('storage/icons/no-content-notification.gif') }}" loading="lazy" alt="no-content-notification" class="lazyload w-28 h-28 mb-2 opacity-35" />
                        <p class="lazyload text-[13px] font-light italic text-gray-400">No notifications available.</p>
                    </div>
                @endforelse
            </div>
        </x-slot:notification_lists>

    </x-Admin.notification-page-content-base>

    @if (session('success') || session('info'))
            <div
                x-data="{ openModal: true }"
                x-init="
                setTimeout(() => {
                    openModal = false;
                    setTimeout(() => location.reload(), 300); // Reload the page after the notification disappears
                }, 3000); // Auto-hide after 3 seconds

                // Load the animation (success or info)
                let animationPath = '{{ session('success') ? asset('animations/Animation - 1732372548058.json') : asset('animations/Animation - 1737008068327.json') }}';
                lottie.loadAnimation({
                    container: $refs.lottieAnimation,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: animationPath
                });
            "
                x-cloak
            >
                <!-- Notifications -->
                <div
                    x-show="openModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-md border-l-4"
                    :class="{
                    'border-green-500': '{{ session('success') }}',
                    'border-blue-500': '{{ session('info') }}'
                }"
                >
                    <!-- Content -->
                    <div class="z-50 p-4 flex items-center space-x-4">
                        <!-- Lottie Animation -->
                        <div class="flex-shrink-0">
                            <div x-ref="lottieAnimation" class="w-12 h-12"></div>
                        </div>

                        <!-- Message -->
                        <div>
                            <p class="font-bold text-lg"
                               :class="{
                               'text-green-600': '{{ session('success') }}',
                               'text-blue-600': '{{ session('info') }}'
                           }">
                                {{ session('success') ? 'MARK ALL AS READ' : 'NO NOTIFICATIONS TO MARK' }}
                            </p>
                            <p class="text-sm text-gray-700">
                                {{ session('success') ?? session('info') }}
                            </p>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mx-5 mb-3 relative h-1 bg-gray-200">
                        <div
                            class="absolute top-0 left-0 h-full"
                            :class="{
                            'bg-green-500': '{{ session('success') }}',
                            'bg-blue-500': '{{ session('info') }}'
                        }"
                            style="animation: progress 3s linear;"></div>
                    </div>
                </div>
            </div>
        @endif

    <!-- Progress Bar Animation -->
    <style>
        @keyframes progress {
            from {
                width: 100%;
            }
            to {
                width: 0;
            }
        }
    </style>

    <!-- Loading indicator for pagination -->
    <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition loading="lazy"
         class="z-50 absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
        <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading/>
    </div>
</x-Admin.admin-navigation>
