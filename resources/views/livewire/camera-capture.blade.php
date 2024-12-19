<div>
    <div>
        <p class="text-red-500 text-sm font-medium mt-6">Step 2: Capture current location.</p>

        <div class="location-wrapper p-6 bg-gray-800 rounded-lg shadow-lg" x-data="locationCapture()">
            <!-- Capture Location Button -->
            <div class="flex justify-center gap-4 mt-4">
                <button @click="getLocation" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                    Capture Location
                </button>
            </div>

            <!-- Next Button -->
            <button @click="confirmLocation"
                    x-bind:disabled="!locationCaptured"
                    class="mt-6 bg-customGreen hover:bg-green-400 text-white px-6 py-4 rounded-full shadow">
                NEXT
            </button>
        </div>
    </div>

    <script>
        function locationCapture() {
            return {
                latitude: null,
                longitude: null,
                locationCaptured: false,

                // Function to get the current location
                getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            position => {
                                this.latitude = position.coords.latitude;
                                this.longitude = position.coords.longitude;
                                this.locationCaptured = true;

                                // Make the reverse geocoding request to get the location name
                                const apiKey = 'AIzaSyDxcNxWUhJdJYa4c5GeV4GX9PdDBvsDjJY'; // Replace with your Google Maps API key
                                const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${this.latitude},${this.longitude}&key=${apiKey}`;

                                fetch(geocodeUrl)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 'OK') {
                                            const address = data.results[0].formatted_address;
                                            alert(`Location captured: ${address}`);
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


                // Function to confirm location capture
                confirmLocation() {
                    // Emit the location data to Livewire for backend processing
                    Livewire.emit('storeLocation', this.latitude, this.longitude);
                }
            };
        }
    </script>

</div>
