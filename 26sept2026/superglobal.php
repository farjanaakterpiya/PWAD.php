<a href="superglobal.php?name='piya' &do='sle' &number='4' " >Click here</a>
<?php
echo"<pre>";
//print_r($_SERVER);
//echo $_SERVER['REQUEST_METHOD'];
print_r($_GET);

echo $_GET["number"];
echo $_GET["name"];
?>