<div
    x-data="{
        isOpen: @entangle('isOpen'),
        selectedStatus: '',
        canSubmit() {
            return $wire.selectedReports.length > 0 && this.selectedStatus !== '';
        },
        showAlert: @entangle('showAlert'),
        alertMessage: @entangle('alertMessage'),
    }"
    x-show="isOpen"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
    x-cloak
    style="display: none;"
>
    <div class="bg-white w-9/10 max-w-3xl p-4 rounded-lg shadow-lg relative overflow-y-auto max-h-[90vh]">
        <!-- Close Button -->
        <button @click="isOpen = false" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 text-lg">
            &times;
        </button>

        <!-- ✅ Alert Message -->
        <div
            x-show="showAlert"
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 py-2 rounded-md shadow-lg"
            x-transition
        >
            <span x-text="alertMessage"></span>
            <button @click="showAlert = false" class="ml-2 text-white font-bold">&times;</button>
        </div>




        <!-- Check if there are nearby reports -->
        @if ($nearbyReports && count($nearbyReports) > 0)
            <!-- Modal Title -->
            <div class="sticky top-[-20px] bg-white p-4 shadow-md z-10 text-center">
                <h1 class="text-lg font-bold text-black">Nearby Reports Found!</h1>
                <p class="text-sm text-gray-700 mt-1" x-text="'Images selected: ' + $wire.selectedReports.length"></p>
            </div>

            <div class="grid grid-cols-2 gap-4 justify-center">
                @foreach ($nearbyReports as $report)
                    <div
                        class="border rounded-md p-2 flex flex-col items-center cursor-pointer transition-transform transform hover:scale-100"
                        :class="$wire.selectedReports.includes({{ $report->id }}) ? 'border-green-600 bg-green-100' : 'border-gray-300'"
                        @click="$wire.selectedReports.includes({{ $report->id }})
                ? $wire.selectedReports = $wire.selectedReports.filter(id => id !== {{ $report->id }})
                : $wire.selectedReports.push({{ $report->id }})"
                    >
                        <img src="{{ asset('storage/' . $report->image_annotated) }}"
                             alt="Report Image"
                             class="w-full max-h-64 h-auto object-contain rounded-md mb-1">

                        <p class="text-black text-center text-xs"><strong>ID:</strong> {{ $report->id }}</p>
                        <p class="text-black text-center text-xs"><strong>Date:</strong> {{ \Carbon\Carbon::parse($report->date)->format('F d, Y') }}</p>
                        <p class="text-xs text-gray-500 text-center">Click to select</p>
                    </div>
                @endforeach
            </div>


            <!-- Action Buttons with Status Dropdown -->
            <div class="mt-4 flex flex-col items-center gap-3 sticky bottom-[-21px] bg-white p-4 shadow-md">
                <!-- Status Dropdown -->
                <div class="flex items-center space-x-2">
                    <label for="status" class="text-sm font-semibold text-gray-700">Status:</label>
                    <select
                        x-model="selectedStatus"
                        id="status"
                        class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-green-500 focus:outline-none"
                    >
                        <option value="" disabled hidden selected>Select Status</option>
                        <option value="Fixed">Fixed</option>
                        <option value="Ongoing">Ongoing</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex gap-2">
                    <!-- Update Button -->
                    <button
                        wire:click="updateDefects(selectedStatus)"
                        class="px-4 py-2 bg-green-600 text-white rounded-md text-sm hover:bg-green-700 disabled:bg-gray-400 disabled:cursor-not-allowed flex items-center justify-center"
                        :disabled="!canSubmit()"
                    >
                        <span wire:loading.remove class="flex items-center">Update Defects</span>

                        <span wire:loading class="flex items-center">
{{--            <svg class="animate-spin h-2 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">--}}
                            {{--                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>--}}
                            {{--                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 018 8h-4l3.5 3.5L20 12h-4a8 8 0 01-8 8v-4l-3.5 3.5L12 20v-4a8 8 0 01-8-8h4z"></path>--}}
                            {{--            </svg>--}}
            Processing...
        </span>
                    </button>

                    <!-- Close Button -->
                    <button wire:click="closeModal" class="px-4 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700">
                        No
                    </button>
                </div>

            </div>

        @else
            <div class="text-center">
                <h1 class="text-lg font-bold text-center mb-4 text-black sticky top-[-20px] bg-white p-4 shadow-md z-10">
                    No nearby reports!
                </h1>
                <button @click="retryCapture()" wire:click="closeModal" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                    Retry
                </button>
                <button wire:click="closeModal" class="px-4  py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700">
                    No
                </button>
            </div>

        @endif


        <!-- Loading indicator -->
        <div wire:loading.class.remove="opacity-0 pointer-events-none" x-cloak x-transition loading="lazy"
             class="z-50 absolute inset-0 w-full min-h-full bg-black/50 flex justify-center items-center transition-all pointer-events-none opacity-0">
            <x-loading-indicator class="h-[50px] w-[50px] text-white" wire:loading/>
        </div>
    </div>

</div>
