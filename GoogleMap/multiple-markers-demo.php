<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#container
		{
			width: 1500px;
		}
		#map-canvas {
			float: right;
			height: 500px;
			width: 1200px;
			margin: 0;
			padding: 0;
		}
		#options {
			float: left;
			width: 200px;
			height: 700px;
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="options"></div>
		<div id="map-canvas"></div>
	</div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=YOUR-API-KEY&libraries=places,visualization"></script>
<script type="text/javascript">
	var map;
	var infoWindow;
	var service;
	var markersArray = [];
	var options = ['bank', 'gas_station', 'post_office', 'library', 'police', 'hospital', 'museum', 'movie_theater', 'train_station', 'place_of_worship', 'school', 'grocery_or_supermarket', 'restaurant', 'shopping_center', 'department_store', 'park'];
	function initialize() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			center: new google.maps.LatLng(42.494718, -92.346826),
			zoom: 12,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
		});
		infoWindow = new google.maps.InfoWindow();
		service = new google.maps.places.PlacesService(map);
		var myLatlng = new google.maps.LatLng(42.494718, -92.346826);

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,

			title: 'Hello World!'
		});
		google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch);
		for (var i = 0; i < options.length; i++) {
			document.getElementById('options').innerHTML += '<input type="checkbox" id="' + options[i] + '" onclick="performSearch();"> <img src='+'images/'+options[i]+'.jpeg'+' height="20" /> ' + options[i] + '<br>';
		}
	}
	function performSearch() {
		clearMaps();
		var clickedOptions = [];
		for (var i = 0; i < options.length; i++) {
			if (document.getElementById(options[i]).checked) {
				performTypeSearch(options[i], 'images/'+options[i]);
			}
		}
	}
	function performTypeSearch(type, icon) {
		var request = {
			bounds: map.getBounds(),
			types: [type]
		};
		service.nearbySearch(request, function (results, status) {
			if (status != google.maps.places.PlacesServiceStatus.OK) {
				alert(type + ":" + status);
				return;
			}
			for (var i = 0, result; result = results[i]; i++) {
				createMarker(result, icon);
			}


		});
	}
	function createMarker(place, icon) {

		var icon = {
			url: icon, 
			scaledSize: new google.maps.Size(20,20), 
			origin: new google.maps.Point(0,0), 
			anchor: new google.maps.Point(0, 0) 
		};

		var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location,
			icon: icon,

		});
		google.maps.event.addListener(marker, 'click', function () {
			service.getDetails(place, function (result, status) {
				if (status != google.maps.places.PlacesServiceStatus.OK) {
					alert(status);
					return;
				}
				infoWindow.setContent(result.name);
				infoWindow.open(map, marker);
			});
		});
	}
	function clearMaps() {
		for (var i = 0; i < markersArray.length; i++) {
			markersArray[i].setMap(null);
		}
		markersArray.length = 0;
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</html>