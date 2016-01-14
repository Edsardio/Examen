<p>
	<a href="<?= site_url('admin/Boten/add') ?>" class="btn btn-primary">Voeg nieuwe boot toe</a>
</p>
	<table class="ui celled table">
		<caption><h2>Boten</h2></caption>
		<thead>
			<tr>
				<th width="80px">ID</th>
				<th>Bootnaam</th>
				<th>Bouwjaar</th>
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
						<td><?= $row->boot_id; ?></td>
						<td><?= $row->bootnaam; ?></td>
						<td><?= $row->bouwjaar; ?></td>
						<td><?= $row->type_id; ?></td>
						<td>
							<a href="<?= site_url('admin/boten/edit/' . $row->boot_id); ?>" class="btn btn-warning btn-xs"><i class="circular inverted yellow write icon"></i></a>
							<a href="<?= site_url('admin/boten/delete/' . $row->boot_id); ?>" class="btn btn-danger btn-xs"><i class="circular inverted red trash outline user icon"></i></a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>