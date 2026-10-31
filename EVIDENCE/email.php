<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
       <input type="text" name="username" > <br><br>
       <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if(isset($_POST['$submit'])){
       $username = $_POST['username'];
       $length = strlen($username); 

       if($username.$length>=4 && $length<=8 && strpos($username, "@")){
        echo "username is correct";
       }else{
        echo "validation failed";
       }
    }
    ?>
    
</body>
</html>