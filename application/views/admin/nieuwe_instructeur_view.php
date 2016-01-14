<?= form_open('admin/Instructeur/save', 'role="form"'); ?>
	<div class="form-group">
		<label for="instructeur_voornaam">Voornaam</label>
		<input type="text" class="form-control" id="instructeur_voornaam" name="instructeur_voornaam">
	</div>
	<div class="form-group">
		<label for="instructeur_tussenvoegsel">Tussenvoegsel</label>
		<input type="text" class="form-control" id="instructeur_tussenvoegsel" name="instructeur_tussenvoegsel">
	</div>
	<div class="form-group">
		<label for="instructeur_achternaam">Achternaam</label>
		<input type="text" class="form-control" id="instructeur_achternaam" name="instructeur_achternaam">
	</div>
	<div class="form-group">
		<label for="instructeur_geslacht">Geslacht</label>
		<input type="text" class="form-control" id="instructeur_geslacht" name="instructeur_geslacht">
	</div>
	<div class="form-group">
		<label for="instructeur_email">E-mail</label>
		<input type="email" class="form-control" id="instructeur_email" name="instructeur_email">
	</div>
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/instructeur');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
