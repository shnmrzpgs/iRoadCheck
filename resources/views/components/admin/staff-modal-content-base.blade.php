@props(['modal_name', 'body_width' => 'max-w-4xl'])


<div x-data="{ open: false }" class="z-[9999] flex justify-center"
     x-on:modal-close.window="open = false">
    {{--         x-show="open"--}}
    {{--         x-transition>--}}

    <!-- Trigger -->
    <span x-on:click="open = true">
        {{ $trigger }}
    </span>

    <!-- Modal -->
    <div
        x-show="open"
        style="display: none"
        x-on:keydown.escape.prevent.stop="open = false"
        role="dialog"
        aria-modal="true"
        x-id="['{{ $modal_name }}']"
        :aria-labelledby="$id('{{ $modal_name }}')"
        class="fixed inset-0 z-50 overflow-y-auto"
    >
        <!-- Overlay -->
        <div x-show="open"
             x-transition.opacity
             class="fixed inset-0 bg-black bg-opacity-50"></div>

        <!-- Panel -->
        <div
            x-show="open"
            x-transition
            class="relative flex min-h-screen items-center justify-center p-4"
        >
            <div
                x-on:click.stop
                x-trap.noscroll="open"
                class="relative w-full {{ $body_width }} overflow-y-auto rounded-xl bg-none p-0"
            >
                <div class="w-full h-full">
                    <div class="flex items-center justify-center">
                        <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full min-w-md max-w-lg min-h-md max-h-lg mx-auto">
                            <div class="bg-[#FBFBFB] rounded-[10px] relative" >

                                <!-- X Button -->
                                <button x-on:click="open = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-6 w-6"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <!-- Modal Header -->
                                <div class="bg-gray-100 rounded-t-[8px] w-full text-md px-4 py-3">
                                    <div class="text-[#3AA76F] font-medium">{{ $header }}</div>
                                </div>

                                <!-- Modal Body -->
                                <div class="bg-[#FBFBFB] p-5 rounded-b-[8px] text-gray-600">
                                    {{  $body }}
                                </div>

                                <!-- Modal Footer -->
                                <div class="flex items-center justify-end pb-2 px-2 space-x-4">
                                    {{ $footer }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Feedback Toast -->
    @if (session()->has('feedback'))
        <div
            x-data="{ openModal: true }"
            x-init="
            setTimeout(() => {
                openModal = false;
                setTimeout(() => location.reload(), 100);
            }, 1500);

            const type = '{{ session('feedback_type') }}';
            let animationPath = '';
            if (type === 'success') {
                animationPath = '{{ asset('animations/Animation - 1732372548058.json') }}';
            } else if (type === 'info') {
                animationPath = '{{ asset('animations/Animation - 1737008068327.json') }}';
            } else if (type === 'error') {
                animationPath = '{{ asset('animations/Animation - 1732451860692.json') }}';
            }

            lottie.loadAnimation({
                container: $refs.lottieAnimation,
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: animationPath,
            }).setSpeed(2);
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
                'border-green-500': '{{ session('feedback_type') }}' === 'success',
                'border-blue-500': '{{ session('feedback_type') }}' === 'info',
                'border-red-500': '{{ session('feedback_type') }}' === 'error',
            }"
            >
                <div class="p-4 flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div x-ref="lottieAnimation" class="w-12 h-12"></div>
                    </div>
                    <div>
                        <p class="font-bold text-lg"
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
                <div class="mx-5 mb-3 relative h-1 bg-gray-200">
                    <div
                        class="absolute top-0 left-0 h-full"
                        :class="{
                        'bg-green-500': '{{ session('feedback_type') }}' === 'success',
                        'bg-blue-500': '{{ session('feedback_type') }}' === 'info',
                        'bg-red-500': '{{ session('feedback_type') }}' === 'error',
                    }"
                        style="animation: progress 3s linear;"
                    ></div>
                </div>
            </div>
        </div>
    @endif

    <!-- Progress Animation Style -->
    <style>
        @keyframes progress {
            from { width: 100%; }
            to { width: 0; }
        }
    </style>
</div>
