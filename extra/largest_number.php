<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
$n1 = 45;
$n2 = 88;
$n3 = 12;
$n4 = 99;
$n5 = 67;

// Approach 1: Using max() function
$largest = max($n1, $n2, $n3, $n4, $n5);
echo "The largest number is: $largest<br>";

// Approach 2: Using conditional logic
$max = $n1;
if ($n2 > $max) $max = $n2;
if ($n3 > $max) $max = $n3;
if ($n4 > $max) $max = $n4;
if ($n5 > $max) $max = $n5;

echo "Calculated largest number: $max";
?>
</body>
</html>
let num1 = parseInt(prompt("Enter a number"));
            let num2 = parseInt(prompt("Enter a number"));
            let num3 = parseInt(prompt("Enter a number"));
            // let max = Math.max(num1, num2, num3);
            // let min = Math.min(num1, num2, num3);
            let max = num1;
            let min = num1;
            if(num3>max){
                max=num3;
            }
            if(num2>max){
                max=num2;
            }
            if(num2<min){
                min = num2;
            }
            if(num3<min){
                min = num3;
            }
            document.write("maximum number :" + max + "<br>");
            document.write("minimum number:" + min);

