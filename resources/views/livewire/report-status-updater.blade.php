<div>
    <!-- Status Filter -->
    <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">
        Update Road Status Report:
    </div>

    <!-- Status Dropdown -->
    <div class="relative flex items-center rounded-[4px] border transition-all duration-100 custom-select"
         :class="{
             'bg-green-50 text-[#4D4F50] border-[#4AA76F] active': newStatus !== '',  /* Active state */
             'text-gray-600 border-gray-300 hover:border-[#4AA76F]': newStatus === ''  /* Default and hover state */
         }">

        <!-- Status Color Indicator -->
        <span :style="{ backgroundColor: getStatusColor(newStatus || selectedReport.status) }" class="w-3 h-3 rounded-full ml-2"></span>

        <!-- Dropdown -->
        <select x-model="newStatus"
                wire:model="newStatus"
                class="text-[14px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
            <!-- Display the current status or placeholder -->
            <option value="" class="text-gray-400 text-[12px]" x-text="newStatus || selectedReport.status || 'Select Status'"></option>

            <!-- Dynamically loop through the statuses array -->
            <template x-for="status in statuses" :key="status">
                <option :value="status" :selected="selectedReport.status === status" class="text-gray-700">
                    <span x-text="status"></span>
                </option>
            </template>
        </select>
    </div>

    <!-- Update Report Status -->
    <div class="flex justify-center items-center mt-10">
        <button wire:click="updateReportStatus"
                class="relative w-auto gap-x-[8px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#3AA76F] hover:shadow-md">
            <span class="mt-[2px] px-2 text-[14px]">Update Report</span>
        </button>
    </div>

    <!-- Success/Error Notifications -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif
</div>
