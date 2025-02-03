<x-Staff.staff-navigation page_title="Suggestion Reports">

    <!-- Main Content -->
    <main class="flex-1 -mt-2 overflow-y-scroll h-[83vh] md:h-[85vh] xl:h-full xl:overflow-hidden pb-5">
        <div x-cloak="true" class="flex flex-col items-center justify-center w-full mb-10" x-data="reportData()">
            <div class="w-full md:w-[85%] flex flex-col justify-center items-center -mt-4" x-data="{ showFeedback: false, feedbackMessage: '', showLoading: false, timer: null, loadingTimer: null }">

                <!-- Card Suggestion Reports-->
                <template x-for="report in reports" :key="report.id">
                    <div class="my-3 bg-white w-full md:w-[85%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 pb-4">

                        <!-- Header -->
                        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-2">
                            <h2 class="text-[15px] text-red-500 font-semibold ml-2 text-center">Is this the same as your report now?</h2>
                        </div>

                        <!-- Body -->
                        <div class=" flex flex-col justify-start items-start px-2 py-4">

                            <!-- Captured Road Photo -->
                            <div class="mx-auto w-full mb-4 flex flex-col justify-center items-center">
                                <div class="text-sm font-semibold text-[#4AA76F] text-center mb-2">Captured Road Defect Photo</div>
                                <img :src="report.image" alt="Road Defect" class="w-[200px] h-[190px] rounded shadow" />
                            </div>

                            <!-- Other Report Details -->
                            <div class="w-full ml-4">
                                <div class="text-[13px] md:text-md space-y-2">

                                    <!-- Type of Defect -->
                                    <div class="flex w-full">
                                        <div class="w-4/10 font-medium text-gray-500">Road Defect Type: </div>
                                        <div class="w-6/10 text-customGreen font-semibold" x-text="report.defect_type"></div>
                                    </div>
                                    <div class="flex w-full">
                                        <span class="w-4/10 font-medium text-gray-500">Report Count: </span>
                                        <span class="w-6/10 text-customGreen font-semibold" x-text="report.report_count"></span>
                                    </div>
                                    <div class="flex w-full">
                                        <span class="w-4/10 font-medium text-gray-500">Current Status:</span>
                                        <span class="w-6/10 text-customGreen font-semibold" x-text="report.status"></span>
                                    </div>
                                    <div class="flex w-full">
                                        <span class="w-4/10 font-medium text-gray-500">Location: </span>
                                        <span class="w-6/10 text-customGreen font-semibold" x-text="report.location"></span>
                                    </div>

                                    {{-- More info here--}}
                                </div>
                            </div>
                        </div>


                        <!-- Footer-->
                        <div class="flex justify-between items-center mt-4 px-6 space-x-4 mx-auto w-full">
                            <!-- YES Button -->
                            <button
                                @click="showLoading = true; showFeedback = false; feedbackMessage = ''; clearTimeout(loadingTimer); loadingTimer = setTimeout(() => { showLoading = false; showFeedback = true; feedbackMessage = 'Thank you for confirming! You clicked YES.'; }, 500); clearTimeout(timer); timer = setTimeout(() => { showFeedback = false }, 2000);"
                                class="w-full bg-customGreen rounded-full text-white inline-flex h-12 items-center justify-center px-4 py-2 font-medium transition active:scale-110 shadow ">
                                YES
                            </button>

                            <!-- NO Button -->
                            <button
                                @click="showLoading = true; showFeedback = false; feedbackMessage = ''; clearTimeout(loadingTimer); loadingTimer = setTimeout(() => { showLoading = false; showFeedback = true; feedbackMessage = 'Thank you for confirming! You clicked NO.'; }, 500); clearTimeout(timer); timer = setTimeout(() => { showFeedback = false }, 2000);"
                                class="w-full bg-[#FF7070] rounded-full text-white inline-flex h-12 items-center justify-center px-4 py-2 font-medium transition active:scale-110 shadow ">
                                NO
                            </button>
                        </div>

                        <!-- Horizontal Loading Bar -->
                        <div x-show="showLoading" class="fixed top-0 left-0 w-full bg-gray-200 h-2 z-50 animate-wipe-right">
                            <div class="bg-[#4AA76F] h-full" x-transition:enter="transition-all duration-500" x-transition:enter-start="w-0" x-transition:enter-end="w-full"></div>
                        </div>

                        <!-- Feedback Message -->
                        <div x-show="showFeedback" x-transition:enter="transition transform ease-in-out duration-300" x-transition:leave="transition transform ease-in-out duration-300"
                             x-transition:enter-start="translate-y-10 opacity-0" x-transition:leave-end="translate-y-10 opacity-0"
                             class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 w-80 sm:w-96 bg-gradient-to-r from-[#4AA76F] via-[#5BC28D] to-[#2C8B4A] text-white font-medium text-center p-4 rounded-lg shadow">
                            <p x-text="feedbackMessage"></p>
                        </div>

                    </div>
                </template>

            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('reportData', () => ({
                    reports: [
                        {
                            id: 1,
                            status: '2 days ago',
                            image: '{{ asset("storage/images/roadDefect-patches.jpg") }}',
                            report_count: 2,
                            location: 'Apokon Street, Tagum City ngfdsdxcvbhiuytresxcv',
                            defect_type: 'Pothole',
                        },
                        {
                            id: 2,
                            status: '5 days ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 5,
                            location: 'Mankilam Road, Tagum City',
                            defect_type: 'Crack',
                        },
                        {
                            id: 3,
                            status: '1 week ago',
                            image: '{{ asset("storage/images/roadDefect-asphaltDepression.jpg") }}',
                            report_count: 8,
                            location: 'Magugpo East, Tagum City',
                            defect_type: 'Sinkhole',
                        },
                        {
                            id: 4,
                            status: '3 days ago',
                            image: '{{ asset("storage/images/roadDefect-slippageCrack.png") }}',
                            report_count: 3,
                            location: 'Visayan Village, Tagum City',
                            defect_type: 'Uneven Surface',
                        },
                        {
                            id: 5,
                            status: '6 hours ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 1,
                            location: 'National Highway, Tagum City',
                            defect_type: 'Debris',
                        },
                        {
                            id: 6,
                            status: '4 days ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 4,
                            location: 'Pagsabangan, Tagum City',
                            defect_type: 'Crack',
                        },
                        {
                            id: 7,
                            status: '2 weeks ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 10,
                            location: 'Madaum, Tagum City',
                            defect_type: 'Flooding',
                        },
                        {
                            id: 8,
                            status: '1 day ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 6,
                            location: 'San Miguel, Tagum City',
                            defect_type: 'Pothole',
                        },
                        {
                            id: 9,
                            status: '3 weeks ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 12,
                            location: 'La Filipina, Tagum City',
                            defect_type: 'Collapsed Road',
                        },
                        {
                            id: 10,
                            status: '10 hours ago',
                            image: '{{ asset("storage/images/roadDefect-pothole.jpg") }}',
                            report_count: 7,
                            location: 'Pandapan, Tagum City',
                            defect_type: 'Sinkhole',
                        },
                        // Add more reports here...
                    ],
                }));
            });
        </script>
    </main>

</x-Staff.staff-navigation>
