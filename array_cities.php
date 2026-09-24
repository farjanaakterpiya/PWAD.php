<?php
$cities = array("rangpur","gazipur","cumilla","kishoregonj","barishal");
echo "<pre>";
array_push($cities, "nuakali","foridpur");
array_pop($cities);
array_unshift($cities,"dinajpur","bogora");

print_r($cities);
?>