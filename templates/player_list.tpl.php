<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Žaidėjai</li>
</ul>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Pozicija</th>
                <th>Zaidejas</th>
                <th>Salis</th>
                <th>Komanda</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['zaid_id']}</td>"
                                        . "<td>{$val['poz']}</td>"
                                        . "<td>{$val['vardas']} {$val['pavarde']}</td>"
                                        . "<td>{$val['tautybe']}</td>"
                                        . "<td>{$val['pavadinimas']}</td>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>
