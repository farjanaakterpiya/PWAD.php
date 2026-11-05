<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>prime number</h3>

<form action="" method="post">
    <input type="number" name="number"><br>
    <input type="submit" name="submit" value="submit">
</form>
    
    <?php
    if(isset($_POST['submit'])){
        $num =$_POST['number'];
        if($num==1){
            echo "Not is a prime number";
        }elseif($num ==2){
            echo "is a prime number";
        }else{
            for($i=2; $i<$num; $i++){
                if($num%$i==0){
                    echo "Not is a prime number";
                    return;
                }
            }
            echo "is a prime number";
        }
    }
    ?>
</body>
</html>