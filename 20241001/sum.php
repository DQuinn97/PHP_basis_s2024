<?php

$count = $_GET["count"] ? $_GET["count"] : 0;
$start = $_GET["start"] ? $_GET["start"] : 0;

$sum = 0;
for ($start; $start <= $start + $count; $start++) {
    $sum += $start;
}

echo "De som is $sum";
