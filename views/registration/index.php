<div class="row">
	<div class="col-xs-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
		<div class="card">
			<div class="card-body p-3">
				<h3 class="p-3 text-center">Register</h3>
				<h5 id="addressLocation"></h5>
				<div class="form-group">
					<button onclick="return getAddress()" class="btn btn-info">Get address</button>
				</div>
				<form id="registerForm" method="post" >
					<input type="hidden" class="form-control" name="form" value="registerForm" form="registerForm" placeholder='latitude'>
					<div class="form-group">
						<input type="hidden" class="form-control" name="lat" id="startLat" form="registerForm" placeholder='latitude'>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="lon" id="startLon" form="registerForm" placeholder='longitude'>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="username" form="registerForm" placeholder='Username'>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" form="registerForm" placeholder='Email Address'>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="phone" form="registerForm" placeholder='Phone Number'>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" form="registerForm" placeholder='Password'>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password1" form="registerForm" placeholder='Retype Password'>
					</div>
					<div class="form-group">
						<button class="btn btn-lg btn-primary btn-block" type="submit" form="registerForm">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
function getAddress(){

	var startPos;
	var lat, lon;
	var geoSuccess = function(position) {
		startPos = position;
		document.getElementById('startLat').value = lat = startPos.coords.latitude;
		document.getElementById('startLon').value = lon = startPos.coords.longitude;
		var url = "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon;
		console.log(url);
		$.get( url, function(o) {
			console.log(o);
			document.getElementById('addressLocation').innerHTML = o.results[1].formatted_address;
		});
	};
	navigator.geolocation.getCurrentPosition(geoSuccess);
}
</script>
