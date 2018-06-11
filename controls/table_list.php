<?php

// sukuriame komandu klasės objektą
include 'libraries/tournament_table.class.php';
$tableObj = new tournament_table();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $tableObj->getTableListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

$tableObj->updateP();
$tableObj->updateW();
$tableObj->updateD();
$tableObj->updateL();
$tableObj->updatePts();
$tableObj->updateImusta();
$tableObj->updatePraleista();
$tableObj->updateSkirtumas();

// išrenkame nurodyto puslapio sutartis
$data = $tableObj->getTableList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/table_list.tpl.php';

?>