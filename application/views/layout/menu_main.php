<div class="ui container">
	<div class="ui large secondary inverted pointing menu" style="border:none;text-shadow: 1px 1px #000;">
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
					<a href="<?= site_url('admin/Gebruikers'); ?>">
					<div class="item" style="color: black;">
						Gebruikersbeheer
					</div></a>
					<a href="<?= site_url('admin/Cursussen'); ?>">
					<div class="item" style="color: black;">
						Cursusbeheer
					</div></a>
					<a href="<?= site_url('admin/Boten'); ?>">
					<div class="item" style="color: black;">
						Botenbeheer
					</div></a>
					<a href="<?= site_url('admin/Instructeur'); ?>">
					<div class="item" style="color: black;">
						Instructeurbeheer
					</div></a>
					<a href="<?= site_url('admin/Reserveringen'); ?>">
					<div class="item" style="color: black;">
						Reserveringenbeheer
					</div></a>
					<a href="<?= site_url('admin/Inplannen'); ?>n">
					<div class="item" style="color: black;">
						Cursus inplannen
					</div></a>
					<?php
					if($_SESSION['admin_group'] === '3'){
						?>
						<a href="<?= site_url('admin/Editgroups'); ?>">
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
			echo '<a class="ui inverted button ' . $details . '" href="details" style="text-shadow: 1px 1px #000 !important;">Gebruikergegevens</a>
			<a class="ui inverted button" href="logout" style="text-shadow: 1px 1px #000 !important;">Uitloggen</a>';
			} else {
			echo '<a class="ui inverted button" href="login" style="text-shadow: 1px 1px #000 !important;">Inloggen</a>
			<a class="ui inverted button" href="register" style="text-shadow: 1px 1px #000 !important;">Registreren</a>';
			}
			?>
		</div>
	</div>
</div>

<script>
	$('.ui.dropdown').dropdown();
	// show dropdown on hover
	$('.main.menu  .ui.dropdown').dropdown({
		on : 'hover'
	}); 
</script>