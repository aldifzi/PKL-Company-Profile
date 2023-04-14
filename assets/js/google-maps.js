function initMap() {
    // Latitude and Longitude
    var locations = [
        ['<b>Bergerax 1,</b><br> Bantul', -7.9442987, 110.3714465,19,  "menu/map.png"],
        ['<b>Bergerax 2,</b><br> Bantul', -7.9255856, 110.3771681,16, "menu/map.png"],
      ['<b>Bergerax 3,</b><br> Bantul', -7.9306553, 110.3703505,14, "menu/map.png"]
      
    ];
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: new google.maps.LatLng(-7.9442987, 110.3714465,19),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2], locations[i][3]),
            icon: locations[i][4],
            map: map
        });
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    };
}
