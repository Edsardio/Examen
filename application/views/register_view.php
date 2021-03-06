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
	<title>Register - Zeilschool De Waai</title>
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
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/form.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/transition.js"></script>
	<script src="<?= $this -> config -> base_url(); ?>application/views/assets/style/checkbox.css"></script>
	<style type="text/css">
		body {
			background-attachment:fixed;
			background-image:url('<?= $this -> config -> base_url(); ?>application/views/assets/img/steiger.jpg');  
			background-size: 100% 100%; 
			background-repeat: no-repeat;
		}
		body > .grid {
			height: 100%;
		}
		.field > label{
			float:left;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 750px;
		}
		.asterisk{
			color: red;
		}
		#arrow-left {
			width: 32px;
		}
		.arrow-left {
			position: absolute;
			margin: 5px;
			top: 0;
		}
		.fielderror > p{    
			padding: .5833em .833em;
		    color: #db2828!important;
		    border-color: #db2828!important;
	        border: 1px solid rgba(34,36,38,.15);
      	  	display: inline-block;
      	  	border-radius: .28571429rem;
   		 	line-height: 1;
		}
	</style>
	
</head>
<body>
	<?php $geboortedatum = array('name' => 'geboortedatum', 'id' => 'geboortedatum', 'placeholder' => 'Geboortedatum', 'type' => 'date');
	$email = array('name' => 'email', 'id' => 'email', 'placeholder' => 'E-mail', 'type' => 'email');
	$options = array('Beginner' => 'Beginner 0/0.5 jaar zeil ervaring', 'Gevorderde' => 'Gevorderde meer dan 0,5 jaar zeil ervaring');
	$genderoptions = array('Man' => 'Man', 'Vrouw' => 'Vrouw');
	$attributes = array('method' => 'POST', 'name' => 'register', 'class' => 'ui large form', 'id' => 'register', 'onsubmit' => 'return validate();');
	?>
	<div class="arrow-left">
		<a href="<?= $this->config->base_url(); ?>"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/circle-left.png" id="arrow-left"></a>
	</div>
	<div style="height:50px;">
	</div>
	<div class="ui centered grid">
		<div class="column aligned centered">
			<h2 class="ui image aligned centered header message large"><img src="<?= $this -> config -> base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
			<div class="content">
				Registreer uw account
			</div></h2>
			
			
				<?php
				if (validation_errors()) {
					echo '<h2 class="ui image aligned centered error header message large" style="width: 550px">
							<div class="content">';
					echo validation_errors();
					echo '</div></h2>';
				}
				?>
			<div class="ui stacked segment">
				<?= form_open('Register/check_captcha', $attributes);
				if(isset($response)){
    				echo '<div class="ui content header message large">' . $response . '</div>';
    			}
    			?>
				<div class="three fields">
					<div class="field">
						<label>Voornaam</label>						
						<div class="ui left icon labeled input">
							<i class="user icon"></i>
							<?= form_input('voornaam', '', 'placeholder="Voornaam" id="voornaam"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Tussenvoegsel</label>
						<div class="ui left icon input">
							<i class="user icon"></i>
							<?= form_input('tussenvoegsel', '', 'placeholder="Tussenvoegsel" id="tussenvoegsel"'); ?>
						</div>
					</div>
					<div class="field">
						<label>Achternaam</label>
						<div class="ui left icon labeled input">
							<i class="user icon"></i>
							<?= form_input('achternaam', '', 'placeholder="Achternaam" id="achternaam"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="three fields">
					<div class="field">
						<div id="VoornaamError" class="fielderror"></div>
					</div>
					<div class="field">
						<div id="TussenvoegselError" class="fielderror"></div>
					</div>
					<div class="field">
						<div id="AchternaamError" class="fielderror"></div>
					</div>
				</div>
				<div class="field">
					<label>E-mail</label>
					<div class="ui left icon labeled input">
						<i class="mail icon"></i>
						<?= form_input($email, '', "id='email'"); ?>
						<div class="ui corner label">
							<i class="asterisk icon"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<div id="EmailError" class="fielderror"></div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>Wachtwoord</label>
						<div class="ui left icon labeled input">
							<i class="lock icon"></i>
							<?= form_password('password', '', 'id="wachtwoord" placeholder="Wachtwoord"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Herhaal wachtwoord</label>
						<div class="ui left icon labeled input">
							<i class="lock icon"></i>
							<?= form_password('repeatpassword', '', 'id="wachtwoord2" placeholder="Herhaal wachtwoord"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="field">
					<div id="WachtwoordError" class="fielderror"></div>
				</div>
				<div class="field">
					<label>Adres</label>
					<div class="ui left icon labeled input">
						<i class="home icon"></i>
						<?= form_input('adres', '', 'id="adres" placeholder="Adres"'); ?>
						<div class="ui corner label">
							<i class="asterisk icon"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<div id="AdresError" class="fielderror"></div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>Postcode</label>
						<div class="ui left icon labeled input">
							<i class="home icon"></i>
							<?= form_input('postcode', '', 'id="postcode" placeholder="Postcode"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Woonplaats</label>
						<div class="ui left icon labeled input">
							<i class="home icon"></i>
							<?= form_input('woonplaats', '', 'id="woonplaats" placeholder="Woonplaats"'); ?>
							<div class="ui corner label">
								<i class="asterisk icon"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<div id="PostcodeError" class="fielderror"></div>
					</div>
					<div class="field">
						<div id="WoonplaatsError" class="fielderror"></div>
					</div>
				</div>
				<div class="field">
					<label>Telefoonnummer</label>
					<div class="ui left icon labeled input">
						<i class="phone icon"></i>
						<?= form_input('telefoonnummer', '', 'id="telefoon" placeholder="Telefoonnummer"'); ?>
						<div class="ui corner label">
							<i class="asterisk icon"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<div id="TelefoonError" class="fielderror"></div>
				</div>
				<div class="field">
					<label>Mobiel</label>
					<div class="ui left icon labeled input">
						<i class="phone icon"></i>
						<?= form_input('mobiel', '', 'id="mobiel" placeholder="Mobiel" '); ?>
					</div>
				</div>
				<div class="field">
					<div id="MobielError" class="fielderror"></div>
				</div>
				<div class="field">
					<label>Geboortedatum</label>
					<div class="ui left icon labeled input">
						<i class="calendar icon"></i>
						<?= form_input($geboortedatum, '', 'id="birth"'); ?>
						<div class="ui corner label">
							<i class="asterisk icon"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<div id="BirthError" class="fielderror"></div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>Geslacht</label>
						<div class="ui left icon labeled dropdown">
							<?= form_dropdown('gender', $genderoptions); ?>
						</div>
					</div>
					<div class="field">
						<label>Niveau</label>
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
	<script>
	function validate(){
		var numbers = /^[0-9]+$/;
		var postcoderegex = new RegExp("/^[0-9]{4,6}[A-Za-z]{2}$/");
		
		if($('#voornaam').val() !== '' && $('#achternaam').val() !== '' 
		&& $('#email').val() !== '' && $('#wachtwoord').val() !== '' && $('#wachtwoord2').val() !== ''
		&& $('#adres').val() !== '' && $('#postcode').val() !== '' && $('#woonplaats').val() !== ''
		&& $('#telefoon').val() !== '' && $('#birth').val() !== ''){
			return true;
		}else{
			// Voornaam
			if($('#voornaam').val() == '')
		    	$('#VoornaamError').html('<p>Voornaam is verplicht!</p>');
		    else if (!numbers.test("#voornaam"))
			    $('#VoornaamError').html('<p>Een voornaam kan geen cijfers bevatten!</p>');
		      	
		    // Achternaam
		    if($('#achternaam').val() == '')
		    	$('#AchternaamError').html('<p>Achternaam is verplicht!</p>');
		    else if (!numbers.test("#achternaam"))
			    $('#AchternaamError').html('<p>Een achternaam kan alleen nummers bevatten!</p>');
		    
		    // Email
		    if($('#email').val() == '')
		    	$('#EmailError').html('<p>Email is verplicht!</p>');
		    else if (!postcoderegex.test("#postcode"))
			    $('#EmailError').html('<p>Niet juist ingevuld!</p>');
		    
		    
		    // Wachtwoord
		    if($('#wachtwoord').val() == '' || $('#wachtwoord2').val() == '')
		    	$('#WachtwoordError').html('<p>Wacht woord is niet ingevuld!</p>');
		    
		    if($('#wachtwoord').val() !== $('#wachtwoord2').val())
		    	$('#WachtwoordError').html('<p>De wachtwoorden komen niet met elkaar overeen!</p>');
		    
		    // Adres
		    if($('#adres').val() == '')
		    	$('#AdresError').html('<p>Niet juist ingevuld!</p>');
		    
		    
		    // Postcode
		    if($('#postcode').val() == '')
		    	$('#PostcodeError').html('<p>Niet juist ingevuld!</p>');
		    else if (!postcoderegex.test("#postcode"))
			    $('#PostcodeError').html('<p>Is geen postcode!</p>');
			
		    // Woonplaats
		    if($('#woonplaats').val() == '')
		    	$('#WoonplaatsError').html('<p>Niet juist ingevuld!</p>');
		    
		    // Telefoonnummer
		    if($('#telefoon').val() == '')
		    	$('#TelefoonError').html('<p>Niet juist ingevuld!</p>');
		    else if (!numbers.test("#telefoon"))
			    $('#TelefoonError').html('<p>Een telefoonnummer kan alleen nummers bevatten!</p>');
		    
		    // Mobiel
		    if($('#mobiel').val() == '')
		    	$('#MobielError').html('<p>Niet juist ingevuld!</p>');
		    else if (!numbers.test("#mobiel"))
			    $('#MobielError').html('<p>Een mobiel nummer kan alleen nummers bevatten!</p>');
		    
		    // Geboortedatum
		    if($('#birth').val() == '')
		    	$('#BirthError').html('<p>Niet ba ingevuld!</p>');
		    else if (numbers.test("#birth"))
			    $('#BirthError').html('<p>Niet juist ingevuld!</p>');
		    	
			return false;
		}
	}
	</script>
</html>