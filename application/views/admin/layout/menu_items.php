<?php 
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$segments = explode('/', rtrim($path, '/'));
?>

<a class="item <?php if($segments['2'] === 'home'){echo 'active';}?>" href="<?= site_url('home'); ?>">Home</a>
<a class="item <?php if($segments['2'] === 'cursussen'){echo 'active';}?>" href="<?= site_url('cursussen'); ?>">Cursussen</a>
<a class="item <?php if($segments['2'] === 'inschrijven'){echo 'active';}?>" href="<?= site_url('inschrijven'); ?>">Inschrijven</a>
<a class="item <?php if($segments['2'] === 'mijncursussen'){echo 'active';}?>" href="<?= site_url('mijncursussen'); ?>">Mijn Cursussen</a>
<a class="item <?php if($segments['2'] === 'contact'){echo 'active';}?>" href="<?= site_url('contact'); ?>">Contact</a>


