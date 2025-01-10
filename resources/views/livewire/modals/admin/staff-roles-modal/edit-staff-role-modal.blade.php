<x-admin.crud-modal-content-base modal_name="edit-staff-role-modal">

    <x-slot:trigger>
        <div class="hidden"
             x-on:show-{{ $identifier }}.window="open = true"
        ></div>
    </x-slot:trigger>

    <x-slot:header>
        Edit Staff Role Information
    </x-slot:header>

    <x-slot:body>
        @if($staffRole)
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                    <input type="text" id="name" wire:model.defer="form.name"
                           class="block w-full px-3 py-2 mt-1 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('form.name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="px-3 py-2 text-sm">
                    <div class="block font-normal text-gray-700 mb-4 text-sm">Choose the specific capabilities and permissions assigned to this user type.</div>
                    <label class="block font-medium text-gray-700 mb-2 border-b border-gray-300">Permissions</label>
                    <div class="min-h-[25vh] max-h-[25vh] overflow-y-auto grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2 py-2 px-5">
                        @if( $staff_permissions && $staff_permissions->isNotEmpty())
                            @foreach ( $staff_permissions as $staff_permission)
                                <div class="flex items-center">
                                    <input type="checkbox" id="permission-{{ $staff_permission->id }}"
                                           wire:model="selectedPermissions"
                                           value="{{ $staff_permission->id }}"
                                           class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    <label for="permission-{{ $staff_permission->id }}" class="ml-2 text-sm text-gray-700">
                                        {{ $staff_permission->label }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-500">No permissions available.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </x-slot:body>

    <x-slot:footer>
        <!-- Modal Footer -->
        <div class="flex items-center justify-end pb-4 px-4 space-x-4">
            <button x-on:click="open = false"
                    x-on:staffRole_updated.window="open = false"
                    class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200 transition active:scale-95">
                Cancel
            </button>
            <button wire:click.prevent="save" wire:loading.attr="disabled"
                    class="px-4 py-2 bg-[#3AA76F] text-white text-sm rounded hover:bg-[#4AA76F] transition active:scale-95">
                Save Changes
                <x-loading-indicator wire:loading class="h-6 w-6"/>&nbsp;
            </button>
        </div>
    </x-slot:footer>

    @script
    <script type="module">
        $wire.on('staffRole_updated', () => {
            pushNotification('success', 'Staff Role Information Updated', 'Staff Role has been updated successfully.');
        });
        $wire.on('staffRole_not_updated', () => {
            pushNotification('error', 'Failed to Update Staff Role', 'An error occurred while updating the Staff Role.');
        });
    </script>
    @endscript

</x-admin.crud-modal-content-base>

