<h1>Typt Casting</h1>
<?php
$score = (double) 13.50;
echo $score;
echo"<br>";
var_dump($score);
$x = (array) "Riza";
echo"<br>";
var_dump($x);

$y = array("jk","uio","jl");
echo"<br>";
var_dump($y);
?>
<h1>Type Juggling</h1>
<?php
$total = 5; // an integer
$count = "15abc"; // a string
$total = $total + $count; // $total = 20 (an integer)
echo $total;
?> <br>

<?php
$val1 = "1.2e3"; // "1200"
$val2 = 2;
echo $val1 * $val2; // outputs 2400 as 1.2e3 as a float is1200
?>