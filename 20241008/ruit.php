<?php
$n = $_GET["n"] ?: 5;
if ($n % 2 == 0) $n--;

for ($i = 1; $i <= $n; $i += 2) {
    $f = floor(($n - $i) / 2);
    $empty = str_repeat(' _ ', $f);
    $ruit = str_repeat(' * ', $i);
    if ($i == $n) $ruit = substr_replace($ruit, 'x', floor(3 * $n / 2), 1);

    echo $empty . $ruit . $empty . "<br>";
}
for ($i = $n - 2; $i >= 1; $i -= 2) {
    $f = floor(($n - $i) / 2);
    $empty = str_repeat(' _ ', $f);
    $ruit = str_repeat(' * ', $i);

    echo $empty . $ruit . $empty . "<br>";
}
