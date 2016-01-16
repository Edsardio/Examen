<!-- Following Menu -->
<div class="ui large top fixed menu transition hidden">
  <div class="ui container">
    <?php include 'menu_items.php'; ?>
    <div class="right menu">
    	<?php
if (isset($_SESSION['user_id'])) {
if($_SESSION['user_group'] === '2'){
			?>
			<div class="ui icon top left pointing dropdown button" style="height: 39px; margin-top: 7px; margin-right: 22px;">
				<i class="wrench icon"></i>
				<div class="menu">
					<div class="header">
						Beheerderopties
					</div>
					<a href="<?= $this -> config -> base_url(); ?>admin/Gebruikers">
					<div class="item" style="color: black;">
						Gebruikersbeheer
					</div></a>
					<a href="<?= $this -> config -> base_url(); ?>admin/Cursussen">
					<div class="item" style="color: black;">
						Cursusbeheer
					</div></a>
					<a href="<?= $this -> config -> base_url(); ?>admin/Boten">
					<div class="item" style="color: black;">
						Botenbeheer
					</div></a>
					<a href="<?= $this -> config -> base_url(); ?>admin/Instructeur">
					<div class="item" style="color: black;">
						Instructeurbeheer
					</div></a>
					<a href="<?= $this -> config -> base_url(); ?>admin/Reserveringen">
					<div class="item" style="color: black;">
						Reserveringenbeheer
					</div></a>
					<a href="<?= $this -> config -> base_url(); ?>admin/inplannen">
					<div class="item" style="color: black;">
						Cursus inplannen
					</div></a>
					<?php
					if($_SESSION['admin_group'] === '3'){
						?>
						<a href="<?= $this -> config -> base_url(); ?>admin/editgroups">
						<div class="item" style="color: black;">
							Rollenbeheer
						</div></a>
						<?php
					}
					?>
				</div>
			</div>
			<?php
			}
			if(isset($segments['2']) && $segments['2'] === 'details'){$details = 'active';}else{$details = "";}
			echo '<div class="item">
		        		<a class="ui button" href="details">Gebruikersgegevens</a>
		      		</div>
		      		<div class="item">
		        		<a class="ui button" href="logout">Uitloggen</a>
		      		</div>';
			} else {
			echo '<div class="item">
		        	<a class="ui button" href="login">Inloggen</a>
		      	  </div>
		      	  <div class="item">
		        	<a class="ui primary button" href="register">Registreren</a>
		      	  </div>';
			}
			?>
    	<!-- <?php
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
        ?> -->
    </div>
  </div>
</div>
