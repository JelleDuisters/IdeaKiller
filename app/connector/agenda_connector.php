<?php

	// Standaard includes
	include("../../cms/4.0/includes/db.php");
	include("../../klanten/front.class.php");
	include("../../includes/functions.php");
	//include("klanten/domain.class.php");
	//include("includes/domain_settings.php");
	//include("includes/functions.php");
	//include("includes/form.functions.php");
	//include("includes/color.functions.php");
	//include("includes/translation.php");

	// Settings
	$db_prefix 	= "vetra";
	$loc_prefix	= "";

	// Laad Classes
	$oFront = new FrontEnd();
	
			// Settings
			$aMaanden = array("1" => "januari", "2" => "februari", "3" => "maart", "4" => "april", "5" => "mei", "6" => "juni", "7" => "juli", "8" => "augustus", "9" => "september", "10" => "oktober", "11" => "november", "12" => "december");
			$aDagen = array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag'); 


	if($_GET['id']){
	
		$_POST['id'] = $_GET['id'];
		
	}


	if($_POST['id'] ){
		
		$aAgenda = $oFront->fetchTextAgenda($db_prefix, $_POST['id']);
		$aAgendaMedia = getMediaByIdModuleTypePosition($aAgenda[0]['id'], "agenda", "afbeeldingen", "normal");

		
			/* START MEDIA */
			
			$aTempAfb = unserialize($aAgenda[0]['afb']);
		
		
			$aAfb = array();
			
			for($i=0; $i < count($aTempAfb); $i++){
				//echo $aTempAfb[$i];
				if(file_exists("../../".str_replace("../../", "/", $aTempAfb[$i]))){
				
					$aAfb[] = $aTempAfb[$i];
					
					//echo $aTempAfb[$i];
					
				}
				
			}
		
			if(count($aAgendaMedia) > 0){
		
		
				echo "<div id=\"slider-agenda-detail\" class=\"slider\"><div class=\"mwrapper\" style=\"width: ". (320*count($aAgendaMedia)) ."px\">\n";
			
				echo "<ul>\n";
			
				for($i=0; $i < count($aAgendaMedia); $i++){
			
					echo "<li><img src=\"/~vetra/thumb.php?image=". str_replace("../../", "", $aAgendaMedia[$i]['URL']) ."&width=640&height=400\" width=\"320\" height=\"200\"></li>\n";
				
				}
				
				echo "</ul>\n";			
				echo "<div class=\"clear\"></div></div></div>\n";
				
				echo "<div id=\"nav-agenda-detail\" class=\"nav\">\n";
	
				echo "	<div class=\"indicator\">\n";
				
				for($i=0; $i < count($aAgendaMedia); $i++){
				
					if($i == 0){
					
						$active = "class=\"active\" ";
						
					} else {
					
						$active  = "";	
						
					}
				
					echo "		<span ". $active .">". ($i+1) ."</span>\n"; // class=\"active\"
				
				}
				
				echo "	</div>\n";
	 
				echo "</div>\n";
				echo "<div class=\"clear\"></div>\n";
				
			
			}
			
			/* END MEDIA */
			
			
			echo "<div class=\"text\">\n";
			echo "	<h1>". $aAgenda[0]["naam"] ."</h1>\n\n";		
			
			echo $aAgenda[0]['inleiding'] ."\n";

			//echo "    <a href=\"#\" class=\"btn-back\" onclick=\"showPanel('news', '-1'); return false;\">&laquo; Terug</a>\n";
			echo "	      <div class=\"info\">". $aDagen[$aAgenda[0]['dagnaam']] ." ". $aAgenda[0]['dag'] ." ". $maand ." "."<br/>". $aAgenda[0]['uur'] .":". $aAgenda[0]['minuut'] ." uur, ". $aAgenda[0]['locatie'] ."</div>\n";
			echo "		". htmlspecialchars_decode(str_replace("../../", $loc_prefix."/", $aAgenda[0]['omschrijving'])) ."\n";
			
			
			echo "    <div class=\"clear\"></div>\n";
			echo "    <a href=\"#\" class=\"btn-back\" onclick=\"goBack();\">&laquo; Terug</a>\n";
	
			
			
			echo "</div>\n";
		
	
	} else {

		//$aAgenda = $oFront->fetchActueel($db_prefix, 27, 25);
		$aAgenda = $oFront->fetchAgenda($db_prefix, 45);

		for($i=0; $i < count($aAgenda); $i++){ 
		
			$aAgendaMedia = getMediaByIdModuleTypePosition($aAgenda[$i]['id'], "agenda", "afbeeldingen", "normal");
     
			echo "               <div class=\"item\" onclick=\"loadAgendaItem(". $aAgenda[$i]['id'] ."); return false;\">\n";
			
			if($aAgendaMedia[0]['URL'] != ""){
			
				echo "                <img src=\"/~vetra/thumb.php?image=". str_replace("../../", "", $aAgendaMedia[0]['URL']) ."&width=140&height=140\" width=\"70\" height=\"70\" align=\"left\">\n";
			
			} else { // no image
			
				//vetraned_no-image.jpg
				echo "                <img src=\"/~vetra/app/images/vetraned_no-image.jpg\" width=\"70\" height=\"70\" align=\"left\">\n";

			
			}
			
			// maandnaam
			$maand = $aMaanden[$aAgenda[$i]['maand']];

			// Minuut
			if($aAgenda[$i]['minuut'] == "0") {
				$aAgenda[$i]['minuut'] = "00";
			}
			
			// Dag
			if($aAgenda[$i]['dag'] < 10) {
				$aAgenda[$i]['dag'] = "0". $aAgenda[$i]['dag'];
			}
			
			
			echo "                <div class=\"text\">\n";
			echo "                  <h1>". $aAgenda[$i]['naam'] ."</h1>\n";
			echo "                  <div>". $aDagen[$aAgenda[$i]['dagnaam']] ." ". $aAgenda[$i]['dag'] ." ". $maand ." ".  $aAgenda[$i]['jaar'] .", ". $aAgenda[$i]['uur'] .":". $aAgenda[$i]['minuut'] ." uur, ". $aAgenda[$i]['locatie'] ."</div>\n";
			echo "                  <div class=\"clear\"></div>\n";
			echo "                </div>\n";
			
			echo "              </div>\n";

		}
	
	}

?>