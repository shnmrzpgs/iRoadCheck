<div></div>

<script>
    function mapComponent() {
        return {
            reports: @json($reports),
            severityMap: {
                1: 'Shallow',
                2: 'Tolerable',
                3: 'Serious',
                4: 'Dangerous'
            },
            markerLayerGroup: null,
            selectedReport: null,
            newStatus: '',
            statuses: ['Repaired', 'On Going', 'Unfixed'],
            pulseLocationIcon: null,
            pulseInterval: null,

            init() {
                this.reports.forEach(report => report.severity = this.severityMap[report.id] || 'Unknown');

                const bounds = [
                    [7.3273, 125.6617],
                    [7.5670, 125.9517]
                ];

                this.map = L.map('map', {
                    center: [7.448, 125.809],
                    zoom: 14,
                    minZoom: 12,
                    maxZoom: 18,
                    maxBounds: bounds,
                    zoomControl: false
                });

                setTimeout(() => this.map.invalidateSize(), 0);
                L.control.zoom({ position: 'bottomleft' }).addTo(this.map);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 30 }).addTo(this.map);

                this.markerLayerGroup = L.layerGroup().addTo(this.map);
                this.reports.forEach(report => this.addMarker(report));

                this.addLegend();
                this.map.on('moveend', () => this.enforceBounds(bounds));

                // Load and add GeoJSON with enhanced styling and interactions
                this.loadGeoJSON();

                {{--fetch("{{ asset('geoJSON/tagumCityRoad.json') }}")--}}
                {{--    .then(response => response.json())--}}
                {{--    .then(data => {--}}
                {{--        console.log("GeoJSON Loaded:", data); // Debugging step--}}

                {{--        // ✅ Use `this.map` instead of `map`--}}
                {{--        L.geoJSON(data, {--}}
                {{--            style: {--}}
                {{--                color: "blue",--}}
                {{--                weight: 2,--}}
                {{--                opacity: 0.8--}}
                {{--            },--}}
                {{--            onEachFeature: function (feature, layer) {--}}
                {{--                if (feature.properties && feature.properties.name) {--}}
                {{--                    layer.bindPopup(`<b>Road Name:</b> ${feature.properties.name}`);--}}
                {{--                }--}}
                {{--            }--}}
                {{--        }).addTo(this.map); // ✅ Use `this.map`--}}
                {{--    })--}}
                {{--    .catch(error => console.error("Error loading GeoJSON:", error));--}}

                // ✅ Revalidate size every 5 seconds in case of dynamic changes
                setInterval(() => {
                    this.map.invalidateSize();
                }, 500); // Adjust timing as needed
            },

            loadGeoJSON() {
                fetch("{{ asset('geoJSON/tagumCityRoad.json') }}")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("GeoJSON Loaded:", data);
                        console.log("Number of features:", data.features ? data.features.length : 0);

                        // Verify data structure
                        if (!data.features || data.features.length === 0) {
                            console.error("No features found in GeoJSON");
                            return;
                        }

                        // Log first feature for debugging
                        console.log("First feature:", data.features[0]);
                        console.log("First feature coordinates:", data.features[0].geometry.coordinates);

                        // Remove existing GeoJSON layer if it exists
                        if (this.geoJSONLayer) {
                            this.map.removeLayer(this.geoJSONLayer);
                        }

                        // Try creating the layer with simpler styling first
                        try {
                            this.geoJSONLayer = L.geoJSON(data, {
                                style: {
                                    color: "#FF0000", // Bright red for visibility
                                    weight: 5,        // Thicker lines
                                    opacity: 1        // Full opacity
                                },
                                onEachFeature: (feature, layer) => {
                                    console.log("Processing feature:", feature.properties);

                                    // Simple popup for testing
                                    if (feature.properties) {
                                        layer.bindPopup(JSON.stringify(feature.properties));
                                    }
                                }
                            }).addTo(this.map);

                            // Log the created layer
                            console.log("GeoJSON Layer created:", this.geoJSONLayer);

                            // Try to fit bounds to verify features are within view
                            try {
                                const bounds = this.geoJSONLayer.getBounds();
                                console.log("Layer bounds:", bounds);
                                this.map.fitBounds(bounds);
                            } catch (e) {
                                console.error("Error fitting bounds:", e);
                            }

                            // Bring to front for visibility
                            this.geoJSONLayer.bringToFront();

                        } catch (error) {
                            console.error("Error creating GeoJSON layer:", error);
                        }
                    })
                    .catch(error => {
                        console.error("Error loading GeoJSON:", error);
                    });
            },

            addMarker(report) {
                const statusColor = this.getStatusColor(report.status);

                const marker = L.circleMarker([report.lat, report.lng], {
                    color: 'black',
                    weight: 1,
                    radius: 6,
                    fillColor: statusColor,
                    fillOpacity: 1
                }).addTo(this.markerLayerGroup);

                const popupContent = document.createElement('div');
                popupContent.className = "max-w-[400px] h-auto rounded-lg shadow-lg text-[12px] font-sans text-white grid grid-row-2";
                popupContent.innerHTML = `
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
                        <button id="view-report-${report.id}" class="text-[12px] font-semibold">
                            View Report
                        </button>
                    </div>
                `;

                // Create popup with a reference to the element
                const popup = L.popup({ autoClose: false, closeOnClick: false })
                    .setContent(popupContent);

                marker.bindPopup(popup);

                // Ensure button click is still interactive after marker is clicked
                popupContent.querySelector(`#view-report-${report.id}`).addEventListener("click", (e) => {
                    e.stopPropagation();
                    this.viewReport(report.id);
                });

                // ✅ Prevent popup from closing when hovering over it
                popupContent.addEventListener("mouseenter", () => marker.openPopup());
                popupContent.addEventListener("mouseleave", () => marker.closePopup());

                // ✅ Ensure only one popup stays open at a time
                marker.on('click', () => {
                    this.viewReport(report.id);
                    this.closeAllPopups(); // Close any previously opened popups
                    marker.openPopup();
                });

                // ✅ Open popup on hover, but allow clicking "View Report"
                marker.on("mouseover", () => marker.openPopup());
                marker.on("mouseout", () => marker.closePopup());

                report.marker = marker;
                //inig hover nko dapat makaclick ko sa view report button nga naa sa popupcontent but if wala na nko na hover kay moclose automatically ang popupcontent
            },

            // 🔥 Helper function to close all popups before opening a new one
            closeAllPopups() {
                this.markerLayerGroup.eachLayer(layer => {
                    if (layer.closePopup) layer.closePopup();
                });
            },

            addLegend() {
                const legend = L.control({ position: 'topleft' });

                legend.onAdd = function () {
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

                // Remove previous pulse effect if it exists
                if (this.pulseLocationIcon) {
                    this.map.removeLayer(this.pulseLocationIcon);
                    clearInterval(this.pulseInterval);
                }

                // ✅ Add pulse effect behind the marker
                this.pulseLocationIcon = L.circle(latLng, {
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.15,
                    radius: 10
                }).addTo(this.map);

                this.pulseLocationIcon.bringToBack(); // ✅ Push pulse behind the marker

                // ✅ Animate the pulse effect
                let pulseSize = 10;
                this.pulseInterval = setInterval(() => {
                    pulseSize = pulseSize === 10 ? 15 : 10;
                    this.pulseLocationIcon.setRadius(pulseSize);
                }, 1000);
            },

            getStatusColor(status) {
                return {
                    'Repaired': '#28a745',
                    'On Going': '#ffc107',
                    'Unfixed': '#dc3545'
                }[status] || '#dc3545';
            },
        };
    }
</script>
