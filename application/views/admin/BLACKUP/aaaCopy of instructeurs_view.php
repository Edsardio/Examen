<a href="<?= site_url('admin/Instructeur/add') ?>" class="ui primary button">Voeg nieuwe instructeur toe</a>

<style>
	.close{
		width: 100px;
	    height: 36px;
	}
</style>
<div class="ui small modal" id="create_user">
	<div class="header">Create New User</div>
	<div class="content">
		<?= form_open('admin/Instructeur/save', 'role="form" class="ui form"'); ?>
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
				<select id="instructeur_geslacht" name="instructeur_geslacht" class="form-control">
					<option value="man">Man</option>
					<option value="vrouw">Vrouw</option>
				</select>
			</div>
			<div class="form-group">
				<label for="instructeur_email">E-mail</label>
				<input type="email" class="form-control" id="instructeur_email" name="instructeur_email">
			</div>
			<br>
		</div>
		<div class="actions">
			<input type="submit" name="mit" class="ui primary button" value="Opslaan">
			<input class="ui deny red button close" value="Close">
		</div>		
		</form>
		<?= form_close(); ?>
</div>
<div class="ui small modal" id="edit_user">
	<div class="header">Edit User</div>
	<div class="content">
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
	</div>
	<!--<div class="actions"><div class="ui secondary button"> Close me! </div></div>-->
</div>
<center style="padding: 30px;">
	<button data-modal="create_user" id="call-modal-4" class="ui primary button">Create User</button>
	<i data-modal="create_user" id="call-modal-3" class="circular inverted yellow write icon"></i>
	<i class="circular inverted yellow write icon"></i>
</center>









<!--
	##############################################################################################
	##############################################################################################
	##############################################################################################
	##############################################################################################
	##############################################################################################
	##############################################################################################
	##############################################################################################<br />##############################################################################################
	##############################################################################################
	##############################################################################################
-->



<div class="ui two column middle aligned center aligned grid">
	<div class="row">
		<div class="six wide column" style="margin-left: 3px;">
			<div class="ui segment">
				<h2>
					Instructeurs
				</h2>
			</div>
		</div>
		<div id="create_user" class="five wide right aligned column create_user" style="margin-left:55px;">
			<center>
				<button data-modal="create_user" id="call-modal-4" class="ui large primary button">Create User</button>
			</center>
		</div>
	</div>
	<div class="row">
		<div class="ui stacked segment">
			<table class="ui celled table">
				<thead>
					<tr>
						<th width="80px">ID</th>
						<th>Voornaam</th>
						<th>Tussenvoegsel</th>
						<th>Achternaam</th>
						<th>Geslacht</th>
						<th>Email</th>
						<th width="100px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($data_get == NULL){
					?>
					<div class="alert alert-info" role="alert">Geen gegevens gevonden!</div>
					<?php	
					}else{
						foreach($data_get as $row){
							?>
							<tr>
								<td><?= $row->instructeur_id; ?></td>
								<td><?= $row->instructeur_voornaam; ?></td>
								<td><?= $row->instructeur_tussenvoegsel; ?></td>
								<td><?= $row->instructeur_achternaam; ?></td>
								<td><?= $row->instructeur_geslacht; ?></td>
								<td><?= $row->instructeur_email; ?></td>
								<td>
																	
									<a href="<?= site_url('admin/Instructeur/edit/' . $row->instructeur_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
									<a href="<?= site_url('admin/Instructeur/delete/' . $row->instructeur_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
								</td>
							</tr>
							<?php 
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
$('center .button').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
$('#create_user .button').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
$('center .icon').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
$('center .icon').on('click', function(){
	modal = $(this).attr('data-modal');
	$('#'+modal+'.modal').modal('show');
});
</script>
	