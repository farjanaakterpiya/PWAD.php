<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Sorting Array</h3>
    <?php
     $countries =array(
    "Bangladesh" =>"Dhaka",
    "Pakistan" =>"Islamabad",
    "India" =>"Noyadhilli",
    "Japan" =>"Tokio",
    "Thailend" =>"Bankak",
   );
   ksort($countries);
   foreach($countries as $country =>$capital){
    echo $country . "=>" . $capital . "<br>";
   }
   ?>
</body>
</html>