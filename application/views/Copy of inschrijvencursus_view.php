<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id'])) {
    header('Location: home');
}
$description = array('id' => 'description', 'placeholder' => 'Eventuele opmerkingen', 'name' => 'description'); ?>

<form method="POST" action="<?= site_url('inschrijven/inschrijven/' . $cursus_id); ?>">
<div class="form-group">
    <label for="cursusnaam">Cursus Naam</label>
    <p><?=$cursusnaam;?></p>
</div>
<div class="form-group">
    <label for="cursusprijs">Cursusprijs</label>
    <p><?=$cursusprijs;?></p>
</div>
<div class="form-group">
    <label for="cursusomschrijving">Cursusomschrijving</label>
    <p><?=$cursusomschrijving;?> </p>
</div>
<div class="form-group">
    <label for="startdatum">Startdatum</label>
    <p><?=$startdatum;?> </p>
</div>
<div class="form-group">
    <label for="einddatum">Eind datum</label>
    <p><?=$einddatum;?></p>
</div>

<?= form_textarea($description); ?> <br>

<input type="submit" value="Inschrijven"><a class="ui button" href="<?= site_url('inschrijven/inschrijven/' . $cursus_id); ?>"></a></input>
</form>