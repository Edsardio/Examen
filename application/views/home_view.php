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
  <div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/boten/boot<?= rand(1, 4); ?>.jpg'); max-width: 100%;">
    <?php include 'layout/menu_main.php'; ?>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">Welkom!</h3>
          <p>Welkom op de website van zeilschool De Waai. Wij zijn de specialist in het verzorgen van complete zeilcursussen in het mooie Friese Gaasterland in het plaatsje Warns. Onze cursussen worden verzorgd door een team ervaren zeilinstructeurs en activiteitenbegeleiders. Tijdens uw verblijf op onze zeilschool komt u niets tekort. Zo hebben wij een gezellig restaurant, een bar en verzorgen wij ook avondprogramma's, zoals spelprogramma's voor kinderen, droppings voor de wat oudere deelnemer, en karaokeavonden.</p>
          <h3 class="ui header">Locatie</h3>
          <p>Onze zeilschool ligt op loopafstand van het centrum van Warns aan de Ymedaem vlakbij de meren de Geeuw en Morra en met een open vaarverbinding naar de Fluessen! Voor overnachting kunt u terecht bij hotel De Preatert, dat naast onze zeilschool ligt. Dit hotel is recentelijk geopend en dus een aanwinst voor de recreatie in onze regio.</p>
        </div>
        <div class="six wide right floated column">
          
        </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a class="ui huge button" href="cursussen">Cursussen</a>
        </div>
      </div>
    </div>
  </div>


  <div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
      <div class="center aligned row">
        <div class="column">
          <h3>"Geweldige boten en goede begeleiding!"</h3>
          <p>Jens Jonkman</p>
        </div>
        <div class="column">
          <h3>"I r8 8/8 m8."</h3>
          <p>
             Jelle Schuurmans
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
      <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
      <a class="ui large button">Read More</a>
      <h4 class="ui horizontal header divider">
        <a href="#">Case Studies</a>
      </h4>
      <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
      <p>Yes I know you probably disregarded the earlier boasts as non-sequitor filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
      <a class="ui large button">I'm Still Quite Interested</a>
    </div>
  </div> -->

<?php include 'layout/footer.php'; ?>
  
</div>
</body></html>