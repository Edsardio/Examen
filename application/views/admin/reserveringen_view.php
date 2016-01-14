<p>
	<a href="<?= site_url('admin/Reserveringen/add') ?>" class="btn btn-primary">Voeg nieuwe reservering toe</a>
</p>
	<table class="ui celled table">
		<caption><h2>Reserveringen</h2></caption>
		<thead>
			<tr>
				<th width="80px">Klant_id</th>
				<th>Voornaam</th>
				<th>Tussenvoegsel</th>
				<th>Omschrijving</th>
				<th>Cursus_id</th>
				<th>Cursusnaam</th>
				<th>Opmerkingen</th>
				<th width="80px">Action</th>
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
						<td><?= $row->klant_id; ?></td>
						<td><?= $row->voornaam; ?></td>
						<td><?= $row->tussenvoegsel; ?></td>
						<td><?= $row->achternaam; ?></td>
						<td><?= $row->cursus_id; ?></td>
						<td><?= $row->cursusnaam; ?></td>
						<td><?= $row->opmerkingen; ?></td>
						<td>
							<a href="<?= site_url('admin/reserveringen/edit/' . $row->klant_id . '/' . $row->cursus_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
							<a href="<?= site_url('admin/reserveringen/delete/' . $row->klant_id . '/' . $row->cursus_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>