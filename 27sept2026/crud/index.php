<?php include_once("dbconfig.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h3>Student List</h3>
    
    <?php
   $rawData =$conn->query ("SELECT * FROM students");?>
   <table border="1" style="border-collapse: collapse; width:50%">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
    </tr>
   <?php while($row = $rawData ->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row ['id']?></td>
    <td><?php echo $row ['name']?></td>
    <td><?php echo $row ['email']?></td>
    <td><?php echo $row ['phone']?></td>
    </tr>
    <?php
   }
    ?>
    </table>
</body>
</html>