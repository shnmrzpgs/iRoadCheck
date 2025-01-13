<div>
    <x-admin.crud-modal-content-base modal_name="view-user-account-modal">

        <x-slot:trigger>
            <div class="hidden" x-on:view-user-account-modal-shown.window="open = true"></div>
        </x-slot:trigger>

        <x-slot:header>
            View User Details
        </x-slot:header>

        <x-slot:body>
            @if($staff)
            <div class="relative  w-full">
                <!--image bg-->
                <div class="relative overflow-hidden shadow w-full h-[80px]">
                    <img src="{{ asset('storage/images/bg-profileName.png') }}" alt="profile name background"
                        class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                </div>

                <!-- Profile Section -->
                <div class="flex items-center space-x-4 -mt-16 pl-6">
                    <!-- Profile Picture -->
                    <div class="relative h-24 w-24 flex-shrink-0">
                        <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Image" class="h-20 w-20 rounded-full bg-gradient-to-r from-blue-500 to-green-500 p-[1px]" />
                    </div>
                    <!-- Name and Email -->
                    <div class="z-50 -mt-10">
                        <div class="text-lg font-semibold text-[#4D4F50] ">
                            <span>{{ $staff->user->first_name }} {{ $staff->user->last_name }}</span>
                        </div>
                        <div class="text-gray-600 block text-xs font-normal italic">
                            <span>{{ $staff->user->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-6 pb-14 max-h-[270px] overflow-y-auto space-y-6 relative">
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <!-- Basic Information -->
                        <div class="bg-white shadow-sm rounded-md p-2">
                            <h4 class="font-medium text-gray-700 border-b pb-2 border-[#4AA76F]"><strong>Basic Information</strong></h4>
                            <ul>
                                <li>First Name: {{ $staff->user->first_name }}</li>
                                <li>Middle Name: {{ $staff->user->middle_name }}</li>
                                <li>Last Name: {{ $staff->user->last_name }}</li>
                                <li>Sex: {{ $staff->user->sex }}</li>
                                <li>Birthday: {{ $staff->user->date_of_birth }}</li>
                                <li>User Type: {{ $staff->user->user_type }}</li>
                            </ul>
                        </div>

                        <!-- Access Control Information -->
                        <div class="bg-white shadow-sm rounded-md p-2">
                            <h4 class="font-medium text-gray-700 border-b pb-2 border-[#4AA76F]"><strong>Access Control Information</strong></h4>
                            <ul>
                                <li>Role: {{ $staff->staffRolesPermissions->staffRole->name }}</li>
                                <li>Permissions:</li>
                                <ul class="pl-4 list-disc">
                                    @if (!empty($staff->permissions))
                                    @foreach ($staff->permissions as $permission)
                                    <li>{{ $permission }}</li>
                                    @endforeach
                                    @else
                                    <li>No permissions assigned</li>
                                    @endif

                                </ul>
                            </ul>
                        </div>
                    </div>
                    <!-- Account Information -->
                    <div class="bg-white shadow-sm rounded-md p-2 flex-nowrap text-xs">
                        <h4 class="font-medium text-gray-700 border-b pb-2 border-[#4AA76F]"><strong>Account Information</strong></h4>
                        <ul> 
                            <li class="text-[#4AA76F]">Status: {{ $staff->status }}</li>
                            <li>Email: {{ $staff->user->email }}</li>
                            <li>Password: {{ $staff->user->password }}</li>
                        </ul>
                    </div>

                </div>

            </div>



            @endif
        </x-slot:body>

        <x-slot:footer>
            <!-- Optional Footer (add buttons if needed) -->
        </x-slot:footer>

    </x-admin.crud-modal-content-base>
</div>