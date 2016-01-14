<?= form_open('admin/Gebruikers/update', 'role="form"'); ?>
	<div class="form-group">
		<label for="voornaam">Voornaam</label>
		<input type="text" class="form-control" id="voornaam" name="voornaam" value="<?=$voornaam;?>">
	</div>
	<div class="form-group">
		<label for="tussenvoegsel">Tussenvoegsel</label>
		<input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel" value="<?=$tussenvoegsel;?>">
	</div>
	<div class="form-group">
		<label for="achternaam">Achternaam</label>
		<input type="textarea" class="form-control" id="achternaam" name="achternaam" value="<?=$achternaam;?>">
	</div>
	<div class="form-group">
		<label for="geboortedatum">Geboortedatum</label>
		<input type="date" class="form-control" id="geboortedatum" name="geboortedatum" value="<?=$geboortedatum;?>">
	</div>
	<div class="form-group">
		<label for="geslacht">Geslacht</label>
		<select id="geslacht" name="geslacht" class="form-control">
			<option value="man">Man</option>
			<option value="vrouw">Vrouw</option>
		</select>
	</div>
	<div class="form-group">
		<label for="adres">Adres</label>
		<input type="text" class="form-control" id="adres" name="adres" value="<?=$adres;?>">
	</div>
	<div class="form-group">
		<label for="postcode">Postcode</label>
		<input type="text" class="form-control" id="postcode" name="postcode" value="<?=$postcode;?>">
	</div>
	<div class="form-group">
		<label for="woonplaats">Woonplaats</label>
		<input type="text" class="form-control" id="woonplaats" name="woonplaats" value="<?=$woonplaats;?>">
	</div>
	<div class="form-group">
		<label for="telefoonnummer">Telefoonnummer</label>
		<input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer" value="<?=$telefoonnummer;?>">
	</div>
	<div class="form-group">
		<label for="mobiel">Mobiel</label>
		<input type="text" class="form-control" id="mobiel" name="mobiel" value="<?=$mobiel;?>">
	</div>
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="email" class="form-control" id="email" name="email" value="<?=$email;?>">
	</div>
	<div class="form-group">
		<label for="Niveau">Niveau</label>
		<select id="niveau" name="niveau" class="form-control">
			<option value="Beginner">Beginner</option>
			<option value="Gevorderde">Gevorderde</option>
		</select>
	</div>
	<div class="form-group">
		<label for="password">Wachtwoord</label>
		<input type="password" class="form-control" id="password" name="password">
	</div>
	<input type="hidden" name="id" value="<?= $id; ?>" />
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/gebruikers');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
