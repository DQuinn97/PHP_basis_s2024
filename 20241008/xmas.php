<?php
$h = $_GET["count"] ? $_GET["count"] : 10;

if ($h % 2 == 0) {
    $h -= 1;
}

for ($i = 1; $i <= $h; $i += 2) {
    $f = floor(($h - $i) / 2);
    $empty = str_repeat('_', $f);
    $tree = str_split(str_repeat('*', $i));
    foreach ($tree as &$char) {
        if (rand(0, 100) < 13) {
            $char = 'o';
        }
    }
    $tree = join($tree);
    echo $empty . $tree . $empty . "<br>";
}

for ($j = 0; $j <= $h / 2; $j += 2) {
    $empty = str_repeat('_', floor($h / 2 - $h / 20 + 1));
    $trunk = '|' . str_repeat('&nbsp', floor($h / 10 + 1)) . '|';
    echo $empty . $trunk . $empty . "<br>";
}
