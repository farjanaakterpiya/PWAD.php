<?php
printf("Bar inventory:%d bottles of tonic water.",1000 );
echo "<br>";
printf("Learnin web development you have to learn %s,%s","HTML","CSS");
echo "<br>";
printf("%d bottles of tonic water cost $%f.", 100, 43.20);
echo"<br>";
printf("$%.2f", 43.2);
?>
<h1>SprintF</h1>
<?php
$cost = sprintf("$%.2f", 43.2); //$cost =$43.20
 echo $cost;
?>