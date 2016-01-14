<p>
	<a href="<?= site_url('admin/Gebruikers/add') ?>" class="btn btn-primary">Voeg nieuwe gebruiker toe</a>
</p>
	<table class="ui celled table">
		<caption><h2>Gebruikers</h2></caption>
		<thead>
			<tr>
				<th width="80px">ID</th>
				<th>Voornaam</th>
				<th>Tussenvoegsel</th>
				<th>Achternaam</th>
				<th>Geboortedatum</th>
				<th>Geslacht</th>
				<th>Adres</th>
				<th>Postcode</th>
				<th>Woonplaats</th>
				<th>Telefoonnummer</th>
				<th>Mobiel</th>
				<th>E-mail</th>
				<th>Niveau</th>
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
						<td><?= $row->geboortedatum; ?></td>
						<td><?= $row->geslacht; ?></td>
						<td><?= $row->adres; ?></td>
						<td><?= $row->postcode; ?></td>
						<td><?= $row->woonplaats; ?></td>
						<td><?= $row->telefoonnummer; ?></td>
						<td><?= $row->mobiel; ?></td>
						<td><?= $row->email; ?></td>
						<td><?= $row->niveau; ?></td>
						<td>
							<a href="<?= site_url('admin/gebruikers/edit/' . $row->klant_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
							<a href="<?= site_url('admin/gebruikers/delete/' . $row->klant_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>