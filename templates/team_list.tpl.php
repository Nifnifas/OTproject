<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Komandos</li>
</ul>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Komanda</th>
                <th>Salis</th>
                <th>Stadionas</th>
                <th>Busena</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['kom_id']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
                                        . "<td>{$val['salis']}</td>"
                                        . "<td>{$val['stadionas']}</td>"
                                        . "<td>{$val['busena']}</td>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>
