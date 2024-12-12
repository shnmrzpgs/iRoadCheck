<div class="flex flex-wrap items-center justify-between space-y-2 sm:space-y-0 sm:flex-nowrap">
    <!-- Total Users -->
    <div class="w-full sm:w-auto text-center sm:text-left text-xs text-gray-500 font-semibold">
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
    </div>

    <!-- Pagination Controls -->
    <div class="w-full sm:w-auto">
        @if ($paginator->hasPages())
            <nav aria-label="Page navigation" class="flex justify-center sm:justify-start items-center text-xs space-x-1">
                <!-- First Page -->
                <button
                    wire:click="gotoPage(1)"
                    wire:loading.attr="disabled"
                    class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 {{ $paginator->onFirstPage() ? 'disabled:text-gray-300 disabled:hover:bg-white' : '' }}"
                    {{ $paginator->onFirstPage() ? 'disabled' : '' }}>
                    First
                </button>

                <!-- Previous Page -->
                <button
                    wire:click="previousPage"
                    wire:loading.attr="disabled"
                    class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 {{ $paginator->onFirstPage() ? 'disabled:text-gray-300 disabled:hover:bg-white' : '' }}"
                    {{ $paginator->onFirstPage() ? 'disabled' : '' }}>
                    &lt; Prev
                </button>

                <!-- Page Numbers -->
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <button class="px-3 h-8 text-gray-500 bg-white border border-gray-300" disabled>{{ $element }}</button>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <button
                                wire:click="gotoPage({{ $page }})"
                                wire:loading.attr="disabled"
                                class="px-3 h-8 border border-gray-300 {{ $page == $paginator->currentPage() ? 'bg-green-100 text-green-600' : 'text-gray-500 hover:bg-gray-100' }}">
                                {{ $page }}
                            </button>
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Page -->
                <button
                    wire:click="nextPage"
                    wire:loading.attr="disabled"
                    class="px-3 h-8 text-green-600 bg-white border border-gray-300 hover:bg-gray-100 {{ !$paginator->hasMorePages() ? 'disabled:text-gray-300 disabled:hover:bg-white' : '' }}"
                    {{ !$paginator->hasMorePages() ? 'disabled' : '' }}>
                    Next &gt;
                </button>

                <!-- Last Page -->
                <button
                    wire:click="gotoPage({{ $paginator->lastPage() }})"
                    wire:loading.attr="disabled"
                    class="px-3 h-8 text-green-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 {{ !$paginator->hasMorePages() ? 'disabled:text-gray-300 disabled:hover:bg-white' : '' }}"
                    {{ !$paginator->hasMorePages() ? 'disabled' : '' }}>
                    Last
                </button>
            </nav>
        @endif
    </div>

    <!-- Rows Per Page -->
    <div class="w-full sm:w-auto flex sm:justify-start justify-center items-center space-x-2">
        <label for="rowsPerPage" class="text-xs text-gray-500 font-semibold">Rows per page:</label>
        <select id="rowsPerPage" name="rowsPerPage" wire:model="rowsPerPage"
                class="w-20 h-8 border border-gray-300 rounded bg-white text-xs text-gray-500">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>

</div>



