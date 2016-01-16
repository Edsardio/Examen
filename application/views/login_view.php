<?php

if (isset($_SESSION['user_id'])) {
	header('Location: home');
}

?>
<html hola_ext_inject="disabled"><head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login Example - Semantic</title>
  <?php include 'layout/scripts.php' ?>

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
      max-width: 450px;
    }
    #arrow-left {
    	width: 32px;
    }
    .arrow-left {
    	position:absolute;
    	margin: 5px;
    	top: 0;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body style="background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/steiger.jpg');  background-size: 100% 100%; background-repeat: no-repeat;">
<?php $attributes = array(
  'method' => 'POST',
  'class'  => 'ui large form',
  'id'     => 'login'
  ); ?>
<div class="arrow-left"><a href="<?= $this->config->base_url();?>"><img src="<?= $this->config->base_url(); ?>application/views/assets/img/circle-left.png" id="arrow-left"></a></div>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header message large">
      <img src="<?= $this->config->base_url(); ?>application/views/assets/img/de_waai_logo.jpg" class="image">
      <div class="content">
        Inloggen op uw account
      </div>
    </h2>
    <?= form_open ($this->config->base_url() . 'login/login', $attributes); 
    	if(isset($response)){
    		echo '<div class="ui content header message large">' . $response . '</div>';
    	}
    	?>
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
           <?= form_input('email', '', 'placeholder="Voer uw e-mail adres in." id="input"'); ?>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <?= form_password('password', '', 'placeholder="Voer uw wachtwoord in." class="password" id="input2"'); ?>
          </div>
        </div>
        <?= form_submit('submit', 'Inloggen', 'class="ui fluid large blue submit button" id="inloggen"', 'style="color:#fff;'); ?>
      </div>
      <div class="ui error message"></div>
    <?= form_close(); ?>
    <div class="ui message">
      Heeft u nog geen account? <a href="<?= $this->config->base_url();?>register">Registreer hier</a>
    </div>
  </div>
</div>
<script>
	$.fn.enterKey = function (fnc) {
	    return this.each(function () {
	        $(this).keypress(function (ev) {
	            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
	            if (keycode == '13') {
	                fnc.call(this, ev);
	            }
	        })
	    })
	}
	
	$("#input").enterKey(function () {
    	$("#inloggen").click();
	})
	$("#input2").enterKey(function () {
    	$("#inloggen").click();
	})
</script>
</body>
</html>