<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Rezultatai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas rezultatas</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
                <th>Data</th>
		<th>K1</th>
                <th>Rezultatas</th>
                <th>K2</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['rung_id']}</td>"
                                        . "<td>{$val['data']}</td>"
					. "<td>{$val['pavadinimas1']}</td>"
                                        . "<td>{$val['kom1_iv']} : {$val['kom2_iv']}</td>"
                                        . "<td>{$val['pavadinimas2']}</td>"
                                        . "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>
