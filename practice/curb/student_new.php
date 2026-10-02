<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Student Entry Form</h3>

     <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $roll = $_POST['Roll'];
                $name = $_POST['Name'];
                $gender = $_POST['Gende'];
                $age = $_POST['Age'];
                $gpa = $_POST['GPA'];
                $city = $_POST['City'];

                include_once("dbconfig.php");

                $result = $conn->query("INSERT INTO student(Roll,Name,Gender,Age,GPA,City) VALUES('Roll','$Name', '$Gender', '$Age','$GPA' '$City')");

                if ($conn->affected_rows) {
                    echo "<div class='success-msg'>Success</div>";
                }
            }
            ?>

            <form action="" method="post" class="student-form"><br>
            <input type="text" name="Roll" placeholder=""><br>
                <input type="text" name="Name" placeholder="Enter name"><br>
                <input type="text" name="Gender" placeholder="Enter gender"><br>
                <input type="text" name="Age" placeholder="Enter age"><br>
                <input type="text" name="GPA" placeholder="Enter gpa"><br>
                <input type="text" name="City" placeholder="Enter city"><br>
                <input type="submit" name="submit" value="Save" class="submit-btn"><br>
            </form>

            <a href="index.php" class="back-link">Back to Student List</a>

</body>
</html>