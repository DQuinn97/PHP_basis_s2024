<?php
$h = $_GET["height"] ? $_GET["height"] : 10;

for ($i = 1; $i <= $h; $i++) {
    for ($j = 0; $j < $i; $j++) {
        echo $i % 5 == 0 ? "=" : "*";
    }
    echo "<br>";
}
