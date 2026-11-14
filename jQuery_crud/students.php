<?php
$db = new mysqli("localhost", "root", "","jquery_crud");

$raw = $db->query("SELECT * FROM students");

<<<<<<< HEAD
$table = "<table border='1'><tr><th>name</th><th>address</th></tr>";
$rows = "";
while($record = $raw->fetch_assoc()){
    $rows .="<tr><td>".$record['name']."</td><td>".$record['address']. "</td><tr/>";
=======
$table = "<table border='1'><tr>
<th>name</th>
<th>address</th>
<th>Action</th>
</tr>";
$rows = "";
while($record = $raw->fetch_assoc()){
    $rows .="<tr><td>".$record['name'].
    "</td><td>".$record['address'].
    "</td>
    <td>Edit | <button id=".$record['id']." class='btnDel'>Delete</button> 
    </td>
    </tr>";
>>>>>>> 1c849a00b79dda2e89d65080761b2cc76ae49135
}
$table .=$rows;
$table .="</table>";
echo $table ;
?>