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


$(document).ready(function () {

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