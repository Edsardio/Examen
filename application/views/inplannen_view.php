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
		<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/gebruikers.js"></script>
		<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<?php $json = json_encode($cursus);?>
		<script>
		var response = <?php echo $json;?>
		
		$(function() {
			$.each(response, function(i, item) {
				$('<tr>').append(
					$('<td>').text(item.cursusnaam),
					$('<td>').text(item.startdatum),
					$('<td>').text(item.einddatum),
					$('<td>').text(item.niveau)
		
					).appendTo('#records_table');
			});
		});
		</script>		
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
				background-color: #dedede;
			}
			th{
				margin-bottom:10px;
			}
			td {
				min-width:100px;
				font-size: 13px;
				text-align:center;
			}
			.column {
				max-width: 450px;
				text-align: left;
				top: -550px;
			}
			#details {
				text-align: left;
			}
		</style>
	</head>
	<body class="pushable" style="background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/sunset-sailing.jpg');  background-size: 100% 100%; background-repeat: no-repeat;">
		<?php
		include 'layout/menu_follow.php';
		?>
		<div class="pusher">
			<div id="headerpicture" class="ui inverted vertical masthead aligned segment">
				<?php
				include 'layout/menu_main.php';
				?>
			</div>

			<div class="ui middle aligned center aligned grid">
				<div class="column">
					<h2 class="ui image header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
					<div class="content">
						Gebruikersgegevens
					</div></h2>
					<?= form_open('Login/validate_credentials', 'class="ui large form'); ?>
					<div class="ui stacked segment">
						<table id="records_table" class="table table-bordered">
							<tr>
								<th>Cursusnaam</th>
								<th>Startdatum</th>
								<th>Einddatum</th>
								<th>Niveau</th>
							</tr>
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
	</body>
