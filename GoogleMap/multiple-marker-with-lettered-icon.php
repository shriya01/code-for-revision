<!DOCTYPE html>
<html>
<head>
	<title>Nearby Search - Google Map Places API</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<style type="text/css">
		#container { width:1500px; }
		#options {  width:500px; height:500px; float: left;}
		#map { width: 1000px; height: 500px; float: right;}
	</style>
</head>
<body>
<div id="container">
<div id="map"></div>
<div id="options"></div>
</div>
</body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR-API-KEY&libraries=places,visualization"></script>
<script type="text/javascript">
	// variable declaration
	var map;
	var infowindow;
	var service;
	var markersArray = [];
	var options = ['bank', 'gas_station', 'post_office', 'library', 'police', 'hospital', 'museum', 'movie_theater', 'train_station', 'place_of_worship', 'school', 'grocery_or_supermarket', 'restaurant', 'shopping_center', 'department_store', 'home_goods_store', 'park'];
	//lettered icon for differentiation between marks
	function getLetteredIcon(letter)
	{
		return "http://www.google.com/mapfiles/marker" + letter + ".png";;
	} 

	/**/
	function initialize()
	{
		var center = new google.maps.LatLng(22.7195687,75.85772580000003);
		map = new google.maps.Map(document.getElementById('map'),{
			center:center,
			zoom:12,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		});
		infowindow = new google.maps.InfoWindow();
		service = new google.maps.places.PlacesService(map);
		marker = new google.maps.Marker({
			position:center,
			map:map
		});
		google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch);
		for(var i=0; i<options.length; i++)
		{
			document.getElementById('options').innerHTML+='<input type="checkbox" id="'+options[i]+'" onclick="performSearch();" ><img src='+getLetteredIcon(String.fromCharCode('A'.charCodeAt(0) + i)) +' height="20" /> ' + options[i] + '<br>';

		}
		

	}
	function performSearch() {
			clearMaps();
		var clickedOptions = [];
		for (var i = 0; i < options.length; i++) {
			if (document.getElementById(options[i]).checked) {
				performTypeSearch(options[i], getLetteredIcon(String.fromCharCode('A'.charCodeAt(0) + i)));
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
		var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location,
			icon: icon
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
	google.maps.event.addDomListener(window,'load',initialize);
</script>
</html>
