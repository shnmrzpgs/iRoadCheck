<x-app-resident-layout>

    <livewire:camera-capture/>
    <!--Feedback Messages-->
    @if (session()->has('feedback'))
        <div
            x-data="{ openModal: true }"
            x-init="
            setTimeout(() => {
                openModal = false;
                setTimeout(() => location.reload(), 100); // Reload the page after the notification disappears
            }, 3000); // Auto-hide after 2 second

            @if (session('feedback_type') === 'success')
                lottie.loadAnimation({
                    container: $refs.lottieAnimation,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: '{{ asset('animations/Animation - 1732372548058.json') }}',
                }).setSpeed(2); // Set speed multiplier (1 is normal, 2 is twice as fast)
            @elseif (session('feedback_type') === 'info')
                lottie.loadAnimation({
                    container: $refs.lottieAnimation,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: '{{ asset('animations/Animation - 1737008068327.json') }}'
                });
            @elseif (session('feedback_type') === 'error')
                lottie.loadAnimation({
                    container: $refs.lottieAnimation,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: '{{ asset('animations/Animation - 1732451860692.json') }}'
                });
            @endif"
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
                class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 bg-white shadow-lg rounded-lg overflow-hidden w-3/4 max-w-sm border-l-4"
                :class="{
                'border-green-500': '{{ session('feedback_type') }}' === 'success',
                'border-blue-500': '{{ session('feedback_type') }}' === 'info',
                'border-red-500': '{{ session('feedback_type') }}' === 'error',
            }"
            >
                <!-- Content -->
                <div class="p-2 flex items-center space-x-4">
                    <!-- Lottie Animation -->
                    <div class="flex-shrink-0">
                        <div x-ref="lottieAnimation" class="w-12 h-12"></div>
                    </div>

                    <!-- Message -->
                    <div>
                        <p class="font-bold text-md"
                           :class="{
                            'text-green-600': '{{ session('feedback_type') }}' === 'success',
                            'text-blue-600': '{{ session('feedback_type') }}' === 'info',
                            'text-red-600': '{{ session('feedback_type') }}' === 'error',
                       }">
                            {{ strtoupper(session('feedback_type')) }}
                        </p>
                        <p class="text-sm text-gray-700">
                            {!! session('feedback') !!}
                        </p>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mx-3 mb-3 relative h-1 bg-gray-200">
                    <div
                        class="absolute top-0 left-0 h-full"
                        :class="{
                        'bg-green-500': '{{ session('feedback_type') }}' === 'success',
                        'bg-blue-500': '{{ session('feedback_type') }}' === 'info',
                        'bg-red-500': '{{ session('feedback_type') }}' === 'error',
                    }"
                        style="animation: progress 4s linear;"></div>
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
{{--    <x-success-modal successMessage="Your report road concern submitted successfully." x-show="openSuccessModal"></x-success-modal>--}}
{{--    @if(session('success'))--}}
{{--        <script>--}}
{{--            // Trigger the modal and reload after 2 seconds--}}
{{--            document.addEventListener('DOMContentLoaded', function() {--}}
{{--                openSuccessModal = true;--}}
{{--                // setTimeout(() => location.reload(), 1000);--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endif--}}
</x-app-resident-layout>
