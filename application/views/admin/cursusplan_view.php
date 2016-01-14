<?php
$data = json_decode($cursus);
$instructeurs = json_decode($instructeurs);
$reserveringen = json_decode($inschrijvingen);
?>

Inplannen cursus: <?= $data[0]->cursusnaam; ?><br>
Startdatum: <?= $data[0]->startdatum; ?><br>
Einddatum: <?= $data[0]->einddatum; ?><br>
Plaatsen per boot: <?= $data[0]->plaatsen; ?><br>
Aantal boten: <?= count($data); ?><br>
Totaal aantal plaatsen: <?= $data[0]->plaatsen * count($data); ?><br>

<?php
echo form_open('admin/inplannen/insert/' . $id);
for($x = 0; $x < count($data);  $x++){
	echo 'Boot ' . ($x + 1) . ' : ' . $data[$x]->bootnaam . '<br>';
	echo 'Instructeur:';
	echo '<select name="instructeur' . $x . '">';
	echo '<option value="NULL"> </option>';
	if(count($instructeurs) === 0){
		echo '<option value="NULL">Geen instructeurs</option>';
	}else{
		for($z = 0; $z < count($instructeurs); $z++){
			echo '<option value="' . $instructeurs[$z]->instructeur_id . '">' . $instructeurs[$z]->instructeur_voornaam . ' ' . $instructeurs[$z]->instructeur_tussenvoegsel . ' ' . $instructeurs[$z]->instructeur_achternaam . '</option>';
		}
	}
	echo '</select><br>';
	
	for($y = 0; $y < $data[0]->plaatsen; $y++){
		echo 'Klant: ';
		echo '<select name="klant' . $x . $y . '">';
		echo '<option value="NULL"> </option>';
		if(count($reserveringen) === 0){
			echo '<option value="NULL">Geen reserveringen</option>';
		}else{
			for($w = 0; $w < count($reserveringen); $w++){
				echo '<option value="' . $reserveringen[$w]->klant_id . '">' . $reserveringen[$w]->voornaam . ' ' . $reserveringen[$w]->tussenvoegsel . ' ' . $reserveringen[$w]->achternaam . '</option>';
			}
		}
		
		echo '</select><br>';
	}
}
echo form_submit('sumbit', 'Plan cursus');
echo '<a href="' . site_url('admin/inplannen') . '">Terug</a>';
echo form_close();
