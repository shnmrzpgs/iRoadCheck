<x-app-layout>
    <x-User.user-navigation page_title="Report Road Issue">

        <div class="min-h-screen flex flex-col items-center bg-white" x-data="{ step: 1 }">

            <div class="ml-4 text-center">
                <template x-if="step === 1">
                    <div>
                        <p class="text-red-500 text-sm font-medium mt-6">Step 1: Choose the name of the road defect issue.</p>

                        <!-- Report History Section -->
                        <div x-data="{ selected: null }" class="mt-6 bg-white w-[80%] shadow-sm rounded-lg  border-2 border-gray-300 h-[550px] lg:h-[450px]">
                            <div class="w-full bg-white shadow-lg rounded-lg p-4">
                                <h2 class=" text-[14px] font-semibold">Type of Road Issue Concern</h2>
                            </div>
                            <div class="lg:h-[52vh] h-[55vh] overflow-y-auto">
                                <div @click="selected = 'pothole'" :class="{ 'bg-gray-100': selected === 'pothole' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                    <img src="{{ asset('storage/images/pothole.png') }}" alt="Pothole" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Pothole</p>
                                </div>
                                <div @click="selected = 'raveling'" :class="{ 'bg-gray-100': selected === 'raveling' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                    <img src="{{ asset('storage/images/raveling.png') }}" alt="Raveling" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Raveling</p>
                                </div>
                                <div @click="selected = 'block-cracking'" :class="{ 'bg-gray-100': selected === 'block-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6 cursor-pointer">
                                    <img src="{{ asset('storage/images/block craking.png') }}" alt="Block Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Block Cracking</p>
                                </div>
                                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                                </div>
                                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                                </div>
                                <div @click="selected = 'slippage-cracking'" :class="{ 'bg-gray-100': selected === 'slippage-cracking' }" class="flex items-center border-b-2 border-gray-300 py-6">
                                    <img src="{{ asset('storage/images/slippage craking.png') }}" alt="Slippage Cracking" class="w-16 h-16 rounded mr-2 ml-4">
                                    <p class=" text-[13px] text-gray-800 ml-2">Slippage Cracking</p>
                                </div>

                            </div>
                        </div>


                        <!-- Report Road Issue Button -->
                        <div class="mt-9 w-[75%] text-center max-w-lg lg:absolute lg:top-16 lg:right-0 lg:left-[85%] lg:m-6 lg:w-[auto] lg:max-w-[200px]">
                            <button @click="step = 2"
                                    class="px-6 py-4 lg:py-1 lg:text-[14px] w-full bg-customGreen text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-green-400">
                                NEXT
                            </button>
                        </div>
                    </div>
                </template>

                <!-- Step 2 -->
                <template x-if="step === 2">
                    <div>
                        <p class="text-red-500 text-sm font-medium mt-6">Step 2: Capture actual road condition.</p>

                        <div class="camera-wrapper p-6 bg-gray-800 rounded-lg shadow-lg" x-data="camera()" x-init="initializeCamera()">
                            <!-- Camera Stream -->
                            <video id="camera-stream" class="w-full rounded-lg border border-gray-700" autoplay></video>

                            <!-- Capture Button -->
                            <div class="flex justify-center gap-4 mt-4">
                                <button @click="takePicture()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                                    Take Picture
                                </button>
                                <button @click="resetCamera()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                                    Retry
                                </button>
                            </div>

                            <!-- Hidden Canvas -->
                            <canvas id="snapshot" class="hidden"></canvas>

                            <!-- Image Preview -->
                            <img id="captured-image" class="mt-4 w-full rounded-lg hidden" />

                            <!-- Next Button -->
                            <button @click="confirmPicture()"
                                    x-bind:disabled="!imagePreviewElement || imagePreviewElement.classList.contains('hidden')"
                                    class="mt-6 bg-customGreen hover:bg-green-400 text-white px-6 py-4 rounded-full shadow">
                                NEXT
                            </button>
                        </div>
                    </div>
                </template>

                <!-- Step 3 -->
                <template x-if="step === 3">
                    <div>
                        <p class="text-red-500 text-sm font-medium mt-6">Step 3: View your Report Road Concern Information</p>

                        <!-- Report History Section -->
                        <div class="mt-6 bg-white w-[80%] max-w-md shadow-sm rounded-lg border-2 border-gray-300 p-4 h-[550px] lg:h-[600px]">

                            <!-- Captured Road Photo -->
                            <div class=" text-center">
                                <span class="font-semibold text-customGreen">Actual Captured Road Photo:</span>
                                <img src="{{ asset('storage/images/pothole1.png') }}" alt="Road Defect" class="relative w-full " />
                            </div>

                            <!-- Type of Defect -->
                            <div class="mb-6 text-center">
                                <span class="font-semibold text-customGreen">Type of Defect:</span>
                                <span>Pothole</span>
                            </div>

                            <!-- Report ID -->
                            <div class="mb-2">
                                <span class="font-semibold text-customGreen">Report ID:</span>
                                <span class="ml-2">00001</span>
                            </div>

                            <!-- Date and Time -->
                            <div class="mb-2">
                                <span class="font-semibold text-customGreen">Date and Time:</span>
                                <span class="ml-2 mr-8">10/12/2024</span>
                                <span class="ml-[46%]">08:34:02 AM</span>
                            </div>

                            <!-- Location -->
                            <div class="mb-6">
                                <span class="font-semibold text-customGreen">Location:</span>
                                <span class="ml-1">Apokon Street, Tagum City</span>
                            </div>

                            <img x-bind:src="capturedImage" class="mt-4 w-full rounded-lg" />

                        </div>

                        <!-- Report Road Issue Button -->
                        <div class="mt-9 w-[75%] text-center">
                            <button x-data @click="window.location.href='{{ route('suggestion-reports') }}'" class="px-6 py-4 w-full bg-[#FFAD20] text-xl font-semibold text-white shadow-md rounded-full border-2 hover:bg-yellow-400">
                                SUBMIT REPORT
                            </button>
                        </div>
                    </div>
                </template>

            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('camera', () => ({
                    videoElement: null,
                    canvasElement: null,
                    imagePreviewElement: null,
                    capturedImage: null,

                    initializeCamera() {
                        this.videoElement = document.getElementById('camera-stream');
                        this.canvasElement = document.getElementById('snapshot');
                        this.imagePreviewElement = document.getElementById('captured-image');

                        // Access the user's camera
                        navigator.mediaDevices
                            .getUserMedia({ video: true })
                            .then((stream) => {
                                this.videoElement.srcObject = stream;
                            })
                            .catch((err) => {
                                console.error("Error accessing the camera: ", err);
                            });
                    },

                    takePicture() {
                        const context = this.canvasElement.getContext('2d');
                        this.canvasElement.width = this.videoElement.videoWidth;
                        this.canvasElement.height = this.videoElement.videoHeight;
                        context.drawImage(
                            this.videoElement,
                            0,
                            0,
                            this.canvasElement.width,
                            this.canvasElement.height
                        );

                        // Get the image data URL
                        const dataURL = this.canvasElement.toDataURL('image/png');
                        this.capturedImage = dataURL;

                        // Display the captured image
                        this.imagePreviewElement.src = dataURL;
                        this.imagePreviewElement.classList.remove('hidden');
                    },

                    resetCamera() {
                        // Clear the captured image and hide the preview
                        this.imagePreviewElement.src = '';
                        this.imagePreviewElement.classList.add('hidden');
                        this.capturedImage = null;
                    },

                    confirmPicture() {
                        // Proceed to the next step
                        console.log("Picture confirmed:", this.capturedImage);
                    },
                }));
            });
        </script>

    </x-User.user-navigation>
</x-app-layout>

