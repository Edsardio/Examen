<?php 
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$segments = explode('/', rtrim($path, '/'));
?>
<a class="item <?php if(isset($segments['2']) && $segments['2'] === 'home' || !isset($segments['2'])){echo 'active';}?>" href="<?php $this->config->base_url(); ?>home">Home</a>
<a class="item <?php if(isset($segments['2']) && $segments['2'] === 'cursussen'){echo 'active';}?>" href="<?php $this->config->base_url(); ?>cursussen">Cursussen</a>
<?php if (isset($_SESSION['user_id'])) {?><a class="item <?php if(isset($segments['2']) && $segments['2'] === 'inschrijven'){echo 'active';}?>" href="<?php $this->config->base_url(); ?>inschrijven">Inschrijven</a><?php } ?>
<a class="item <?php if(isset($segments['2']) && $segments['2'] === 'contact'){echo 'active';}?>" href="<?php $this->config->base_url(); ?>contact">Contact</a>


