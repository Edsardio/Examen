<?= form_open('admin/Cursussen/save', 'role="form"'); ?>
	<div class="form-group">
		<label for="cursusnaam">Naam</label>
		<input type="text" class="form-control" id="cursusnaam" name="cursusnaam">
	</div>
	<div class="form-group">
		<label for="cursusprijs">Prijs</label>
		<input type="text" class="form-control" id="cursusprijs" name="cursusprijs">
	</div>
	<div class="form-group">
		<label for="cursusomschrijving">Omschrijving</label>
		<input type="textarea" class="form-control" id="cursusomschrijving" name="cursusomschrijving">
	</div>
	<div class="form-group">
		<label for="startdatum">Startdatum</label>
		<input type="date" class="form-control" id="startdatum" name="startdatum">
	</div>
	<div class="form-group">
		<label for="einddatum">Einddatum</label>
		<input type="date" class="form-control" id="einddatum" name="einddatum">
	</div>
	<div class="form-group">
		<label for="niveau">Niveau</label>
		<input type="text" class="form-control" id="niveau" name="niveau">
	</div>
	<div class="form-group">
		<label for="type_id">Type_id</label>
		<input type="text" class="form-control" id="type_id" name="type_id">
	</div>
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/Cursussen');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
