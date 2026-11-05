<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Login Form</h2>
    <form action="" method="post">
        
        <input type="text" name="email" placeholder="Enter your email"> <br> <br>
        <input type="password" name="password" placeholder="Enter your password"> <br> <br>
        <input type="submit" name="submit" value="Submit">

    </form>
    <?php
        if(isset($_POST['submit'])){
            $pass = $_POST['password'];
            $email = $_POST['email'];

            if(strlen($pass) < 8){
                echo "Password must be 8 chacter";
                return;
            }
            else{
                if((filter_var($email, FILTER_VALIDATE_EMAIL))){
                    echo "Email Validated";
                    return;
                }
            }
            echo "Email are not validated";
        }
    ?>

</body>
</html>