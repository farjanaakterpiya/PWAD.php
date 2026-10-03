<?php  include_once("dbconfig.php"); // Database Connection ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_list Entry</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card">
        <h3>product_list Update Form</h3>
        <?php 
            // Display product Record
            $id = $_GET['id']; 
            
           $data = $conn->query("SELECT * FROM product_list WHERE id = '$id'");
           $row = $data->fetch_object();
            
           
            
            
            // Update product Record
            if($_SERVER['REQUEST_METHOD']=='POST'){
               // Data received from entry form
                $name = $_POST['name'];
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                
               
                //Update Query

                $conn->query("UPDATE product_list SET name ='$name',description= '$description', quantity='$quantity', category='$category', price= '$price', status ='$status' WHERE id='$id'");

            

              
                 if($conn->affected_rows){
                    echo "<div class='message'>Success</div>";
                 } 
            
            }
        ?>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter name" value="<?php echo $row->name; ?>"><br>
            <textarea name="description" value="<?php echo $row->description; ?>"><br>
            <input type="number" name="quantity" placeholder="Enter email" value="<?php echo $row->email; ?>" ><br>
            <input type="submit" name="submit" value="UPDATE">
        </form>
        <br>
        <a class="link" href="index.php">Back to product_List</a><br><br>
    </div>
</body>
</html>