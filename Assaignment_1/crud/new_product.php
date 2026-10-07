
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card">
        <h3>Product Entry</h3>
         <?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){
               // Data received from entry form
                $name = $_POST['name'];
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                include_once("dbconfig.php"); // Database Connection

<<<<<<< HEAD
               $conn->query("INSERT INTO product_list
                (id, name, category, description, quantity, status) VALUES 
                (NULL, '$name', '$category', '$description', '$quantity', '$status')");
=======
            

               $conn->query("INSERT INTO product_list 
                (id, name, description, quantity, category, price, status) VALUES 
                (NULL, '$name', '$description', '$quantity', '$category', '$price', '$status')");
>>>>>>> b6af53e (assignment)

                 if($conn->affected_rows){
                    echo "<div class='message'>Success</div>";
                 } 
            
            }
        ?>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter name" required><br>
            <textarea name="description" placeholder="Enter description" required></textarea><br>
            <input type="text" name="quantity" placeholder="Enter quantity" min="0" required><br>
            <input type="text" name="category" placeholder="Enter category" required><br>
            <input type="number" name="price" placeholder="Enter price" min="0" step="0.01" required><br>
            <select name="status">
                <option value="active">Available</option>
                <!-- <option value="inactive">Inactive</option> -->
            </select><br>
            <input type="submit" name="submit" value="SAVE">
        </form>

        <a class="link" href="index.php">Back to product list</a>
    </div>
</body>
</html>