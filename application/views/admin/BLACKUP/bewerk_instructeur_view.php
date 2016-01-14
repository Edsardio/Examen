

<div class="ui"style="width:500px;">

<?= form_open('admin/Instructeur/update', 'role="form" class="ui form"'); ?>
	<div class="form-group">
		<label for="instructeur_voornaam">Voornaam</label>
		<input type="text" class="form-control" id="instructeur_voornaam" name="instructeur_voornaam" value="<?=$voornaam;?>">
	</div>
	<div class="form-group">
		<label for="instructeur_tussenvoegsel">Tussenvoegsel</label>
		<input type="text" class="form-control" id="instructeur_tussenvoegsel" name="instructeur_tussenvoegsel" value="<?=$tussenvoegsel;?>">
	</div>
	<div class="form-group">
		<label for="instructeur_achternaam">Achternaam</label>
		<input type="text" class="form-control" id="instructeur_achternaam" name="instructeur_achternaam" value="<?=$achternaam;?>">
	</div>
	<div class="form-group">
		<label for="instructeur_geslacht">Geslacht</label>
		<select id="instructeur_geslacht" name="instructeur_geslacht" class="form-control">
			<option value="<?=$geslacht;?>"><?=$geslacht;?></option>
			<option value="man">Man</option>
			<option value="vrouw">Vrouw</option>
		</select>
	</div>
	<div class="form-group">
		<label for="instructeur_email">E-mail</label>
		<input type="email" class="form-control" id="instructeur_email" name="instructeur_email" value="<?=$email;?>">
	</div>
	<input type="hidden" name="id" value="<?= $id; ?>" />
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/instructeur');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>

</div>