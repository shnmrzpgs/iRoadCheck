<x-residents.residents-navigation page_title="Report History" action="{{ route('resident.report-history') }}" placeholder="Search..." name="search" wire:model.live="search">

    <div class="flex justify-center items-center sm:justify-start sm:items-start">

        <x-residents.crud-page-content-base>

            <x-slot:title_page_container>
                <div class="flex justify-start text-lg text-[#4AA76F] mr-4 md:pb-2 font-semibold">Report History</div>
            </x-slot:title_page_container>

            <x-slot:search_container>
                <form class="relative flex flex-1 h-9 rounded-full border-[#F8F7F7]" action="#" method="GET">
                    <svg class="absolute left-1 inset-y-0 w-4 h-full text-gray-400 ml-2 z-10" fill="#4AA76F" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                    <input wire:model.live="search" class="w-full h-full pl-8 py-0 text-sm lg:text-[14px] text-gray-900 placeholder:text-gray-400 bg-white rounded-full border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow"
                           placeholder="Search" type="search">
                </form>
            </x-slot:search_container>

            <x-slot:page_description>
                A list of all your road defect reports history in the iRoadCheck System.
            </x-slot:page_description>

            <x-slot:dropdown_filters_container>
                @include('livewire.modals.resident.filters-report-history')
            </x-slot:dropdown_filters_container>

            <x-slot:action_buttons_container>
            </x-slot:action_buttons_container>


            <x-slot:table_container wire:key="reports-table-{{ now() }}">
                <div class="inline-block w-full h-[48vh] overflow-y-auto align-middle drop-shadow rounded-b-md">
                    <table class="w-full text-left divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('id')">
                                        No.
                                        <div x-cloak x-show="$wire.sort_by === 'id'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('defect')">
                                        Type of Road Defect
                                        <div x-cloak x-show="$wire.sort_by === 'defect'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('barangay')">
                                        Barangay
                                        <div x-cloak x-show="$wire.sort_by === 'barangay'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('date')">
                                        Date
                                        <div x-cloak x-show="$wire.sort_by === 'date'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th scope="col" class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">
                                    <button class="flex items-end" wire:click="toggleSorting('status')">
                                        Status
                                        <div x-cloak x-show="$wire.sort_by === 'status'">
                                            <x-arrow-up x-cloak x-show="$wire.sort_direction === 'asc'" />
                                            <x-arrow-down x-cloak x-show="$wire.sort_direction === 'desc'" />
                                        </div>
                                    </button>
                                </th>
                                <th class="sticky top-0 z-10 bg-white py-3 px-2 text-xs font-semibold text-[#757575]">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-white relative">
                            @forelse ($reports as $report)
                            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
                                <td class="px-2 py-3 text-[11px] lg:text-xs">
                                    {{ $sort_direction === 'asc'
                                        ? ($reports->firstItem() + $loop->index)
                                        : ($reports->total() - $reports->firstItem() - $loop->index + 1)
                                    }}
                                </td>
                                <td class="px-2 py-3 text-[11px] lg:text-xs">{{ $report->defect ?? 'N/A' }}</td>
                                <td class="px-2 py-3 text-[11px] lg:text-xs">{{ $report->street }}, {{ $report->purok }}, {{ $report->barangay }}</td>
                                <td class="px-2 py-3 text-[11px] lg:text-xs">{{ $report->date ? \Carbon\Carbon::parse($report->date)->format('F j, Y'): 'N/A' }}</td>
                                <td class="px-2 py-3 text-[11px] lg:text-xs font-medium
                                    {{ $report->status === 'Repaired' ? 'text-green-600' : '' }}
                                    {{ $report->status === 'Ongoing' ? 'text-yellow-500' : '' }}
                                    {{ $report->status === 'Unfixed' ? 'text-red-600' : '' }}">
                                    {{ ucfirst($report->status ?? 'N/A') }}
                                </td>
                                <td class="px-2 py-3 text-[11px] lg:text-xs">
                                    <div class="flex">
                                        <button class="flex items-center text-[#3251FF] hover:text-[#1d3fcc] font-medium text-xs transition active:scale-95 hover:bg-blue-100 hover:shadow py-1 px-3 rounded-md"
                                            wire:click="viewHistoryReports({{ $report->id }})"
                                            wire:loading.attr="disabled"
                                            x-data="{ loading: false }"
                                            x-on:click="loading = true"
                                            x-on:view-report-history-modal-shown.window="loading = false">
                                            <img src="{{ asset('storage/icons/view-icon.png') }}" alt="View Icon" class="hidden md:block w-5 h-5 mr-2" />
                                            <span x-cloak x-show="! loading">View</span>
                                            <x-loading-indicator class="text-blue-500 w-4 h-4"
                                                x-cloak x-show="loading" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-2 py-2 text-center text-gray-500">
                                    No reports found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Loading indicator for pagination -->
                <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition
                    class="absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
                    <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading />
                </div>

            </x-slot:table_container>

            <x-slot:pagination_container wire:key="{{ now() }}">
                {{ $reports->links('vendor.pagination.custom') }}
            </x-slot:pagination_container>

            <x-slot:modal_container>

                <!-- View Resident Modal -->
                <livewire:modals.resident.view-report-history-modal
                    wire:model="history_report_to_viewed" />

            </x-slot:modal_container>

        </x-residents.crud-page-content-base>
    </div>

</x-residents.residents-navigation>
