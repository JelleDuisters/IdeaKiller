
	var myScroll = new Array();
	var curPanel;
	var curMarker;
	var newPanel;
	var prevPanel;
	var loading = false;
	var curNewsId;
	var curAgendaId;
	var curProjectId;
	var mediaScroll = null;
	var map;
	var connection = true;
	
	// Online
	var domain = "http://www.nettt.nl/klanten/sjra/test/connector/";
	
	//domain = "http://www.kernarchitecten.com/connector/";
	
	function noConnection(){
	
		var myScroll = new Array();	
		
		//alert("noConnection"); 
		
	}
	
	function setScroll(clip){

		/*if(myScroll[clip] == null){
		
			myScroll[clip] = new iScroll(clip + '-wrapper', { hScrollbar: false, click: true, vScrollbar: true, bounce: false });
			
		} else if(clip != "news" && clip != "project") {
			
			//alert("refresh");
			myScroll[clip].refresh();
			myScroll[clip].scrollTo(0, 0, 0, false)
			
		}


		// Media scroll
		if(mediaScroll != null){
			mediaScroll.destroy();
			mediaScroll = null;
		}
		
		if(document.getElementById("slider-"+clip)){
	
			mediaScroll = new iScroll("slider-"+clip, {
				snap: 'li',
				momentum: false,
				hScrollbar: false,
				vScrollbar: false,
				vScroll:false, 
				bounce:false,
				click: true, 
				onScrollEnd: function () { 

					$('#nav-'+ clip +' .indicator > span.active').removeClass('active');
					$('#nav-'+ clip +' .indicator > span:nth-child(' + (this.currPageX+1) + ')').addClass('active');

					//document.querySelector('#slider-'+ clip +' .indicator > span.active').className = '';
					//document.querySelector('#slider-'+ clip +' .indicator > span:nth-child(' + (this.currPageX+1) + ')').className = 'active';
				}
				
			 });
		
			setTimeout(function(){
		
				mediaScroll.refresh();
			
			}, 100);
		
		
		}*/

	}
			

	function loadHeadlines(){
	
		if(loading != true){

			$('#status').fadeIn();
			
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "news_connector.php";
			} else {
				connector = "nc.html" 
				noConnection();
			}
			
			$("#news .data").load(connector, {rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel('news');	


					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	function loadNewsItem(id){
	
		if(loading != true && curNewsId != id){

			$('#status').fadeIn();
			
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "news_connector.php";
			} else {
				connector = "nc.html" 
				noConnection();
			}
			
			$("#news-detail .data").load(connector, {id: id, rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel('news-detail');	
				
					curNewsId = id;
					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	function loadAgenda(){
	
		if(loading != true){

			$('#status').fadeIn();
			
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "agenda_connector.php";
			} else {
				connector = "nc.html" 
				noConnection();
			}
			
			$("#agenda .data").load(connector, {rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel('agenda');	


					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	function loadAgendaItem(id){
	
		if(loading != true && curAgendaId != id){

			$('#status').fadeIn();
			
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "agenda_connector.php";
			} else {
				connector = "nc.html" 
				noConnection();
			}
			
			$("#agenda-detail .data").load(connector, {id: id, rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel('agenda-detail');	
				
					curAgendaId = id;
					loading = false;
				
				});
			
			});
			
		}
		
	}
	


	function initializeMaps() {

		var oMarkers = locations;
		
		// mapgrote aanpassen
		$("#map_canvas").css({'width': '100%', 'height': ($(document).height()-110) + "px"});
		
	
		
		var centerLoc = new google.maps.LatLng(51.168177, 5.961628);

		var myMapOptions = {
			 zoom: 16,
			 center: centerLoc,
			 mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		
		
		var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);



		function initMarkers(theMap, markerData) {

		   
			var newMarkers = [], marker;

			for(var i=0; i<markerData.length; i++) {
				
				marker = new google.maps.Marker({
					map: theMap,
					draggable: false,
					position: markerData[i].latLng,
					visible: true,
					//icon: 'images/point.png'
				})

				newMarkers.push(marker);

				//define the options for all infoboxes
				var myOptions = {
					 content: markerData[i].content
				};

				//Define the infobox
				newMarkers[i].infowindow = new google.maps.InfoWindow({
					content: markerData[i].content
				});

													
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					
					return function() {

						if(curMarker != undefined){
							curMarker.close();
							curMarker = undefined;
						}
						
						newMarkers[i].infowindow.open(theMap, this);
						theMap.panTo(markerData[i].latLng);

						curMarker = newMarkers[i].infowindow;
						
					}
					
				})(marker, i));

			}

			return newMarkers;
			
		}

		// onClick close infoBox
		google.maps.event.addListener(theMap, 'click', function(event) {
			if(curMarker != undefined){
				curMarker.close();
				curMarker = undefined;
			}
		});

		markers = initMarkers(theMap, oMarkers);


	}


	function showMaps(){
	
		if(connection != true){
			
			noConnection();
			alert("Geen internetverbinding");
			
		} else {
	
			if(loading != true){
	
				$('#status').fadeIn();
				
				loading = true;
				
				iRand = Math.floor(Math.random()*100000);

				connector = domain + "maps_connector.php"; 

				
				$("#maps .data").load(connector, {rand: iRand}, function(response, status, xhr){
	
					$('#status').fadeOut(function(){
	
						showPanel('maps');
						
						//buildMap();
						initializeMaps();
	
						loading = false;
					
					});
				
				});
				
			}
			
		}
		
	}
	
	function loadText(panel){
	
		if(loading != true){

			$('#status').fadeIn();
			
			loading = true;

			if(connection == true){
				connector = domain + "text_connector.php";
			} else {
				connector = "nc.html";
				noConnection();
			}
			
			iRand = Math.floor(Math.random()*100000);

			$("#"+ panel +" .data").load(connector, {page: panel, rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel(panel);	

					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	
	function loadTextDetail(panel, id){
	
		if(loading != true){

			$('#status').fadeIn();
			
			loading = true;

			if(connection == true){
				connector = domain + "text_connector.php";
			} else {
				connector = "nc.html";
				noConnection();
			}
			
			iRand = Math.floor(Math.random()*100000);

			$("#"+ panel +" .data").load(connector, {page: panel, id: id, rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel(panel);	

					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	
	function loadProjects(){
	
		if(loading != true){

			$('#status').fadeIn();
			
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "project_connector.php";
			} else {
				connector = "nc.html";
				noConnection();
			}
			
			$("#project .data").load(connector, {rand: iRand}, function(response, status, xhr){

				$('#status').fadeOut(function(){

					showPanel('project');	

					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	function loadProjectItem(id){
	
		if(loading != true && curProjectId != id){
	
	
			$('#status').fadeIn();
			loading = true;
			
			iRand = Math.floor(Math.random()*100000);

			if(connection == true){
				connector = domain + "project_connector.php";
			} else {
				connector = "nc.html";
				noConnection();
			}
			
			$("#project-detail .data").load(connector, {id: id, rand: iRand}, function(response, status, xhr){
				
				//alert(xhr.status)
				
				$('#status').fadeOut(function(){
											  
					//$("#content").slideDown("slow");
					
					showPanel('project-detail');	

					curProjectId = id;
					loading = false;
				
				});
			
			});
			
		}
		
	}
	
	function goBack(){
	
		showPanel(prevPanel, -1);		
			
	}

	function showPanel(panel, dir){

		if(curPanel != panel){

			prevPanel = curPanel;

			if(dir == undefined){
				dir = 1;
			} else {
				dir = -1;
			}
					
			// Display
			$('.panel').css('display', 'none');
			
			if(curPanel != ""){
				
				$('#'+ curPanel).css('display', 'block');	
				
				//$('.panel').css('display', 'none');	
				$('#'+ curPanel).animate({left: (0-($(document).width()*dir))+"px"}, function(){
				
					$(this).css('display', 'none');	
					
				})
			
			} 
			
			$('#'+ panel).css('left', (0+($(document).width()*dir))+'px');
			$('#'+ panel).css('display', 'block');
			$('#'+ panel).animate({left: "0px"})
			
			// Uitzondering voor scroll op MAPS
			if(panel != "maps"){
			
				setScroll(panel);
			
			}
			
			// Zet de status van de buttons
			$('.btn').removeClass("active");
			$('#btn-'+ panel).addClass("active");
			
			$('#header .btnBack').fadeOut("fast", function(){
				$(this).css('display', 'none');	
			});
			
			// uitzondering
			if(panel == "card-detail"){
				$('#btn-card').addClass("active");
				$('#header .btnBack').fadeIn("slow");
			}
			
			// uitzondering
			if(panel == "stats-detail"){
				$('#btn-stats').addClass("active");
				$('#header .btnBack').fadeIn("slow");
			}			
			
			if(panel == "rules-detail"){
				$('#btn-rules').addClass("active");
				$('#header .btnBack').fadeIn("slow");
			}
			
			if(panel == "info-detail"){
				$('#btn-info').addClass("active");
				$('#header .btnBack').fadeIn("slow"); 
			}
			
			if(panel == "settings-detail"){
				$('#btn-settings').addClass("active");
				$('#header .btnBack').fadeIn("slow");
			}
			
			// curPanel zetten
			curPanel = panel;
			curNewsId = 0;
			curAgendaId = 0;
			curProjectId = 0;
		
		}
		
	}

	function loaded() {
		
		// Zet de scroller op de huidige positie
		$('.panel').css('display', 'none');	;
		
			loadText('card'); 
		
		//loadText('over');
		
	}
	
	
	// Wis alle data en reload de pagina
	function wis(){
		localStorage.clear();
		window.location.reload();
	}
	
	//Voeg speler toe aan en maak extra veld met nieuwe naam en nummer:
	function voegspelertoe(){
					
		var nummer = $('.speler').length + 1;
		
		
		$( "#verwijderspeler" + $('.speler').length ).after( '<input class="sessioninput speler" placeholder="Speler '+nummer+'" type="text" required="required" id="spelernaam' + nummer + '" name="deelnemer'+nummer+'"><input type="button" id="verwijderspeler'+nummer+'" value="x" class="verwijderknop" onclick="verwijderspeler(deelnemer'+nummer+')" />' );
		
	}
	
	function verwijderspeler(speler) {
		
		localStorage.removeItem(speler);
		window.location.reload();
			
	}
	
	// Voor elke variablele in het form opslaan aan de hand van de name:
	function storeForm() {
		
		$( ".sessioninput" ).each(function( index ) {
			
			window.localStorage.setItem($(this).attr("name"), $(this).val());
			
		});
		
		
		startSession()
	}
	
	//Stop luisteren naar de accelerometer en ga terug naar de beginpagina:
	function gotoHome(){
		$('#session').hide();
		$('#container').show();
		//stop listening to accelerometer
		navigator.accelerometer.clearWatch(watchID);
	};
	
	//Strobe effect functie:
	function strobe(object){
		$(object).stop().fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50).fadeToggle(20).delay(50);
		
	}
	
	//Start luisteren naar de accelerometer en start sessie
	function startSession(){	
		
		$('#container').hide();
		$('#session').show();
		

		var count = 0;
		// Audio player
		var my_media = null;

		

		// onSuccess Callback
		//
		function onSuccess() {
			console.log("playAudio():Audio Success");
		}

		// onError Callback
		//
		function onError(error) {
			alert('code: '    + error.code    + '\n' +
				  'message: ' + error.message + '\n');
		}

		// Wait for device API libraries to load
		//
		document.addEventListener("deviceready", onDeviceReady, false);

		// device APIs are available
		//
		function onDeviceReady() {
			startWatch();
		}

		// Start watching the acceleration
		//
		function startWatch() {

			// Update acceleration every x seconds
			var options = { frequency: 100 };

			watchID = navigator.accelerometer.watchAcceleration(onSuccess, onError, options);
		}

		// Stop watching the acceleration
		//
		function stopWatch() {
			if (watchID) {
				navigator.accelerometer.clearWatch(watchID);
				watchID = null;
			}
		}

		function onSuccess(acceleration) {
			var element = document.getElementById('accelerometer');
			/*element.innerHTML = 'Acceleration X: ' + acceleration.x         + '<br />' +
								'Acceleration Y: ' + acceleration.y         + '<br />' +
								'Acceleration Z: ' + acceleration.z         + '<br />' +
								'Timestamp: '      + acceleration.timestamp + '<br />';*/




			if(acceleration.y > 7){
				if (i == 1){
					//playAudio("http://www.soundjay.com/mechanical/gun-gunshot-01.mp3");
					playAudio("/android_asset/www/audio/"+$('#dropdown').val()+".mp3");
					count ++;
					
					strobe('#session');
					
					//color the card
					var color = $("#styleDropdown").val().toString();
					
					
					if (color.indexOf("url") > -1){
						// add back image
						$('#session').css('background', color);
					}else if (color == 'red' || color == 'black'){
						// add color
						$('#session').css('background', color);
						
						// add tekst
						if ($('#tekst').val() == ""){
							$('#accelerometer').html("<h1 id='cardText'>Idea Killer</h1><h2 id='count'>"+count.toString()+"</h2>");
						}else {
							$('#accelerometer').html("<h1 id='cardText'>"+$('#tekst').val()+"</h1><h2 id='count'>"+count.toString()+"</h2>");
						}
					}else {
						// add color
						$('#session').css('background', 'red');
						
						// add tekst
						if ($('#tekst').val() == ""){
							$('#accelerometer').html("<h1 id='cardText'>Idea Killer</h1><h2 id='count'>"+count.toString()+"</h2>");
						}else {
							$('#accelerometer').html("<h1 id='cardText'>"+$('#tekst').val()+"</h1><h2 id='count'>"+count.toString()+"</h2>");
						}
					}
					
					
					var spelers = "";
		
					
					for (var p = 0; p < 20; p++) {
						if (window.localStorage.getItem('deelnemer'+p)){
							
							spelers = spelers + '<option value="deelnemer'+p+'">' + window.localStorage.getItem('deelnemer'+p) + '</option>';
						}
					}
					
					
					setTimeout(function() {
						$("#game").after('<div id="popup"><h3>Wie was het?</h3><select id="dropdownspelers" name="dropdownspelerkeuze" class="sessioninput">'+spelers+'</select></div>');
						
						$( "#dropdownspelers" ).change(function() {
							
							if (window.localStorage.getItem($(this).val())){
								var schuld = window.localStorage.getItem($(this).val());
							}else {
								var schuld = 0;
							}
							
							window.localStorage.setItem($(this).val()+"schuld", schuld+1);
							
							$("#popup").remove();
							
							alert ('Aantal schuld '+ $(this).val()+ ": " + window.localStorage.getItem($(this).val()));
						});
					}, 1000);
					
					
					


					
				}
				i = 2;
			}else {
				i = 1;
				$('#session').stop().fadeIn().css('background','green');
				$('#accelerometer').html("<h2 id='count'>"+count+"</h2>");
				//stopAudio();
				$('#tekst').show();
			}

		}


		// onError: Failed to get the acceleration
		//
		function onError() {
			alert('onError!');
		}
	}
	
	// Play audio
	function playAudio(src) {
		if (my_media == null) {
			// Create Media object from src
			my_media = new Media(src, onSuccess, onError);
		} // else play current audio
		// Play audio
		my_media.play();

	}
	
	function stopAudio() {
		if (my_media) {
			my_media.stop();
		}
	}
