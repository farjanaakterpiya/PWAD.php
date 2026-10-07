<?php
class MyClass
{
    public $color;
    public $amount;
}

$obj = new MyClass();
$obj->color = "red";
$obj->amount = 5;


print_r($obj);
echo"<hr>";

$copy = clone $obj;
$copy->color ="green";
$copy->amount = 20;
print_r($copy);
