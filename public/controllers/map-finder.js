var map;
var markers = {};
var userMarker;

function init(){
    getProviderLocations();
    getUserLiveLocation();
}

function validations(){

}

function events(){

    $('.provider-card').on('click', function() {
        var lat = $(this).data('lat');
        var lng = $(this).data('lng');
        var id = $(this).data('id');

        if (map) {
            map.setView([lat, lng], 15, { animate: true, duration: 1 });
        }

        if (markers[id]) {
            markers[id].openPopup();
        }
    });

    $('#txtLocation').on('keypress', function(e) {
        if (e.which == 13) {
            var searchQuery = $(this).val().trim();

            if (searchQuery !== '') {
                searchLocationViaOSM(searchQuery);
            }
        }
    });
}

function getProviderLocations(){
    map = L.map('map').setView([7.2906, 80.6337], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    $.ajax({
        type: "GET",
        url: "/get-provider-location-details",
        dataType: "json",
        success: function (response) {
            if(response.status == 200){
                var data = response.dataSet;
                $.each(data, function(index, key){

                    var lat = parseFloat(key.latitude);
                    var lng = parseFloat(key.longitude);

                    if (!isNaN(lat) && !isNaN(lng)) {
                        var marker = L.marker([lat, lng]).addTo(map);

                        var popupContent = `
                            <div class="p-1 font-sans">
                                <span class="text-[9px] font-bold text-amber-600 uppercase block">${key.name}</span>
                                <h4 class="text-xs font-bold text-slate-900 mt-0.5">${key.mobile}</h4>
                                <p class="text-xs text-slate-600 mt-1">City: <b>${key.city}</b></p>
                                <a href="/provider/${key.id}" class="inline-block mt-2 px-2 py-1 text-[10px] font-bold bg-slate-900 text-white rounded-md no-underline">View Profile</a>
                            </div>
                        `;

                        marker.bindPopup(popupContent);

                        markers[key.id] = marker;
                    }
                });
            }
        },
    });
}

function getUserLiveLocation(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            if (map) {
                map.setView([userLat, userLng], 14);

                L.circleMarker([userLat, userLng], {
                    radius: 10,
                    fillColor: "#3b82f6",
                    color: "#fff",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.8
                }).addTo(map).bindPopup("<b>You are here</b>").openPopup();
            }

        }, function() {
            console.log("Location access denied by user.");
        });
    }
}

function searchLocationViaOSM(query) {
    // ලංකාව ඇතුළේ විතරක් සර්ච් වෙන්න "Sri Lanka" කෑල්ල අගට එකතු කරනවා
    var fullQuery = query + ", Sri Lanka";

    $.ajax({
        type: "GET",
        url: "https://nominatim.openstreetmap.org/search", // කෙළින්ම OSM API එකට යනවා
        data: {
            q: fullQuery,
            format: "json",
            limit: 1
        },
        dataType: "json",
        success: function(response) {
            if (response && response.length > 0) {
                var lat = parseFloat(response[0].lat);
                var lng = parseFloat(response[0].lon);
                var displayName = response[0].display_name.split(',')[0]; // මුල්ම නම විතරක් ගන්නවා (උදා: Kandy)

                if (map) {
                    // ⏱️ 3. මැප් එක සර්ච් කරපු තැනට Smoothව අරන් යනවා
                    map.setView([lat, lng], 14, { animate: true, duration: 1.5 });

                    // 🧹 4. කලින් තිබ්බ නිල් බෝලය මැප් එකෙන් අයින් කරනවා (නැත්නම් බෝල ගොඩක් ඉතුරු වෙයි)
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }

                    // 🔵 5. අලුත් තැන උඩ නිල් පාට බෝලය (Circle Marker) හිටවනවා
                    userMarker = L.circleMarker([lat, lng], {
                        radius: 10,
                        fillColor: "#3b82f6",
                        color: "#fff",
                        weight: 2,
                        opacity: 1,
                        fillOpacity: 0.8
                    }).addTo(map).bindPopup(`<b>Your Searched: ${displayName}</b>`).openPopup();
                }
            } else {
                alert("Location not found!");
            }
        },
        error: function(err) {
            console.log("OSM Geocoding Error: ", err);
        }
    });
}
