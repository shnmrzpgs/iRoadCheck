<div>
    <div
         x-data="{
            isHovered: false,
            preview: @entangle('profilePicture').defer,
            hasProfilePicture: @entangle('currentProfilePicture'),
            showConfirmation: false,
            showLoading: false, // State for loading
            loadingTimer: null // Timer for auto-hiding loading indicator
        }"
         class="relative">

        <!-- Horizontal Loading Bar -->
        <div x-show="showLoading" class="fixed top-0 left-0 w-full h-2 z-50 animate-wipe-right">
            <img
                src="{{ asset('storage/images/profile-backgroundImage2.png') }}"
                alt="Loading"
                class="w-full h-full object-cover"
                x-transition:enter="transition-all duration-500"
                x-transition:enter-start="w-0"
                x-transition:enter-end="w-full">
        </div>

        <!-- Profile Picture Container -->
        <div x-cloak  class="overflow-hidden rounded-full w-32 h-32 border-2 border-[#4AA76F] border-opacity-70 bg-[#F5F5F5] drop-shadow"
             x-data="{ preview: null }">

            <!-- Preview the image before uploading -->
            <template x-if="preview">
                <img :src="URL.createObjectURL(preview)"
                     alt="Profile Picture Preview"
                     class="w-full h-full object-cover text-center flex justify-center items-center bg-black">
            </template>

            <!-- Show the current profile picture or a placeholder -->
            <template x-if="!preview">
                @if($currentProfilePicture)
                    <img src="{{ Storage::url($currentProfilePicture) }}"
                         alt="Current Profile Picture"
                         class="w-full h-full object-cover">
                @else
                    <!-- Default image if no profile picture is set -->
                    <img src="{{ asset('/storage/icons/profile-graphics.png') }}"
                         alt="Default Profile Picture"
                         class="w-full h-full object-cover">
                @endif
            </template>

            <!-- Loading Indicator -->
            <div x-show="showLoading" class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50">
                <div class="text-white text-sm">Uploading...</div>
            </div>

            <!-- Hidden file input for uploading -->
            <input type="file" class="hidden" x-ref="fileInput"
                   @change="preview = $event.target.files[0]; showLoading = true; clearTimeout(loadingTimer); loadingTimer = setTimeout(() => { showLoading = false; }, 2000);"
                   wire:model="profilePicture">


            <!-- Hover Effect -->
            <div class="rounded-full absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 px-4" x-show="isHovered">
                <button @click="document.querySelector('input[type=file]').click()"
                        class="rounded-full flex-col text-white text-sm flex items-center">
                    <span>Change Profile Photo</span>
                    <!-- Camera Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mt-2 w-4 h-4 fill-current text-center">
                        <path d="M199.1 32c-24.1 0-45.5 15.4-53.1 38.3l22.8 7.6-22.8-7.6L137.4 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-73.4 0-8.6-25.7C358.4 47.4 337 32 312.9 32L199.1 32zm-7.6 53.5c1.1-3.3 4.1-5.5 7.6-5.5l113.9 0c3.4 0 6.5 2.2 7.6 5.5l14 42.1c3.3 9.8 12.4 16.4 22.8 16.4l90.7 0c8.8 0 16 7.2 16 16l0 256c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l90.7 0c10.3 0 19.5-6.6 22.8-16.4l14-42.1zM256 400a112 112 0 1 0 0-224 112 112 0 1 0 0 224zM192 288a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                    </svg>

                </button>
            </div>

            <div x-on:mouseover="isHovered = true" x-on:mouseleave="isHovered = false">
                <!-- File Input -->
                <input type="file" wire:model="profilePicture"
                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
                       title="Upload New Profile Photo"
                       accept="image/*"
                       @change="showLoading = true; clearTimeout(loadingTimer); loadingTimer = setTimeout(() => { showLoading = false; }, 3000);">
            </div>
        </div>


        <!-- Remove Profile Picture Button -->
        <div class="absolute bottom-0 right-0 mb-1 mr-1 bg-black bg-opacity-60 hover:bg-red-600 text-white p-1.5 rounded-full cursor-pointer"
             x-show="!preview && {{ $currentProfilePicture ? 'true' : 'false' }}"
             @click="showConfirmation = true" title="Remove profile photo">
            <!-- Trash Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-current">
                <path d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
            </svg>
        </div>

        <!-- Confirmation Modal -->
        <div x-show="showConfirmation" x-cloak  class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="p-1 border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm mx-10 bg-[#3AA76F]">
                <div class="bg-white rounded-lg shadow-lg px-10 pt-6">
                    <p class="text-center font-bold text-xl mb-4">Are you sure?</p>
                    <p class="text-center mb-4">Do you really want to remove your profile photo? This action cannot be undone.</p>
                    <div class="flex justify-center gap-x-14 py-7 border-t border-gray-400">

                        <!-- Yes Button -->
                        <button @click="$wire.removeProfilePicture(); showConfirmation = false" class="bg-red-600 text-white px-10 py-2 rounded-md group relative inline-flex hover:scale-11  transition active:scale-110">
                            <span>Yes</span>
                            <div class="absolute inset-0 flex h-full w-8/10 justify-center [transform:skew(-12deg)_translateX(-100%)] group-hover:duration-1000 group-hover:[transform:skew(-12deg)_translateX(100%)]">
                                <div class="relative h-full w-8 bg-white/20"></div>
                            </div>
                        </button>

                        <!-- No Button -->
                        <button @click="showConfirmation = false" class="bg-gray-400 text-white px-10 py-2 rounded-md group relative inline-flex hover:scale-11  transition active:scale-110">
                            <span>No</span>
                            <div class="absolute inset-0 flex h-full w-9/10 justify-center [transform:skew(-12deg)_translateX(-70%)] group-hover:duration-1000 group-hover:[transform:skew(-12deg)_translateX(100%)]">
                                <div class="relative h-full w-8 bg-white/20"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Feedback Messages-->
    @if (session()->has('feedback'))
        <div x-data="{ openModal: true }" x-cloak>
            <!-- Modal -->
            <div
                x-show="openModal"
                class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-30 px-5"
                x-init="
                @if (session('feedback_type') === 'success')
                    lottie.loadAnimation({
                        container: $refs.lottieAnimation,
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: '{{ asset('animations/Animation - 1732372548058.json') }}'
                    });
                @elseif (session('feedback_type') === 'info')
                    lottie.loadAnimation({
                        container: $refs.lottieAnimation,
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: '{{ asset('animations/Animation - 1737008068327.json') }}'
                    });
                @elseif (session('feedback_type') === 'error')
                    lottie.loadAnimation({
                        container: $refs.lottieAnimation,
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: '{{ asset('animations/Animation - 1732451860692.json') }}' // Error animation
                    });
                @endif
            "
            >
                <div class="p-1 border-gray-600 rounded-[12px] shadow-xl overflow-hidden w-full max-w-sm mx-10"
                     :class="{
                    'bg-[#3AA76F]': '{{ session('feedback_type') }}' === 'success',
                    'bg-[#3182CE]': '{{ session('feedback_type') }}' === 'info',
                    'bg-[#E53E3E]': '{{ session('feedback_type') }}' === 'error'
                    }">
                    <div class="bg-white rounded-lg shadow-lg">
                        <!-- Modal Body -->
                        <div class="p-6 flex flex-col items-center space-y-2">
                            <!-- Title -->
                            <p class="text-center font-bold text-2xl"
                               :class="{
                                'text-green-600': '{{ session('feedback_type') }}' === 'success',
                                'text-blue-600': '{{ session('feedback_type') }}' === 'info',
                                'text-red-600': '{{ session('feedback_type') }}' === 'error'
                           }">
                                {{ strtoupper(session('feedback_type')) }}
                            </p>

                            <!-- Lottie Animation Container -->
                            <div x-ref="lottieAnimation" class="w-28 sm:w-28 md:w-28 lg:w-32 max-w-[110px] mt-4 mb-0 drop-shadow-lg"></div>

                            <!-- Feedback Message -->
                            <p class="text-center text-gray-600 text-sm">
                                <span>{!! session('feedback') !!}</span>
                            </p>
                        </div>

                        <!-- Horizontal Line with Animation -->
                        <div class="relative overflow-hidden shadow-lg w-full h-[4px]">
                            <img
                                src="
                            @if (session('feedback_type') === 'success')
                                {{ asset('storage/images/line-successLoading.png') }}
                            @elseif (session('feedback_type') === 'info')
                                {{ asset('storage/images/line-noChangesLoading.png') }}
                            @elseif (session('feedback_type') === 'error')
                                {{ asset('storage/images/line-errorLoading.png') }}
                            @endif
                            "
                                alt="loading"
                                class="absolute top-0 left-0 w-full h-full object-cover animate-wipe-right">
                        </div>

                        <!-- Modal Footer -->
                        <div @click="openModal = false" onclick="location.reload();" class="flex flex-col items-center px-6 py-2 bg-gray-50 hover:bg-gray-100 rounded-b-lg transition-all active:translate-y-[1px] active:shadow-none">
                            <button class="px-4 py-2 text-sm font-medium rounded"
                                    :class="{
                                    'text-green-600': '{{ session('feedback_type') }}' === 'success',
                                    'text-blue-600': '{{ session('feedback_type') }}' === 'info',
                                    'text-red-600': '{{ session('feedback_type') }}' === 'error'
                                }">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>




