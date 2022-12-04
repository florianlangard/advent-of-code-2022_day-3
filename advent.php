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


// ================ Part Two =======================

$group = array_chunk($data, 3);

foreach ($group as $elf) {
    $firstElf = str_split($elf[0]);
    $secondElf = str_split($elf[1]);
    $thirdElf = str_split($elf[2]);
    $commonItem[] = array_intersect($firstElf, $secondElf, $thirdElf);
}
$resultV2 = 0;
foreach ($commonItem as $foundItem) {
    $firstKey = array_key_first($foundItem);
    $singlePriority = $foundItem[$firstKey];
    $resultV2 += (strpos($priorityList, $singlePriority) + 1);
}
var_dump($resultV2);