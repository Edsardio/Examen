<div class="ui container">
	<div class="ui large secondary inverted pointing menu" style="border:none;">
		<a class="toc item"> <div class="menu-icon"></div> </a>
		<?php
		include 'menu_items.php';
		?>
		<div class="right item">
			<?php
if (isset($_SESSION['user_id'])) {
if($_SESSION['user_group'] === '2'){
			?>
			<div class="ui icon top left pointing dropdown button">
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
				</div>
			</div>
			<?php
			}
			if($segments['2'] === 'details'){$details = 'active';}else{$details = "";}
			echo '<a class="ui inverted button ' . $details . '" href="../details">Gebruikergegevens</a>
			<a class="ui inverted button" href="../logout">Uitloggen</a>';
			} else {
			echo '<a class="ui inverted button" href="login">Inloggen</a>
			<a class="ui inverted button" href="register">Registreren</a>';
			}
			?>
		</div>
	</div>
</div>

<script>$('.ui.dropdown').dropdown();</script>