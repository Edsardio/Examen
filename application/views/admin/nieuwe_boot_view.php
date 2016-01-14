<?= form_open('admin/Boten/save', 'role="form"'); ?>
	<div class="form-group">
		<label for="bootnaam">Bootnaam</label>
		<input type="text" class="form-control" id="bootnaam" name="bootnaam">
	</div>
	<div class="form-group">
		<label for="bouwjaar">Bouwjaar</label>
		<input type="date" class="form-control" id="bouwjaar" name="bouwjaar">
	</div>
	<div class="form-group">
		<label for="boottype">Type_id</label>
		<input type="text" class="form-control" id="boottype" name="boottype">
	</div>
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/boten');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
