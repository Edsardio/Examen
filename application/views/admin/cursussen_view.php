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
	<title>Cursus Gegevens</title>
	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<!-- Site Properties -->
	<?php include 'layout/scripts.php' ?>

	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/dropdown.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/style/admin.css">
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
</head>
<body class="pushable">
<?php include 'layout/menu_follow.php'; ?>
<div class="pusher" style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
<!-- Modal Edit User -->
		<div class="ui small modal" id="create_user">
			<div class="header">Maak een nieuwe Cursus</div>
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
								<option value="Wadtocht">Wadtocht</option>
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
			<div class="four wide center aligned column"></div>
			<div class="four wide right aligned column create_user">
				<center>
					<button data-modal="create_user" id="call-modal-4" class="ui large primary button">Nieuwe Cursus</button>
				</center>
			</div>
		</div>
		<div class="fourteen wide column" style="max-width:none;">
			<div class="ui stacked segment">
				<table class="ui celled table" id="">
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
										<a href="#" id="delete<?= $row->cursus_id; ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
									</td>
								</tr>
								<div class="ui modal delete<?= $row->cursus_id; ?>">
								  <div class="header">Verwijder cursus: <?= $row->cursusnaam; ?></div>
								  <div class="content"><p>Weet u zeker dat u de geselecteerde cursus wilt verwijderen?</p></div>
								  <div class="actions"><div class="negative ui button">Annuleren</div><a href="<?= site_url('admin/Cursussen/delete/' . $row->cursus_id); ?>"><div class="ui positive right labeled icon button">Verwijderen<i class="trash icon"></i></div></a></div>
								</div>
								<script>
								$('#delete<?= $row->cursus_id; ?>').on('click', function(){
									$('.ui.modal.delete<?= $row->cursus_id; ?>')
								  		.modal('show')
									;
								});
								</script>
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