<x-app-layout>
    <x-residents.residents-navigation>

        <x-Residents.notification-page-content-base>

            <x-slot:mark_all_as_read_button_container>
                <button type="button" wire:click="markAllAsRead" class="text-[12px] rounded">
                    <span class="text-[#0000FF]">Mark All as Read</span>
                </button>
            </x-slot:mark_all_as_read_button_container>

            <x-slot:notification_today>
                @foreach ($notificationsToday as $notification)
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow-md p-4 mt-4
                         {{ $notification->is_read ? 'opacity-50' : '' }}"
                         wire:click="viewNotification({{ $notification->id }})">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                 class="w-14 h-14 object-cover shadow rounded-lg">
                        </div>

                        <div class="ml-4">
                            <p class="text-black font-normal text-sm">
                                {{ $notification->message }}
                            </p>
                            <p class="text-gray-500 text-xs mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @endforeach

                @if($notificationsToday->isEmpty())
                    <p class="text-gray-500 text-center mt-4">No notifications for today.</p>
                @endif
            </x-slot:notification_today>

            <x-slot:notification_earlier>
                @foreach ($notificationsEarlier as $notification)
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg px-4 py-3 shadow-md
                        {{ $notification->is_read ? 'opacity-50' : '' }}">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/icons/road.png') }}" alt="Notification Icon"
                                 class="w-14 h-14 object-cover shadow rounded-lg">
                        </div>

                        <div class="ml-4">
                            <p class="text-black font-normal text-sm">
                                {{ $notification->message }}
                            </p>
                            <p class="text-gray-500 text-xs mt-1">{{ $notification->created_at->format('F j, Y \a\t H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </x-slot:notification_earlier>

        </x-Residents.notification-page-content-base>

    </x-residents.residents-navigation>

    @if (session('success') || session('info'))
        <div
            x-data="{ openModal: true }"
            x-init="
                setTimeout(() => {
                    openModal = false;
                    setTimeout(() => location.reload(), 10); // Added delay before reload
                }, 3000);

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
                <div class="z-50 p-4 flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div x-ref="lottieAnimation" class="w-12 h-12"></div>
                    </div>

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

</x-app-layout>
