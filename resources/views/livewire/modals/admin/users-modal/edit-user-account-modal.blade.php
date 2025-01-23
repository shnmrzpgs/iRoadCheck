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
                x-on:edit-user-account-modal-shown.window="open = true"></div>
        </x-slot:trigger>

        <x-slot:header>
            Edit Staff Information
        </x-slot:header>

        <x-slot:body>
            @if($staff)
            <div>
                <div class="relative  w-full">
                    <!--image bg-->
                    <div class="relative overflow-hidden shadow w-full h-[75px]">
                        <img src="{{ asset('storage/images/bg-profileName.png') }}" alt="profile name background"
                            class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                    </div>

                    <!-- Profile Picture Section -->
                    <div class="flex items-center space-x-4 -mt-16 pl-6 mb-6">
                        <!-- Profile Picture -->
                        <div class="relative h-16 w-16 flex-shrink-0 -mt-1">
                            <img
                                src="{{ $photo ? $photo->temporaryUrl() : ($currentPhoto ?? asset('storage/icons/profile-graphics.png')) }}"
                                alt="Profile Image"
                                class="h-16 w-16 rounded-full object-cover bg-gradient-to-r from-blue-500 to-green-500 p-[1px]" />

                            <label for="photo-{{ $staff->id }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full cursor-pointer text-white text-xs hover:bg-opacity-60">
                                Upload
                                <input
                                    id="photo-{{ $staff->id }}"
                                    type="file"
                                    class="hidden"
                                    wire:model="photo"
                                    accept="image/*" />
                            </label>
                        </div>
                        @if($photo)
                        <div class="ml-3 flex items-center">
                            <button type="button" wire:click="resetPhoto" class="text-sm text-red-500 hover:text-red-700">
                                Cancel
                            </button>
                        </div>
                        @endif
                        @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror


                        <!-- Full Name and Email Preview -->
                        <div class="pl-2 z-50 -mt-4 capitalize">
                            <div class="block text-lg font-medium text-gray-700">
                                {{ trim(($form['first_name'] ?? '') . ' ' . ($form['middle_name'] ?? '') . ' ' . ($form['last_name'] ?? '')) ?: $staff->user->first_name . ' ' . $staff->user->last_name }}
                            </div>
                            <div class="block text-xs font-normal text-gray-700 italic">
                                {{ !empty($form['username']) ? $form['username'] : $staff->username }}
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
                                    <input wire:model.live="form.first_name"
                                        placeholder="First name" ft6cf7
                                        type="text"
                                        oninput="capitalizeInput(this)"
                                        class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                    @error('form.first_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-medium text-gray-700">Middle Name</label>
                                    <input wire:model.live="form.middle_name"
                                        placeholder="Middle name"
                                        type="text"
                                        oninput="capitalizeInput(this)"
                                        class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                </div>
                                <div>
                                    <label class="block font-medium text-gray-700">Last Name</label>
                                    <input wire:model.live="form.last_name"
                                        placeholder="Last name"
                                        type="text"
                                        oninput="capitalizeInput(this)"
                                        class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                    @error('form.last_name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <!-- Sex and Email -->
                            <div class="space-x-4 grid grid-cols-2">
                                <div>
                                    <label class="block font-medium text-gray-700">Sex</label>
                                    <select wire:model="form.sex"
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
                                    <div x-data="{
                                        init() {
                                            flatpickr($refs.input, {
                                                dateFormat: 'F j, Y', // Display format in the UI
                                               defaultDate: @js($this->form['date_of_birth'] ?? null), // Initialize with F j, Y format
                                                 maxDate: new Date(),
                                                 minDate: new Date(new Date().setFullYear(new Date().getFullYear() - 100)),
                                                onChange: (_, dateStr) => @this.set('form.date_of_birth', dateStr), // Send F j, Y to Livewire
                                            });
                                        }
                                    }"
                                        x-init="init"
                                        class="relative">
                                        <input id="date_of_birth" type="text" x-ref="input" wire:model.defer="form.date_of_birth" placeholder="Select a date"
                                            readonly
                                            class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm pr-10">
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
                            <select wire:model.live="form.user_role"
                                class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] text-gray-700 block w-full rounded-sm shadow-sm">
                                <option value="" selected>Select User Role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    @if($role->id == $form['user_role']) selected @endif>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-gray-700">Permissions</label>
                            <ul class="list-disc pl-6 mt-2">
                                @if(!empty($selectedPermissions))
                                @foreach($selectedPermissions as $permission)
                                <li>{{ ucwords(str_replace('_', ' ', $permission)) }}</li>
                                @endforeach
                                @else
                                <li>No permissions assigned to this role.</li>
                                @endif
                            </ul>
                        </div>
                        @endif
                        @error('form.user_role')
                        <span id="dobError" class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror


                        <!-- Account Info Tab -->
                        @if($activeTab === 'account-info')
                        <div class="min-h-[35vh] max-h-[35vh] overflow-y-auto bg-[#FBFBFB] shadow px-3 py-4 text-xs">
                            <!-- Account Status -->
                            <div class="mb-6 border-b border-gray-300">
                                <label class="block font-medium text-gray-700 mb-1">Account Status</label>
                                <div x-data="{ isDisabled: @entangle('form.is_disabled') }" class="flex items-center justify-between w-full sm:text-sm p-2 space-x-24">
                                    <!-- Status Text -->
                                    <div class="text-sm font-semibold" :class="isDisabled ? 'text-red-500' : 'text-green-500'">
                                        <span x-text="isDisabled ? 'Inactive' : 'Active'"></span>
                                    </div>

                                    <!-- Toggle Switch -->
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input
                                            type="checkbox"
                                            x-model="isDisabled"
                                            class="sr-only">
                                        <!-- Toggle Background -->
                                        <div class="w-10 h-5 rounded-full transition-colors duration-300"
                                            :class="isDisabled ? 'bg-red-500' : 'bg-green-500'">
                                        </div>
                                        <!-- Toggle Thumb -->
                                        <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transform transition-transform duration-300"
                                            :class="isDisabled ? 'translate-x-5' : ''">
                                        </div>
                                    </label>
                                </div>

                            </div>


                            <div>
                                <label class="block font-medium text-gray-700">Username</label>
                                <input wire:model.live="form.username"
                                    placeholder="Username"
                                    type="text"
                                    class="border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] block w-full rounded-sm shadow-sm capitalize">
                                @error('form.username') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Password Field with Toggle Visibility -->
                            <div class="relative mt-6">
                                <label class="block font-medium text-gray-700">New Password</label>
                                <div class="flex space-x-4">
                                    <div class="relative flex-1">
                                        <input
                                            :type="isPasswordVisible ? 'text' : 'password'"
                                            wire:model.live="form.password"
                                            placeholder="Generated password will appear here"
                                            readonly
                                            class="border border-gray-300 focus:ring-[#4AA76F] focus:border-[#4AA76F] mt-1 block w-full rounded-sm shadow-sm sm:text-sm bg-gray-100">
                                        <button
                                            type="button"
                                            @click="isPasswordVisible = !isPasswordVisible"
                                            class="absolute right-2 top-1/2 -translate-y-1/2">
                                            <template x-if="!isPasswordVisible">
                                                <!-- Your eye-closed icon -->
                                            </template>
                                            <template x-if="isPasswordVisible">
                                                <!-- Your eye-open icon -->
                                            </template>
                                        </button>
                                    </div>
                                    <button
                                        @click="generatePassword()"
                                        class="px-4 py-2 text-[#4AA76F] rounded-full border border-[#4AA76F] bg-[#4AA76F] bg-opacity-5 hover:bg-opacity-10">
                                        Generate Password
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            @endif
        </x-slot:body>


        <x-slot:footer>

            <div>
                <!-- Display Success or Error Message -->
                @if (session()->has('message'))
                <div x-data="{ openSuccessModal: true }" x-cloak>
                    <!-- Success Modal -->
                    <div
                        x-show="openSuccessModal"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30 px-5"
                        x-init="
                                lottie.loadAnimation({
                                    container: $refs.lottieAnimation,
                                    renderer: 'svg',
                                    loop: true,
                                    autoplay: true,
                                    path: '{{ asset('animations/Animation - 1732372548058.json') }}'
                                });
                            ">
                        <div class="p-1 bg-[#3AA76F] border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm mx-10">
                            <div class="bg-white rounded-lg shadow-lg">

                                <!-- Modal Body -->
                                <div class="p-6 flex flex-col items-center space-y-2">
                                    <!-- Success Message -->
                                    <p class="text-center text-green-600 font-bold text-2xl">SUCCESS</p>

                                    <!-- Lottie Animation Container -->
                                    <div x-ref="lottieAnimation" class="w-28 sm:w-28 md:w-28 lg:w-32 max-w-[110px] mt-4 mb-0 drop-shadow-lg"></div>

                                    <!-- Success Message -->
                                    <p class="text-center text-gray-600 text-sm">
                                        <span>{{ session('message') }}</span>
                                    </p>
                                </div>

                                <!-- Horizontal Line with Animation -->
                                <div class="relative overflow-hidden shadow-lg w-full h-[4px]">
                                    <img src="{{ asset('storage/images/line-successLoading.png') }}" alt="loading"
                                        class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                                </div>

                                <!-- Modal Footer -->
                                <div @click="openSuccessModal = false" onclick="location.reload();" class="flex flex-col items-center px-6 py-2 bg-green-50 hover:bg-green-100 rounded-b-lg transition-all active:translate-y-[1px] active:shadow-none">
                                    <button class="px-4 py-2 text-green-600 text-sm font-medium rounded">
                                        Close
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @elseif (session()->has('error'))
                <div class="text-red-500">{{ session('error') }}</div>
                @endif

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
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

                        <!-- Edit user Button -->
                        <button
                            type="button"
                            wire:click="save"
                            class="px-4 py-2 bg-gradient-to-b from-[#84D689] to-green-500 text-white text-sm rounded hover:bg-[#4AA76F] shadow-lg shadow-neutral-500/20 transition active:scale-95 hover:scale-105"
                            x-show="tabs.findIndex(tab => tab.key === activeTab) === tabs.length - 1">
                            Update Account
                        </button>
                    </div>

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
            </div>

            <script>
                function capitalizeInput(input) {
                    input.value = input.value.toLowerCase().replace(/\b\w/g, function(char) {
                        return char.toUpperCase();
                    });
                }
            </script>
        </x-slot:footer>

    </x-admin.crud-modal-content-base>
</div>