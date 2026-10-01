<?php
class MyClass {
    //property
    public $name;
    public $age;
    public $dept;
    public $email;
    //method
    function welcome(){
        echo "Hello" .  $this->name . "<br>";
       
    }
}

$obj1 = new MyClass;
$obj1->name ="Tanni";
$obj1->age = 16;
$obj1->welcome();

echo "<pre>";
var_dump($obj1);

$obj2 = new MyClass;
$obj2->dept="";
$obj2->email = "fkj@gmail.com";
$obj2 ->welcome();
var_dump($obj2);
?>