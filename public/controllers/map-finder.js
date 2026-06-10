function init(){

}
function validations(){

}
function events(){
    var map = L.map('map').setView([7.2906, 80.6337], 13);

    // 2. OpenStreetMap එකෙන් සිතියමේ පින්තූර (Tiles) ටික මැප් එකට දානවා
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // 3. ඩේටාබේස් එකෙන් එන ප්‍රොවයිඩර්ලාගේ Dummy Array එකක් (ඉස්සරහට මේක Blade එකෙන් Live ගමු මචං)
    var providers = [
        { id: 1, name: "JB Photography", cat: "Photography", lat: 7.2906, lng: 80.6337, price: "Rs. 65,000" },
        { id: 2, name: "Royal Taste Catering", cat: "Catering", lat: 7.2950, lng: 80.6400, price: "Rs. 1,200/pp" }
    ];

    var markers = {};

    // 4. හැම ප්‍රොවයිඩර් කෙනෙක්ටම මැප් එක උඩ Pins (Markers) දානවා
    providers.forEach(function(p) {
        // මැප් එක උඩ පින් එකක් හදනවා
        var marker = L.marker([p.lat, p.lng]).addTo(map);

        // පින් එක ක්ලික් කරාම එන ලස්සන පොපප් එක (Popup Card)
        var popupContent = `
            <div class="p-1 font-sans">
                <span class="text-[9px] font-bold text-amber-600 uppercase block">${p.cat}</span>
                <h4 class="text-xs font-bold text-slate-900 mt-0.5">${p.name}</h4>
                <p class="text-xs text-slate-600 mt-1">Starting: <b>${p.price}</b></p>
                <a href="/provider/${p.id}" class="inline-block mt-2 px-2 py-1 text-[10px] font-bold bg-slate-900 text-white rounded-md no-underline">View Profile</a>
            </div>
        `;
        marker.bindPopup(popupContent);

        // මාකර් එක ඇරේ එකකට දාගන්නවා පස්සේ අල්ලගන්න ලේසි වෙන්න
        markers[p.id] = marker;
    });

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
