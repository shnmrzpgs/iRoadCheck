<x-admin.crud-modal-content-base modal_name="view-staff-role-modal">

    <x-slot:trigger>
        <div class="hidden"
             x-on:show-{{ $identifier }}.window="open = true"
        ></div>
    </x-slot:trigger>

    <x-slot:header>
        View Staff Role Information
    </x-slot:header>

    <x-slot:body>
        @if($staffRole)
            <div class="mt-4 mx-4 grid grid-cols-1">
                <!-- staff Role Details Section -->
                <div class="mb-2 w-full lg:pr-4">
                    <h3 class="text-[16px] text-gray-600 font-semibold mb-2 border-b border-[#757575]">Staff Role Details</h3>
                    <div class="text-gray-300 text-[14px] mt-4">
                        <div class="flex mb-2">
                            <div class="text-gray-600 font-semibold w-4/10">Role Name:</div>
                            <div class="text-gray-600 w-6/10">
                                {{ ucfirst($staffRole->name) }}
                            </div>
                        </div>
                        <div class="flex mb-2">
                            <div class="text-gray-600 font-semibold w-4/10">Status:</div>
                            <div class="text-gray-600 w-6/10">
                                {{ ucfirst($staffRole->status)}}
                            </div>
                        </div>
                        <div class="flex flex-col mb-2">
                            <div class="text-gray-600 font-semibold w-full">Permissions:</div>
                            <div
                                class="min-h-[15vh] max-h-[25vh] overflow-y-auto mt-2 py-2 px-5"
                                style="{{ $staffRole->permissions->count() > 5 ? 'display: flex; flex-wrap: wrap;' : 'display: flex; flex-direction: column;' }}"
                            >
                                @foreach($staffRole->permissions as $permission)
                                    <div
                                        class="text-gray-600 text-[13px] {{ $staffRole->permissions->count() > 5 ? 'w-1/2' : 'w-full' }} mb-2"
                                    >
                                        <li>{{ ucfirst($permission->label) }}</li>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Additional Section -->
            <div class="mt-3 grid grid-cols-1">
                <div class="mb-4 w-full lg:px-2">
                    <h3 class="text-[16px] text-gray-600 font-semibold mb-2 border-b border-gray-600">Additional Information</h3>
                    <div class="text-gray-300 text-[14px] mt-4">
                        <div class="flex mb-2">
                            <div class="text-gray-600 font-semibold w-4/10">Date Created:</div>
                            <div class="text-gray-600 w-6/10">
                                {{ $staffRole->created_at->format('F j, Y') }}
                            </div>
                        </div>
                        <div class="flex mb-2">
                            <div class="text-gray-600 font-semibold w-4/10">Last Updated:</div>
                            <div class="text-gray-600 w-6/10">
                                {{ $staffRole->updated_at->format('F j, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot:body>

    <x-slot:footer>
        <!-- Optional Footer (add buttons if needed) -->
    </x-slot:footer>

</x-admin.crud-modal-content-base>

