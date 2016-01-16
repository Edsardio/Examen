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
	<title>Bewerk Gebruiker</title>
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
<div class="pusher" style="background-attachment:fixed; background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
<!-- Modal Edit User -->
	<div id="headerpicture" class="ui inverted vertical masthead aligned segment">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>

	<div class="ui middle aligned center aligned grid">
			<div class="six wide column" style="margin-left: -34px;">
				<div class="ui segment">
					<h2>
						Bewerk Gebruiker: <?=$voornaam;?> <?=$tussenvoegsel;?> <?=$achternaam;?>
					</h2>
				</div>
			</div>
			<div class="two wide right aligned column create_user">
				<center>
					<button onclick="location.href='<?= site_url('admin/gebruikers');?>'" class="ui large primary button">Annuleren</button>
				</center>
			</div>
		<div class="sixteen wide column">
			<div class="ui stacked segment">
				<?= form_open('admin/Gebruikers/update', 'role="form" class="ui form"'); ?>
					<div class="field">
						<h5>Voornaam</h5>
						<input type="text" class="form-control" id="voornaam" name="voornaam" value="<?=$voornaam;?>">
					</div>
					<div class="field">
						<h5>Tussenvoegsel</h5>
						<input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel" value="<?=$tussenvoegsel;?>">
					</div>
					<div class="field">
						<h5>Achternaam</h5>
						<input type="text" class="form-control" id="achternaam" name="achternaam" value="<?=$achternaam;?>">
					</div>
					<div class="field">
						<h5>Geboortedatum</h5>
						<input type="date" class="form-control" id="geboortedatum" name="geboortedatum" value="<?=$geboortedatum;?>">
					</div>
					<div class="field">
						<h5>Geslacht</h5>
						<select id="geslacht" name="geslacht" class="form-control">
							<option value="man">Man</option>
							<option value="vrouw">Vrouw</option>
						</select>
					</div>
					<div class="field">
						<h5>Adres</h5>
						<input type="text" class="form-control" id="adres" name="adres" value="<?=$adres;?>">
					</div>
					<div class="field">
						<h5>Postcode</h5>
						<input type="text" class="form-control" id="postcode" name="postcode" value="<?=$postcode;?>">
					</div>
					<div class="field">
						<h5>Woonplaats</h5>
						<input type="text" class="form-control" id="woonplaats" name="woonplaats" value="<?=$woonplaats;?>">
					</div>
					<div class="field">
						<h5>Telefoonnummer</h5>
						<input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer" value="<?=$telefoonnummer;?>">
					</div>
					<div class="field">
						<h5>Mobiel</h5>
						<input type="text" class="form-control" id="mobiel" name="mobiel" value="<?=$mobiel;?>">
					</div>
					<div class="field">
						<h5>E-mail</h5>
						<input type="email" class="form-control" id="email" name="email" value="<?=$email;?>">
					</div>
					<div class="field">
						<h5>Niveau</h5>
						<select id="niveau" name="niveau" class="form-control">
							<option value="Beginner">Beginner</option>
							<option value="Gevorderde">Gevorderde</option>
						</select>
					</div>
					<div class="field">
						<h5>Wachtwoord</h5>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<input type="submit" name="mit" class="ui button primary" value="Opslaan">
					<button type="button" onclick="location.href='<?= site_url('admin/gebruikers');?>" class="ui button btn-success">Annuleren</button>
				</form>
			<?= form_close(); ?>
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