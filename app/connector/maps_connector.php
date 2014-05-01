<?php 

	
	$aLocations = array();
	$aLocations[] = "{ latLng: new google.maps.LatLng(51.168166, 5.961632), content: \"<strong>VeTraNed</strong><br /> Natrochemieweg 3, Herten<br /><br /><a href=\\\"http://maps.google.nl/maps?q=Natronchemieweg+3,+Herten&hl=nl&sll=52.469397,5.509644&sspn=6.561328,16.907959&oq=natr&hnear=Natronchemieweg+3,+Herten,+Roermond,+Limburg&t=m&z=17&iwloc=A\\\" target=\\\"_blank\\\">Plan uw route</a>\", pid: \"1\" }";

?>
            
              <div id="map_canvas" style="position: relative; width: 320px; height: 350px; background: #EEE;">
                
              </div>
              <script>
			  
			   var locations = [
<?php echo "			   ". implode(", \n", $aLocations) ."\n"; ?>
				];
              
              </script>