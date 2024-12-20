<div>
    <div class="min-h-screen flex flex-col items-center bg-white" x-data="{ step: 1 }">
        <!--  header -->
        <x-residents.resident-header />
        <!--  Navigation Tabs -->
        <x-residents.residents-navigation-tab />

        <div class=" flex flex-col items-center w-auto">
            <div class="min-h-[100vh] max-h-[150vh] flex flex-col items-center w-full overflow-y-auto mt-6 mb-20 px-4">

                {{--                <!-- Breadcrumb -->--}}
                {{--                <nav class="justify-between py-2 text-gray-700 rounded-lg sm:flex bg-transparent" aria-label="Breadcrumb">--}}
                {{--                    <ol class="inline-flex items-center mb-2 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">--}}
                {{--                        <li>--}}
                {{--                            <div class="flex items-center">--}}
                {{--                                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">flowbite.com</a>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li aria-current="page">--}}
                {{--                            <div class="flex items-center">--}}
                {{--                                <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
                {{--                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />--}}
                {{--                                </svg>--}}
                {{--                                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">develop</a>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li aria-current="page">--}}
                {{--                            <div class="flex items-center ">--}}
                {{--                                <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
                {{--                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />--}}
                {{--                                </svg>--}}
                {{--                                <span class="mx-1 text-sm font-medium text-gray-500 md:mx-2 dark:text-gray-400">Issue #312</span><span class="bg-blue-100 text-blue-600 text-xs font-semibold me-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden sm:flex">docs</span>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                    </ol>--}}
                {{--                </nav>--}}

                <!-- Step 1 -->
                <template x-if="step === 1">
                    <div>
                        <!-- <p class="text-red-500 text-sm font-medium mt-6">Step 1: Choose the name of the road defect issue.</p> -->

                        <!-- Report History Section -->
                        <form id="step1Form">
                            <div x-data="{ selected: '' }" class="mt-4 mb-2 bg-white shadow-sm rounded-lg w-[350px] mx-auto border-2 border-gray-300 h-[455px]">
                                <div class="w-full bg-white shadow-lg rounded-t-lg p-4">
                                    <h2 class="text-[14px] text-center font-semibold">Type of Road Issue Concern</h2>
                                </div>
                                <div class="h-[50vh] overflow-y-auto overflow-x-hidden w-full">
                                    <div @click="selected = 'pothole'" :class="{ 'bg-gray-100': selected === 'pothole' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                        <img src="{{ asset('storage/images/pothole.png') }}" alt="Pothole" class="w-16 h-16 rounded mr-2 ml-4">
                                        <p class="text-[13px] text-gray-800 ml-2">Pothole</p>
                                    </div>
                                    <div @click="selected = 'raveling'" :class="{ 'bg-gray-100': selected === 'raveling' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                        <img src="{{ asset('storage/images/raveling.png') }}" alt="Raveling" class="w-16 h-16 rounded mr-2 ml-4">
                                        <p class="text-[13px] text-gray-800 ml-2">Raveling</p>
                                    </div>
                                    <div @click="selected = 'block-cracking'" :class="{ 'bg-gray-100': selected === 'block-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                        <img src="{{ asset('storage/images/block-craking.png') }}" alt="Block Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                        <p class="text-[13px] text-gray-800 ml-2">Block Cracking</p>
                                    </div>
                                </div>
                                <input type="hidden" name="defect_type" :value="selected">
                            </div>
                            <div class="mt-4 text-center">
                                <button @click.prevent="step = 2" class="bg-customGreen text-white px-4 py-2 rounded-full">
                                    Next
                                </button>
                            </div>
                        </form>


                        <!-- Report Road Issue Button -->
                        <div class="mt-14 w-[75%] text-center mx-auto max-w-lg lg:absolute lg:top-16 lg:right-0 lg:left-[85%] lg:m-6 lg:w-[auto] lg:max-w-[200px] md:mb-50 sm:mb-50">
{{--                            <button @click="step = 2"--}}
{{--                                    class="px-4 py-3 lg:py-1 lg:text-[14px] w-full bg-customGreen text-lg font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-600 md:mb-50">--}}
{{--                                Next--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </template>

                <template x-if="step === 2">
                    <div>
                        <div>
                            <p class="text-red-500 text-sm font-medium mt-6">Step 2: Capture photo and location.</p>

                            <!-- Location and Photo Capture -->
                            <div class="capture-wrapper p-6 bg-gray-800 rounded-lg shadow-lg" x-data="captureHandler()">
                                <!-- Open Camera Button -->
                                <div class="flex justify-center gap-4 mt-4">
                                    <button @click="openCamera" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                                        Open Camera
                                    </button>
                                </div>

                                <!-- Camera Preview -->
                                <div x-show="cameraOpen" class="mt-4">
                                    <video id="camera-stream" autoplay class="w-full max-w-md mx-auto"></video>
                                    <button @click="capturePhotoAndLocation"
                                            class="mt-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                                        Capture
                                    </button>
                                </div>

                                <!-- Preview Image -->
                                <div x-show="photoCaptured" class="mt-4">
                                    <p class="text-white">Photo Preview:</p>
                                    <img :src="photo" class="w-full max-w-md mx-auto rounded-lg shadow">
                                </div>

{{--                                <!-- Next Button -->--}}
{{--                                <button @click="if (photoCaptured && locationCaptured) { step = 3; } else { alert('Please capture a photo and location first.'); }"--}}
{{--                                        class="mt-6 bg-customGreen hover:bg-green-400 text-white px-6 py-4 rounded-full shadow">--}}
{{--                                    NEXT--}}
{{--                                </button>--}}
                                <!-- Next Button -->
                                <button @click="confirmCapture();"
                                        class="mt-6 bg-customGreen hover:bg-green-400 text-white px-6 py-4 rounded-full shadow">
                                    NEXT
                                </button>


                            </div>
                        </div>


                    </div>


                </template>

                <!-- Step 3 -->
                <template x-if="step === 3">
                    <div>
                        <p class="text-black text-center text-sm font-semibold -mt-2">REPORT ROAD INFORMATION</p>

                        <!-- Report History Section -->
                        <div class="mt-6 mx-auto bg-white w-[80%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 p-4 h-auto lg:h-[600px]">

                            <!-- Captured Road Photo -->
                            <div class="flex flex-col text-center">
                                <div class="font-semibold text-customGreen text-sm -mb-2">Actual Captured Road Photo</div>
                                <img :src="photo" alt="Road Defect" class="relative w-full -mt-1" />
                            </div>

                            <!-- Type of Defect -->
                            <div class="mb-6 w-full flex justify-items-start">
                                <div class="w-5/10 font-semibold text-customGreen text-sm">Type of Defect:</div>
                                <div class="w-5/10 ml-1 text-sm" x-text="defectType"></div>
                            </div>

                            <!-- Report ID -->
                            <div class="mb-6 w-full flex justify-items-start">
                                <div class="w-5/10 font-semibold text-customGreen text-sm">Report ID:</div>
                                <div class="w-5/10 ml-2 text-sm" x-text="'123456'"></div>
                            </div>

                            <!-- Latitude and Longitude -->
                            <div class="mb-6 w-full flex justify-items-start">
                                <div class="w-5/10 font-semibold text-customGreen text-sm">Latitude:</div>
                                <div class="w-5/10 ml-2 text-sm" x-text="latitude"></div>
                            </div>
                            <div class="mb-6 w-full flex justify-items-start">
                                <div class="w-5/10 font-semibold text-customGreen text-sm">Longitude:</div>
                                <div class="w-5/10 ml-2 text-sm" x-text="longitude"></div>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        </div>
    </div>
</div>

<script>
    function captureHandler() {
        return {
            cameraOpen: false,
            photoCaptured: false,
            locationCaptured: false,
            latitude: null,
            longitude: null,
            photo: null,
            defectType: '',
            selected: '', // Store the selected defect type
            videoStream: null,
            address: '', // Add a property to store the address
            // Open the camera
            openCamera() {
                this.cameraOpen = true;
                const video = document.getElementById('camera-stream');
                navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: { ideal: 'environment' } // Use the back camera if available
                    }
                })
                    .then(stream => {
                        this.videoStream = stream;
                        video.srcObject = stream;
                    })
                    .catch(err => {
                        console.error('Error accessing camera:', err);
                        alert('Unable to access the camera. Ensure you allow camera permissions.');
                    });
            },

            // Capture photo and location
            capturePhotoAndLocation() {
                const video = document.getElementById('camera-stream');
                const canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0);
                this.photo = canvas.toDataURL('image/png');
                this.photoCaptured = true;

                // Stop the video stream
                if (this.videoStream) {
                    this.videoStream.getTracks().forEach(track => track.stop());
                }
                this.cameraOpen = false;

                // Capture location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        position => {
                            this.latitude = position.coords.latitude;
                            this.longitude = position.coords.longitude;
                            this.locationCaptured = true;
                            const apiKey = "{{ env('GOOGLE_MAP_API') }}";
                            const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${this.latitude},${this.longitude}&key=${apiKey}`;
                            fetch(geocodeUrl)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'OK') {
                                        this.address = data.results[0].formatted_address;
                                    } else {
                                        alert('Unable to get the location name.');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error with geocoding request:', error);
                                    alert('Unable to retrieve location name.');
                                });
                        },
                        error => {
                            console.error('Error getting location:', error);
                            alert('Unable to retrieve your location. Please enable GPS.');
                        }

                    );

                } else {
                    alert('Geolocation is not supported by your browser.');
                }
            },

            // Confirm photo and location capture
            confirmCapture() {
                // Livewire.emit('storeData', {
                //     latitude: this.latitude,
                //     longitude: this.longitude,
                //     photo: this.photo,
                //     defectType: this.defectType
                // });
                alert(`Address: ${this.address}\nLatitude: ${this.latitude}\nLongitude: ${this.longitude}`);
            }
        };
    }
</script>
