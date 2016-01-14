<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id'])) {
	header('Location: home');
}
echo $this->uri->segment(0);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>User Gegevens</title>
		<script src="<?= $this -> config -> base_url(); ?>application/views/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?= $this -> config -> base_url(); ?>application/views/assets/js/details.js"></script>
		<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>

		<!-- Site Properties -->
		<title>Login Example - Semantic</title>
		<?php include 'layout/scripts.php'
		?>
		
<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/dropdown.css">
	</head>
	<body class="pushable">
		<?php
		include 'layout/menu_follow.php';
		?>
		<div class="pusher">
			<div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/sunset-sailing.jpg'); background-repeat: no-repeat;">
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
						<div id="details"></div>
					</div>
					<div class="ui message">
						Details aan passen? Stuur een email! <a href="<?= $this -> config -> base_url(); ?>contact">Stuur hier</a>
					</div>
				</div>
			</div>
			<style>
				body {
					overflow: hidden;
					background-color: #dedede;
				}
				td {
					padding-right: 25px;
					font-size: 16px;
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
			<div class="ui middle aligned center aligned grid">
				<div class="column">
					<div class="ui header">
						<div id="details"></div>
					</div>
				</div>
			</div>
			<input type="hidden" data-url="<?=$this -> config -> base_url(); ?>" id="data-url">
			<div id="container">

			</div>
		</div>
		<?php
		include 'layout/footer.php';
		?>
	</body>
</html>