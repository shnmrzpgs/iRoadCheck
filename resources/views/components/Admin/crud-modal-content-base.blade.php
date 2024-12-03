@props(['modal_name', 'body_width' => 'max-w-2xl'])

<div x-data="{ open: false }" class="flex justify-center">
    <!-- Trigger -->
    <span x-on:click="open = true">

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
                class="relative w-full  overflow-y-auto rounded-xl bg-transparent p-0 shadow-lg"
            >
                <div class="w-full h-full">
                    <div class="flex items-center justify-center z-50">
                        <div
                            class="pt-5 px-3 pb-3 bg-[#303030] border-gray-600 rounded-[20px] shadow-xl w-full pointer-events-auto">
                            <div class="bg-[#202020] shadow shadow-gray-400 rounded-[8px]">

                                <!-- Modal Header -->
                                <div class="flex justify-between items-center px-2">
                                    <h2 class="absolute top-0 left-1/2 transform -translate-x-1/2 py-3 px-6 text-[22px] text-[#E37575] font-semibold bg-[#202020] rounded-md">

                                    </h2>
                                    <button x-on:click="open = false"
                                            class="absolute right-0 top-0 w-16 h-16 bg-[#202020] text-gray-400 hover:text-white hover:bg-red-700 rounded-tl-full rounded-b-full text-[45px] transition-colors duration-300 ease-in-out">
                                        &times;
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <div class="px-10 pt-2 pb-0 mt-4">

                                </div>

                                <!-- Modal Footer -->
                                <div class="flex justify-center p-5">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
