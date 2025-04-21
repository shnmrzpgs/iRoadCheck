<div
    x-data="{ isOpen: @entangle('isOpen') }"
    x-show="isOpen"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
    x-cloak
    style="display: none;"
>
    <div class="bg-white w-9/10 max-w-md p-6 rounded-lg shadow-lg relative">
        <!-- Close Button -->
        <button @click="isOpen = false" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
            &times;
        </button>

        <!-- Modal Content -->

        <h1 class=" text-xl font-bold mb-4 text-center text-black">Defect Found!</h1>


        @if ($report)
            <img src="{{ asset('storage/' . $report->image_annotated) }}" alt="Report Image" class="w-full rounded-lg mb-4">
            <h2 class=" font-bold mb-4 text-black">Report Details</h2>
            <p class="text-black"><strong>Defect:</strong> {{ $report->defect }}</p>
            <p class="text-black"><strong>Location:</strong> {{ $report->location }}</p>
            <p class="text-black"><strong>Date:</strong> {{ \Carbon\Carbon::parse($report->date)->format('F d, Y') }}</p>
            <p class="text-black"><strong>Time:</strong> {{ \Carbon\Carbon::parse($report->time)->format('h:i A') }}</p>


        @else
            <p class="text-gray-500">No report found.</p>
        @endif

        <!-- Buttons -->
        <div class="mt-4 flex justify-between">
            <button wire:click="submitReport" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Submit Report
            </button>
            <button @click="retryCapture()" wire:click="closeModal" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                Retry
            </button>
            <button wire:click="closeModal" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                No
            </button>
        </div>
    </div>
</div>
