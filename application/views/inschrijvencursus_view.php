<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id'])) {
	header('Location: home');
}
$description = array('id' => 'description', 'placeholder' => 'Eventuele opmerkingen', 'name' => 'description'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bewerk Instructeur</title>
	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<!-- Site Properties -->
	<?php include 'layout/scripts.php' ?>

	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/dropdown.css">
	<script>
		$(document).ready(function() {
			// fix menu when passed
			$('.masthead').visibility({
				once : false,
				onBottomPassed : function() {
					$('.fixed.menu').transition('fade in');
				},
				onBottomPassedReverse : function() {
					$('.fixed.menu').transition('fade out');
				}
			});
			// create sidebar and attach to menu open
			$('.ui.sidebar').sidebar('attach events', '.toc.item');

		});
	</script>
	<style>
		body {
			overflow: scroll;
		}
		.field > h5{
			float:left;
		}
		#headerpicture{
			    background-color: transparent;
		}
		.column {
			max-width: 1000px;
			text-align: left;
			top: -550px;
		}
		#details {
			text-align: left;
		}
		.close{
			width: 100px;
		    height: 36px;
		}
	</style>
</head>
<body class="pushable">
<?php include 'layout/menu_follow.php'; ?>
<div class="pusher" style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
<!-- Modal Edit User -->
	<div id="headerpicture" class="ui inverted vertical masthead aligned segment">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>

	<div class="ui middle aligned center aligned grid">
		<div class="five wide column"></div>
			<div class="six wide column" style="margin-left: -34px;">
				<div class="ui segment">
					<h2>
						<?=$cursusnaam;?>
					</h2>
				</div>
			</div>
			<div class="five wide column"></div>
			<div class="five wide column"></div>
		<div class="six wide column" style="margin-left: -33px;">
			<div class="ui stacked segment">
				<form method="POST" action="<?= site_url('inschrijven/inschrijven/' . $cursus_id); ?>">
				<table class="ui fixed single line celled table">
					<tr>
						<td>Cursus Naam</td>
						<td><?=$cursusnaam;?></td>
					</tr>
					<tr>
						<td>Cursusprijs</td>
						<td><?=$cursusprijs;?></td>
					</tr>
					<tr>
						<td>Cursusomschrijving</td>
						<td><?=$cursusomschrijving;?></td>
					</tr>
					<tr>
						<td>Start Datum</td>
						<td><?=$startdatum;?></td>
					</tr>
					<tr>
						<td>Eind Datum</td>
						<td><?=$einddatum;?></td>
					</tr>
				</table>
				
				<?= form_textarea($description); ?> <br>
				<input type="submit" class"ui button" value="Inschrijven"><a href="<?= site_url('inschrijven/inschrijven/' . $cursus_id); ?>"></a></input>
				</form>
			<?= form_close(); ?>
			</div>
		</div>
		<div class="five wide column"></div>
	</div>
	<div class="ui middle aligned center	 aligned grid">
		<div class="column">
			<div class="ui header">
				<div id="details"></div>
				<div id="error"></div>
			</div>
		</div>
	</div>
</div>

<?php include 'layout/footer.php'; ?>
</body>
</html>