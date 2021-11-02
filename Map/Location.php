<?php
include('../Config/Connection.php');
$sql = "select * from guest";
$sth = mysqli_query($db,$sql);
while($row = mysqli_fetch_assoc($sth))
 {
   $value2[]=array($row["guest_name"],$row["user_lat"],$row["user_long"],$row["id"]);
                      


}
 echo "<script>var locations= ".json_encode($value2,JSON_NUMERIC_CHECK).";</script>"
 

 
?>
<?php
include('../includes/header.php');
?>
<!DOCTYPE html>
<html> 

  

      <div id="content-wrapper">
       <div class="container-fluid">
    
    <div class="col-md-12">
    <h3>Map</h3>
    <hr>
     </div> 
   
   
     <div class="container" style="display:flex;justify-content:center;margin-top: 3%; ">
     <div class="col-md-12">
    
   
    <div id="map" style="width: 100%; height: 100%;"></div>
  </div>



 
 
  </div>
</form>

</div >
</div>
</div>
       

     

    </div>
   
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>




<head> 
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
<!--   <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script> -->
         <script src="https://maps.google.com/maps/api/js?key=AIzaSyBc1MXhOP5ibzFXz_zryAaxQ-DZUxxXxI8&libraries=places"type="text/javascript"></script>
     
       
       
</head> 
<body>
 

  <script type="text/javascript">
    /*var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];*/

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: new google.maps.LatLng(37.0902,95.7129),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>