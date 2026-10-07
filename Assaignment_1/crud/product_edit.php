<?php
require_once __DIR__ . '/dbconfig.php';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) {
    header('Location: index.php');
    exit;
}

// $product_listModel = new product_list($conn);
// $row = $product_listModel->getById($id);

        $result = $conn->query("SELECT * FROM product_list ORDER BY id DESC");

if ($row ) {
    http_response_code(404);
    exit('product not found.');
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) && is_string($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) && is_string($_POST['description']) ? trim($_POST['description']) : '';
    $quantity = isset($_POST['quantity']) && is_string($_POST['quantity']) ? trim($_POST['quantity']) : '';
    $category = isset($_POST['category']) && is_string($_POST['category']) ? trim($_POST['category']) : '';
    $price = isset($_POST['price']) && is_string($_POST['price']) ? trim($_POST['price']) : '';
    $status = isset($_POST['status']) && is_string($_POST['status']) ? trim($_POST['status']) : '';

    if ($name === '' || $description === '' || $quantity === '' || $category === '' || $price === '' || $status === '') {
        $message = 'Please fill in all fields.';
    } elseif (!filter_var($description, FILTER_VALIDATE_DESCRIPTION)) {
        $message = 'Please enter a valid description.';
    } else {
        $product_listModel->update($id, $name, $description, $quantity, $category, $price, $status);
        $row = $product_listModel->getById($id);
        $message = 'Update Success';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card">
        <h3>Product Update Form</h3>
        <?php if ($message !== '') { ?>
            <div class="message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
        <?php } ?>
        <form action="" method="post">
<<<<<<< HEAD
            <input type="text" name="name" placeholder="Enter name" value="<?php echo $row->name; ?>"><br/>
            <input type="text" name="category" placeholder="Enter category" value="<?php echo $row->category; ?>"><br>
            <textarea name="description"><?php echo $row->description; ?></textarea><br>
            <input type="text" name="quantity" placeholder="Enter quantity" value="<?php echo $row->quantity; ?>" ><br>
            <input type="text" name="status" placeholder="Enter status" value="<?php echo $row->status; ?>" ><br>
=======
            <input type="text" name="name" placeholder="Enter name" value="<?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="text" name="description" placeholder="Enter description" value="<?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="number" name="quantity" placeholder="Enter quantity" value="<?= htmlspecialchars($row['quantity'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="text" name="category" placeholder="Enter category" value="<?= htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="number" name="price" placeholder="Enter price" value="<?= htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <select name="status">
                <option value="available" <?= $row['status'] === 'available' ? 'selected' : '' ?>>Available</option>
                
            </select><br>
>>>>>>> b6af53e (assignment)
            <input type="submit" name="submit" value="UPDATE">
        </form>
        <br>
        <a class="link" href="index.php">Back to Product List</a><br><br>
    </div>
</body>
</html>