<div class="bg-none rounded-[4px]">

    <!--image bg-->
    <div class="relative overflow-hidden rounded-[10px] shadow w-full h-[100px]">
        <img src="{{ asset('storage/images/bg-profileName.png') }}" alt="profile name background"
             class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
    </div>

    <!--Profile Name -->
    <div class="absolute flex items-start p-2">
        <div class="relative ml-10 -mt-20">
            <img src="{{ asset('storage/icons/profile-graphics.png') }}" alt="Profile Picture"
                 class="w-[110px] h-[110px] rounded-full object-cover mb-2 bg-none z-50 drop-shadow-lg">
        </div>
        <div class="relative text-start text-[#4D4F50] ml-6 -mt-20">
            <h2 class="text-[20px] font-semibold">Howard Glen Gloria</h2>
            <p class="text-[14px]">Administrator</p>
        </div>
    </div>
</div>
