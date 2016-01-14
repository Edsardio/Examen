<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

	<style type="text/css">
		body {
			background-color: #DADADA;
			overflow:hidden;
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
	
</body>
</html>