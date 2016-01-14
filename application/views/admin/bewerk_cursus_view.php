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

	<div class="ui middle aligned center aligned grid">
			<div class="six wide column" style="margin-left: -34px;">
				<div class="ui segment">
					<h2>
						Bewerk Cursus: <?=$cursusnaam;?>
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
				<?= form_open('admin/Cursussen/update', 'role="form" class="ui form"'); ?>
					<div class="field">
						<h5>Naam</h5>
						<input type="text" class="form-control" id="cursusnaam" name="cursusnaam" value="<?=$cursusnaam;?>">
					</div>
					<div class="field">
						<h5>Prijs</h5>
						<input type="text" class="form-control" id="cursusprijs" name="cursusprijs" value="<?=$cursusprijs;?>">
					</div>
					<div class="field">
						<h5>Omschrijving</h5>
						<input type="text" class="form-control" id="cursusomschrijving" name="cursusomschrijving" value="<?=$cursusomschrijving;?>">
					</div>
					<div class="field">
						<h5>Startdatum</h5>
						<input type="date" class="form-control" id="startdatum" name="startdatum" value="<?=$startdatum;?>">
					</div>
					<div class="field">
						<h5>Einddatum</h5>
						<input type="date" class="form-control" id="einddatum" name="einddatum" value="<?=$einddatum;?>">
					</div>
					<div class="field">
						<h5>Niveau</h5>
						<select id="niveau" name="niveau" class="form-control">
							<option value="<?=$niveau;?>"><?=$niveau;?></option>
							<option value="Beginner">Beginner</option>
							<option value="Gevorderde">Gevorderde</option>
						</select>
					</div>
					<div class="field">
						<h5>Type</h5>
						<select id="type_id" name="type_id">
							<?php
							$ttype = json_decode($typen); 
							foreach($ttype as $type){
								if($type->type_id = $type_id){
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
					<button type="button" onclick="location.href='<?= site_url('admin/cursussen');?>'" class="ui button btn-success">Annuleren</button>
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