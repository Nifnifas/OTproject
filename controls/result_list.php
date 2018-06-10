<?php

// sukuriame komandu klasės objektą
include 'libraries/results.class.php';
$resultObj = new results();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $resultObj->getResultListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $resultObj->getResultList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/result_list.tpl.php';

?>