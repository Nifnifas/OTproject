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
						$teams = $teamObj->getTeamList();
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
				<input type="text" id="kom1_iv" name="kom1_iv" class="textbox textbox-70" value="<?php echo isset($data['kom1_iv']) ? $data['kom1_iv'] : ''; ?>">
			</p>
                        <p>
				<label class="field" for="fk_kom2_id">K2<?php echo in_array('fk_kom2_id', $required) ? '<span></span>' : ''; ?></label>
				<select id="fk_kom2_id" name="fk_kom2_id">
					<option value="">---------------</option>
					<?php
						$teams = $teamObj->getTeamList();
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
				<input type="text" id="kom2_iv" name="kom2_iv" class="textbox textbox-70" value="<?php echo isset($data['kom2_iv']) ? $data['kom2_iv'] : ''; ?>">
			</p>
		</fieldset>
            
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>