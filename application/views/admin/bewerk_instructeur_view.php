<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id'])) {
	header('Location: home');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Gegevens</title>
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
			background-color: #dedede;
		}
		.field > h5{
			float:left;
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
<div class="pusher">
<!-- Modal Edit User -->
	<div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>

	<div class="ui middle aligned center aligned grid">
		<div class="row">
			<div class="six wide column" style="margin-left: 3px;">
				<div class="ui segment">
					<h2>
						Instructeurs
					</h2>
				</div>
			</div>
			<div class="five wide right aligned column create_user" style="margin-left:55px;">
				<center>
					<button data-modal="create_user" id="call-modal-4" class="ui large primary button">Create User</button>
				</center>
			</div>
		</div>
		<div class="row">
		<div class="sixteen wide column">
			<div class="ui stacked segment">
				<?= form_open('admin/Instructeur/update', 'role="form" class="ui form"'); ?>
					<div class="field">
						<h5>Voornaam</h5>
						<input type="text" class="form-control" id="instructeur_voornaam" name="instructeur_voornaam" value="<?=$voornaam;?>">
					</div>
					<div class="field">
						<h5>Tussenvoegsel</h5>
						<input type="text" class="form-control" id="instructeur_tussenvoegsel" name="instructeur_tussenvoegsel" value="<?=$tussenvoegsel;?>">
					</div>
					<div class="field">
						<h5>Achternaam</h5>
						<input type="text" class="form-control" id="instructeur_achternaam" name="instructeur_achternaam" value="<?=$achternaam;?>">
					</div>
					<div class="field">
						<h5>Geslacht</h5>
						<select id="instructeur_geslacht" name="instructeur_geslacht" class="form-control">
							<option value="<?=$geslacht;?>"><?=$geslacht;?></option>
							<option value="man">Man</option>
							<option value="vrouw">Vrouw</option>
						</select>
					</div>
					<div class="field">
						<h5>E-mail</h5>
						<input type="email" class="form-control" id="instructeur_email" name="instructeur_email" value="<?=$email;?>">
					</div>
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
					<button type="button" onclick="location.href='<?= site_url('admin/instructeur');?>'" class="btn btn-success">Annuleren</button>
				</form>
				<?= form_close(); ?>

			</div>
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
<script>
$('center .button').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
</script>

<?php include 'layout/footer.php'; ?>
</body>
</html>