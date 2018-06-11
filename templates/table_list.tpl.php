<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Turnyrinė lentelė</li>
</ul>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
                <th>Komanda</th>
		<th>P</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>+/-</th>
                <th>S</th>
                <th>Pts</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_SUVESTINE']}</td>"
                                        . "<td>{$val['komanda']}</td>"
					. "<td>{$val['zaista']}</td>"
                                        . "<td>{$val['laimejo']}</td>"
                                        . "<td>{$val['lygiasios']}</td>"
                                        . "<td>{$val['pralaimejo']}</td>"
                                        . "<td>{$val['imusta']}/{$val['praleista']}</td>"
                                        . "<td>{$val['skirtumas']}</td>"
                                        . "<td>{$val['taskai']}</td>"
                                        . "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>
