// ****************************initialze map**********************************
var defaultLocation = [35.696733, 51.4899029];
var defaultZoom = 15;
var map = L.map('map').setView(defaultLocation, defaultZoom);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'map Project For You',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);


// map.on('dblclick', function(ev) {
            
            
// });
 
function getDistance(from, to)
{
    return (from.distanceTo(to)).toFixed(0);
}

$(document).ready(function () {
var _dblClickTimer = 0;
    map.on('click', function(ev) {
        if (_dblClickTimer !== null) {
          return;
        }
        _dblClickTimer = setTimeout(() => {
          // real 'click' event handler here
            
      
          _dblClickTimer = null;
        }, 300);
      })
      .on("dblclick", function(ev) {
        clearTimeout(_dblClickTimer);
        _dblClickTimer = null;
      
        // real 'dblclick' handler here (if any). Do not add anything to just have the default zoom behavior
        
    });


    the_div.addEventListener('click', function() {
        clickCount++;
        if (clickCount === 1) {
            singleClickTimer = setTimeout(function() {
                clickCount = 0;
                // singleClick();
                var circle = null;
                var markers = [];
                map.on('click', function (ev) {
                    // var radius = prompt("فاصله مورد نظر را در مقیاس کیلومتر وارد کنید"); // meters
                    var radius = 1000; // meters
                    var locationsInRadius = [];
                    var distance;
                    var loc;
                    // get ciricle center
                    var center = ev.latlng;
                    
                    // remove last circle
                    if (circle != undefined) {
                        map.removeLayer(circle);
                    };
                    // remove last markers
                    if (markers.length != 0) {
                        for (var i1 = 0; i1 < markers.length; i1++) {
                            theMarker = markers[i1];
                            // remove marker
                            map.removeLayer(theMarker);
                        } 
                    } // end if
                    // draw a circle with defined radius
                    circle = L.circle(center, {
                        color: "007bec",
                        fillColor: "#007bec",
                        fillOpacity: 0.2,
                        radius: radius
                    }).addTo(map);  
                    // check locations in the radius
                    for (var i = 0; i < locations.length; i++) {
                        //  get the location :: done
                        loc = [locations[i]['lat'], locations[i]['lng']] 
                        // calculate the distance between the center of the circle and the location :: done
                        distance = ev.latlng.distanceTo(loc);
                        //  add marker for all locations in the radius :: done
                        if (distance < radius) {
                            marker = L.marker(loc).addTo(map);
                            // push marker to the markers array
                            markers.push(marker);
                        }
                    }
                });
            }, 400);
        } else if (clickCount === 2) {
            clearTimeout(singleClickTimer);
            clickCount = 0;
            // doubleClick();
            map.on('dblclick', function(ev) {
                // add marker to map
                L.marker(ev.latlng).addTo(map);
                // show modal
                
                if (session != 0) {
                    $("#addLocationModal").fadeIn(500);
                } else {
                    // show login modal
                    $("#loginModal").fadeIn(500);
                }
                // print lat and lng 
                $("#lat-display").val(ev.latlng.lat);
                $("#lng-display").val(ev.latlng.lng);
                // reset values of modal input  
                $("#l-title").val('');
                $("#l-type").val(0);
            });
        }
    }, false);
      

    


    // fadeout locatons modal
    $("#addLocationModal .close").click(function () {
        $("#addLocationModal").fadeOut(500);
        // clear last ajax respond
        $("#addLocationModal .ajax-result").html('');
    });
    // fadeOut login modal
    $("#loginModal .close").click(function () {
        $("#loginModal").fadeOut(500);
    });

    // ajax request to save location
    $("form#addLocationForm").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var resultTag = $(".ajax-result");
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                resultTag.html(response);
            }
        }); 
    // end ajax request to save location
    }); 



});