<?php


	echo "<div class=\"text-panel\">\n";

	// Sub detail pagina
	
	
	if($_POST['page'] == "card"){
		
?>

	<h1><?php echo ucfirst($_POST['page']); ?></h1>
    <form action="#" method="post">
        <input class="sessioninput" placeholder="Session naam" required="required" type="text" id="sessionname" name="sessionname">
        <!--<input class="sessioninput speler" placeholder="Speler 1" type="text" required="required" id="spelernaam1" name="deelnemer1">
        <input class="sessioninput speler" placeholder="Speler 2" type="text" required="required" id="spelernaam2" name="deelnemer2">
        <input class="sessioninput speler" placeholder="Speler 3" type="text" required="required" id="spelernaam3" name="deelnemer3">-->
        <input type="button" id="extraspeler" value="+" onclick="voegspelertoe();" />
        
        <h2>Kaart stijl: </h2>
        <select id="styleDropdown" class="sessioninput">
          	<option value="black">Zwart</option>
         	<option value="red">Rood</option>
          	<option value="url(img/gun.jpg)">Pistool</option>
        </select>
        
        <h2>Geluid: </h2>
        <select id="dropdown" name="dropdownsound" class="sessioninput">
          	<option value="Pistool">Pistool</option>
          	<option value="Sirene">Sirene</option>
          	<option value="Stop it">Stop it!</option>
            <option value="Oh oh">Oh oh</option>
          	<option value="No way">No way!</option>
          	<option value="No no">No no</option>
        </select>
        
        <h2>Tekst op kaart: </h2>
        <input class="sessioninput" name="kaarttekst" type='text' id='tekst' placeholder='Idea Killer'/>
        
        <input type="button" id="wisinstellingen" value="Wis alle instellingen" onclick="wis();" />
        <br><br>
        <input type="button" id="go" value="Go" onClick="storeForm();"/>
    </form>
 <script>
		//Kijkt of er een speler is opgeslagen, zo ja, haalt hij alle spelers op en stopt ze in de form, anders maakt hij de drie standaard opties.
		if (window.localStorage.getItem('deelnemer2') == null) {
			
				$("#sessionname").after('<input class="sessioninput speler" placeholder="Speler 1" type="text" required="required" id="spelernaam1" name="deelnemer1"><input class="sessioninput speler" placeholder="Speler 2" type="text" required="required" id="spelernaam2" name="deelnemer2"><input class="sessioninput speler" placeholder="Speler 3" type="text" required="required" id="spelernaam3" name="deelnemer3">');
			
		}else {
			
			for ( var i = 15; i > 0; i-- ) {
				if (window.localStorage.getItem('deelnemer'+i)){
					$( "#sessionname" ).after( '<input class="sessioninput speler" placeholder="Speler '+i+'" type="text" required="required" value="'+ window.localStorage.getItem('deelnemer'+i) +'" id="spelernaam' + i + '" name="deelnemer'+i+'"><input type="button" id="verwijderspeler'+i+'" class="verwijderknop" value="x" onclick="verwijderspeler(\'deelnemer'+i+'\')" />' );
				}
				
			}
			
		}
		
		//Stop opgeslagen variabelen in input velden: 
 		$( ".sessioninput" ).each(function( index ) {
			
				var id = $(this).attr("id");
				$("#"+id).val(window.localStorage.getItem($(this).attr("name")));
				
		});
 		
    </script><?php
	} else if($_POST['page'] == "stats" && $_POST['id'] == "1"){
		
?>

	<h1>SUB <?php echo ucfirst($_POST['page']); ?> -> Hier kan de titel van de pagina komen te staan</h1>
	<div class="tekst">Hier kan de tekst komen te staan</div>

<?php

	} else if($_POST['page'] == "card-detail" && $_POST['id'] == "2"){
		
?>

	<h1>SUB 2 <?php echo ucfirst($_POST['page']); ?> -> Hier kan de titel van de pagina komen te staan</h1>
	<div class="tekst">Hier kan de tekst komen te staan</div>

<?php
		
	} else if($_POST['page'] == "stats"){
		
?>

<h1>Statistieken</h1>
<div class="tekst"></div>

<script>
	for ( var i = 15; i > 0; i-- ) {
		if (window.localStorage.getItem('deelnemer'+i)){
			$( ".tekst" ).append("<h2>" + window.localStorage.getItem('deelnemer'+i) + "</h2>");
			$( ".tekst" ).append("<p>Aantal ideas killed: " + window.localStorage.getItem('deelnemer'+i+"schuld") + "</p>");
			
			
		}
	}
</script>

<?php
		
	} else if($_POST['page'] == "info"){
		
?>

	<h1>Welkom in de wereld van creatief denken.</h1>
	<div class="tekst">
	  <p>Hoe vaak heeft u in de afgelopen maanden al het woord innovatie of het woord creativiteit voorbij horen komen?</p>
      <p>Het beeld bestaat dat creatief denken is weggelegd voor enkele   &quot;Willie Wortels&quot;: creatievelingen. Het tegendeel is waar: iedereen kan   creatief denken. Ook u!</p>
      <p>Kunt u 'alleen' en zonder begeleiding brainstormen? Misschien. In de   meeste gevallen zien we helaas dat niet begeleide brainstormsessies in   korte tijd verzanden in ideeëndoders als: <em>Dat hebben we al eens eerder gedaan</em> of <em>Als dat een goed idee was, had al lang iemand anders dat bedacht </em>en alle varianten die u zich daarbij kunt bedenken.</p>
      <p>Als dat voor u herkenbaar is wordt het de hoogste tijd dat u investeert in de ontwikkeling van <em>gestructureerd</em> creatief denken. Gestructureerd??? Inderdaad, creatieve denkprocessen   worden sinds de dertiger jaren van de vorige eeuw al volgens structuren   begeleid.</p>
      <p>Wij bouwen met behulp van die structuren een creatieve cultuur waarbij &quot; ja- maar&quot; tot het verleden behoort!</p>
      <p><em>Out of the box</em> denken werkt als u het doet volgens de regels   van het creatieve denkproces. Door toepassing van denktechnieken vindt u   die ideeën die u tot nu toe voor onmogelijk hebt gehouden.</p>
      <p>Moderne technieken voor toegepast creatief denken bewijzen hun waarde   bij eenvoudige én complexe problemen en uitdagingen:   productontwikkeling, strategiebepaling, het oplossen van (technische)   problemen, het (door)ontwikkelen van nieuwe of hernieuwde toepassingen.</p>
      <p>Naast het faciliteren van deze processen, trainen we u en uw   medewerkers ook om zélf aan de slag te gaan zodat een creatieve attitude   ontwikkeld wordt, om dagelijks gebruik van te maken. Onze trainingen   omvatten een degelijk stuk aanleren van technieken en structuren voor   creatief denken. Geen hei cursussen met &ldquo;tjakka&rdquo; verhalen of cursussen   positief denken.</p>
      <p>Wat we wél bieden zijn solide methodes om creatief aan de slag te   gaan. Actieve en ondersteunende specialismen met als kernthema toegepast   creatief denken. We brengen mét u het creatieve denkproces op gang en   houden dat vooral ook sámen met u in beweging.</p>
	</div>
    
    <ul class="sub">
        <li><a href="#" onclick="loadTextDetail('<?php echo $_POST['page']; ?>-detail', '10-regels');">De 10 vuistregels</a></li>
        <li><a href="#" onclick="loadTextDetail('<?php echo $_POST['page']; ?>-detail', '2');">Subpagina 2</a></li>
		<li><a href="#" onclick="loadTextDetail('<?php echo $_POST['page']; ?>-detail', 'contact');">Contact</a></li>
</ul>

<?php

	} else if($_POST['page'] == "info-detail" && $_POST['id'] == "10-regels"){
		
?>

	<h1>De 10 vuistregels</h1>
<div class="tekst">
		<h2>Observeren</h2>
        Creatief denken valt te leren. Niet zozeer door er talloze studieboeken op na te slaan, maar eerder door enkele randvoorwaarden te scheppen en de geest vooral veel ruimte te bieden. Zo doen kunstenaars dat. Heb je weinig vertrouwen in jouw natuurlijke creatieve vermogen, dan kun je ook op kunstmatige wijze creativiteit uitlokken. Hoe? Door te kijken hoe beroemde geniën dat doen en deden. Hieronder vind je enkele vuistregels.<br />
        <br />
        <h2>Vooroordeel</h2>
        Denken dat je niet creatief bent is een vooroordeel. Creatief denken is gewoon een onderdeel van het denkvermogen, naast andere, bekendere vaardigheden als analyseren, kritiseren en memoriseren. Echt iedereen kan het! Wel moet je het, net als alle vaardigheden, stimuleren en ontwikkelen. Dat is precies wat uitvinders en andere originele geesten doen en waardoor zij opvallen. Of je creativiteit met een kleine of een grote C schrijft hangt af van de mate van ontwikkeling.<br />
        <br />
        <h2>Luchtledig</h2>
        Out of the blue origineel zijn is praktisch onmogelijk. Iedereen begint wel ergens te broeden, heeft een probleem dat hij moet oplossen, een plan dat zij wil ontwerpen, een vernieuwing die hij wil doorvoeren. En daar begint het ook: elk creatief proces wortelt in het voorbereidende werk. Eerst verzamel je gegevens, checkt de stand van zaken, verzamelt reeds bedachte of uitgewerkte oplossingen…<br />
        <br />
        <h2>Kritiekloos</h2>
        Belangrijk is vooral dat je jezelf alle ruimte laat bij dit voorbereidende werk. Spui maar ideeën. Zonder ze meteen weer in de kiem te smoren, omdat ze niet haalbaar of betaalbaar zouden zijn, niet   geschikt, niet waar, niet origineel… In deze fase is dat allemaal onbelangrijk. Wat wel belangrijk is, is te spelen met je gedachten.<br />
        <br />
        <h2>Alternatieven</h2>
        Denk niet te snel dat je eruit bent, dat je de oplossing al gevonden hebt en niet verder hoeft na te denken. Dat is niet zo! Zoek zoveel mogelijk alternatieve oplossingen. Waarom? Omdat er vaak veel betere   oplossingen bijzitten dan de eerste waarmee je al tevreden was. Omdat je er misschien achter komt dat jouw oplossing bij nader inzien toch niet zo origineel was als je dacht. Omdat je, nu je toch eenmaal in de   ideeën-spui-fase zit, beter kunt profiteren van die flow, in plaats van later het proces van voren af aan te moeten opstarten.<br />
        <br />
        <h2>Incubatietijd</h2>
        Zijn je ideeën uitgeput, laat ze dan rusten, leg ze opzij, ga iets anders doen. Neem een pauze, sla een balletje, maak een ommetje, slaap   er een nachtje over en laat intussen je onderbewuste het proces afmaken. Het heeft tijd nodig. Creativiteit laat zich niet opjutten. Incubatietijd is een essentieel onderdeel van het proces. Het zal de   kwaliteit van de ideeën alleen maar ten goede komen.<br />
        <br />
        <h2>Doe er iets mee!</h2>
        Zoals gezegd zullen niet alle ideeën bruikbaar blijken. Je moet ze dus evalueren en selecteren. Welke kun je implementeren (toepassen) en welke moet je afvoeren?<br />
        <br />
        <h2>Balans</h2>
        Creatief denken doe je binnen een structuur, welke past jou het beste? Je zult zelf de balans moeten vinden tussen maximale vrijheid (chaos) en strakke regels (bureaucratie). Hier zijn geen algemeen geldende regels   voor, het is voor iedereen anders.<br />
        <br />
        <h2>Waardering</h2>
        Als een idee er eenmaal is lijkt het zo logisch (en hoe logischer hoe beter het idee) dat gemakkelijk vergeten wordt hoeveel inspanning eraan vooraf ging. Dat geldt zowel voor jezelf als voor je omgeving, je   opdrachtgever. Dan wordt al snel gedacht dat de oplossing er zonder die inspanning ook wel gekomen was en men heeft de neiging het creatieve proces te bagatelliseren. Pas daarvoor op! Het is de manier om je eigen   of andermans creativiteit in de kiem te smoren, te frustreren. Wil je creativiteit stimuleren dan is waardering, enthousiasme, onontbeerlijk!<br />
        <br />
        <h2>Verantwoordelijkheid </h2>
        Als je samen met anderen een probleem wilt oplossen, met elkaar iets nieuws wilt opzetten, gezamelijk iets wilt ontwerpen, deel dan ook de verantwoordelijkheid met zoveel mogelijk mensen. Niet alleen met hen die   direct bij het probleem betrokken zijn, maar ook met degenen die er slechts zijdelings mee te maken hebben. Vooral die laatste groep kan je verrassen door een frisse blik, een andere invalshoek, specifieke   kennis. Door hen aan te spreken en aan te sporen om mee te denken, raken ze gemotiveerd en dit zal de creatieve inbreng ten goede komen.<br />
        <br />
        <h2>Bedrijfsmatig</h2>
        Wil je binnen je bedrijf creativiteit stimuleren, weet dan dat je meer hebt aan een geleidelijke toename van creativiteit dan aan occasionele   hoogvliegers. Dit kun je realiseren door nieuwe werknemers te screenen op creatieve vaardigheden en door trainingen te organiseren. De trainingen verschaffen inzicht in creativiteit en creatief denken en bieden technieken om je daarin te oefenen. Dat heeft echter alleen zin als de werknemers de geleerde technieken ook in de praktijk kunnen brengen, individueel zowel als in een groep, en over langere perioden. Zo ontstaat er vertrouwen in de eigen creatieve vermogens wat weer zal leiden tot een algemene verhoging van ieders creativiteit!
</div>
<?php

	echo "<a href=\"#\" class=\"btn-back\" onclick=\"goBack();\">&laquo; Terug</a>\n";	

	}  else if($_POST['page'] == "info-detail" && $_POST['id'] == "contact"){
		
?>

	<h1>Contactgegevens</h1>
	<div class="tekst">
    
    	<p><strong>Sjra Puts Creative Brainworks BV</strong><br />
    	  Bosstraat 54 G<br />
        6071 XX Swalmen<br />
      Netherlands </p>
      <ul>
        <li>Creativity consultant. Trainen en faciliteren van creatieve denkprocessen</li>
          <li>Certified trainer Foursight</li>
          <li>Certified trainer Productive Thinking </li>
          <li>Member of <a href="http://www.thinkxic.com/who.php" target="_blank">Thinkx team </a></li>
          <li>Marketing communicatie</li>
          <li>Dagvoorzitter</li>
          <li>Evenementenpresentatie</li>
          <li>TV presentatie</li>
      </ul>
      <p><strong>T </strong>0031 (0)475 508085 of 0031 (0)475 508086<br />
      <strong>M</strong> 0031 (0)6 215 40 864 </p>
<p>E <a href="mailto:sjra@sjraputs.nl">sjra@sjraputs.nl</a> of <a href="mailto:gimm@wxs.nl" target="_blank">gimm@wxs.nl</a></p>
      <p><strong>Website: </strong><a href="http://www.sjraputs.nl/">www.sjraputs.nl<br />
      </a><strong>Linkedin: </strong><a href="http://nl.linkedin.com/pub/sjra-puts/4/522/527">http://nl.linkedin.com/pub/sjra-puts/4/522/527<br />
      </a><strong>Twitter: </strong><a href="http://twitter.com/Sjra">http://twitter.com/Sjra</a></p>
</div>
<?php

	echo "<a href=\"#\" class=\"btn-back\" onclick=\"goBack();\">&laquo; Terug</a>\n";	

	}  else if($_POST['page'] == "info-detail" && $_POST['id'] == "2"){
		
?>

<h1>Pagina 2</h1>
	<div class="tekst">
	  <p>Hier komt nog tekst te zitten</p>
</div>
    
<?php

	echo "<a href=\"#\" class=\"btn-back\" onclick=\"goBack();\">&laquo; Terug</a>\n";	
	} else if($_POST['page'] == "rules"){
		
?>

	<h1>Creatief denken. Iedereen kan het! <strong><em>The Blue Card</em></strong> helpt je</h1>
<div class="tekst">
  <p>Creatief denken is veel meer dan zomaar 150 gele briefjes  tegen de muur plakken. Creatief denken is een systeem waarbij je eerst op zoek  gaat naar de juiste vraag. Na zorgvuldig onderzoek kun je voor die vraag  oplossingen (ideeën) gaan bedenken. Daar gaan  de meeste mensen de fout in: als er ideeën bedacht worden roept er altijd wel  iemand <em>&rdquo; Ja, maar dat is te duur, te  onrealistisch, onwerkbaar of onuitvoerbaar&rdquo;</em>. In deze fase van het creatieve  denkproces hebben we dus een hulpmiddel nodig . Deze App <em>The Blue Card </em>helpt je daarbij. Elke keer at iemand weer zo&rsquo; n <em>ideakiller</em> probeert te lanceren laat je  hem of haar The Blue Card zien. Spreek met elkaar af bij hoeveel Blue Cards je  je schuld moet inlossen (jij betaalt de borrel of jij doet de afwas  bijvoorbeeld)</p>
  <p>Dus in de ideeëngeneratiefase en <strong><em>niet</em></strong> in de selectiefase,  gebruik <em>je The Blue Card</em>!!!</p>
  <p> Let goed op dat lichaamstaal ook een <em>ideakiller</em> kan zijn. En sta ook niet toe dat iemand zegt: <em>&ldquo; Op het gevaar af dat ik een Blue Card  krijg….&rdquo; </em></p>
</div>
<?php

	}
	

	
	
	
	//echo "<div class=\"clear\"></div>\n";
	
	/*
	
	if($_POST['id']){

		// indien gewenst terug button
		 echo "<a href=\"#\" class=\"btn-back\" onclick=\"goBack();\">&laquo; Terug</a>\n";		
		
	} else {

		// Submenu
	
		echo "<ul class=\"sub\">";
		echo "<li><a href=\"#\" onclick=\"loadTextDetail('". $_POST['page'] ."-detail', '1');\">Subpagina 1</a></li>\n";
		echo "<li><a href=\"#\" onclick=\"loadTextDetail('". $_POST['page'] ."-detail', '2');\">Subpagina 2</a></li>\n";
		echo "<li><a href=\"#\" onclick=\"loadTextDetail('". $_POST['page'] ."-detail', '3');\">Subpagina 3</a></li>\n";
		echo "<li><a href=\"#\" onclick=\"loadTextDetail('". $_POST['page'] ."-detail', '4');\">Subpagina 4</a></li>\n";
		echo "</ul>";
	
	}
	
	*/




	
	echo "</div>\n";
	
?>