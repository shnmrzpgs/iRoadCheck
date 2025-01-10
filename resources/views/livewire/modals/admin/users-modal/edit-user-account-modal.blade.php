<div class="z-50"
    x-data="{
        tabs: @js($tabs),
        activeTab: @entangle('activeTab'),
        visitedTabs: @entangle('visitedTabs'),
        isPasswordVisible: false,
        form: {
            password: @entangle('form.password'),
        },
        generatePassword() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
            const length = 12;
            let password = '';
            for (let i = 0; i < length; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            this.form.password = password;
        },
        isOpen: false,
    }">
    <x-admin.crud-modal-content-base modal_name="edit-user-account-modal">

        <x-slot:trigger>
            <div class="hidden"
                x-on:show-{{ $identifier }}.window="open = true"></div>
        </x-slot:trigger>

        <x-slot:header>
            Edit Staff Information
        </x-slot:header>

        <x-slot:body>
            @if($staff)
            <div>
                <!-- Profile Picture Section -->
                <div class="flex mb-5">
                    <!-- Profile Picture -->
                    <div class="relative h-16 w-16 flex-shrink-0 -mt-2">
                        <img
                            src="{{ $photo ? $photo->temporaryUrl() : ($currentPhoto ?? asset('storage/icons/profile-graphics.png')) }}"
                            alt="Profile Image"
                            class="h-16 w-16 rounded-full bg-gradient-to-r from-blue-500 to-green-500 p-[1px]" />
                        <label for="upload-photo" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full cursor-pointer text-white text-xs hover:bg-opacity-60">
                            Upload
                            <input
                                id="upload-photo"
                                type="file"
                                class="hidden"
                                wire:model="photo" />
                        </label>
                    </div>

                    @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror


                    <!-- Full Name and Email Preview -->
                    <div class="pl-4">
                        <div class="block text-lg font-medium text-gray-700">
                            {{ trim(($form->first_name ?? '') . ' ' . ($form->middle_name ?? '') . ' ' . ($form->last_name ?? '')) ?: 'Full Name Preview' }}
                        </div>
                        <div class="block text-xs font-normal text-gray-700 italic">
                            {{ !empty($form->email) ? $form->email : 'Email Preview' }}
                        </div>
                    </div>
                </div>

                <!-- Tab Navigation -->
                <div class="flex text-xs mb-4">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <div class="flex items-center space-x-1 mr-6">
                            <!-- Tab Indicator (Number or Check Icon) -->
                            <div
                                class="flex items-center justify-center h-6 w-6 rounded-full p-[1px] font-medium"
                                :class="visitedTabs.includes(tab.key)
                                    ? 'bg-gradient-to-r from-blue-500 to-green-500'
                                    : 'bg-gray-400'">
                                <span class="text-white">
                                    <template x-if="visitedTabs.includes(tab.key)">
                                        <span class="text-sm">&#10003;</span>
                                    </template>
                                    <template x-if="!visitedTabs.includes(tab.key)">
                                        <span x-text="index + 1"></span>
                                    </template>
                                </span>
                            </div>
                            <!-- Tab Label -->
                            <div class="relative">
                                <button
                                    class="text-xs font-medium relative z-10"
                                    :class="activeTab === tab.key
                                        ? 'text-[#676767] font-semibold'
                                        : 'text-gray-400' && visitedTabs.includes(tab.key)
                                        ? 'text-green-600'
                                        : 'text-gray-400'"
                                    @click="$wire.activateTab(tab.key)">
                                    <span x-text="tab.label"></span>
                                </button>
                                <!-- Highlight Line -->
                                <span
                                    class="absolute left-0 right-0 bottom-[-2px] h-[3px] bg-[#4AA76F] rounded-full transition-all duration-300"
                                    x-show="activeTab === tab.key"
                                    x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-1"
                                    x-transition:enter-start="opacity-0 transform translate-y-1"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-200 transform opacity-100 translate-y-0"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform translate-y-1">
                                </span>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="mt-6">

                    <!-- Basic Info Tab -->
                    @if($activeTab === 'basic-info')
                    <div wire:submit.prevent="save" class="space-y-6">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block font-medium text-gray-700">First Name</label>
                                <input wire:model.defer="form.first_name"
                                    placeholder="First name" ft6cf7
                                    type="text"
                                    class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                @error('form.first_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block font-medium text-gray-700">Middle Name</label>
                                <input wire:model.defer="form.middle_name"
                                    placeholder="Middle name"
                                    type="text"
                                    class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                            </div>
                            <div>
                                <label class="block font-medium text-gray-700">Last Name</label>
                                <input wire:model.defer="form.last_name"
                                    placeholder="Last name"
                                    type="text"
                                    class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                @error('form.last_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                           
                        </div>

                        <!-- Sex and Email -->
                        <div class="flex space-x-4 grid grid-cols-2">
                            <div>
                                <label class="block font-medium text-gray-700">Sex</label>
                                <select wire:model.defer="form.sex"
                                    class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize"
                                    aria-describedby="sexError">
                                    <option value="">Select Sex</option>
                                    @foreach($sexes as $sex)
                                    <option value="{{ $sex->id }}">{{ $sex->value }}</option>
                                    @endforeach
                                </select>
                                @error('form.sex')
                                <span id="sexError" class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div x-data="{ date: '' }" class="relative">
                                <label class="block font-medium text-gray-700">Date of Birth</label>
                                <div class="relative">
                                    <input x-model="date"
                                        x-init="flatpickr($refs.input, { 
                                            dateFormat: 'Y-m-d',
                                            allowInput: true,
                                        })"
                                        type="date"
                                        x-ref="input"
                                        wire:model.defer="form.date_of_birth"
                                        class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm pr-10"
                                        placeholder="Select a date"
                                        aria-describedby="dobError">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 10h10m2-7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('form.date_of_birth')
                                <span id="dobError" class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    @endif

                    <!-- Access Control Tab -->
                    @if($activeTab === 'access-info')
                    <div>
                        <label class="block font-medium text-gray-700">User Role</label>
                        <select wire:model="form.user_role"
                            class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] text-gray-700 block w-full rounded-sm shadow-sm">
                            <option value="" selected>Select User Role</option>

                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mt-4">Permissions</label>
                        <ul class="list-disc pl-6 mt-2">
                            @forelse($selectedPermissions as $permission)
                            <li>{{ ucwords(str_replace('_', ' ', $permission)) }}</li>
                            @empty
                            <li>No permissions assigned for this role.</li>
                            @endforelse
                        </ul>
                    </div>
                    @endif


                    <!-- Account Info Tab -->
                    @if($activeTab === 'account-info')
                    <div class="min-h-[35vh] max-h-[35vh] overflow-y-auto bg-[#FBFBFB] shadow px-3 py-4 text-xs">
                        <!-- Account Status -->
                        <div class="mb-6 border-b border-gray-300">
                            <label class="block font-medium text-gray-700 mb-1">Account Status</label>
                            @if(isset($formData['is_disabled']) && $formData['is_disabled'])
                            <div class="flex items-center justify-between w-full sm:text-sm p-2 space-x-24">
                                <div class="text-sm font-semibold text-red-500">
                                    Disabled
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="form.is_disabled" class="sr-only">
                                    <div class="w-10 h-5 bg-red-500 rounded-full transition-colors duration-300"></div>
                                    <div class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300 -translate-x-5"></div>
                                </label>
                            </div>
                            @else
                            <div class="flex items-center justify-between w-full sm:text-sm p-2 space-x-24">
                                <div class="text-sm font-semibold text-green-500">
                                    Enabled
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="form.is_disabled" class="sr-only">
                                    <div class="w-10 h-5 bg-green-500 rounded-full transition-colors duration-300"></div>
                                    <div class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300"></div>
                                </label>
                            </div>
                            @endif
                        </div>


                        <div>
                            <label class="block font-medium text-gray-700">Email Address</label>
                            <input wire:model.defer="form.email"
                                placeholder="Email address"
                                type="email"
                                class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm">
                            @error('form.email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Password Field with Toggle Visibility -->
                        <div class="relative mt-6">
                            <label class="block text-sm font-medium text-gray-700 text-xs">New Password</label>
                            <div class="flex space-x-4">
                                <div>
                                    <input
                                        :type="isPasswordVisible ? 'text' : 'password'"
                                        wire:model="form.password"
                                        placeholder="Generated password will appear here"
                                        readonly
                                        class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm bg-gray-100 pr-10">
                                    <!-- Eye Icon for Toggling -->
                                    <button
                                        type="button"
                                        @click="isPasswordVisible = !isPasswordVisible"
                                        class="float-right -mt-7 mr-2 text-gray-500 hover:text-gray-700">
                                        <span x-show="!isPasswordVisible">
                                            <!-- Closed Eye Icon -->
                                            <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                <defs>
                                                    <clipPath id="f7a7acdade">
                                                        <path d="M 11 71 L 364 71 L 364 324.042969 L 11 324.042969 Z M 11 71 " clip-rule="nonzero" />
                                                    </clipPath>
                                                </defs>
                                                <g clip-path="url(#f7a7acdade)">
                                                    ... </g>
                                            </svg>
                                        </span>
                                        <span x-show="isPasswordVisible" style="display: none;">
                                            <!-- Open Eye Icon -->
                                            <svg class="w-5 h-5 text-gray-600 hover:text-gray-700 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" viewBox="0 0 375 374.999991" preserveAspectRatio="xMidYMid meet" version="1.0">
                                                <defs>
                                                    <clipPath id="1f8a6b186c">
                                                        <path d="M 6 78.503906 L 369 78.503906 L 369 315.503906 L 6 315.503906 Z M 6 78.503906 " clip-rule="nonzero" />
                                                    </clipPath>
                                                </defs>
                                                <g clip-path="url(#1f8a6b186c)">
                                                    ...                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>

                                <!-- Generate Password Button -->
                                <div class="mt-2">
                                    <button
                                        @click="generatePassword()"
                                        class="px-4 py-2 text-[#4AA76F] rounded-full border border-[#4AA76F]  bg-[#4AA76F] bg-opacity-5 hover:bg-[#3AA76F] hover:bg-opacity-10 text-xs transition-all active:translate-y-[2px] active:shadow-none">
                                        Generate Password
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            @endif
        </x-slot:body>


        <x-slot:footer>


            <!-- Buttons -->
            <div x-data="{ isOpen: false }" class="flex justify-between mt-6">
                <!-- Left Side Buttons -->
                <div class="flex space-x-4">
                    <!-- Back Button -->
                    <button
                        type="button"
                        wire:click="previousTab"
                        class="flex items-center px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200 transition active:scale-95"
                        x-show="tabs.findIndex(tab => tab.key === activeTab) > 0">
                        <!-- Back Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="ml-2">Back</span>
                    </button>
                    <div>
                        <div class="alert"
                            :class="{primary:'alter-primary', success:'alert-success', danger:'alert-danger', warning:'alter-warning'}[(alert.type ?? 'primary')]"
                            x-data="{ open:false, alert:{} }"
                            x-show="open" x-cloak
                            x-transition:enter="animate-alert-show"
                            x-transition:leave="animate-alert-hide"
                            @alert.window="open = true; setTimeout( () => open=false, 3000 ); alert=$event.detail[0]">
                            <div class="alert-wrapper">
                                <strong x-html="alert.title">Title</strong>
                                <p x-html="alert.message">Description</p>
                            </div>
                            <i class="alert-close fa-solid fa-xmark" @click="open=false"></i>
                        </div>
                        <!-- Edit user Button -->
                        <button
                            type="button"
                            wire:click="save"
                            class="px-4 py-2 bg-gradient-to-b from-[#84D689] to-green-500 text-white text-sm rounded hover:bg-[#4AA76F] shadow-lg shadow-neutral-500/20 transition active:scale-95 hover:scale-105"
                            x-show="tabs.findIndex(tab => tab.key === activeTab) === tabs.length - 1">
                            Edit Staff
                        </button>
                    </div>
                </div>
                <script>
                    document.addEventListener('livewire.initialized', () => {
                        let obj = @json(session('alert') ?? []);
                        if (Object.keys(obj).length) {
                            Livewire.dispatch('alert', [obj])
                        }
                    })
                </script>

                <!-- Next Button -->
                <button
                    type="button"
                    wire:click="nextTab"
                    class="flex items-center px-4 py-2 bg-[#3AA76F] text-white text-sm rounded hover:bg-[#4AA76F] transition active:scale-95"
                    x-show="tabs.findIndex(tab => tab.key === activeTab) < tabs.length - 1">
                    <span class="mr-2">Next</span>
                    <!-- Next Arrow Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

        </x-slot:footer>
        <!-- Success Modal -->
        <div x-show="isOpen" x-transition.opacity class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-md w-96 p-6">
                <div class="text-center">
                    <h2 class="text-green-500 text-lg font-bold">SUCCESS</h2>
                    <div class="mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-6.219-8.56M12 2a9 9 0 00-6.219 15.56M21 12a9 9 0 11-6.219-8.56" />
                        </svg>
                    </div>
                    <p class="mt-4 text-gray-600">Staff Account updated successfully!</p>
                    <button @click="isOpen = false" class="mt-6 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                        Close
                    </button>
                </div>
            </div>
        </div>
        <!-- Livewire Script -->
        <script>
            Livewire.on('userUpdated', () => console.log('userUpdated event detected'));
            document.addEventListener('livewire:load', () => {
                Livewire.on('userUpdated', () => {
                    const modal = document.querySelector('[x-data]');
                    if (modal && modal.__x) {
                        modal.__x.$data.isOpen = true;
                    } else {
                        console.error("Modal instance not found or Alpine.js is not properly initialized.");
                    }
                });
            });
        </script>
        <script>
            Livewire.on('reload-page', () => {
                window.location.reload();
            });
        </script>

        @script
        <script type="module">
            $wire.on('user_account_updated', () => {
                pushNotification('success', 'User Information updated', 'User has been updated successfully.');
            });
            $wire.on('user_not_updated', () => {
                pushNotification('error', 'Failed to Update User', 'An error occurred while updating the User.');
            });
        </script>
        @endscript

    </x-admin.crud-modal-content-base>
</div>