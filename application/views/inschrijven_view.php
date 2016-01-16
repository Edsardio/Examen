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
	<!-- <script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/gebruikers.js"></script> -->
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
		th{
			margin-bottom:10px;
		}
		tr:nth-child(even) {background-color: #f2f2f2}

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
	</style>
</head>
<body class="pushable">
<?php include 'layout/menu_follow.php'; ?>
<div class="pusher" style="    background-attachment: fixed;background-image: url('http://www.kwartvoorhalfvijf.nl/examen/application/views/assets/img/sunset-sailing.jpg');">
	<div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="background-color: transparent;">
		<?php
		include 'layout/menu_main.php';
		?>
	</div>

	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui image header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
				<div class="content">
					Cursussen
				</div></h2>
			<?php
			if(isset($response)){
				echo '<div class="ui content header message large">' . $response . '</div>';
			}
			?>
			<div class="ui stacked segment">
				<table class="ui celled table">
					<thead>
					<tr>
						<th width="80px">ID</th>
						<th>Cursusnaam</th>
						<th>Startdatum</th>
						<th>Einddatum</th>
						<th>Niveau</th>
						<th>Inschrijven</th>
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
								<td><?= $row->startdatum; ?></td>
								<td><?= $row->einddatum; ?></td>
								<td><?= $row->niveau; ?></td>
								<td>
									<a href="<?= site_url('inschrijven/cursus/' . $row->cursus_id); ?>"><button class="ui button">Inschrijven</button></a>
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

<?php include 'layout/footer.php'; ?>
</body>
</html>