<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Lokasi Jaringan Distribusi</title>

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        #mapid {
            height: 100vh;
            /* Set height to 80% of viewport height */
            width: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Center dropdown with some spacing */
        .dropdown-container {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <!-- Container for Bootstrap -->
    <div class="container">
        <div class="row">
            <!-- Dropdown to select region -->
            <div class="col-md-4 mx-auto dropdown-container">
                <label for="wilayah" class="font-weight-bold">Pilih Wilayah:</label>
                <select id="wilayah" class="form-control" onchange="changeMap()">
                    <option value="tnj">Tanjungpinang</option>
                    <option value="kjg">Kijang</option>
                    <option value="tub">Tanjung Uban</option>
                </select>
            </div>
        </div>

        <!-- Map Container -->
        <div class="row">
            <div class="col-12">
                <div id="mapid"></div>
            </div>
        </div>
    </div>

    <!-- Street view is hidden in this example but can be enabled as needed -->
    <div id="street-view"></div>

    <!-- Google Maps API -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB861q02tPb43SuX8bSUB_mGJgo1KJ-YjE&callback=initMap&loading=async"></script>

    <script>
        var map;
        var mapOptions = {
            tnj: {
                center: {
                    lat: 0.916718,
                    lng: 104.484081
                },
                zoom: 12,
                mapTypeId: 'satellite'
            },
            kjg: {
                center: {
                    lat: 0.853712,
                    lng: 104.597167
                },
                zoom: 13,
                mapTypeId: 'satellite'
            },
            tub: {
                center: {
                    lat: 1.073478,
                    lng: 104.236227
                },
                zoom: 13,
                mapTypeId: 'satellite'
            }
        };

        function initMap() {
            map = new google.maps.Map(document.getElementById('mapid'), mapOptions['tnj']);
            loadGeoJSONData();
            loadMarkerData();
        }

        function changeMap() {
            var selectedRegion = document.getElementById('wilayah').value;
            map = new google.maps.Map(document.getElementById('mapid'), mapOptions[selectedRegion]);
            loadGeoJSONData();
            loadMarkerData();
        }

        function loadGeoJSONData() {
            $.getJSON("get_geojson.php", function(geojsonData) {
                var geojsonLayer = new google.maps.Data({
                    map: map
                });
                geojsonLayer.setStyle({
                    strokeColor: 'orange',
                    strokeWeight: 2,
                    strokeOpacity: 0.8
                });
                geojsonLayer.addGeoJson(geojsonData);
            });
        }

        function loadMarkerData() {
            $.getJSON("get_markers.php", function(markerData) {
                markerData.forEach(function(marker) {
                    var popupContent = `<b>${marker.name}</b><br>
                        <u>${marker.time}</u><br>
                        Pressure: ${marker.pressure} bar<br>
                        Flow: ${marker.flow} m³/h<br>
                        TDS: ${marker.tds} ppm<br>
                        Level: ${marker.level} m`;

                    var infowindow = new google.maps.InfoWindow({
                        content: popupContent
                    });

                    var circleRadius = calculateCircleRadius(marker.pressure);
                    var circleColor = marker.pressure >= 1 ? 'blue' : 'red';

                    var markerWithLabel = new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(marker.latitude), parseFloat(marker.longitude)),
                        map: map,
                        label: {
                            text: marker.name,
                            fontSize: '12px'
                        },
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: circleRadius,
                            fillColor: circleColor,
                            fillOpacity: 0.6,
                            strokeWeight: 0
                        }
                    });

                    markerWithLabel.addListener('click', function() {
                        infowindow.open(map, markerWithLabel);
                    });
                });
            });
        }

        function calculateCircleRadius(pressure) {
            return Math.max(0, 12 - pressure);
        }
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>