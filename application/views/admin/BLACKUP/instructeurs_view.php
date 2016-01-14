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
			overflow: hidden;
		}
		th{
			margin-bottom:10px;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2
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
<div class="pusher">
<!-- Modal Edit User -->
<div class="ui small modal" id="create_user">
	<div class="header">Create New User</div>
	<div class="content">
		<?= form_open('admin/Instructeur/save', 'role="form" class="ui form"'); ?>
			<div class="field">
				<h5>Voornaam</h5>
				<input type="text" class="form-control" id="instructeur_voornaam" name="instructeur_voornaam">
			</div>
			<div class="field">
				<h5>Tussenvoegsel</h5>
				<input type="text" class="form-control" id="instructeur_tussenvoegsel" name="instructeur_tussenvoegsel">
			</div>
			<div class="field">
				<h5>Achternaam</h5>
				<input type="text" class="form-control" id="instructeur_achternaam" name="instructeur_achternaam">
			</div>
			<div class="field">
				<h5>Geslacht</h5>
				<select id="instructeur_geslacht" name="instructeur_geslacht" class="form-control">
					<option value="man">Man</option>
					<option value="vrouw">Vrouw</option>
				</select>
			</div>
			<div class="field">
				<h5>E-mail</h5>
				<input type="email" class="form-control" id="instructeur_email" name="instructeur_email">
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
				<table class="ui celled table">
				<thead>
					<tr>
						<th width="80px">ID</th>
						<th>Voornaam</th>
						<th>Tussenvoegsel</th>
						<th>Achternaam</th>
						<th>Geslacht</th>
						<th>Email</th>
						<th width="100px">Action</th>
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
								<td><?= $row->instructeur_id; ?></td>
								<td><?= $row->instructeur_voornaam; ?></td>
								<td><?= $row->instructeur_tussenvoegsel; ?></td>
								<td><?= $row->instructeur_achternaam; ?></td>
								<td><?= $row->instructeur_geslacht; ?></td>
								<td><?= $row->instructeur_email; ?></td>
								<td>
																	
									<a href="<?= site_url('admin/Instructeur/edit/' . $row->instructeur_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
									<a href="<?= site_url('admin/Instructeur/delete/' . $row->instructeur_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
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