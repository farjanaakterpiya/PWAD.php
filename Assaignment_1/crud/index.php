<?php include_once("dbconfig.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    
    <h3>Student List</h3>
            <a class="btn" href="new_product list">New Entry</a>
        </div>

        <?php 
           $rawData =  $conn->query("SELECT * FROM product_list"); ?>

        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>quantity</th>
            <th>category</th>
            <th>price</th>
            <th>status</th>
            <th>Action</th>
        </tr>    
        <?php
           while($row = $rawData->fetch_assoc()){ ?>
              <tr>
                <td><?php echo  $row['id'] ?> </td>
                <td><?php echo  $row['name'] ?></td>
                <td><?php echo  $row['description'] ?></td>
                <td><?php echo  $row['quantity'] ?></td>
                <td><?php echo  $row['category'] ?></td>
                <td><?php echo  $row['price'] ?></td>
                <td><?php echo  $row['status'] ?></td>
                <td class="action">
                    <a href="#">Edit</a> |
                    <a onclick="return confirm('Are you sure to delete')" class="danger" href="product_delete.php?id=<?php echo  $row['id'] ?>" >Delete</a>
                </td>
              </tr>
          <?php 
            }    
        ?>
        </table>
</body>
</html>