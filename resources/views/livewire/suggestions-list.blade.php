<div>
    @foreach ($reports as $report)
        <div class="my-3 bg-white w-full md:w-[85%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 pb-4">
            <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-2">
                <h2 class="text-[15px] text-red-500 font-semibold ml-2 text-center">
                    Is this the same as your report now?
                </h2>
            </div>
            <div class="flex flex-col justify-start items-start px-2 py-4">
                <div class="mx-auto w-full mb-4 flex flex-col justify-center items-center">
                    <div class="text-sm font-semibold text-[#4AA76F] text-center mb-2">Captured Road Defect Photo</div>
                    <img src="{{ asset('/storage/output/' . $report->image) }}" alt="Road Defect" class="w-[200px] h-[190px] rounded shadow" />
                </div>
                <div class="w-full ml-4">
                    <div class="text-[13px] md:text-md space-y-2">
                        <div class="flex w-full">
                            <div class="w-4/10 font-medium text-gray-500">Defect Type:</div>
                            <div class="w-6/10 text-customGreen font-semibold">{{ $report->defect }}</div>
                        </div>
                        <div class="flex w-full">
                            <span class="w-4/10 font-medium text-gray-500">Report Count:</span>
                            <span class="w-6/10 text-customGreen font-semibold">{{ $report->match_count }}</span>
                        </div>
                        <div class="flex w-full">
                            <span class="w-4/10 font-medium text-gray-500">Current Status:</span>
                            <span class="w-6/10 text-customGreen font-semibold">{{ $report->status }}</span>
                        </div>
                        <div class="flex w-full">
                            <span class="w-4/10 font-medium text-gray-500">Location:</span>
                            <span class="w-6/10 text-customGreen font-semibold">{{ $report->location }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yes and No Buttons -->
            <div class="flex justify-between items-center mt-4 px-6 space-x-4 mx-auto w-full">
                <button wire:click="confirmMatch({{ $report->id }})" class="w-full bg-customGreen rounded-full text-white inline-flex h-12 items-center justify-center px-4 py-2 font-medium transition active:scale-110 shadow ">
                    Yes
                </button>
                <button wire:click="createNewReport({{ $report->id }})" class="w-full bg-[#FF7070] rounded-full text-white inline-flex h-12 items-center justify-center px-4 py-2 font-medium transition active:scale-110 shadow ">
                    No
                </button>
            </div>
        </div>
    @endforeach
</div>
