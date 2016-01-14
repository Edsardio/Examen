<?= form_open('admin/reserveringen/update', 'role="form"'); ?>
	<div class="form-group">
		<label for="klant_id">Klant_id</label>
		<input type="text" class="form-control" id="klant_id" name="klant_id" value="<?= $id ?>">
	</div>
	<div class="form-group">
		<label for="cursus_id">Cursus_id</label>
		<input type="text" class="form-control" id="cursus_id" name="cursus_id" value="<?= $cursus_id ?>">
	</div>
	<input type="submit" name="mit" class="btn btn-primary" value="Opslaan">
	<button type="button" onclick="location.href='<?= site_url('admin/reserveringen');?>'" class="btn btn-success">Annuleren</button>
</form>
<?= form_close(); ?>
