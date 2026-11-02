<?php
class student{
    public $id;
    public $name;
    public $batch;
    public $data;

    public function __construct($file)
    {
     $fhandle = file($file);
     $this->data = $fhandle;
     return $this->data;  
    }
    public function result($id){
        foreach($this->data as $line){
            list($stid, $name, $batch, $result) = explode(",", $line);
            if($stid==$id){
                echo "ID $id Name:$name Batch:$batch Result:$result";
                return;
            }
        }
    } 
        
    
}
$object =new student('result.txt');
$object->result(101);

?>