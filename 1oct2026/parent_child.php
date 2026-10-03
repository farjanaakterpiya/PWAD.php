<?php
class MyClass{
    //property
    public $name;
    protected $age;
    
    //method
    function welcome(){
        echo "Hello" . $this->name . "<br>";

    }
}
class Child_one extends MyClass{
    public $age = 32;
}
$obj1 = new MyClass;
$obj1->name = "Tanni";
var_dump($obj1);
?>