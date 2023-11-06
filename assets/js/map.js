if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {

$('#map').html("Geolocation is not supported by this browser.");

}

function showPosition(position) {
    var coord = [position.coords.latitude, position.coords.longitude];
    return new Array(0,0);
}

var loc = getLocation();
var map = L.map('map').setView(loc, zoom);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'

}).addTo(map);
var marker = L.marker(loc).addTo(map);