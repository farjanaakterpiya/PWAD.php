<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$num = 5;
$factorial = 1;

if ($num < 0) {
    echo "Factorial is not defined for negative numbers.";
} else {
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    echo "The Factorial of $num is: $factorial";
}
?>
</body>
</html>



let mynum = prompt("Enter a number", "");
        let output =1;
        for(let i=1; i<=mynum; i++){
            output *= i;

        }
        document.write("factorial value of:" + mynum + "is"+ output);
        // alert(output);