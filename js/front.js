var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 27.7629157, lng: 85.3412683},
      zoom: 12
    });
     marker = new google.maps.Marker({
map: map,
draggable: true,
animation: google.maps.Animation.DROP,
position: {lat: 27.7629157, lng: 85.3412683}
});
marker.addListener('click', toggleBounce);
}

function toggleBounce() {
if (marker.getAnimation() !== null) {
marker.setAnimation(null);
} else {
marker.setAnimation(google.maps.Animation.BOUNCE);
}
}