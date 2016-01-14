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
	<title>Cursus Gegevens</title>
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
		th{
			margin-bottom:10px;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		tr:hover{
			background-color:yellow;
		}
		td {
			max-width:230px;
			font-size: 13px;
			text-align:center;
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
		<div class="ui small modal" id="create_user">
			<div class="header">Nieuwe Cursus</div>
			<div class="content">
				<?= form_open('admin/Cursussen/save', 'role="form" class="ui form"'); ?>
						<div class="field">
							<h5>Naam</h5>
							<input type="text" class="form-control" id="cursusnaam" name="cursusnaam">
						</div>
						<div class="field">
							<h5>Prijs</h5>
							<input type="text" class="form-control" id="cursusprijs" name="cursusprijs">
						</div>
						<div class="field">
							<h5>Omschrijving</h5>
							<textarea id="cursusomschrijving" name="cursusomschrijving" rows="2" style="margin-top: 0px; margin-bottom: 0px; height: 58px; resize:none;	"></textarea>							
						</div>
						<div class="field">
							<h5>Startdatum</h5>
							<input type="date" class="form-control" id="startdatum" name="startdatum">
						</div>
						<div class="field">
							<h5>Einddatum</h5>
							<input type="date" class="form-control" id="einddatum" name="einddatum">
						</div>
						<div class="field">
							<h5>Niveau</h5>
							<select id="niveau" name="niveau" class="form-control">
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
									echo '<option value="' . $type->type_id . '">' . $type->boottype . '</option>';
								}
								?>
							</select>
						</div>
					<br>
				</div>
				<div class="actions">
					<input type="submit" name="mit" class="ui primary button" value="Opslaan">
					<input class="ui deny red button close" value="Close">
				</div>		
				</form>
				<?= form_close(); ?>
		</div>
<!-- Code -->
	<div id="headerpicture" class="ui vertical masthead aligned segment">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>
	<div class="ui center aligned grid">
		<div class="row">
			<div class="six wide column">
				<div class="ui segment">
					<h2>
						Cursussen
					</h2>
				</div>
			</div>
			<div class="eight wide right aligned column create_user">
				<center>
					<button data-modal="create_user" id="call-modal-4" class="ui large primary button">Nieuwe Cursus</button>
				</center>
			</div>
		</div>
		<div class="fourteen wide column" style="max-width:none;">
			<div class="ui stacked segment">
					<table class="ui celled table">
		<thead>
			<tr>
				<th width="80px">ID</th>
				<th>Naam</th>
				<th>Prijs</th>
				<th>Omschrijving</th>
				<th>Startdatum</th>
				<th>Einddatum</th>
				<th>Niveau</th>
				<th>Type_id</th>
				<th width="120px">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($data_get == NULL){
			?>
				<div class="alert alert-info" role="alert">Geen gegevens gevonden!</div>
			<?php	
			}else{
				foreach($data_get as $row){
					?>
					<tr>
						<td><?= $row->cursus_id; ?></td>
						<td><?= $row->cursusnaam; ?></td>
						<td><?= $row->cursusprijs; ?></td>
						<td><?= $row->cursusomschrijving; ?></td>
						<td><?= $row->startdatum; ?></td>
						<td><?= $row->einddatum; ?></td>
						<td><?= $row->niveau; ?></td>
						<td><?= $row->type_id; ?></td>
						<td>
							<a href="<?= site_url('admin/Cursussen/edit/' . $row->cursus_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
							<a href="<?= site_url('admin/Cursussen/delete/' . $row->cursus_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>
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
</body>
</html>