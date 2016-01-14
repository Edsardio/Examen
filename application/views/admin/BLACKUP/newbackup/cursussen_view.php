<p>
	<a href="<?= site_url('admin/Cursussen/add') ?>" class="btn btn-primary">Voeg nieuwe cursus toe</a>
</p>
	<table class="ui celled table">
		<caption><h2>Cursussen</h2></caption>
		<thead>
			<tr>
				<th width="80px">ID</th>
				<th>Naam</th>
				<th>Prijs</th>
				<th>Omschrijving</th>
				<th>Startdatum</th>
				<th>Einddatum</th>
				<th>Niveau</th>
				<th>Type_id</th>
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
						<td><?= $row->cursus_id; ?></td>
						<td><?= $row->cursusnaam; ?></td>
						<td><?= $row->cursusprijs; ?></td>
						<td><?= $row->cursusomschrijving; ?></td>
						<td><?= $row->startdatum; ?></td>
						<td><?= $row->einddatum; ?></td>
						<td><?= $row->niveau; ?></td>
						<td><?= $row->type_id; ?></td>
						<td>
							<a href="<?= site_url('admin/Cursussen/edit/' . $row->cursus_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
							<a href="<?= site_url('admin/Cursussen/delete/' . $row->cursus_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>