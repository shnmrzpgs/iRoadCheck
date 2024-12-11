<x-app-layout>

    <x-User.user-navigation page_title="Manage Tagging">

        <div id="notification" class="fixed top-4 right-4 z-50"></div>

        <div class="text-[#202020] bg-[#FBFBFB]  pt-4 px-4 pb-4 rounded-lg drop-shadow">

            <!--Page description and Add button-->
            <div class="flex px-4" >
                <div class="mt-4 mr-auto">

                    <div class="flex flex-col">
                        <div class="sm:flex-auto">
                            <p class="mt-2 text-[12px] text-primary-800">
                                A GIS map to input status to the road concerns through tagging.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legend -->
            <div class="absolute top-28 right-[390px] z-50">
                <!-- Legend Content -->
                <div class="bg-[#3F4243] bg-opacity-90 text-white px-3 py-1 mt-2 rounded shadow-lg text-[12px]">
                    <h3 class="font-semibold mb-2 text-center border-b border-b-white p-1">Legend</h3>
                    <ul>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-green-500 mr-2 rounded-full"></span>Repaired</li>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-yellow-500 mr-2 rounded-full"></span>On Going</li>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-blue-500 mr-2 rounded-full"></span>Unfixed</li>
                        <li class="leading-6"><span class="inline-block w-3 h-3 bg-red-500 mr-2 rounded-full"></span>Not Found</li>
                    </ul>
                </div>
            </div>

            <!-- Map Reports Information -->
            <div class="mt-4 px-2 mb-2 z-0">
                <div class="m-0 border border-t-gray-300 rounded-lg inset-0 p-0">
                    <div class="min-w-full inline-block min-h-[45vh] max-h-[68vh] align-middle p-0 z-0">
                        <div class="flex"
                             x-data="mapComponent()">

                        <!-- Map Container -->
                            <div id="map" class="w-7/10 h-[68vh] bg-white drop-shadow"></div>

                            <!-- Map Information Sidebar -->
                            <div class="w-3/10 bg-white p-4 h-[68vh]">
                                <!--Search-->
                                <div class="flex w-full items-center px-5 mr-auto">
                                    <form class="relative flex flex-1 h-10 rounded-[6px] border border-gray-200" action="#" method="GET" onsubmit="event.preventDefault();">
                                        <label for="search-field" class="sr-only">Search</label>
                                        <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-2 z-10" viewBox="0 0 20 20" fill="#6AA76F" aria-hidden="false">
                                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                        </svg>
                                        <input id="search-field"
                                               class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#6AA76F] focus:border-[#6AA76F] drop-shadow-md focus:bg-white bg-white rounded-[6px] border-none block h-full w-full py-0 pl-8 text-gray-900 placeholder:text-gray-400 xs:text-[10px] sm:text-[12px] md:text-[14px] lg:text-[14px]"
                                               placeholder="Search"
                                               type="text"
                                               x-on:input="filterMarkers($event.target.value)">
                                    </form>
                                </div>

                                <!-- Report Information -->
                                <h2 class="font-semibold text-md mt-5 text-[#4D4F50] fixed px-4">Road Defect Report Information</h2>

                                <div class="mt-16 h-[50vh] overflow-y-auto pb-16 px-6">

                                    <!-- Show this content when no report is selected -->
                                    <template x-if="!selectedReport.id || Object.keys(selectedReport).length === 0">
                                        <div class="mb-4 w-full text-[12px] text-gray-500 text-center"
                                             x-init="lottie.loadAnimation({
                                                  container: $refs.lottieAnimation,
                                                  renderer: 'svg',
                                                  loop: true,
                                                  autoplay: true,
                                                  path: '{{ asset("animations/Animation - 1731695507574.json") }}'
                                                })">
                                            <div  class="flex flex-col items-center justify-center h-full">
                                                <!-- Lottie Animation Container -->
                                                <div x-ref="lottieAnimation" class="w-28 sm:w-36 md:w-48 lg:w-56 max-w-[150px] mt-4 mb-0 drop-shadow-lg"></div>
                                                <p class="text-sm font-medium">Click a marker on the map to view details of the road defect report.</p>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Show this content when a report is selected -->
                                    <template x-if="selectedReport.id" x-show="Object.keys(selectedReport).length > 0">
                                        <div class="mb-4 w-full text-[12px] animate-wipe-right transition-transform duration-200" >
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Report ID:</div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.id"></div>
                                            </div>
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Type of Defect:</div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.defect"></div>
                                            </div>
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Location:</div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.location"></div>
                                            </div>
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Reported Date:</div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.date"></div>
                                            </div>
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Severity:</div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.severity"></div>
                                            </div>
                                            <div class="flex mb-2 space-x-2 leading-6">
                                                <div class="text-[#1AA76F] font-semibold w-4/10">Current Status: </div>
                                                <div class="text-[#4D4F50] font-medium w-6/10" x-text="selectedReport.status"></div>
                                            </div>

                                            <!-- Road Image Report -->
                                            <div class="mb-8">
                                                <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">Road Image:</div>
                                                <div class="w-full rounded-[10px] p-4 drop-shadow bg-white">
                                                    <img :src="selectedReport.image" alt="Defect Image" class="w-full h-auto rounded-[10px] object-cover">
                                                </div>
                                            </div>

                                            <!-- Status Filter -->
                                            <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">
                                                Update Road Status Report:
                                            </div>
                                            <div class="relative flex items-center rounded-[4px] border transition-all duration-100 custom-select"
                                                 :class="{
                                                    'bg-green-50 text-[#4D4F50] border-[#4AA76F] active': newStatus !== '',  /* Active state */
                                                    'text-gray-600 border-gray-300 hover:border-[#4AA76F]': newStatus === ''  /* Default and hover state */
                                                }">

                                                <!-- Status Color Indicator -->
                                                <span :style="{ backgroundColor: getStatusColor(newStatus || selectedReport.status) }" class="w-3 h-3 rounded-full ml-2"></span>

                                                <!-- Dropdown -->
                                                <select x-model="newStatus"
                                                        class="text-[14px] block appearance-none w-full bg-transparent border-none focus:ring-0 px-3 py-1 pr-8 rounded shadow-none focus:outline-none">
                                                    <!-- Display the current status or placeholder -->
                                                    <option value="" class="text-gray-400 text-[12px]" x-text="newStatus || selectedReport.status || 'Select Status'"></option>

                                                    <!-- Dynamically loop through the statuses array -->
                                                    <template x-for="status in statuses" :key="status">
                                                        <option :value="status" :selected="selectedReport.status === status" class="text-gray-700">
                                                            <span x-text="status"></span>
                                                        </option>
                                                    </template>
                                                </select>

                                            </div>

                                            <!--Update Report Status-->
                                            <div class="flex justify-center items-center mt-10">
                                                <button @click="updateReportStatus"
                                                        class="relative w-auto gap-x-[8px] bg-[#4AA76F] px-[12px] py-[8px] font-normal tracking-wider text-white rounded-full hover:drop-shadow hover:scale-105 hover:ease-in-out hover:transition-transform hover:bg-[#3AA76F] hover:shadow-md">
                                                    <span class="mt-[2px] px-2 text-[14px] ">Update Report</span>
                                                </button>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leaflet JS -->
        <script>
            function mapComponent() {
                return {
                    reports: [
                        {
                            id: 1,
                            defect: 'Pothole',
                            location: 'Apokon Road, Tagum City',
                            date: '2024-10-10',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4551,
                            lng: 125.8132,
                        },
                        {
                            id: 2,
                            defect: 'Cracked Pavement',
                            location: 'Rizal Street, Downtown Tagum',
                            date: '2024-10-15',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-pothole.jpg') }}",
                            lat: 7.4483,
                            lng: 125.8127,
                        },
                        {
                            id: 3,
                            defect: 'Flooded Road',
                            location: 'Mabini Street, Tagum City',
                            date: '2024-09-20',
                            severity: 'High',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4520,
                            lng: 125.8055,
                        },
                        {
                            id: 4,
                            defect: 'Eroded Shoulder',
                            location: 'San Miguel Road, Tagum City',
                            date: '2024-08-30',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4601,
                            lng: 125.8245,
                        },
                        {
                            id: 5,
                            defect: 'Sinkhole',
                            location: 'National Highway, Tagum City Center',
                            date: '2024-07-18',
                            severity: 'Critical',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-slippageCrack.png') }}",
                            lat: 7.4528,
                            lng: 125.8183,
                        },
                        {
                            id: 6,
                            defect: 'Debris on Road',
                            location: 'Quirante Road, Near Coastal Area, Tagum City',
                            date: '2024-10-01',
                            severity: 'Low',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-slippageCrack.png') }}",
                            lat: 7.4660,
                            lng: 125.8070,
                        },
                        {
                            id: 7,
                            defect: 'Overgrown Vegetation',
                            location: 'Tagum-Mabini Road, Tagum City',
                            date: '2024-09-12',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4375,
                            lng: 125.7998,
                        },
                        {
                            id: 8,
                            defect: 'Loose Gravel',
                            location: 'Liboganon Road, Tagum City',
                            date: '2024-10-05',
                            severity: 'Low',
                            status: 'Repaired',
                            image: "{{ asset('storage/images/roadDefect-asphaltDepression.jpg') }}",
                            lat: 7.4312,
                            lng: 125.7820,
                        },
                        {
                            id: 9,
                            defect: 'Missing Signage',
                            location: 'Visayan Village, Tagum City',
                            date: '2024-09-25',
                            severity: 'Moderate',
                            status: 'Ongoing',
                            image: "{{ asset('storage/images/roadDefect-pothole.jpg') }}",
                            lat: 7.4460,
                            lng: 125.7972,
                        },
                        {
                            id: 10,
                            defect: 'Damaged Bridge',
                            location: 'Tagum-Panabo Bridge, Outskirts of Tagum City',
                            date: '2024-08-05',
                            severity: 'Critical',
                            status: 'Unfixed',
                            image: "{{ asset('storage/images/roadDefect-patches.jpg') }}",
                            lat: 7.4265,
                            lng: 125.7712,
                        },
                    ],
                    markerLayers: [],
                    newStatus: '',
                    selectedReport: { status: 'Repaired' },
                    statuses: ['Repaired', 'Ongoing', 'Unfixed', 'Not Found'], // Fixed array syntax


                    init() {
                        // Correct bounding box for Tagum City
                        const bounds = [
                            [7.3843, 125.7267], // Southwest corner
                            [7.5100, 125.8867]  // Northeast corner
                        ];

                        // Initialize the map, focused on Tagum City
                        this.map = L.map('map', {
                            center: [7.4475, 125.8067],
                            zoom: 14,
                            minZoom: 13,
                            maxZoom: 18,
                            maxBounds: bounds,
                        });

                        // Add OpenStreetMap tile layer
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 30,
                        }).addTo(this.map);

                        this.map.attributionControl.setPrefix(false);

                        // Add markers for each report
                        this.reports.forEach(report => {
                            const statusColor = getStatusColor(report.status);

                            const marker = L.circleMarker([report.lat, report.lng], {
                                color: 'black',
                                weight: 1,
                                radius: 6,
                                fillColor: statusColor,
                                fillOpacity: 1,
                            }).addTo(this.map);

                        const popupContent = `
                                <div class="max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2">
                                    <div class="max-h-[300px] bg-white text-gray-700 rounded-t-xl leading-4">
                                        <div class="px-3 py-2 flex items-center space-x-2 border-b border-gray-300">
                                            <span style="background-color: ${statusColor}; width: 10px; height: 10px; border-radius: 50%; display: inline-block;"></span>
                                            <h3 class="font-semibold text-xs">Report ID: ${report.id}</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <div>Type of Road Defect: ${report.defect}</div>
                                            <div>Reported Date: ${report.date}</div>
                                            <div class="font-semibold">Location: ${report.location}</div>
                                        </div>
                                    </div>
                                    <div class="max-h-[30px] text-white text-center rounded-b-lg cursor-pointer py-2">
                                        <button x-on:click="viewReport(${report.id})" class="text-[12px] font-semibold">
                                            View Report
                                        </button>
                                    </div>
                                </div>
                            `;

                            marker.on('click', () => {
                                this.viewReport(report.id);
                                marker.openPopup();
                            });

                            marker.bindPopup(popupContent); // Customize this popup as needed
                            report.marker = marker;

                            // Store the entire report in markerLayers for easier access
                            this.markerLayers.push({ marker, report });

                            marker.on('mouseover', function () {
                                this.openPopup();
                            });
                            marker.on('mouseout', function () {
                                this.closePopup();
                            });
                    });

                        // Handle map view updates on move
                        this.map.on('moveend', () => {
                            if (this.selectedReport && this.selectedReport.marker) {
                                this.selectedReport.marker.openPopup();
                            }
                        });
                    },

                oLowerCase()
                            ].join(' ');

                            if (searchableContent.includes(searchQuery)) {
                                if (!this.map.hasLayer(marker)) {
                                    marker.addTo(this.map);
                                    console.log('Added marker for:', report.location); // Debugging line
                                }
                                // Open the popup without auto-panning
                                marker.openPopup();
                            } else {
                                if (this.map.hasLayer(marker)) {
                                    this.map.removeLayer(marker);
                                    console.log('Removed marker for:', report.location); // Debugging line
                                }
                            }
                        });
                    },

                    viewReport(id) {
                        this.selectedReport = this.reports.find(report => report.id === id);
                        if (!this.selectedReport) return;

                        const latLng = [this.selectedReport.lat, this.selectedReport.lng];
                        this.map.setView(latLng, 18, { animate: true });

                        this.selectedReport.marker.openPopup();

                        if (this.pulseLocationIcon) {
                            this.map.removeLayer(this.pulseLocationIcon);
                            clearInterval(this.pulseInterval);
                        }

                        this.pulseLocationIcon = L.circle(latLng, {
                            color: 'blue',
                            fillColor: 'blue',
                            fillOpacity: 0.15,
                            radius: 25
                        }).addTo(this.map);

                        let pulseSize = 25;
                        this.pulseInterval = setInterval(() => {
                            pulseSize = pulseSize === 25 ? 30 : 25;
                            this.pulseLocationIcon.setRadius(pulseSize);
                        }, 500);
                    },

                    updateReportStatus() {
                        if (this.newStatus) {
                            // Update the status of the selected report
                            this.selectedReport.status = this.newStatus;
                            const statusColor = getStatusColor(this.newStatus);

                            // Update marker style to reflect the new status
                            this.selectedReport.marker.setStyle({
                                color: 'black',
                                weight: 1,
                                fillColor: statusColor,
                                fillOpacity: 1,
                            });

                            // Update popup content dynamically
                            const popupContent = `
                                <div class="max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2">
                                    <div class="max-h-[300px] bg-white text-gray-700 rounded-t-xl leading-4">
                                        <div class="px-3 py-2 flex items-center space-x-2 border-b border-gray-300">
                                            <span style="background-color: ${statusColor}; width: 10px; height: 10px; border-radius: 50%; display: inline-block;"></span>
                                            <h3 class="font-semibold text-xs">Report ID: ${this.selectedReport.id}</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <div>Type of Road Defect: ${this.selectedReport.defect}</div>
                                            <div>Reported Date: ${this.selectedReport.date}</div>
                                            <div class="font-semibold">Location: ${this.selectedReport.location}</div>
                                        </div>
                                    </div>
                                    <div class="max-h-[30px] text-white text-center rounded-b-lg cursor-pointer py-2">
                                        <button class="text-[12px] font-semibold">
                                            View Report
                                        </button>
                                    </div>
                                </div>
                            `;

                            // Update the popup content
                            this.selectedReport.marker.setPopupContent(popupContent);

                            // Show a success notification
                            showNotification(`Status updated to: ${this.newStatus}`, 'success');

                            // Clear the input field for new status
                            this.newStatus = '';
                        } else {
                            // Show an error notification
                            showNotification('Please select a status before updating.', 'error');
                        }
                    }

                };
            }
            function getStatusColor(status) {
                switch (status) {
                    case 'Repaired':
                        return '#28a745'; // Green
                    case 'Ongoing':
                        return '#ffc107'; // Yellow
                    case 'Unfixed':
                        return '#dc3545'; // Red
                    case 'Not Found':
                        return '#6c757d'; // Gray
                    default:
                        return '#6c757d'; // Default gray
                }
            }
            function showNotification(message, type = 'success') {
                // Create notification container
                const notification = document.createElement('div');
                notification.className = `flex items-center px-4 py-2 rounded-lg shadow-md text-white relative transition-transform transform scale-95 opacity-0 ${
                    type === 'success' ? 'bg-green-500' : 'bg-red-500'
                }`;

                // Add the notification content
                notification.innerHTML = `
                    <div class="mr-3">
                        <svg class="w-5 h-5 ${
                                type === 'success' ? 'text-green-300' : 'text-red-300'
                            }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            ${
                                type === 'success'
                                    ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />'
                                    : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm4-9a1 1 0 00-1-1H7a1 1 0 000 2h6a1 1 0 001-1z" clip-rule="evenodd" />'
                            }
                        </svg>
                    </div>
                    <div>${message}</div>
                    <div class="absolute bottom-0 left-0 h-1 bg-white bg-opacity-30 w-full progress-bar"></div>
                `;

                // Append notification to the container
                const container = document.getElementById('notification');
                container.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('scale-95', 'opacity-0');
                    notification.classList.add('scale-100', 'opacity-100');
                }, 50);

                // Progress bar animation
                const progressBar = notification.querySelector('.progress-bar');
                progressBar.style.transition = 'width 3s linear';
                progressBar.style.width = '0%';

                // Remove notification after 3 seconds
                setTimeout(() => {
                    // Animate out
                    notification.classList.remove('opacity-100', 'scale-100');
                    notification.classList.add('opacity-0', 'scale-95');

                    // Remove from DOM
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
            }

        </script>
    </x-User.user-navigation>

</x-app-layout>

