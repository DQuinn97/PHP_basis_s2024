<?php
$count = $_GET["count"] ? $_GET["count"] : 5;
$start = $_GET["start"] ? $_GET["start"] : 0;

for ($i = $start; $i <= $start + $count; $i++) {
    $isNotPrime = 0;
    if ($i > 2) {
        for ($j = $i - 1; $j > 1; $j--) {
            if ($i % $j == 0) {
                $isNotPrime++;
            }
        }
    }
    echo $isNotPrime == 0 ? "$i<br/>" : "";
}
