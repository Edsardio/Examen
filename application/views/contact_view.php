<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html hola_ext_inject="disabled">
	<head>
		<!-- Standard Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Site Properties -->
		<title>Homepage - Semantic</title>
		<?php include 'layout/scripts.php'?>
		
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
	</head>
	<body>
		<?php
		include 'layout/menu_follow.php';
		?>
		<div class="pusher">
			<div id="headerpicture" class="ui inverted vertical masthead aligned segment" style="width: 100%;">
				<?php
				include 'layout/menu_main.php';
				?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2407.34068749671!2d5.413959515989528!3d52.88828851662205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c89570fae0a9c1%3A0x23cd9123b6762858!2sYmedaem+45%2C+8722+HP+Molkwerum!5e0!3m2!1sen!2snl!4v1452547920447" width="100%" height="600"frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="ui vertical stripe segment">
				<div class="ui middle aligned stackable grid container">
					<div class="row">
						<div class="eight wide column">
							<h3 class="ui header">Contact</h3>
							Zeilschool de Waai<br>
							Ymedaem 45<br>
							8722 GR Warns<br>
							Telefoon: 0514 561290<br>
							Email: info@zs-waai.nl
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'layout/footer.php'; ?>
	</body>
</html>