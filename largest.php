<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = 3654;
    $num2 = 36;
    $num3 = 376;
    $num4 = 3546;
    $num5 = 567;

    $max =$num1;
    if($num2>$max){
        $max = $num2;
    }if($num3>$max){
        $max=$num3;
    }if($num4>$max){
        $max =$num4;
    }if($num5=$max){
        $max =$num5;
    }
    echo "largest number:$max";
    ?>
</body>
</html>