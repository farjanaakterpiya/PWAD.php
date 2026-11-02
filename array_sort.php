<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $countries =array(
    "Bangladesh" => "Dhaka",
    "India" => "Dhelli",
    "Pakistan" => "Islamabad",
    "Japan" =>"Tokyo",
    "Thailend" => "Bankak",
    );

    ksort($countries);
    foreach($countries as $country =>$capital){
        echo $country . "=>" $capital . "<br>";
    }
    ?>
</body>
</html>