<div class="flex w-80 items-center px-5">
    <form class="relative flex flex-1 h-8 rounded-full border-[#F8F7F7]" action="{{ $action }}" method="{{ $method }}">
        <label for="search-field" class="sr-only">Search</label>
        <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#6AA76F" aria-hidden="false">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
        </svg>
        <input id="search-field"
               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#6AA76F] focus:border-[#6AA76F] drop-shadow-md focus:bg-white bg-white rounded-full border-none block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400"
               placeholder="{{ $placeholder }}" type="search" name="search">
    </form>
</div>

