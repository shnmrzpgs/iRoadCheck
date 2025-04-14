<div class="flex flex-col justify-center items-center mb-28 w-full lg:w-[90%] lg:ml-16 xl:ml-20">


    <!-- Notifications Header -->
    <div class="sticky -top-2 py-4 w-full bg-[#4AA76F] shadow rounded-b-md z-10">
        <p class="text-md md:text-lg text-white font-medium text-center tracking-wider">Notifications</p>
    </div>

    <!-- Scrollable Content -->
    <div class="mt-8 w-full">

        <div class="flex justify-end -my-4">
            {{ $mark_all_as_read_button_container }}
        </div>

        <!-- Today Section -->
        <div class="w-full">
            <p class="text-[14px] text-black font-semibold">Today</p>
            {{ $notification_today }}
        </div>

        <div class="mt-8 w-full">

            <!-- Section Title -->
            <p class="text-[14px] font-normal text-gray-800 mb-4">Earlier</p>

            <!-- Notifications Cards -->
            <div class="space-y-4">
                {{ $notification_earlier }}
            </div>
        </div>

    </div>
</div>
