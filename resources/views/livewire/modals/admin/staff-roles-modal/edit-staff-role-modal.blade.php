<x-admin.staff-role-modal-content-base modal_name="edit-staff-role-modal">

    <x-slot:trigger>
        <div class="hidden"
             x-on:show-{{ $identifier }}.window="open = true"
        ></div>
    </x-slot:trigger>

    <x-slot:header>
        Edit Staff Role Information
    </x-slot:header>

    <x-slot:body>
        <div class="space-y-4">
            <!-- Role Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" id="name" wire:model="name"
                       class="block w-full px-3 py-2 mt-1 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"/>
                @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status Toggle -->
            <div class="flex items-start w-full sm:text-sm px-1 pt-3 flex-col border-b border-gray-300">

                <!-- Label -->
                <label class="block font-medium text-gray-700 mb-2">Role Status</label>

                <div class="flex items-center justify-between w-full px-2 pb-3">
                    <!-- Status Indicator -->
                    <div class="text-sm font-semibold">
                        <!-- Real-time status display -->
                        <span class="text-sm font-semibold {{ $status ? 'text-green-500' : 'text-red-500' }}">
                            {{ $status ? 'Enabled' : 'Disabled' }}
                        </span>
                    </div>

                    <!-- Toggle Button -->
                    <label class="relative inline-flex items-center cursor-pointer">
                        <!-- Visible Checkbox -->
                        <input type="checkbox" wire:model.live="status" class="sr-only peer">

                        <!-- Background of the Toggle -->
                        <div class="w-10 h-5 bg-red-500 rounded-full transition-colors duration-300 peer-checked:bg-green-500"></div>

                        <!-- Circle inside the Toggle -->
                        <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300 peer-checked:translate-x-5"></div>
                    </label>
                </div>

                <!-- Validation Error -->
                @error('status')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Selected Permissions -->
            <div class="px-3 py-2 text-sm">
                <div class="block font-normal text-gray-700 mb-4 text-sm">
                    Choose the specific capabilities and permissions assigned to this user type.
                </div>

                <!-- Select All Checkbox -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="selectAll" wire:model="selectAllPermissions"
                           wire:change="toggleSelectAllPermissions"
                           class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="selectAll" class="ml-2 text-sm text-gray-700">
                        Select All
                    </label>
                </div>

                <label for="selectedPermissions" class="block font-medium text-gray-700 mb-2 border-b border-gray-300">
                    Permissions
                </label>

                <div class="min-h-[25vh] max-h-[25vh] overflow-y-auto grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2 py-2 px-5">
                    @foreach ($staff_permissions as $id => $label)
                        <div class="flex items-center">
                            <input type="checkbox" id="permission-{{ $id }}"
                                   wire:model="selectedPermissions"
                                   wire:change="togglePermissions"
                                   value="{{ $id }}"
                                   class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <label for="permission-{{ $id }}" class="ml-2 text-sm text-gray-700">
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('selectedPermissions')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

        </div>
    </x-slot:body>

    <x-slot:footer>
        <!-- Action Buttons -->
        <button x-on:click="open = false"
                class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200 transition active:scale-95">
            Cancel
        </button>
        <button wire:click.prevent="save" wire:loading.attr="disabled"
                class="px-4 py-2 bg-[#3AA76F] text-white text-sm rounded hover:bg-[#4AA76F] transition active:scale-95">
            Save Changes
            <x-loading-indicator wire:loading class="h-6 w-6"/>&nbsp;
        </button>


    </x-slot:footer>



</x-admin.staff-role-modal-content-base>

