<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id']) || $_SESSION['user_group'] != '2') {
	header('Location: ../home');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bewerk Cursus:<?=$cursusnaam;?> </title>
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
		.pusher{
			background-attachment:fixed;
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
<div class="pusher" style="background-attachment:fixed; background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
<!-- Modal Edit User -->
	<div id="headerpicture" class="ui inverted vertical masthead aligned segment">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>
	<?php
		$data = json_decode($cursus);
		$instructeurs = json_decode($instructeurs);
		$reserveringen = json_decode($inschrijvingen);
	?>
	<div class="ui middle aligned center aligned grid">
			<div class="six wide column" style="margin-left: -34px;">
				<div class="ui segment">
					<h2>
						Inplannen cursus: <?= $data[0]->cursusnaam; ?>
					</h2>
				</div>
			</div>
			<div class="two wide right aligned column create_user">
				<center>
					<button onclick="location.href='<?= site_url('admin/cursussen');?>'" class="ui large primary button">Annuleren</button>
				</center>
			</div>
		<div class="sixteen wide column">
			<div class="ui stacked segment">
				Startdatum: <?= $data[0]->startdatum; ?><br>
				Einddatum: <?= $data[0]->einddatum; ?><br>
				Plaatsen per boot: <?= $data[0]->plaatsen; ?><br>
				Aantal boten: <?= count($data); ?><br>
				Totaal aantal plaatsen: <?= $data[0]->plaatsen * count($data); ?><br>
			</div>
			<div class="ui stacked segment">
				<?php
				echo form_open('admin/inplannen/insert/' . $id, 'class="ui form"');
				for($x = 0; $x < count($data);  $x++){
					echo '<h4>Boot ' . ($x + 1) . ' : ' . $data[$x]->bootnaam . '</h4><br>';
					echo 'Instructeur:';
					echo '<select name="instructeur' . $x . '">';
					echo '<option value="NULL"> </option>';
					if(count($instructeurs) === 0){
						echo '<option value="NULL">Geen instructeurs</option>';
					}else{
						for($z = 0; $z < count($instructeurs); $z++){
							echo '<option value="' . $instructeurs[$z]->instructeur_id . '">' . $instructeurs[$z]->instructeur_voornaam . ' ' . $instructeurs[$z]->instructeur_tussenvoegsel . ' ' . $instructeurs[$z]->instructeur_achternaam . '</option>';
						}
					}
					echo '</select><br>';
					$c = -1;
					echo '<div class="two fields">';
					for($y = 0; $y < $data[0]->plaatsen; $y++){
						if($c == 1){
							echo '</div><div class="two fields">';
							$c = 0;
						}else{
							$c++;
						}
						echo '<div class="field">';
						echo 'Klant: ';
						echo '<select name="klant' . $x . $y . '">';
						echo '<option value="NULL"> </option>';
						if(count($reserveringen) === 0){
							echo '<option value="NULL">Geen reserveringen</option>';
						}else{
							for($w = 0; $w < count($reserveringen); $w++){
								echo '<option value="' . $reserveringen[$w]->klant_id . '">' . $reserveringen[$w]->voornaam . ' ' . $reserveringen[$w]->tussenvoegsel . ' ' . $reserveringen[$w]->achternaam . '</option>';
							}
						}
						
						echo '</select></div>';
					}
					echo '</div>';
				}
				echo form_submit('sumbit', 'Plan cursus');
				echo '<a href="' . site_url('admin/inplannen') . '">Terug</a>';
				echo form_close();
				?>
			</div>
		</div>
	</div>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<div class="ui header">
				<div id="details"></div>
				<div id="error"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>