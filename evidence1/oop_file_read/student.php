<?php
class student {
    public $id;
    public $name;
    public $batch;
    public $data;

    public function __construct($file) {
        $fhandle = file($file);
        $this->data = $fhandle;
        return $this->data; 
        // echo "<pre>";
        // print_r($fhandle);
    }

   public function result($id){
    foreach($this->data as $line){
        list ($stid, $name, $batch, $result) = explode ("," ,$line);
        if($stid == $id){
            echo "ID $stid Name: $name Batch:$batch Rsult:$result";
        }
    }
   }
}
$object = new student ('result.txt');
$object->result(104);
?>