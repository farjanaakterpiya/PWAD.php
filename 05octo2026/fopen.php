<?php
$fh = fopen('../myfile.txt', 'r');
while(!feof($fh)){
    echo fgets($fh);
} 
//close the file
fclose($fh);
?>