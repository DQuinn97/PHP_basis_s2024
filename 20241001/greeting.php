<?php

$name = $_GET["naam"] ? $_GET["naam"] : "";
$gender = $_GET["g"] ? $_GET["g"] : "";


echo "Beste " . ($gender == 'f' ? 'Mvr. ' : ($gender == 'm' ? 'Mr. ' : '')) . ucwords(strtolower($name));
