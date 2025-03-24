<div>
    @if ($message)
        <div class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 bg-white shadow-lg rounded-lg overflow-hidden w-3/4 max-w-sm border-l-4"
             x-data="{ openModal: true }"
             x-show="openModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             :class="{
            'border-green-500': '{{ $type }}' === 'success',
            'border-blue-500': '{{ $type }}' === 'info',
            'border-red-500': '{{ $type }}' === 'error',
         }"
             x-init="setTimeout(() => { openModal = false }, 3000)">

            <!-- Notification Content -->
            <div class="p-2 flex items-center space-x-4">
                <!-- Icon -->
                <div>
                    @if ($type === 'success')
                        ✅
                    @elseif ($type === 'error')
                        ❌
                    @else
                        ℹ️
                    @endif
                </div>

                <!-- Message -->
                <div>
                    <p class="font-bold text-md"
                       :class="{
                       'text-green-600': '{{ $type }}' === 'success',
                       'text-blue-600': '{{ $type }}' === 'info',
                       'text-red-600': '{{ $type }}' === 'error',
                   }">
                        {{ strtoupper($type) }}
                    </p>
                    <p class="text-sm text-gray-700">{{ $message }}</p>
                </div>
            </div>
        </div>
    @endif

</div>
