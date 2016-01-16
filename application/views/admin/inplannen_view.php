<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id']) || $_SESSION['user_group'] != '2') {
	header('Location: ../home');
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/cursus.js"></script>

	<!-- Site Properties -->
	<title>Register Example - Semantic</title>
	<?php include 'layout/scripts.php' ?>

	<?php $data = json_decode($cursussen); ?>
	
	<style type="text/css">
		body {
			background-color: #DADADA;
			overflow: hidden;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 750px;
		}
		#arrow-left {
			width: 32px;
		}
		.arrow-left {
			position: absolute;
			margin: 5px;
			top: 0;
		}
	</style>
</head>
<body style="background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/boten/boot3.jpg');  background-size: 100% 100%; background-repeat: no-repeat;">
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui image header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
				<div class="content">
					Cursussen
				</div>
			</h2>
			<?php
			if(isset($response)){
				?>
				<h2 class="ui image header message large">
					<div class="content">
				<?= $response; ?>
					</div>
				</h2>
			<?php } ?>
			<div class="ui stacked segment">
				<table class="ui celled table">
					<thead>
					<tr>
						<th width="80px">ID</th>
						<th>Cursusnaam</th>
						<th>Startdatum</th>
						<th>Einddatum</th>
						<th>Niveau</th>
						<th>Inplannen</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if($data == NULL){
						?>
						<div class="alert alert-info" role="alert">Geen gegevens gevonden!</div>
						<?php
						}else{
						foreach($data as $row){
							?>
							<tr>
								<td><?= $row -> cursus_id; ?></td>
								<td><?= $row -> cursusnaam; ?></td>
								<td><?= $row -> startdatum; ?></td>
								<td><?= $row -> einddatum; ?></td>
								<td><?= $row -> niveau; ?></td>
								<td>
									<a href="<?= site_url('admin/inplannen/cursus/' . $row -> cursus_id); ?>"><button class="ui button">Inplannen</button></a>
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
	
<?php include 'layout/footer.php'; ?>
</body>
</html>