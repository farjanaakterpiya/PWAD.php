<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user_email"><br>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if(isset($_POST['user_email'])&& !empty($_POST['user_email'])){
        $email = $_POST['user_email'];
        $pass = $_POST['password'];

        if(strlen($pass)<8){
            echo "password must be 8 character";
        }else{
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Email validate";
            }
        }
        echo "Not validate";
    }
    ?>
</body>
</html>