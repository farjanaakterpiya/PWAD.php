<?php include_once "dbconfig.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h3>Product List</h3>
            <a class="btn" href="new_product.php">New Entry</a>
        </div>

        <?php
        $result = $conn->query("SELECT * FROM product_list ORDER BY id DESC");
        ?>

        <table border="1" cellpadding="10" cellspacing="0">
<<<<<<< HEAD
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
                    <a href="product_edit.php">Edit</a> |
                    <a onclick="return confirm('Are you sure to delete')" class="danger" href="product_delete.php?id=<?php echo  $row['id'] ?>" >Delete</a>
                </td>
              </tr>
          <?php 
            }    
        ?>
=======
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

             

            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo htmlspecialchars($row['category'] ?? ''); ?></td>
                    <td><?php echo number_format((float) ($row['price'] ?? 0), 2); ?></td>
                    <td><?php echo htmlspecialchars($row['status'] ?? 'active'); ?></td>
                    <td class="action">
                        
                        <a href="product_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a class="danger" onclick="return confirm('Are you sure you want to delete this product?')" href="product_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
>>>>>>> b6af53e (assignment)
        </table>
    </div>
</body>
</html>