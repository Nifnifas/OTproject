<?php

include 'libraries/results.class.php';
$resultObj = new results();

include 'libraries/teams.class.php';
$teamObj = new teams();

include 'libraries/tournament_table.class.php';
$tableObj = new tournament_table();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('fk_kom1_id', 'kom1_iv', 'kom2_iv');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
        'fk_kom1_id' => 4,
        'kom1_iv' => 2,
	'kom2_iv' => 2
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
                'fk_kom1_id' => 'positivenumber',
                'kom1_iv' => 'alfanum',
		'kom2_iv' => 'alfanum');

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują įrašą
		$resultObj->insertResult($dataPrepared);
                
                
                
                //cia turetu buti update turnyrines lenteles
                $tableObj->updateP();
                

		// nukreipiame į markių puslapį
		header("Location: index.php?module={$module}&action=list");
		die();
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$data = $_POST;
	}
}

// įtraukiame šabloną
include 'templates/result_form.tpl.php';

?>