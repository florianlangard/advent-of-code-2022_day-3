<?php

$priorityList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

$raw = file_get_contents('data.txt');
$data = explode("\n", $raw);

foreach ($data as $rucksack) {
    $orderedRucksack[] = str_split($rucksack, (strlen($rucksack)/2));
}

foreach ($orderedRucksack as $compartment) {
    $singleValues0 = str_split($compartment[0]);
    $singleValues1 = str_split($compartment[1]);
    $duplicatedItems[] = array_intersect($singleValues0, $singleValues1);
}

$result = 0;
foreach ($duplicatedItems as $foundItem) {
    $firstKey = array_key_first($foundItem);
    $singlePriority = $foundItem[$firstKey];
    $result += (strpos($priorityList, $singlePriority) + 1);
}
var_dump($result);