<div class="z-50" x-data="{ open: @entangle('isOpen') }">
    <x-admin.crud-modal-content-base modal_name="add-staff-role-modal">

        <x-slot:trigger>
            <button  class="absolute top-2 right-2 text-gray-600 hover:text-red-500 focus:outline-none hover:bg-gray-200 hover:rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot:trigger>

        <x-slot:header>
            Add Staff Role Information
        </x-slot:header>

        <x-slot:body>
            <!-- user Type Input -->
            <div class="px-2">
                <label class="block font-medium text-gray-700">User Type</label>
                <input x-model="formData.userType"
                       type="text"
                       placeholder="Enter user type"
                       class="rounded border border-gray-300 focus:outline-none focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full shadow-sm sm:text-sm">
            </div>

            <!-- Permissions Selection -->
            <div class="px-3 py-2 text-sm">
                <div class="block font-normal text-gray-700 mb-4 text-sm">Choose the specific capabilities and permissions assigned to this user type.</div>
                <label class="block font-medium text-gray-700 mb-2 border-b border-gray-300">Permissions</label>
                <div class="min-h-[25vh] max-h-[25vh] overflow-y-auto grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2 py-2 px-5">
                    <template x-for="permission in permissions" :key="permission.id">
                        <label
                            class="flex items-center space-x-2 transition-all duration-200 hover:text-green-600"
                            :class="{'text-green-600': formData.permissions.includes(permission.id)}"
                        >
                            <input
                                type="checkbox"
                                :value="permission.id"
                                x-model="formData.permissions"
                                class="form-checkbox border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mr-2 rounded text-[#3AA76F]"
                                @change="$el.parentNode.classList.add('scale-105'); setTimeout(() => $el.parentNode.classList.remove('scale-105'), 150)"
                            >
                            <span x-text="permission.name"></span>
                        </label>
                    </template>

                </div>
            </div>
        </x-slot:body>

        <x-slot:footer>
            <!-- Modal Footer -->
            <div class="flex items-center justify-end pb-4 px-4 space-x-4">
                <button @click="showAddModal = false" class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200 transition active:scale-95">
                    Cancel
                </button>
                <button @click="showAddModal = false; openAddSuccessModal = true" class="px-4 py-2 bg-[#3AA76F] text-white text-sm rounded hover:bg-[#4AA76F] transition active:scale-95">
                    Add User
                </button>
            </div>
        </x-slot:footer>

        @script
        <script type="module">
            $wire.on('user_account_added', () => {
                pushNotification('success', 'User Information Added', 'User has been added successfully.');
            });
            $wire.on('user_not_added', () => {
                pushNotification('error', 'Failed to Add User', 'An error occurred while adding the User.');
            });
        </script>
        @endscript

    </x-admin.crud-modal-content-base>
</div>
