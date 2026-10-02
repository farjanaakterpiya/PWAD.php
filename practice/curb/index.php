<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Student Form</h3>
<a href="./student_new.php" class="">new entry</a>

<?php
$data = $conn->query("SELECT * FROM student");
?>

<table>
    <tr>
        <td>Roll</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Age</td>
        <td>GPA</td>
        <td>City</td>
        <td>Action</td>
    </tr>
    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Roll']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['Age']; ?></td>
            <td><?php echo $row['GPA']; ?></td>
            <td><?php echo $row['City']; ?></td>
            <td>
                <a href="#" class="action-links">Edit</a> |
                <a onclick="return confirm('Are you sure to delete?')" class="danger delete-link" href="student_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>