<?= form_open('admin/Boten/update', 'role="form"'); ?>
	<div class="form-group">
		<label for="bootnaam">Bootnaam</label>
		<input type="text" class="form-control" id="bootnaam" name="bootnaam" value="<?= $bootnaam; ?>">
	</div>
	<div class="form-group">
		<label for="bouwjaar">Bouwjaar</label>
		<input type="date" class="form-control" id="bouwjaar" name="bouwjaar" value="<?= $bouwjaar; ?>">
	</div>
	<div class="form-group">
		<label for="boottype">Type_id</label>
		<input type="text" class="form-control" id="boottype" name="boottype" value="<?= $boottype; ?>">
	</div>
	<input type="hidden" name="id" value="<?= $id; ?>" />
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/boten');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
