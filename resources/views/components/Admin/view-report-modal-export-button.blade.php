<div class="flex justify-center items-center w-full md:justify-end md:w-4/10 lg:w-2/10 order-1 md:order-2 my-2">
    <div x-data="{ open: false }" class="relative inline-block text-left">
        <!-- Parent Button -->
        <button
            @click="open = !open"
            class="w-full md:w-auto md:mx-auto flex gap-x-[8px] text-center justify-center items-center text-xs px-[14px] py-[10px] font-normal tracking-wider
                                        text-[#FFFFFF] bg-gradient-to-b from-[#84D689] to-green-500 rounded-full
                                        hover:drop-shadow hover:bg-[#4AA76F] hover:scale-105 hover:ease-in-out
                                        hover:duration-300 transition-all duration-300
                                        [transition-timing-function:cubic-bezier(0.175,0.885,0.32,1.275)]
                                        active:-translate-y-1 active:scale-x-90 active:scale-y-110">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="mt-0.5 mr-0">
                <path fill="#ffffff" fill-opacity="1" fill-rule="nonzero"
                      d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/>
            </svg>
            <span class="ml-0 mt-0 text-[#FFFFFF] text-md">Export Reports</span>
        </button>

        <!-- Dropdown Menu -->
        <div
            x-show="open"
            @click.away="open = false"
            class="absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-10">
            {{ $dropdown_buttons }}
        </div>
    </div>
</div>
