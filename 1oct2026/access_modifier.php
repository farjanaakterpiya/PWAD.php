<?php
class MyClass {
    //property
    private $name;
    private $age;
    
    //method
    function welcome(){
        echo "Hello" .  $this->name . "<br>";
       
    }
}

$obj1 = new MyClass;
$obj1->name ="Tanni";
$obj1->age = 16;
// $obj1->welcome();


?>