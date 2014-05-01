<?php

	include("../../3.3/DIV/includes/db.php");
	// Standaard includes
	include("../../3.3/DIV/includes/db.php");
	include("../../klanten/front.class.php");
	//include("klanten/domain.class.php");
	//include("includes/domain_settings.php");
	include("../../includes/functions.php");
	//include("includes/form.functions.php");
	//include("includes/color.functions.php");
	//include("includes/translation.php");

	// Settings
	$db_prefix 	= "kern";
	$loc_prefix	= "";

	// Laad Classes
	$oFront = new FrontEnd();

	if($_GET['id']){
	
		$_POST['id'] = $_GET['id'];
		
	}


	if($_POST['id'] ){
		
		$aProjectDetail = getProjectInfoByID($db_prefix, $_POST['id']);
	
		//print_r($aProjectDetail);

		/* START MEDIA */
		
		$aTempAfb = unserialize($aProjectDetail[0]['afb']);
		
		$aAfb = array();
		
		for($i=0; $i < count($aTempAfb); $i++){
			//echo $aTempAfb[$i];
			if(file_exists("../../".str_replace("../../", "/", $aTempAfb[$i]))){
			
				$aAfb[] = $aTempAfb[$i];
				
				//echo $aTempAfb[$i];
				
			}
			
		}
		
	
		echo "<div id=\"slider-project-detail\" class=\"slider\"><div class=\"mwrapper\" style=\"width: ". (320*count($aAfb)) ."px\">\n";
	
		echo "<ul>\n";
	
		for($i=0; $i < count($aAfb); $i++){
	
			echo "<li><img src=\"http://www.kernarchitecten.com/thumb.php?image=". str_replace("../../", "", $aAfb[$i]) ."&width=640&height=400\" width=\"320\" height=\"200\"></li>\n";
		
		}
		
		echo "</ul>\n";			
		echo "<div class=\"clear\"></div></div></div>\n";
		
		echo "<div id=\"nav-project-detail\" class=\"nav\">\n";

		echo "	<div class=\"indicator\">\n";
		 
		for($i=0; $i < count($aAfb); $i++){
		
			if($i == 0){
			
				$active = "class=\"active\" ";
				
			} else {
			
				$active  = "";	
				
			}
		
			echo "		<span ". $active .">". ($i+1) ."</span>\n"; // class=\"active\"
		
		}
		
		echo "	</div>\n";

		echo "</div>\n";
		
		
		/* END MEDIA */
		
		
		
		echo "<div class=\"text\">\n";
		echo "    <h1>". $aProjectDetail[0]['naam'] ."</h1>\n";
		//echo "    <div><strong>".$aProjectDetail[0]['inleiding'] ."</strong></div>\n";
		echo "    <div>". $aProjectDetail[0]['body'] ."</div>\n";
		
		
		if($aProjectDetail[0]['video_youtube'] != ""){
				
			//$vid = $aProjectDetail[0]['video_youtube'];
		
			preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $aProjectDetail[0]['video_youtube'], $matches);
			
			$vid = $matches[0];

		
		echo "    <div><a href=\"". $aProjectDetail[0]['video_youtube'] ."\"><img src=\"http://img.youtube.com/vi/". $vid ."/2.jpg\" width=\"120\" height=\"90\" /></a></div>\n";
		}

		
		//echo "    <a href=\"#\" class=\"btn-back\" onclick=\"showPanel('project', '-1', 'maps'); return false;\">&laquo; Terug</a>\n";
		echo "    <a href=\"#\" class=\"btn-back\" onclick=\"goBack(); return false;\">&laquo; Terug</a>\n";
		
		echo "</div>\n";
		
	
	} else {


	$aProjectenCategories = getProjectenCategories($db_prefix);
	
	//print_r($aProjectenCategories);
	
	
	//$aProjects = getProjectenByCategoryID($db_prefix, $_GET['cId']);

	//print_r($aNieuws);
	
		for($j=0; $j < count($aProjectenCategories); $j++){
	
			$aProjects = getProjectenByCategoryID($db_prefix, $aProjectenCategories[$j]['id']);
	
			echo "<h2>". $aProjectenCategories[$j]['naam'] ."</h2>";
	
			for($i=0; $i < count($aProjects); $i++){ 
		
				//$aProjectenImages = getProjectImagesByID($db_prefix, $aProjects[$i]['id']);
		
				$aAfb = unserialize($aProjects[$i]['afb']);
				
				//echo $aAfb[0];
		
				echo "               <div class=\"item\" onclick=\"loadProjectItem(". $aProjects[$i]['id'] ."); return false;\">\n";
				
				
				
				echo "                <img src=\"http://www.kernarchitecten.com/thumb.php?image=". str_replace("../../", "", $aAfb[0]) ."&width=140&height=140\" width=\"70\" height=\"70\" align=\"left\">\n";
				
				
				echo "                <h1>". $aProjects[$i]['naam'] ."</h1>\n";
				echo "                <div>". substr(strip_tags(str_replace("&nbsp;"," ", $aProjects[$i]['inleiding'])), 0, 60) ."...</div>\n";
				echo "                <div class=\"clear\"></div>\n";
				echo "              </div>\n";
	
			}
			
		}
		
	}

?>