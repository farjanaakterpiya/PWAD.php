<?php
$countries = array(
    "Bangladesh" =>"Dhaka",
    "India" => "Dhilhi",
    "Pakistan" =>"Islamabad",
    "USA" => "New York",
    "Japan"=> "Tokyo",

);
ksort($countries);
foreach($countries as $country=>$capital){
    echo $country . "=>" . $capital . "<br>";
}

?>