<?php
class Goodbye {
  const MESSAGE = "Thank you for visiting W3Schools.com!";
}
$abc=new Goodbye;
echo $abc::MESSAGE;
//::scope resolution operator
echo Goodbye::MESSAGE; // Access constant
?>