<x-Admin.map-view-reports-page-content-base>

    <x-slot:page_description>
        This map view page allows admin to view the comprehensive reports of the road defects within Tagum City.
    </x-slot:page_description>

    <x-slot:search_container>
        <svg class="pointer-events-none absolute inset-y-0 left-1 h-full w-4 text-gray-400 ml-3 mt-1 z-0"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#4AA76F">
            <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1l124 124 17 17L478.1 512l-17-17-124-124z" />
        </svg>
        <input
            class="border border-gray-300 focus:outline-none focus:ring-[0.5px] focus:ring-[#4AA76F] focus:border-[#4AA76F] shadow-[0px_1px_5px_rgba(0,0,0,0.2)] focus:bg-white bg-white rounded-[4px] block w-full md:w-[200px] lg:w-[310px] py-2 pl-8 text-gray-900 placeholder:text-gray-400 text-xs"
            x-on:input="filterMarkers($event.target.value)"
            placeholder="Search..."
            type="search" />
    </x-slot:search_container>

    <x-slot:dropdown_filters_container>
        <div class="relative flex rounded-[4px] border hover:shadow-md">
            <select id="locationFilter" class="text-[12px] block w-full bg-transparent border-none px-3 py-1 pr-8 rounded">
                <option value="">Location</option>
            </select>
        </div>

        <div class="relative flex rounded-[4px] border hover:shadow-md">
            <select id="statusFilter" class="text-[12px] block w-full bg-transparent border-none px-3 py-1 pr-8 rounded">
                <option value="">Status</option>
            </select>
        </div>

        <div class="relative flex rounded-[4px] border hover:shadow-md">
            <select id="defectFilter" class="text-[12px] block w-full bg-transparent border-none px-3 py-1 pr-8 rounded">
                <option value="">Road Defect</option>
            </select>
        </div>

        <div class="relative flex rounded-[4px] border hover:shadow-md">
            <select id="severityFilter" class="text-[12px] block w-full bg-transparent border-none px-3 py-1 pr-8 rounded">
                <option value="">Severity</option>
            </select>
        </div>


    </x-slot:dropdown_filters_container>

    <x-slot:comprehensive_or_group_report_information>
        <!-- Show this content when no report is selected -->
        <template x-for="i in 4" :key="i">
            <div class="bg-white shadow-md p-4 rounded-lg flex justify-between items-center border">
                <div>
                    <h3 class="font-bold">Potholes</h3>
                    <p class="text-gray-500">Anywhere Street</p>
                    <p class="text-sm text-gray-400">Current Report Status: <span x-text="i * 10"></span> days ago</p>
                </div>
                <div class="text-center border-2 border-orange-400 text-orange-400 px-4 py-2 rounded-lg">
                    <span class="text-xl font-bold">500</span>
                    <p class="text-xs">reports</p>
                </div>
            </div>
        </template>

    </x-slot:comprehensive_or_group_report_information>

    <x-slot:individual_report_information>
        <!-- Show this content when a report is selected -->
        <template x-if="selectedReport.id" x-show="Object.keys(selectedReport).length > 0">
            <div class="mb-4 mt-16 w-full text-[12px] animate-wipe-right transition-transform duration-200" >
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
                    <option value="" disabled selected x-text="selectedReport.status || 'Select Status'"></option>
                </div>

                <!-- Road Image Report -->
                <div class="mb-8">
                    <div class="font-semibold text-[12px] mt-4 mb-2 text-[#1AA76F]">Road Image:</div>
                    <div class="w-full rounded-[10px] p-4 drop-shadow bg-white">
                        <img
                            :src="selectedReport.image ? `/storage/${selectedReport.image}` : '/images/placeholder.png'"
                            alt="Defect Image"
                            class="w-full h-auto rounded-[10px] object-contain cursor-pointer"
                            @click="showModal = true; scale = 1"
                        />
                    </div>
                </div>
            </div>
        </template>
    </x-slot:individual_report_information>

</x-Admin.map-view-reports-page-content-base>

<script>
    var geoJsonData = @json($geoJsonData);

    function mapComponent() {
        return {
            reports: @json($reports),
            severityMap: {
                1: 'Shallow',
                2: 'Tolerable',
                3: 'Serious',
                4: 'Dangerous'
            },
            markerLayers: [],
            selectedReport: null,
            newStatus: '',
            statuses: ['Repaired', 'On Going', 'Unfixed'],
            pulseLocationIcon: null,
            pulseInterval: null,
            filteredReports: [],

            init() {
                this.reports.forEach(report => report.severity = this.severityMap[report.id] || 'Unknown');
                this.filteredReports = [...this.reports]; // Initially show all reports

                const bounds = [
                    [7.3273, 125.6617],
                    [7.5670, 125.9517]
                ];

                this.map = L.map('map', {
                    center: [7.448, 125.809],
                    zoom: 12,
                    minZoom: 12,
                    maxZoom: 18,
                    maxBounds: bounds,
                    maxBoundsViscosity: 1.0,
                    zoomControl: false
                });

                this.map.fitBounds(bounds);
                setTimeout(() => this.map.invalidateSize(), 0);
                L.control.zoom({ position: 'bottomleft' }).addTo(this.map);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 30 }).addTo(this.map);

                this.addLegend();
                this.map.on('moveend', () => this.enforceBounds(bounds));

                this.loadGeoJSON();
                this.updateMarkers();
                // ✅ Revalidate size every 5 seconds in case of dynamic changes
                setInterval(() => {
                    this.map.invalidateSize();
                }, 500); // Adjust timing as needed
            },

            loadGeoJSON() {
                fetch("{{ asset('geoJSON/tagumCityRoad.json') }}")
                    .then(response => response.json())
                    .then(data => {
                        if (this.geoJSONLayer) this.map.removeLayer(this.geoJSONLayer);

                        this.geoJSONLayer = L.geoJSON(data, {
                            style: {
                                color: "#FF0000",
                                weight: 5,
                                opacity: 1
                            },
                            onEachFeature: (feature, layer) => {
                                if (feature.properties) {
                                    layer.bindPopup(JSON.stringify(feature.properties));
                                }
                            }
                        }).addTo(this.map);

                        const bounds = this.geoJSONLayer.getBounds();
                        this.map.fitBounds(bounds);
                    })
                    .catch(error => console.error("Error loading GeoJSON:", error));
            },

            updateMarkers() {
                this.markerLayers.forEach(layer => this.map.removeLayer(layer));
                this.markerLayers = [];

                this.filteredReports.forEach(report => {
                    const marker = L.circleMarker([report.lat, report.lng], {
                        color: 'black',
                        weight: 1,
                        radius: 6,
                        fillColor: this.getStatusColor(report.status),
                        fillOpacity: 1
                    }).addTo(this.map);

                    const popupContent = document.createElement('div');
                    popupContent.className = "max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2";
                    popupContent.innerHTML = `
                        <div class="max-h-[300px] bg-white text-gray-700 rounded-t-xl leading-4">
                            <div class="px-3 py-2 flex items-center space-x-2 border-b border-gray-300">
                                <span style="background-color: ${this.getStatusColor(report.status)};
                                    width: 10px; height: 10px; border-radius: 50%; display: inline-block;">
                                </span>
                                <h3 class="font-semibold text-xs">Report ID: ${report.id}</h3>
                            </div>
                            <div class="px-3 py-2">
                                <div>Type of Road Defect: ${report.defect}</div>
                                <div>Date Reported: ${report.date}</div>
                                <div class="font-semibold">Location: ${report.location}</div>
                            </div>
                        </div>
                        <div class="max-h-[30px] text-white text-center rounded-b-lg cursor-pointer py-2"
                            style="background-color: #f87171">
                            <button id="view-report-${report.id}" class="text-[12px] font-semibold">
                                View Report
                            </button>
                        </div>
                    `;


                    const popup = L.popup({ autoClose: false, closeOnClick: false }).setContent(popupContent);
                    marker.bindPopup(popup);

                    // Improved 'View Report' Button Logic
                    popupContent.querySelector(`#view-report-${report.id}`).addEventListener("click", (e) => {
                        e.stopPropagation();
                        this.viewReport(report.id); // Ensures correct data population
                    });


                    marker.on('click', () => {
                        this.viewReport(report.id);
                        marker.openPopup();
                    });

                    // Enhanced Popup Behavior
                    popupContent.addEventListener("mouseenter", () => marker.openPopup());
                    popupContent.addEventListener("mouseleave", () => {
                        setTimeout(() => {
                            if (!popupContent.matches(':hover')) {
                                marker.closePopup();
                            }
                        }, 200); // Delay for smoother behavior
                    });

                    marker.on('click', () => {
                        this.viewReport(report.id);
                        this.closeAllPopups();
                        marker.openPopup();
                    });

                    marker.on("mouseover", () => marker.openPopup());
                    marker.on("mouseout", () => {
                        setTimeout(() => {
                            if (!popupContent.matches(':hover')) {
                                marker.closePopup();
                            }
                        }, 200); // Delay for smoother hover effect
                    });

                    this.markerLayers.push(marker);
                    report.marker = marker;
                });
            },

            filterMarkers(query) {
                const searchQuery = query.toLowerCase().trim();

                this.filteredReports = this.reports.filter(report => {
                    return [
                        report.defect?.toLowerCase(),
                        report.location?.toLowerCase(),
                        report.status?.toLowerCase(),
                        report.date?.toLowerCase()
                    ].some(field => field?.includes(searchQuery));
                });

                this.updateMarkers();

                if (this.filteredReports.length === 1) {
                    const matchedReport = this.filteredReports[0];
                    const latLng = [matchedReport.lat, matchedReport.lng];

                    this.map.setView(latLng, 18, { animate: true });

                    matchedReport.marker.openPopup();

                    // ✅ Add Bounce Effect
                    const markerElement = matchedReport.marker._icon; // Access marker DOM element
                    if (markerElement) {
                        markerElement.classList.add('bounce-marker');

                        // Remove bounce class after animation ends for future reuse
                        setTimeout(() => markerElement.classList.remove('bounce-marker'), 500);
                    }

                    // ✅ Add Pulse Effect (Optional Visual Enhancement)
                    if (this.pulseLocationIcon) {
                        this.map.removeLayer(this.pulseLocationIcon);
                        clearInterval(this.pulseInterval);
                    }

                    this.pulseLocationIcon = L.circle(latLng, {
                        color: 'blue',
                        fillColor: 'blue',
                        fillOpacity: 0.15,
                        radius: 10
                    }).addTo(this.map);

                    this.pulseLocationIcon.bringToBack();

                    let pulseSize = 10;
                    this.pulseInterval = setInterval(() => {
                        pulseSize = pulseSize === 10 ? 15 : 10;
                        this.pulseLocationIcon.setRadius(pulseSize);
                    }, 1000);
                }
            },

            addLegend() {
                const legend = L.control({ position: 'topleft' });

                legend.onAdd = () => {
                    const div = L.DomUtil.create('div', 'legend absolute top-0 left-4 z-50 w-32');
                    div.innerHTML = `
                        <div class="bg-[#3F4243] bg-opacity-90 text-white px-3 py-1 mt-2 rounded shadow-lg text-[12px]">
                            <h3 class="font-semibold mb-2 text-center border-b border-b-white p-1">Legend</h3>
                            <ul>
                                <li class="leading-6"><span class="inline-block w-3 h-3 bg-green-500 mr-2 rounded-full"></span>Repaired</li>
                                <li class="leading-6"><span class="inline-block w-3 h-3 bg-yellow-500 mr-2 rounded-full"></span>On Going</li>
                                <li class="leading-6"><span class="inline-block w-3 h-3 bg-red-500 mr-2 rounded-full"></span>Unfixed</li>
                            </ul>
                        </div>
                    `;
                    return div;
                };

                legend.addTo(this.map);
            },

            enforceBounds(bounds) {
                if (!this.map.getBounds().intersects(bounds)) {
                    this.map.fitBounds(bounds, { animate: true });
                }
            },

            viewReport(id) {
                this.selectedReport = this.reports.find(report => report.id === id);
                if (!this.selectedReport) return;

                const latLng = [this.selectedReport.lat, this.selectedReport.lng];
                this.map.setView(latLng, 18, { animate: true });

                this.selectedReport.marker.openPopup();

                // ✅ Clear previous pulse effect if it exists
                if (this.pulseLocationIcon) {
                    this.map.removeLayer(this.pulseLocationIcon);
                    clearInterval(this.pulseInterval);
                    this.pulseLocationIcon = null; // Reset reference
                }

                // ✅ Add new pulse effect
                this.pulseLocationIcon = L.circle(latLng, {
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.15,
                    radius: 15
                }).addTo(this.map);

                this.pulseLocationIcon.bringToBack();

                // ✅ Animate the pulse effect
                let pulseSize = 15;
                this.pulseInterval = setInterval(() => {
                    if (!this.pulseLocationIcon) return; // Safety check if layer is removed
                    pulseSize = pulseSize === 15 ? 25 : 15;
                    this.pulseLocationIcon.setRadius(pulseSize);
                }, 1000);
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
            },

            getStatusColor(status) {
                return {
                    'Repaired': '#28a745',
                    'Ongoing': '#ffc107',
                    'Unfixed': '#dc3545'
                }[status] || '#dc3545';
            },
        };
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Assuming `this.reports` is already available in your script
        const reports = window.reports || []; // Fallback if reports are not available

        // Extract unique values from reports
        const locations = [...new Set(reports.map(report => report.location).filter(Boolean))];
        const statuses = [...new Set(reports.map(report => report.status).filter(Boolean))];
        const defectTypes = [...new Set(reports.map(report => report.defect).filter(Boolean))];
        const severities = [...new Set(reports.map(report => report.severity).filter(Boolean))];

        // Function to populate dropdowns
        function populateDropdown(selectId, items) {
            const select = document.getElementById(selectId);
            select.innerHTML = `<option value="">Select ${selectId.replace("Filter", "")}</option>`; // Default option
            items.forEach(item => {
                const option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                select.appendChild(option);
            });
        }

        // Populate dropdowns with unique values
        populateDropdown("locationFilter", locations);
        populateDropdown("statusFilter", statuses);
        populateDropdown("defectFilter", defectTypes);
        populateDropdown("severityFilter", severities);

        // Attach event listeners to filters
        document.getElementById("locationFilter").addEventListener("change", function () {
            window.filterMarkers("", "location", this.value);
        });

        document.getElementById("statusFilter").addEventListener("change", function () {
            window.filterMarkers("", "status", this.value);
        });

        document.getElementById("defectFilter").addEventListener("change", function () {
            window.filterMarkers("", "defect", this.value);
        });

        document.getElementById("severityFilter").addEventListener("change", function () {
            window.filterMarkers("", "severity", this.value);
        });
    });


</script>


