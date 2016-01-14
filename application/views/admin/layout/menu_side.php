<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu left">
  <?php include 'menu_items.php'; 
       	if(isset($_SESSION['user_id'])){
       		echo '<a class="item" href="details">Gebruikergegevens</a>
       				<a class="item" href="logout">Uitloggen</a>';
       	}else{
       		echo '<a class="item" href="login">Inloggen</a>
          			<a class="item" href="register">Registreren</a>';
       	}
        ?>
</div>