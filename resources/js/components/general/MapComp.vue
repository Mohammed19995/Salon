<template>
    <div id="map"></div>
</template>

<script>
    var map;
    var marker;
    export default {
        props : ['lat' , 'lng'],
        mounted: function () {
            this.initGoogleMap();
        },
        methods : {
            initGoogleMap: function () {
                var this_ = this;
                var uluru = {lat: parseFloat(this_.lat), lng: parseFloat(this_.lng)};
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {lat: uluru.lat, lng: uluru.lng},
                    zoom: 8,
                });
                var geocoder = new google.maps.Geocoder();
                var infowindow = new google.maps.InfoWindow;

                marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                });
                this_.$root.$emit('set-latlng-map' , {lat :uluru.lat ,lng : uluru.lng });

                this_.geocodeLatLng(geocoder, map, marker, infowindow, this_.lat, this_.lng);
                google.maps.event.addListener(map, 'click', function (event) {
                    marker.setPosition(event.latLng);
                    this_.$root.$emit('set-latlng-map' , {lat :event.latLng.lat(),lng : event.latLng.lng() });

                    this_.geocodeLatLng(geocoder, map, marker, infowindow, this_.lat, this_.lng);

                });

                google.maps.event.addListener(marker, 'dragend', function (event) {

                    this_.$root.$emit('set-latlng-map' , {lat :event.latLng.lat(),lng : event.latLng.lng() });
                    this_.geocodeLatLng(geocoder, map, marker, infowindow, this_.lat, this_.lng);

                });

                // search
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
                google.maps.event.addListener(searchBox, 'places_changed', function () {
                    //  searchBox.set('map', null);
                    var places = searchBox.getPlaces();

                    var bounds = new google.maps.LatLngBounds();
                    var i, place;
                    for (i = 0; place = places[i]; i++) {
                        (function (place) {

                            marker.setPosition(place.geometry.location);
                            // set
                            this_.$root.$emit('set-latlng-map' , {lat :place.geometry.location.lat(),lng : place.geometry.location.lng() });


                            marker.bindTo('map', searchBox, 'map');
                            this_.geocodeLatLng(geocoder, map, marker, infowindow, this_.lat, this_.lng);

                            google.maps.event.addListener(marker, 'map_changed', function () {
                                if (!this.getMap()) {
                                    this.unbindAll();
                                }
                            });
                            bounds.extend(place.geometry.location);

                        }(place));

                    }
                    map.fitBounds(bounds);
                    searchBox.set('map', map);
                    map.setZoom(Math.min(map.getZoom(), 12));

                });
            },
            geocodeLatLng: function (geocoder, map, marker, infowindow, lat, lng) {
                var this_ = this;
                infowindow.close();
                var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            //this_.obj_data.address = results[0].formatted_address;
                            // infowindow.setContent(results[0].formatted_address);
                            // infowindow.open(map, marker);
                        } else {
                            //  window.alert('No results found');
                        }
                    } else {
                        // window.alert('Geocoder failed due to: ' + status);
                    }
                });
            },
            setMarkerLocation : function () {
                let this_ = this;
                var uluru = {lat: parseFloat(this_.lat), lng: parseFloat(this_.lng)};
                if(marker){
                    marker.setPosition(uluru);
                    marker.setMap(map);
                    map.setCenter(uluru);
                }

            }
        },
        watch : {
            lat : function (value) {
                this.setMarkerLocation(value , this.lng)
            },
            lng : function (value) {
                this.setMarkerLocation(this.lat , value)
            }
        }
    }
</script>
<style>
    #map {
        height: 250px;
    }
    .map-input input{
        border-radius: 0 !important;
    }
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 29%;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 235px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }
</style>