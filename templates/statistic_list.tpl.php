<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Žaidėjų statistika</li>
</ul>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>Pos</th>
                <th>Player</th>
		<th>Y</th>
                <th>R</th>
                <th>Ast</th>
                <th>Goals</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
                $i = 0;
		foreach($data as $key => $val) {
                    $i++;
			echo
				"<tr>"
					. "<td>{$i}</td>"
                                        . "<td>{$val['name']} {$val['surname']}</td>"
                                        . "<td>{$val['g_korteles']}</td>"
                                        . "<td>{$val['r_korteles']}</td>"
                                        . "<td>{$val['perdavimai']}</td>"
                                        . "<td>{$val['ivarciai']}</td>"
                                        . "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>
