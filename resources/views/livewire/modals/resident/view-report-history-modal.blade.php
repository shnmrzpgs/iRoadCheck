@php use App\Models\User; @endphp
<div x-data="{ open: false, image: '{{ $image }}' }">
    <x-residents.crud-modal-content-base modal_name="view-report-history-modal">

        <x-slot:trigger>
            <div x-on:view-report-history-modal-shown.window="open = true"></div>
        </x-slot:trigger>

        <x-slot:header>
            View Report Details
        </x-slot:header>

        <x-slot:body>
            @if($report)
                <!-- Body -->
                <div class="h-[70vh] overflow-y-auto pl-2 space-y-4 mb-2">
                    <!-- Captured Road Photo -->
                    <div class="text-center text-xs -ml-3 flex flex-col justify-center items-center mb-3">
                        <span class="font-semibold text-gray-700">Actual Captured Road Photo</span>
                        <img src="{{ $image }}" alt="Road Defect" class="w-[80%] h-[220px]" />
                    </div>

                    <!-- Type of Defect -->
                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Type of Defect:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">{{ $report->defect }}</div>
                    </div>

                    <!-- Report ID -->
                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Report ID:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">{{ $report->id }}</div>
                    </div>

                    <!-- Date and Time -->
                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Date Reported:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">
                            @if($report->date)
                                {{ \Carbon\Carbon::parse($report->date)->format('F j, Y') }}
                            @elseif($report->created_at)
                                {{ $report->created_at->format('F j, Y') }}
                            @else
                                N/A
                            @endif
                        </div>
                    </div>

                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Time Reported:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">
                            @if($report->time)
                                {{ \Carbon\Carbon::parse($report->time)->format('h:i:s A') }}
                            @elseif($report->created_at)
                                {{ $report->created_at->format('h:i:s A') }}
                            @else
                                N/A
                            @endif
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Location:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">{{ $report->location }}</div>
                    </div>

                    <!-- Status -->
                    <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                        <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Status:</div>
                        <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold
                        {{ $report->status === 'Repaired' ? 'text-green-600' : '' }}
                        {{ $report->status === 'Ongoing' ? 'text-yellow-500' : '' }}
                        {{ $report->status === 'Unfixed' ? 'text-red-600' : '' }}">
                            {{ $report->status }}
                        </div>
                    </div>

                    <!-- Coordinates -->
                    @if($report->lng && $report->lat)
                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Coordinates:</div>
                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">
                                {{ $report->lat }}, {{ $report->lng }}
                            </div>
                        </div>
                    @endif

                    <!-- Repaired Section -->
                    @if($report->status === 'Repaired')
                        <hr class="my-2 border-t" />

                        <div class="text-center text-xs flex flex-col justify-center items-center mb-3">
                            <span class="font-semibold text-gray-700">Updated Road Photo</span>
                            <img src="{{ asset('storage/' . $report->updated_image) }}" alt="Updated Road" class="w-[80%] h-[220px] mt-2" />
                        </div>

                        <div class="text-xs lg:text-sm flex justify-start items-start w-full">
                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Updated by :</div>
                            @php
                                $updater = $report->updater_id ? User::find($report->updater_id) : null;
                            @endphp

                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">
                                @if($updater)
                                    {{ Crypt::decryptString($updater->first_name) }} {{ Crypt::decryptString($updater->last_name) }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>

                        <!-- Updated On -->
                        <div class="text-xs lg:text-sm flex justify-start items-start w-full mt-2">
                            <div class="w-2/4 md:w-1/4 lg:w-2/5 text-gray-600">Updated On:</div>
                            <div class="w-2/4 md:w-3/4 lg:w-3/5 font-semibold">
                                @if($report->updated_on)
                                    {{ \Carbon\Carbon::parse($report->updated_on)->format('F j, Y') }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            @endif
        </x-slot:body>


        <x-slot:footer>
        </x-slot:footer>

    </x-residents.crud-modal-content-base>
</div>
