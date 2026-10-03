<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>
</head>
<body>
    <h3>Product Entry </h3>
        <?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){
               // Data received from entry form
                $name = $_POST['name'];
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                include_once("dbconfig.php"); 

               $conn->query("INSERT INTO product_list
                (id, name, description, quantity) VALUES 
                (NULL, '$name', '$description', '$quantity')");

                 if($conn->affected_rows){
                    echo "<div class='message'>Success</div>";
                 } 
            
            }
        ?>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter name"><br>
            <textarea name="description " id=""  fd></textarea><br>
            <input type="number" name="quantity" placeholder="Enter quantity"><br>
            <input type="text" name="category" placeholder="Enter category"><br>
            <input type="number" name="price" placeholder="Enter price"><br>
            <select name="status" id="">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <input type="submit" name="submit" value="SAVE">
        </form>
        <br>
        <a class="link" href="index.php">Back to product_list </a><br><br>
</body>
</html>