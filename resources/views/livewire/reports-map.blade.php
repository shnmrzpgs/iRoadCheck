<!-- Map Container -->
<div></div>

<script>
    function mapComponent() {
        return {

            reports: @json($reports),
            severityMap: {
                1: 'Shallow',
                2: 'Tolerable',
                3: 'Serious',
                4: 'Dangerous',
                // Add more mappings as needed
            },
            markerLayers: [],
            newStatus: '',
            selectedReport: { status: 'Ongoing' },
            statuses: ['Repaired', 'On Going', 'Unfixed'], // Fixed array syntax


            init() {
                this.reports.forEach(report => {
                    report.severity = this.severityMap[report.id] || 'Unknown';
                });
                // Correct bounding box for Tagum City
                const bounds = [
                    [7.3843, 125.7267], // Southwest corner
                    [7.5100, 125.8867]  // Northeast corner
                ];

                // Initialize the map, focused on Tagum City
                this.map = L.map('map', {
                    center: [7.3843, 125.7267],
                    zoom: 14,
                    minZoom: 13,
                    maxZoom: 18,
                    maxBounds: bounds,
                    zoomControl: true
                });
                setTimeout(() => { this.map.invalidateSize() }, 0);



                // Add OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 30,
                }).addTo(this.map);

                // this.map.attributionControl.setPrefix(false);

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
                                    <div>Date Reported: ${report.date}</div>
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

                    // Create the legend container
                    const legend = L.control({ position: 'topright' });

                    legend.onAdd = function () {
                        const div = L.DomUtil.create('div', 'legend absolute top-0 right-4 z-50 w-32');
                        div.innerHTML = `
                            <div class="bg-[#3F4243] bg-opacity-90 text-white px-3 py-1 mt-2 rounded shadow-lg text-[12px]">
                                <h3 class="font-semibold mb-2 text-center border-b border-b-white p-1">Legend</h3>
                                <ul>
                                    <li class="leading-6">
                                        <span class="inline-block w-3 h-3 bg-green-500 mr-2 rounded-full"></span>Repaired
                                    </li>
                                    <li class="leading-6">
                                        <span class="inline-block w-3 h-3 bg-yellow-500 mr-2 rounded-full"></span>On Going
                                    </li>
                                    <li class="leading-6">
                                        <span class="inline-block w-3 h-3 bg-red-500 mr-2 rounded-full"></span>Unfixed
                                    </li>
                                </ul>
                            </div>
                        `;
                        return div;
                    };

                    legend.addTo(this.map);
                });

                // Handle map view updates on move
                this.map.on('moveend', () => {
                    if (this.selectedReport && this.selectedReport.marker) {
                        this.selectedReport.marker.openPopup();
                    }
                });
            },

            filterMarkers(query) {
                this.map.closePopup(); // Close any open popups before filtering
                console.log('filterMarkers called with query:', query); // Debugging line

                const searchQuery = query.toLowerCase();

                this.markerLayers.forEach(({ marker, report }) => {
                    const searchableContent = [
                        report.defect.toLowerCase(),
                        report.location.toLowerCase(),
                        report.status.toLowerCase(),
                        report.date.toLowerCase()
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
            case 'On Going':
                return '#ffc107'; // Yellow
            case 'Unfixed':
                return '#dc3545'; // Red
            default:
                return '#dc3545'; // Red
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
