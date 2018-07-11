<!---->
<!DOCTYPE html>
<html>
<head>
    <title>Google Map Drawing Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="map" style="height: 800px; width:800px; float: left;"></div>
    <textarea id="polygoncoordinates">Polygon Points Are</textarea><br />
    <textarea id="rectanglecoordinates">Rectangle Points Area</textarea><br />
    <textarea id="polylinecoordinates">Polyline Points Area</textarea><br />
    <textarea id="circlecenter">circle Points Area</textarea><br />
    <p id="CircleArea"> Area Of Circle </p><br />
    <p id="ReactangleArea"> Area Of Reactangle </p><br />
    <p id="polygonArea"> Area Of Polygon </p><br />
    
    <script type="text/javascript">
        function initMap()
        {
            var map = new google.maps.Map(document.getElementById('map'),
            {
                center:{lat: 22.397, lng: 75.644},
                zoom:8,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            });
            var drawingManager = new google.maps.drawing.DrawingManager(
            {
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl:true,
                drawingControlOptions:{
                    position: google.maps.ControlPosition.TOP_LEFT,
                    drawingModes: ['marker','rectangle','polygon','circle','polyline']

                }
            });
            drawingManager.setMap(map);
            google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
                var polygoncoordinates = (polygon.getPath().getArray());
                polygonArea = google.maps.geometry.spherical.computeArea(polygon.getPath());
                document.getElementById('polygoncoordinates').innerHTML+=polygoncoordinates;
                document.getElementById('polygonArea').innerHTML += polygonArea+"  <br />";

            });
            google.maps.event.addListener(drawingManager, 'rectanglecomplete', function (rectangle) {
                var rectanglecoordinates = (rectangle.getBounds());
                var area= rectArea(rectanglecoordinates);

                function rectArea(bounds){
                    var sw = bounds.getSouthWest();
                    var ne = bounds.getNorthEast();
                    var southWest=new google.maps.LatLng(sw.lat(), sw.lng());
                    var northEast=new google.maps.LatLng(ne.lat(), ne.lng());
                    var southEast = new google.maps.LatLng(sw.lat(),ne.lng());
                    var northWest = new google.maps.LatLng(ne.lat(),sw.lng());
                    console.log('rec coords: '+ northEast +',' + northWest +',' + southEast +',' + southWest);
                    area=google.maps.geometry.spherical.computeArea([northEast,northWest,southEast,southWest]);
                    document.getElementById('ReactangleArea').innerHTML += area+"  <br />";
                }  
                document.getElementById('rectanglecoordinates').innerHTML += rectanglecoordinates;
            });

            google.maps.event.addListener(drawingManager, 'polylinecomplete', function(polyline) {
                var polylinecoordinates = (polyline.getPath().getArray());
                document.getElementById('polylinecoordinates').innerHTML += polylinecoordinates;
            });

            google.maps.event.addListener(drawingManager, 'circlecomplete', function(circle) {
                var circlecenter = (circle.getCenter());
                var radius=(circle.getRadius());
                var area = 3.14 * radius * radius;
                document.getElementById('circlecenter').innerHTML += circlecenter;
                document.getElementById('CircleArea').innerHTML += area+"  <br />";
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR-API-KEY&libraries=drawing&callback=initMap" async defer></script> 
</body>
</html>