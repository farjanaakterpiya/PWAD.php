<?php include_once("dbconfig.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h3>Student List</h3>
            <a class="btn" href="student_new.php">New Entry</a>
        </div>

        <?php 
           $rawData =  $conn->query("SELECT * FROM students"); ?>

        <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            
        </tr>    
        <?php
           while($row = $rawData->fetch_assoc()){ ?>
              <tr>
                <td><?php echo  $row['id'] ?> </td>
                <td><?php echo  $row['name'] ?></td>
                <td><?php echo  $row['address'] ?></td>
                <td><?php echo  $row['email'] ?></td>
                <td><?php echo  $row['phone'] ?></td>
                <td class="action">
                    <a class="edit" aria-label="Edit student" title="Edit student" href="student_edit.php?id=<?php echo  $row['id'] ?>">&#9998;</a> |
                    <a onclick="return confirm('Are you sure to delete')" class="danger" aria-label="Delete student" title="Delete student" href="student_delete.php?id=<?php echo  $row['id'] ?>">&#128465;</a>
                </td>
              </tr>
          <?php 
            }    
        ?>
        </table>
    </div>
</body>
</html>
</body>
</html>