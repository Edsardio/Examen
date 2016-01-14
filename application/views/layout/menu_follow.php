<!-- Following Menu -->
<div class="ui large top fixed menu transition hidden">
  <div class="ui container">
    <?php include 'menu_items.php'; ?>
    <div class="right menu">
    	<?php
    	if(isset($_SESSION['user_id'])){
       		echo '<div class="item">
		        		<a class="ui button" href="details">Gebruikersgegevens</a>
		      		</div>
		      		<div class="item">
		        		<a class="ui button" href="logout">Uitloggen</a>
		      		</div>';
       	}else{
       		echo '<div class="item">
		        	<a class="ui button" href="login">Inloggen</a>
		      	  </div>
		      	  <div class="item">
		        	<a class="ui primary button" href="register">Registreren</a>
		      	  </div>';
       	}
        ?>
    </div>
  </div>
</div>
