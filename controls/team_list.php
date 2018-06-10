<?php

// sukuriame komandu klasės objektą
include 'libraries/teams.class.php';
$teamsObj = new teams();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $teamsObj->getTeamListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $teamsObj->getTeamList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/team_list.tpl.php';

?>