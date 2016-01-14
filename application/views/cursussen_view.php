<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html hola_ext_inject="disabled"><head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">


	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
  <!-- Site Properties -->
  <title>Homepage - Semantic</title>
  <?php include 'layout/scripts.php' ?>
  
<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/dropdown.css">
  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        });

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    });
  </script>
</head>
<body class="pushable">

<?php include 'layout/menu_follow.php'; ?>
<?php include 'layout/menu_side.php'; ?>

<!-- Page Contents -->
<div class="pusher">
  <div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
    <?php include 'layout/menu_main.php'; ?>
  </div>
<div class="ui vertical stripe segment">
	<div class="ui middle aligned stackable grid container">
		<div class="row" style="background-color:#fff;">
			<div class="six wide column">
				<img src="<?= $this->config->base_url(); ?>/application/views/assets/img/bmer.jpg">	
			</div>
			<div class="ten wide column">
				<h3 class="ui header">Beginnerscursus</h3>
				<br>
				<p>Onze beginnerscursus wordt gegeven in stabiele boten. Wij hebben gekozen voor 16 kwadraat BM-ers. Voordat je met deze boten het water opgaat (onder begeleiding van een instructeur) moet je eerst een beetje van de theorie van her zeilen onder de knie krijgen. Deze theorie wordt onderwezen gedurende de eerste ochtend. Hier leer je waarop je moet letten als je een boot optuigt en aftuigt, hoe het roer werkt, welke zeiltypen je gaat gebruiken en de belangrijkste knopen. Je leert ook een aantal basisbegrippen, zoals: in de wind, voor de wind, halve wind, aan de wind , ruime wind, stuurboord, bakboord, over stag gaan, gijpen, laveren of kruisen en gedragsregels op het water. Ook wordt onderwezen hoe je deze begrippen tijdens het zeilen gaat toepassen. Tijdens het praktijkdeel van deze cursus leer je het geleerde toe te passen.</p>				
			</div>
		</div>
		<div class="row" style="background-color:#fff;">
			<div class="ten wide column">
				<h3 class="ui header">Gevorderdencursus</h3>
				<br>
				<p>Onze gevorderdencursus wordt gegeven met draken. Dit zijn minder stabiel boten dan de BM-ers. Je leert hier met een spinaker te zeilen en, bij sterke wind, te zeilen met een trapeze. Je leert hier ook wat te doen indien een noodsituatie ontstaat (zoals man overboord, een klap met een giek en een stukje EHBO).</p>				
			</div>
			<div class="six wide column">
				<img src="<?= $this->config->base_url(); ?>/application/views/assets/img/draak.jpg">
			</div>
		</div>
		<div class="row" style="background-color:#fff;">
			<div class="six wide column">
				<img src="<?= $this->config->base_url(); ?>/application/views/assets/img/schouw.jpg">
			</div>
			<div class="ten wide column">
				<h3 class="ui header">Wadtochten</h3>
				<br>
				<p>Uniek in bij onze zeilschool zijn, naast beginnerscursussen en gevorderdencursussen, de wadtochten. Dit zijn tochten over de Waddenzee onder begeleiding van een instructeur. Hier leert u hoe je moet zeilen op zee en zeilen in stromend water. De overnachtingen in deze cursus vinden op de Waddenzee zelf plaats! Dit kan doordat hier gebruik gemaakt wordt van Schouwen. Dit zijn boten met platte bodems, zodat de boten bij laag tij op de zeebodem kunnen blijven liggen, zonder dat het schip kantelt. Een unieke ervaring voor de gevorderde zeiler!</p>				
			</div>
		</div>
	</div>
</div>
   <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h3 class="ui header">Kleding</h3>
      <p>Het is verstandig goede zeilkleding mee te nemen. Omdat dit nogal duur kan zijn adviseren wij voor de beginners een goed regenpak. Voor de gevorderde zeiler is echte zeilkleding aan te raden. In (en ook buiten) de provincie Friesland zijn talloze winkels waar men u kunt adviseren. Google even op "zeilkleding" gevolgd door uw woonplaats.</p>
    </div>
  </div>

<?php include 'layout/footer.php'; ?>
  
</div>
</body></html>