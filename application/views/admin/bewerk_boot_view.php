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
			overflow: hidden;
		}
		.field > h5{
			float:left;
		}
		.pusher{
 			background-attachment: fixed;
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
		<div class="row">
			<div class="six wide column">
				<div class="ui segment">
					<h2>
						Bewerkt boot: <?= $bootnaam; ?>
					</h2>
				</div>
			</div>
			<div class="two wide right aligned column create_user" style="margin-left:31px;">
				<center>
					<button onclick="location.href='<?= site_url('admin/boten');?>'" class="ui large primary button">Annuleren</button>
				</center>
			</div>
		</div>
		<div class="row">
		<div class="sixteen wide column">
			<div class="ui stacked segment">
				<?= form_open('admin/Boten/update', 'role="form" class="ui form"'); ?>
					<div class="field">
						<h5>Bootnaam</h5>
						<input type="text" class="form-control" id="bootnaam" name="bootnaam" value="<?= $bootnaam; ?>">
					</div>
					<div class="field">
						<h5>Bouwjaar</h5>
						<input type="date" class="form-control" id="bouwjaar" name="bouwjaar" value="<?= $bouwjaar; ?>">
					</div>
					<div class="field">
						<h5>Type</h5>
						<select id="type_id" name="type_id">
							<?php
							$ttype = json_decode($typen); 
							foreach($ttype as $type){
								if($type->type_id = $boottype){
									$active = 'selected';
								}else{
									$active = ' ';
								}
								echo '<option ' . $active . ' value="' . $type->type_id . '">' . $type->boottype . '</option>';
							}
							?>
						</select>
					</div>
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<input type="submit" name="mit" class="ui button primary" value="Opslaan">
					<button type="button" onclick="location.href='<?= site_url('admin/boten');?>'" class="ui button btn-success">Annuleren</button>
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
</body>
</html>