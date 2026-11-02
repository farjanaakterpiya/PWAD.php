<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = 15;
    $num2 = 20;
    $num3 = 38;
    $num4 = 40;
    $num5 = 45;

    // $largest = max($num1,$num2, $num3, $num4,$num5);
    // echo "The largest number is:$largest <br>";

    $max=$num1;
    $min =$num1;
    if($num2>$max){
        $max = $num2;
    }
    if($num3>$max){
        $max = $num3;
    }
    if($num4>$max){
        $max =$num4;
    }
    if($num5>$max){
        $max =$num5;
    }
    if($num2<$min){
        $min = $num2;
    }
    if($num3<$min){
        $$min= $num3;
    }
    if($num4<$min){
        $min =$num4;
    }
    if($num5<$min){
        $min=$num5;
    }
    echo "Calculated largest number:$max <br>";
    echo "lowest number:$min"
    ?>
</body>
</html>