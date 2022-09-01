<H1>INDEX PAGE</H1>
<h1>Lat: <span id="startLat"></span></h1>
<h2>Long: <span id="startLon"></span></h2>
<script>
window.onload = function() {
  var startPos;
  var geoSuccess = function(position) {
    startPos = position;
    document.getElementById('startLat').innerHTML = startPos.coords.latitude;
    document.getElementById('startLon').innerHTML = startPos.coords.longitude;
  };
  navigator.geolocation.getCurrentPosition(geoSuccess);
};
</script>
