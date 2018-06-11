<?php

// sukuriame komandu klasės objektą
include 'libraries/players.class.php';
$playerObj = new players();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $playerObj->getPlayerListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $playerObj->getPlayerList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/player_list.tpl.php';

?>