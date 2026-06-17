function init(){
    getProviderLocations();
}

function validations(){

}

function events(){

    // 5. UX Feature: වම් පැත්තේ තියෙන කාඩ් එකක් ක්ලික් කරපු ගමන් මැප් එක ඒ තැනට සූම් වෙලා පොපප් එක ඇරෙනවා
    $('.provider-card').on('click', function() {
        
        var lat = $(this).data('lat');
        var lng = $(this).data('lng');
        var id = $(this).data('id');

        // මැප් එක ඒ ලොකේෂන් එකට Smoothව අරන් යනවා (Pan to location)
        map.setView([lat, lng], 15, { animate: true, duration: 1 });

        // අදාළ පින් එකේ පොපප් එක ඕපන් කරනවා
        markers[id].openPopup();
    });

    // 6. Browser Geolocation: කස්ටමර් ලැප්ටොප් එකෙන් ආවත් එයා ඉන්න තැන ඔටෝ හොයාගන්න සිස්ටම් එක
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            // කස්ටමර් ඉන්න තැනට මැප් එක මැද කරලා Blue Marker එකක් දානවා
            map.setView([userLat, userLng], 14);

            var userMarker = L.circleMarker([userLat, userLng], {
                radius: 10,
                fillColor: "#3b82f6", // Blue color for customer
                color: "#fff",
                weight: 2,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map).bindPopup("<b>You are here</b>").openPopup();

        }, function() {
            console.log("Location access denied by user.");
        });
    }
}

function getProviderLocations(){
    // මැප් එක ලෝඩ් කරනවා
    var map = L.map('map').setView([7.2906, 80.6337], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    $.ajax({
        type: "GET",
        url: "/get-provider-location-details",
        dataType: "json",
        success: function (response) {
            if(response.status == 200){
                var data = response.dataSet; // var දාලා ලෝකල් වාරිvariable එකක් කරන්න

                // 🚀 jQuery $.each එක පාවිච්චි කරලා ලූප් කරමු
                $.each(data, function(index, key){

                    // 💡 String ආවොත් ෂුවර් වෙන්න float කරගන්නවා
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
