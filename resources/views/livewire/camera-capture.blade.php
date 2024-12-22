<x-residents.residents-navigation>
    <div class="flex flex-col items-center justify-center w-full mb-28" x-data="{ step: 1, selected: '' }">
        <div class="w-full md:w-[85%] flex flex-col justify-center items-center">

            <!-- Breadcrumbs Report Road Issue Steps -->
            <nav class="sticky -top-3 py-5 overflow-hidden bg-[#F5F5F5] left-0 w-full flex flex-col justify-center items-center text-gray-700 rounded-lg lg:items-start lg:text-start lg:pl-4">

                <!-- Steps Count -->
                <div class="w-full flex justify-center items-center lg:justify-start space-x-2 mb-2">
                    <!-- Step 1 -->
                    <div :class="step === 1 ? 'text-green-600 font-bold' : 'text-gray-700'"
                         class="text-md">
                            Step 1
                    </div>
                    <!-- Separator -->
                    <div>
                        <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6 10" fill="none" aria-hidden="true">
                            <path d="M1 9L5 5 1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <!-- Step 2 -->
                    <div :class="step === 2 ? 'text-green-600 font-bold' : 'text-gray-700'"
                         class="text-md">
                            Step 2
                    </div>
                    <!-- Separator -->
                    <div>
                        <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6 10" fill="none" aria-hidden="true">
                            <path d="M1 9L5 5 1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <!-- Step 3 -->
                    <div :class="step === 3 ? 'text-green-600 font-bold' : 'text-gray-700'"
                         class="text-md">
                            Step 3
                    </div>
                </div>

                <!-- Steps Description -->
                <div class="text-center lg:text-start lg:float-left">
                    <div :class="step === 1 ? 'text-gray-500 text-sm font-medium lg:float-left' : 'hidden'">Choose name of the road defect issue.</div>
                    <div :class="step === 3 ? 'text-gray-500 text-sm font-medium lg:float-left' : 'hidden'">View your Report Road Concern Information</div>
                </div>


            </nav>

            <!-- Steps Content -->
            <div class="w-full flex justify-center items-center mx-auto z-10">

                <!-- Step 1 | Choose Road Defect Issue -->
                <template x-if="step === 1">

                    <div class="flex flex-col w-full">
                        <!-- Step 1 Content -->
                        <form id="step1">
                            <div class="mt-4 mb-2 bg-white shadow-sm rounded-lg w-full mx-auto border-2 border-gray-300 h-[60vh]">
                                <div class="w-full bg-white shadow-lg rounded-t-lg p-4">
                                    <h2 class="text-[14px] text-center font-semibold text-gray-600">Type of Road Issue Concern</h2>
                                </div>
                                <div class="h-[50vh] overflow-y-auto overflow-x-hidden w-full">
                                    <div @click="selected = 'pothole'" :class="{ 'bg-gray-100': selected === 'pothole' }" class="flex items-center justify-between border-b-2 border-gray-300 py-6 cursor-pointer px-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/images/pothole.png') }}" alt="Pothole" class="w-16 h-16 rounded mr-2">
                                            <p class="text-[13px] text-gray-800">Pothole</p>
                                        </div>
                                        <input type="radio" name="roadIssue" value="pothole" class="h-5 w-5 cursor-pointer accent-[#4AA76F]" :checked="selected === 'pothole'" style="accent-color: #4AA76F;" />
                                    </div>
                                    <div @click="selected = 'raveling'" :class="{ 'bg-gray-100': selected === 'raveling' }" class="flex items-center justify-between border-b-2 border-gray-300 py-6 cursor-pointer px-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/images/raveling.png') }}" alt="Raveling" class="w-16 h-16 rounded mr-2">
                                            <p class="text-[13px] text-gray-800">Raveling</p>
                                        </div>
                                        <input type="radio" name="roadIssue" value="raveling" class="h-5 w-5 cursor-pointer accent-[#4AA76F]" :checked="selected === 'raveling'" style="accent-color: #4AA76F;" />
                                    </div>
                                    <div @click="selected = 'block-cracking'" :class="{ 'bg-gray-100': selected === 'block-cracking' }" class="flex items-center justify-between border-b-2 border-gray-300 py-6 cursor-pointer px-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/images/block-craking.png') }}" alt="Block Cracking" class="w-16 h-16 rounded mr-2">
                                            <p class="text-[13px] text-gray-800">Block Cracking</p>
                                        </div>
                                        <input type="radio" name="roadIssue" value="block-cracking" class="h-5 w-5 cursor-pointer accent-[#4AA76F]" :checked="selected === 'block-cracking'" style="accent-color: #4AA76F;" />
                                    </div>
                                    <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center justify-between border-b-2 border-gray-300 py-6 cursor-pointer px-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/images/slippage-cracking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2">
                                            <p class="text-[13px] text-gray-800">Slippage Cracking</p>
                                        </div>
                                        <input type="radio" name="roadIssue" value="slippage-cracking" class="h-5 w-5 cursor-pointer accent-[#4AA76F]" :checked="selected === 'slippage-cracking'" style="accent-color: #4AA76F;" />
                                    </div>
                                </div>
                                <input type="hidden" name="defect_type" :value="selected">
                            </div>
                        </form>

                        <!-- Next Button-->
                        <div class="mt-10 w-[75%] text-center mx-auto max-w-lg md:mb-50 sm:mb-50">
                            <button @click.prevent="step = 2"
                                    class="px-4 py-3 w-full bg-customGreen text-lg font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-600 md:mb-50">
                                Next
                            </button>
                        </div>
                    </div>

                </template>

                <!-- Step 2 | Capture Road Defect -->
                <template x-if="step === 2">
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
</x-residents.residents-navigation>

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


