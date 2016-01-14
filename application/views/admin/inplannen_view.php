<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/cursus.js"></script>

	<!-- Site Properties -->
	<title>Register Example - Semantic</title>
	<?php include 'layout/scripts.php' ?>

	<style type="text/css">
		body {
			background-color: #DADADA;
			overflow:hidden;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 750px;
		}
		#arrow-left {
			width: 32px;
		}
		.arrow-left {
			position: absolute;
			margin: 5px;
			top: 0;
		}
	</style>
</head>
<body style="background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/boten/boot3.jpg');  background-size: 100% 100%; background-repeat: no-repeat;">
<?php include 'layout/menu_main.php'; ?>
	<?php
	$attributes = array('method' => 'POST', 'class' => 'ui large form', 'id' => 'inplannen');
	$naam = array('name' => 'naam', 'id' => 'naam', 'placeholder' => 'Cursus naam', 'type' => 'text');
	$niveaujs = 'id="niveau" onChange="getCursusDetails();" name="niveau"';
	$niveau = array('leeg' => '', 'Beginner' => 'Beginner', 'Gevorderde' => 'Gevorderde', 'Wadtocht' => 'Wadtocht');
	$description = array('id' => 'description', 'placeholder' => 'Cursus beschrijving', 'name' => 'description');
	$startdatum = array('name' => 'startdatum', 'id' => 'startdatum', 'placeholder' => 'Start datum', 'type' => 'date', 'onChange' => 'datumStart();');
	$einddatum = array('name' => 'einddatum', 'id' => 'einddatum', 'placeholder' => 'Eind datum', 'type' => 'date', 'onChange' => 'datumEnd();');
	?>
	<div style="margin-top:-200px;"></div>
	<div class="ui middle aligned center aligned grid" >
		<div class="column" style="top:200px;">
			<h2 class="ui image header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
			<div class="content">
				Maak een nieuwe cursus aan
			</div></h2>
			<div class="ui stacked segment">
				<?= form_open('admin/Inplannen/newCursus', $attributes); ?>
				<div class="two fields">
					<div class="field">
						<div class="ui left icon labeled input">
							<!-- <i class="user icon"></i> -->
							<?= form_input($naam); ?>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<!-- <i class="user icon"></i> -->
							<?= form_dropdown('niveau', $niveau, 'leeg', $niveaujs); ?>
						</div>
					</div>
				</div>
				<div id="details" style="text-align: left;"></div>
				<br>
				<div class="field">
					<div class="ui left icon labeled input">
						<!-- <i class="user icon"></i> -->
						<?= form_textarea($description); ?>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<div class="ui left icon labeled input">
							<!-- <i class="mail icon"></i> -->
							<?= form_input($startdatum); ?>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon labeled input">
							<!-- <i class="lock icon"></i> -->
							<?= form_input($einddatum); ?>
						</div>
					</div>
				</div>
				<?= form_submit('submit', 'Maak cursus', 'class="ui fluid large teal submit button"'); ?>
			</div>
			<?= form_close(); ?>
		</div>
	</div>

	<input type="hidden" data-url="<?=$this -> config -> base_url(); ?>" id="data-url">
</body>
</html>