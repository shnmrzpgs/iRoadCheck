@props(['modal_name', 'body_width' => 'max-w-4xl'])

<div x-data="{ open: false }" class="z-0 flex justify-center">
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
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

        <!-- Panel -->
        <div
            x-show="open" x-transition
            class="relative flex min-h-screen items-center justify-center p-4"
        >
            <div
                x-on:click.stop
                x-trap.noscroll.inert="open"
                class="relative w-full {{ $body_width }} overflow-y-auto rounded-xl bg-none p-0"
            >
                <div class="w-full h-full">
                    <div class="flex items-center justify-center z-50">
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
</div>
