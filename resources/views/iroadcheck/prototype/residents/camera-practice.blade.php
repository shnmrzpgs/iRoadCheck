<x-app-layout>
    <div class="camera-wrapper p-6 bg-gray-800 rounded-lg shadow-lg" x-data="camera()" x-init="initializeCamera()">
        <!-- Camera Stream -->
        <video id="camera-stream" class="w-full rounded-lg border border-gray-700" autoplay></video>
        <!-- Capture Button -->
        <button @click="takePicture()" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
            Take Picture
        </button>
        <!-- Hidden Canvas -->
        <canvas id="snapshot" class="hidden"></canvas>
        <!-- Image Preview -->
        <img id="captured-image" class="mt-4 w-full rounded-lg hidden" />
    </div>

    <!-- Alpine.js Script -->
    <script>
        function camera() {
            return {
                videoElement: null,
                canvasElement: null,
                imagePreviewElement: null,
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
                    console.log("Captured Image URL: ", dataURL);

                    // Display the captured image
                    this.imagePreviewElement.src = dataURL;
                    this.imagePreviewElement.classList.remove('hidden');
                },
            };
        }
    </script>


</x-app-layout>
