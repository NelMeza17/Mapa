var map;
var markersArray = [];

function initialize() {
  var Morelia = new google.maps.LatLng(19.702222, 101.185556);
  var mapOptions = {
    zoom: 12,
    center: Morelia,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map =  new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });
}
  
function addMarker(location) {
  marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markersArray.push(marker);
}

