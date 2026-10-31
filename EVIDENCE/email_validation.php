<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if(isset ($_POST ['user_email']) && !empty($_POST['user_email'])){
$email =$_POST['user_email']; 
if(filter_var($email,FILTER_VALIDATE_EMAIL)==true){
echo "<h3 class ='valid'> Your email address $email is a valid address</h3>";

}else{
    echo"<h3 class = 'invalid'> You have put an invalid address</h3>";
}
}
?>
<form method = "post" action ="">
<p><input type ="text" name= "user_email" placeholder = "Put email address"></p>
<input type = "submit" name="submit" value="submit">
</form>

</body>
</html>