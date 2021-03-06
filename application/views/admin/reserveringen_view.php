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
	<title>User Gegevens</title>
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
<div class="pusher" style="background-attachment: fixed; background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
<!-- Modal Edit User -->
		<div class="ui small modal" id="create_user">
			<div class="header">Nieuwe Reservering</div>
			<div class="content">
				<?= form_open('admin/reserveringen/save', 'role="form" class="ui form"'); ?>
					<div class="field">
						<h5>Klant_id</h5>
						<input type="text" class="form-control" id="klant_id" name="klant_id">
					</div>
					<div class="field">
						<h5>Cursus_id</h5>
						<input type="text" class="form-control" id="cursus_id" name="cursus_id">
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
						Reserveringen
					</h2>
				</div>
			</div>
			<div class="eight wide right aligned column create_user">
				<center>
					<button data-modal="create_user" id="call-modal-4" class="ui large primary button">Nieuwe Reservering</button>
				</center>
			</div>
		</div>
		<div class="fourteen wide column" style="max-width:none;">
			<div class="ui stacked segment">
					<table class="ui celled table">
						<thead>
						<tr>
							<th width="80px">Klant_id</th>
							<th>Voornaam</th>
							<th>Tussenvoegsel</th>
							<th>Achternaam</th>
							<th>Cursus_id</th>
							<th>Cursusnaam</th>
							<th>Opmerkingen</th>
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
									<td><?= $row->klant_id; ?></td>
									<td><?= $row->voornaam; ?></td>
									<td><?= $row->tussenvoegsel; ?></td>
									<td><?= $row->achternaam; ?></td>
									<td><?= $row->cursus_id; ?></td>
									<td><?= $row->cursusnaam; ?></td>
									<td><?= $row->opmerkingen; ?></td>
									<td>
										<a href="<?= site_url('admin/reserveringen/edit/' . $row->klant_id . '/' . $row->cursus_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
										<a href="#" id="delete<?= $row->klant_id . $row->cursus_id; ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
									</td>
								</tr>
								<div class="ui modal delete<?= $row->klant_id . $row->cursus_id; ?>">
								  <div class="header">Verwijder reservering van klant: <?= $row->klant_id; ?> bij cursus: <?= $row->cursus_id; ?></div>
								  <div class="content"><p>Weet u zeker dat u de geselecteerde reservering wilt verwijderen?</p></div>
								  <div class="actions"><div class="negative ui button">Annuleren</div><a href="<?= site_url('admin/reserveringen/delete/' . $row->klant_id . '/' . $row->cursus_id); ?>"><div class="ui positive right labeled icon button">Verwijderen<i class="trash icon"></i></div></a></div>
								</div>
								<script>
								$('#delete<?= $row->klant_id . $row->cursus_id; ?>').on('click', function(){
									$('.ui.modal.delete<?= $row->klant_id . $row->cursus_id; ?>')
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

<?php include 'layout/footer.php'; ?>
<script>
$('center .button').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
</script>
</body>
</html>