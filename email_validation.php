<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login Registration Validation</title>
</head>
<body>

    <h2>Login Registration Form</h2>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" >
        <br><br>
        
        <input type="submit" name="submit" value=" Login">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $length = strlen($username);
        if($username.$length>=4 && $length<=8 && strpos($username,"@")){
            echo "username is correct.";
        }else{
            echo "username is failed";
        }

        
    }
    ?>

</body>
</html>


