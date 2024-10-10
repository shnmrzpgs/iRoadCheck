<x-app-layout>

    <div class="relative bg-black h-screen font-poppins flex items-center justify-center">

        <!-- Background Image -->
        <img src="{{ asset('storage/images/bg-tagumRoad-image.jpg') }}" alt="Background" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover -z-1">

        <div class="absolute top-10 w-full text-center items-center z-20 mt-12">
            <img src="{{ asset('/storage/images/IRoadCheck_Logo.png') }}" alt="iRoadCheck" class="mx-auto mb-4 w-1/6 sm:w-1/8 lg:w-1/12">
            <h1 class="text-[16px] text-white font-medium mb-6">iRoadCheck</h1>
            <p class="text-white font-medium text-[22px]">Sign Up</p>
        </div>

        <!-- White Container (Card) -->
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 w-full max-w-xs sm:max-w-sm text-center relative z-10 mt-[50%]">
                <h2 class="text-[18px] mb-4 font-medium text-[#F8A15E]">Personal Information</h2>

                <div class="flex w-1/2 justify-center ml-16 mb-6">
                    <hr class="border-t-4 border-[#F8A15E] border-text-[18px] w-1/3 mr-2">
                    <hr class="border-t-4 border-text-[18px] w-1/3 ml-2">
                </div>

                <form action="" method="POST" class="flex flex-col items-center w-full" >
                    <div  x-data="{ isFocused: false, inputValue: '' }" class="relative mb-2">
                        <!-- Floating Label -->
                        <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                            class="transition-all duration-200 bg-white px-1">
                            First Name
                        </label>

                        <!-- Input Field -->
                        <input type="text"
                            x-model="inputValue"
                            @focus="isFocused = true"
                            @blur="isFocused = false"
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all">

                    </div>

                    <div x-data="{ isFocused: false, inputValue: '' }" class="relative mb-4">
                        <label :class="{
                                'text-[#6AA76F]': isFocused || inputValue.length > 0,
                                'absolute': true,
                                'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,
                                'text-xs top-[-10px] left-3': isFocused || inputValue.length > 0
                            }"
                            class="transition-all duration-200 bg-white px-1">
                            Middle Name
                        </label>
                        <input type="text"
                            x-model="inputValue"
                            @focus="isFocused = true"
                            @blur="isFocused = false"
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all">
                    </div>
                    
                    <div  x-data="{ isFocused: false, inputValue: '' }" class="relative mb-6">
                        <!-- Floating Label -->
                        <label :class="{
                            'text-[#6AA76F]': isFocused || inputValue.length > 0,
                            'absolute': true,
                            'top-[50%] left-3 -translate-y-[50%]': !isFocused && inputValue.length === 0,  /* Center vertically */
                            'text-xs top-[-10px] left-3 text-[#6AA76F]': isFocused || inputValue.length > 0 }"
                            class="transition-all duration-200 bg-white px-1">
                            Last Name
                        </label>

                        <!-- Input Field -->
                        <input type="text"
                            x-model="inputValue"
                            @focus="isFocused = true"
                            @blur="isFocused = false"
                            class="w-full p-3 border font-medium rounded-lg focus:outline-none focus:border-[#6AA76F] bg-white transition-all">

                    </div>
                </form>


                <button class="w-full text-[18px] bg-[#5A915E] shadow-lg text-white p-3 font-medium mb-2 rounded-full">Next</button>
                <button class="w-full p-3 rounded-lg font-semibold text-[#F8A15E] border border-transparent">Log in</button>
            </div>
        </div>
    </div>
</x-app-layout>