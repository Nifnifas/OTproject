<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Rungtynės</a></li>
	<li><?php echo "Naujos varžybos"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
		<div class="errorBox">
			Neįvesti arba neteisingai įvesti šie laukai:
			<?php 
				echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Rungtynių informacija</legend>
			<p>
                            <label class="field" for="fk_kom1_id">K1<?php echo in_array('fk_kom1_id', $required) ? '<span></span>' : ''; ?></label>
				<select id="fk_kom1_id" name="fk_kom1_id">
					<option value="">---------------</option>
					<?php
						$teams = $teamObj->getList();
						foreach($teams as $key => $val) {
							$selected = "";
							if(isset($data['fk_kom1_id']) && $data['fk_kom1_id'] == $val['kom_id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['kom_id']}'>{$val['pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
      			<p>
				<label class="field" for="kom1_iv"><?php echo in_array('kom1_iv', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="kom1_iv" name="kom1_iv" class="textbox textbox-30" value="<?php echo isset($data['kom1_iv']) ? $data['kom1_iv'] : ''; ?>">
			</p>
                        <p>
				<label class="field" for="fk_kom2_id">K2<?php echo in_array('fk_kom2_id', $required) ? '<span></span>' : ''; ?></label>
				<select id="fk_kom2_id" name="fk_kom2_id">
					<option value="">---------------</option>
					<?php
						$teams = $teamObj->getList();
						foreach($teams as $key => $val) {
							$selected = "";
							if(isset($data['fk_kom2_id']) && $data['fk_kom2_id'] == $val['kom_id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['kom_id']}'>{$val['pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
                        <p>
				<label class="field" for="kom2_iv"><?php echo in_array('kom2_iv', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="kom2_iv" name="kom2_iv" class="textbox textbox-30" value="<?php echo isset($data['kom2_iv']) ? $data['kom2_iv'] : ''; ?>">
			</p>
		</fieldset>
            
            
            
                <fieldset>
			<legend>Zaidejo informacija</legend>
			<p>
				<label class="field"  for="fk_ZAIDEJASzaid_id">Zaidejas<?php echo in_array('fk_ZAIDEJASzaid_id', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="fk_ZAIDEJASzaid_id" name="fk_ZAIDEJASzaid_id">
					<option value="">---------------</option>
					<?php
						// išrenkame zaidejus
						$players = $playerObj->getList();
						foreach($players as $key => $val) {
							$selected = "";
							if(isset($data['fk_ZAIDEJASzaid_id']) && $data['fk_ZAIDEJASzaid_id'] == $val['zaid_id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['zaid_id']}'>{$val['vardas']} {$val['pavarde']}</option>";
						}
					?>
				</select>
			</p>
                        <p>
                            <label class="field" style=" alignment-adjust: after-edge" for="ivarciai"><?php echo in_array('ivarciai', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="ivarciai" name="ivarciai" class="textbox textbox-30" value="<?php echo isset($data['ivarciai']) ? $data['ivarciai'] : ''; ?>">
			</p>
                        <p>
				<label class="field" for="perdavimai"><?php echo in_array('perdavimai', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="perdavimai" name="perdavimai" class="textbox textbox-30" value="<?php echo isset($data['perdavimai']) ? $data['perdavimai'] : ''; ?>">
			</p>
                        <p>
				<label class="field" for="g_korteles"><?php echo in_array('g_korteles', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="g_korteles" name="g_korteles" class="textbox textbox-30" value="<?php echo isset($data['g_korteles']) ? $data['g_korteles'] : ''; ?>">
			</p>
                        <p>
				<label class="field" for="r_korteles"><?php echo in_array('r_korteles', $required) ? '<span></span>' : ''; ?></label>
				<input type="text" id="r_korteles" name="r_korteles" class="textbox textbox-30" value="<?php echo isset($data['r_korteles']) ? $data['r_korteles'] : ''; ?>">
			</p>
                </fieldset>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>