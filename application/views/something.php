<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($_SESSION['user_id'])) {
	header('Location: home');
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>

	<!-- Site Properties -->
	<title>Register Example - Semantic</title>
	<?php include 'layout/scripts.php' ?> 
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/reset.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/site.css">

	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/container.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/grid.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/header.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/image.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/menu.css">

	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/divider.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/segment.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/form.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/input.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/button.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/list.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/message.css">
	<link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/icon.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/form.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/transition.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/style/checkbox.css"></script>

	<style type="text/css">
		body {
			background-color: #DADADA;
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
		.field > h4{
			float:left;
		}
		.arrow-left {
			position: absolute;
			margin: 5px;
			top: 0;
		}
	</style>
	<script>
		$('.ui.form').form({
			name : {
				indentifier : 'text',
				rules : [{
					type : 'empty',
					prompt : 'Please enter your name'
				}]
			}
		});
	</script>
</head>
<body>
<body style="background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/steiger.jpg');  background-size: 100% 100%; background-repeat: no-repeat;">
	<?php $geboortedatum = array('name' => 'geboortedatum', 'id' => 'geboortedatum', 'placeholder' => 'Geboortedatum', 'type' => 'date');
	$email = array('name' => 'email', 'id' => 'email', 'placeholder' => 'E-mail', 'type' => 'email');
	$options = array('Beginner' => 'Beginner 0/0.5 jaar zeil ervaring', 'Gevorderde' => 'Gevorderde meer dan 0,5 jaar zeil ervaring');
	$genderoptions = array('Man' => 'Man', 'Vrouw' => 'Vrouw');
	$attributes = array('method' => 'POST', 'class' => 'ui large form', 'id' => 'register');
	?>
	<div class="arrow-left">
		<a href="<?= $this->config->base_url(); ?>"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/circle-left.png" id="arrow-left"></a>
	</div>
	<div class="ui middle aligned center aligned grid" >
		<div class="column" style="top:200px;">
			<h2 class="ui image header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
			<div class="content">
				Registreer uw account
			</div></h2>
			<div class="ui stacked segment">
				<?= form_open('Register/check_captcha', $attributes);
				if(isset($response)){
    				echo '<div class="ui content header message large">' . $response . '</div>';
    			}
    			?>
				<div class="three fields">
					<div class="field">
						<h4>Voornaam</h4>						
						<div class="ui left icon labeled input">
							<i class="user icon"></i>
							<?= form_input('voornaam', '', 'placeholder="Voornaam"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<h4>Tussenvoegsel</h4>
						<div class="ui left icon input">
							<i class="user icon"></i>
							<?= form_input('tussenvoegsel', '', 'placeholder="Tussenvoegsel"'); ?>
						</div>
					</div>
					<div class="field">
						<h4>Achternaam</h4>
						<div class="ui left icon labeled input">
							<i class="user icon"></i>
							<?= form_input('achternaam', '', 'placeholder="Achternaam"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="field">
					<h4>E-mail</h4>
					<div class="ui left icon labeled input">
						<i class="mail icon"></i>
						<?= form_input($email); ?>
						<div class="ui corner label">
							<i class="asterisk icon" style="color: red;"></i>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<h4>Wachtwoord</h4>
						<div class="ui left icon labeled input">
							<i class="lock icon"></i>
							<?= form_password('password', '', 'placeholder="Wachtwoord"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<h4>Herhaal wachtwoord</h4>
						<div class="ui left icon labeled input">
							<i class="lock icon"></i>
							<?= form_password('repeatpassword', '', 'placeholder="Herhaal wachtwoord"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="field">
					<h4>Adres</h4>
					<div class="ui left icon labeled input">
						<i class="home icon"></i>
						<?= form_input('adres', '', 'placeholder="Adres"'); ?>
						<div class="ui corner label">
							<i class="asterisk icon" style="color: red;"></i>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<h4>Postcode</h4>
						<div class="ui left icon labeled input">
							<i class="home icon"></i>
							<?= form_input('postcode', '', 'placeholder="Postcode"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<h4>Woonplaats</h4>
						<div class="ui left icon labeled input">
							<i class="home icon"></i>
							<?= form_input('woonplaats', '', 'placeholder="Woonplaats"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon" style="color: red;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="field">
					<h4>Telefoonnummer</h4>
					<div class="ui left icon labeled input">
						<i class="phone icon"></i>
						<?= form_input('telefoonnummer', '', 'placeholder="Telefoonnummer"'); ?>
						<div class="ui corner label">
							<i class="asterisk icon" style="color: red;"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<h4>Mobiel</h4>
					<div class="ui left icon labeled input">
						<i class="phone icon"></i>
						<?= form_input('mobiel', '', 'placeholder="Mobiel" '); ?>
					</div>
				</div>
				<div class="field">
					<h4 class="float:left;">Geboortedatum</h4>
					<div class="ui left icon labeled input">
						<i class="calendar icon"></i>
						<?= form_input($geboortedatum); ?>
						<div class="ui corner label">
							<i class="asterisk icon" style="color: red;"></i>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<h4>Geslacht</h4>
						<div class="ui left icon labeled dropdown">
							<?= form_dropdown('gender', $genderoptions); ?>
						</div>
					</div>
					<div class="field">
						<h4>Niveau</h4>
						<div class="ui left icon labeled dropdown">
							<?= form_dropdown('niveau', $options, 'Beginner'); ?>
						</div>
					</div>
				</div>
				<div style="float: left; padding-right: 20px;">
					<input type="checkbox" id="accept_terms_checkbox" name="accept_terms_checkbox" value="Accept TOS" />
					<label for="accept_terms_checkbox">Ik ga akkoord met de <a href="<?= $this -> config -> base_url(); ?>terms">algemene voorwaarden</a></label>
				</div>
				<div style="float: left;" name="captcha" align="right" class="g-recaptcha" data-sitekey="6LfS0BQTAAAAAIEcjGwSZlFQdnpAspgUkRxb-icE"></div>
				<br>
				<?= form_submit('submit', 'Maak account', 'class="ui fluid large teal submit button"'); ?>
			</div>
			<?= form_close(); ?>
			<div class="ui message">
				Heeft u al een account? <a href="login">Log hier in</a>
			</div>
		</div>
	</div>
	<?php
	if (validation_errors()) {
		echo '<div class="ui negative message" style="float: left;">';
		echo validation_errors();
		echo '</div>';
	}
	?>
</html>