{{--@if (!request()->routeIs('admin.profile-edit') && !request()->routeIs('admin.road-defect-reports') && !session('hideSearchBar'))--}}
@if (!$hideSearchBar)
    <form action="{{ $action }}" method="{{ $method }}" class="flex mt-2 lg:mt-3 w-48 lg:w-80 items-center px-0 lg:px-5">
        <div class="relative flex flex-1 h-8 rounded-full">
            <label for="search-field" class="sr-only">Search</label>
            <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-0"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#4AA76F">
                <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1l124 124 17 17L478.1 512l-17-17-124-124z"/>
            </svg>
            <input
                id="search-field"
                class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow-[0px_1px_5px_rgba(0,0,0,0.2)] focus:bg-white bg-white rounded-full block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 text-xs lg:text-[14px]"
                wire:model.live="search"
                placeholder="{{ $placeholder ?? 'Search...' }}"
                type="search"
            />
        </div>
    </form>
@endif

