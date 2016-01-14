<?= form_open('admin/Curssusen/update', 'role="form"'); ?>
	<div class="form-group">
		<label for="cursusnaam">Naam</label>
		<input type="text" class="form-control" id="cursusnaam" name="cursusnaam" value="<?=$cursusnaam;?>">
	</div>
	<div class="form-group">
		<label for="cursusprijs">Prijs</label>
		<input type="text" class="form-control" id="cursusprijs" name="cursusprijs" value="<?=$cursusprijs;?>">
	</div>
	<div class="form-group">
		<label for="cursusomschrijving">Omschrijving</label>
		<input type="textarea" class="form-control" id="cursusomschrijving" name="cursusomschrijving" value="<?=$cursusomschrijving;?>">
	</div>
	<div class="form-group">
		<label for="startdatum">Startdatum</label>
		<input type="date" class="form-control" id="startdatum" name="startdatum" value="<?=$startdatum;?>">
	</div>
	<div class="form-group">
		<label for="einddatum">Einddatum</label>
		<input type="date" class="form-control" id="einddatum" name="einddatum" value="<?=$einddatum;?>">
	</div>
	<div class="form-group">
		<label for="niveau">Niveau</label>
		<input type="text" class="form-control" id="niveau" name="niveau" value="<?=$niveau;?>">
	</div>
	<div class="form-group">
		<label for="type_id">Type_id</label>
		<input type="text" class="form-control" id="type_id" name="type_id" value="<?=$type_id;?>">
	</div>
	<input type="hidden" name="id" value="<?= $id; ?>" />
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/cursussen');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
