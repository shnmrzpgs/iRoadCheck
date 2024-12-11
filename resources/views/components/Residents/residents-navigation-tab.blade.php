@props(['page_title' => '', 'main_class' => ''])

<div class="w-full bg-white py-6">
    <div class="flex overflow-x-auto whitespace-nowrap p-1" style="scrollbar-width: none; -ms-overflow-style: none;">
        <button x-data @click="window.location.href='{{ route('dashboard') }}'" class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-6 shadow-md">
            Dashboard
        </button>
        <button class="px-4 py-1 bg-customGreen text-white text-[14px] border rounded-full ml-2 shadow-md">
            Report Road Issue
        </button>
        <button class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">
            Suggestion Report
        </button>
        <button class="px-4 py-1 bg-white text-[14px] text-customGreen border border-customGreen rounded-full ml-2 shadow-md">
            Report History
        </button>
    </div>
</div>
