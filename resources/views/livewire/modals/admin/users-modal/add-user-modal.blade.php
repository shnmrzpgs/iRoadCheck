{{--<div>--}}
{{--    <x-admin.crud-modal-content-base modal_name="add-course-modal">--}}

{{--        <x-slot:trigger>--}}
{{--            <button--}}
{{--                class="flex items-center px-2 py-2 bg-[#C49308] hover:bg-yellow-500 text-white rounded-[4px] text-[12px] font-medium mr-3"--}}
{{--                type="button">--}}
{{--                <img src="{{ asset('storage/icons/ProgramManagement-icon.png') }}" alt="add-icon" class="w-4 h-3 mr-1">--}}
{{--                Add Course--}}
{{--            </button>--}}
{{--        </x-slot:trigger>--}}

{{--        <x-slot:header>--}}
{{--            Add Course Information--}}
{{--        </x-slot:header>--}}

{{--        <x-slot:body>--}}

{{--            Course Information --}}
{{--            <div class="bg-[#202020] p-3 rounded-[8px] mt-2">--}}
{{--                <span class="block text-white font-semibold text-[14px] mb-1">Course Information</span>--}}

{{--                 Custom Horizontal Line --}}
{{--                <div class="right-0 transform -translate-y-1/2 w-full h-[0.5px] bg-gradient-to-l from-transparent to-[#757575]"></div>--}}

{{--                Input Course Information --}}
{{--                <div class="flex flex-col gap-4 mt-3">--}}
{{--                    <!-- College Dropdown -->--}}
{{--                    <x-admin.form-select name="department" label="College" required="true"--}}
{{--                                         wire:model.live="form.department_id" :options="$this->colleges()"--}}
{{--                                         :owner_identifier="$identifier"--}}
{{--                    />--}}
{{--                    <!-- Course Title Input -->--}}
{{--                    <x-admin.form-input name="name" label="Course Title" required="true" wire:model.live="form.name"/>--}}

{{--                    <!-- Course Acronym Input -->--}}
{{--                    <x-admin.form-input name="acronym" label="Course Acronym" required="true" wire:model.live="form.acronym"/>--}}

{{--                    <!-- Student Type Dropdown -->--}}
{{--                    <x-admin.form-select name="student_type" label="Student Type" required="true"--}}
{{--                                         wire:model.live="form.student_type_id" :options="$student_types"--}}
{{--                                         :owner_identifier="$identifier"--}}
{{--                    />--}}


{{--                    <!-- Major -->--}}
{{--                    <div x-data="{ newMajor: '', newAcronym: '' }" class="p-4 w-full mx-auto">--}}
{{--                        <h2 class="text-[14px] font-bold mt-2">Major</h2>--}}

{{--                        <!-- New Input for Adding Major -->--}}
{{--                        <div class="flex items-center mt-4 space-x-4">--}}
{{--                            <div class="input-container w-full">--}}
{{--                                <input type="text" x-model="newMajor" placeholder="Enter Major Name"--}}
{{--                                       @keydown.enter="$wire.addMajor(newMajor, newAcronym); newMajor = ''; newAcronym = '';"--}}
{{--                                       class="flex-1 p-1 pr-6 border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500">--}}
{{--                            </div>--}}
{{--                            <!-- New Input for Major Acronym -->--}}
{{--                            <div class="input-container w-full">--}}
{{--                                <input type="text" x-model="newAcronym" placeholder="Enter Major Acronym"--}}
{{--                                       @keydown.enter="$wire.addMajor(newMajor, newAcronym); newMajor = ''; newAcronym = '';"--}}
{{--                                       class="flex-1 p-1 pr-6 border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500">--}}
{{--                            </div>--}}
{{--                            <button @click="$wire.addMajor(newMajor, newAcronym); newMajor = ''; newAcronym = '';"--}}
{{--                                    class="px-4 py-2 bg-red-900 text-white rounded-[4px] hover:bg-red-600">--}}
{{--                                Add--}}
{{--                            </button>--}}
{{--                        </div>--}}

{{--                        <!-- Display added majors with acronyms -->--}}
{{--                        <div class="overflow-x-hidden max-h-[100px] mt-4">--}}
{{--                            @foreach($majors as $index => $major)--}}
{{--                                <div class="input-container flex items-center mb-2">--}}
{{--                                    <input type="text" value="{{ $major['name'] }}" class="flex-1 p-1 pr-6 border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500" readonly>--}}
{{--                                    <input type="text" value="{{ $major['acronym'] }}" class="flex-1 p-1 pr-6 border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500 ml-4" readonly>--}}
{{--                                    <button @click="$wire.removeMajor({{ $index }})"--}}
{{--                                            class="ml-4 w-8 h-8 hover:bg-[#303030] text-gray-400 hover:text-white rounded-full text-[20px]">--}}
{{--                                        &times;--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </x-slot:body>--}}

{{--        <x-slot:footer>--}}
{{--            <button x-on:click="open = false"--}}
{{--                    x-on:course_added.window="open = false"--}}
{{--                    class="w-[150px] px-2 py-2 bg-none border border-gray-300 rounded-[6px] text-white hover:bg-gray-700 mr-5">--}}
{{--                Cancel--}}
{{--            </button>--}}
{{--            <button wire:click.prevent="save" wire:loading.attr="disabled"--}}
{{--                    class="w-[150px] px-2 py-2 bg-[#C49308] hover:bg-yellow-600 text-white rounded-[6px] flex items-center justify-center">--}}
{{--                <x-loading-indicator wire:loading class="h-6 w-6"/>&nbsp;--}}
{{--                <span>Add Course</span>--}}
{{--            </button>--}}
{{--        </x-slot:footer>--}}

{{--        @script--}}
{{--        <script type="module">--}}
{{--            $wire.on('course_added', () => {--}}
{{--                pushNotification('success', 'Course Information Added', 'Course has been added successfully.');--}}
{{--            });--}}
{{--            $wire.on('course_not_added', () => {--}}
{{--                pushNotification('error', 'Failed to Add Course', 'An error occurred while adding the course.');--}}
{{--            });--}}
{{--        </script>--}}
{{--        @endscript--}}

{{--    </x-admin.crud-modal-content-base>--}}
{{--</div>--}}
