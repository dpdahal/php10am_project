<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

<section id="footer-bar">
    <div class="row">
       <div class="col-md-12">

           <div id="map"></div>
           <script>
               var map;
               function initMap() {
                   map = new google.maps.Map(document.getElementById('map'), {
                       center: {lat: -34.397, lng: 150.644},
                       zoom: 8
                   });
               }
           </script>
           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSVY_D39Zwi0-Pk5LKzAXr840akCzZb2U&callback=initMap"
                   async defer></script>

       </div>
    </div>
</section>



