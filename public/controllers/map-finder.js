var map;
var markers = {};

function init(){
    getProviderLocations();
    getUserLiveLocation();
}

function validations(){

}

function events(){
    // 5. UX Feature: වම් පැත්තේ කාඩ් එකක් ක්ලික් කරාම මැප් එක සූම් වෙන එක
    $('.provider-card').on('click', function() {
        var lat = $(this).data('lat');
        var lng = $(this).data('lng');
        var id = $(this).data('id');

        // දැන් 'map' එක Global නිසා මේක ලස්සනට වැඩ කරනවා
        if (map) {
            map.setView([lat, lng], 15, { animate: true, duration: 1 });
        }

        if (markers[id]) {
            markers[id].openPopup();
        }
    });
}

function getProviderLocations(){
    // 💡 'var' කෑල්ල අයින් කරලා කෙළින්ම Global variable එකට මැප් එක Assign කරන්න
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

                // ✅ අර කොමාවේ ලෙඩේ හැදුවා (console.log)
                console.log(data);

                // 🚀 jQuery $.each එකෙන් ලූප් කරනවා
                $.each(data, function(index, key){

                    var lat = parseFloat(key.latitude);
                    var lng = parseFloat(key.longitude);

                    if (!isNaN(lat) && !isNaN(lng)) {
                        // මැප් එක උඩ පින් එක හිටවනවා
                        var marker = L.marker([lat, lng]).addTo(map);

                        // Popup එක හදනවා
                        var popupContent = `
                            <div class="p-1 font-sans">
                                <span class="text-[9px] font-bold text-amber-600 uppercase block">${key.name}</span>
                                <h4 class="text-xs font-bold text-slate-900 mt-0.5">${key.mobile}</h4>
                                <p class="text-xs text-slate-600 mt-1">City: <b>${key.city}</b></p>
                                <a href="/provider/${key.id}" class="inline-block mt-2 px-2 py-1 text-[10px] font-bold bg-slate-900 text-white rounded-md no-underline">View Profile</a>
                            </div>
                        `;

                        marker.bindPopup(popupContent);

                        // ID එකෙන් මාකර් එක සේව් කරගන්නවා
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
