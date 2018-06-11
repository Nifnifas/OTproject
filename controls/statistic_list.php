<?php

// sukuriame komandu klasės objektą
include 'libraries/player_statistics.class.php';
$statObj = new player_statistics();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $statObj->getStatListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $statObj->getStatList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/statistic_list.tpl.php';

?>