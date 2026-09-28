<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Entry Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef6ff 0%, #e9f7ef 100%);
            color: #183153;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .form-card {
            width: min(100%, 480px);
            background: #ffffff;
            border-radius: 18px;
            padding: 28px 26px;
            box-shadow: 0 18px 40px rgba(22, 56, 93, 0.12);
        }

        h3 {
            margin: 0 0 22px;
            font-size: 2rem;
            text-align: center;
            color: #123b63;
        }

        .student-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .student-form input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d9e3f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .student-form input:focus {
            outline: none;
            border-color: #4f8ef7;
            box-shadow: 0 0 0 4px rgba(79, 142, 247, 0.12);
        }

        .submit-btn {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-1px);
        }

        .back-link {
            display: inline-block;
            margin-top: 18px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .success-msg {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 8px;
            background: #e8f7ee;
            color: #166534;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <h3>Student Entry Form</h3>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                include_once("dbconfig.php");

                $result = $conn->query("INSERT INTO students(id,name,address,email,phone) VALUES(NULL,'$name', '$address', '$email','$phone')");

                if ($conn->affected_rows) {
                    echo "<div class='success-msg'>Success</div>";
                }
            }
            ?>

            <form action="" method="post" class="student-form">
                <input type="text" name="name" placeholder="Enter name">
                <input type="text" name="address" placeholder="Enter address">
                <input type="text" name="email" placeholder="Enter email">
                <input type="text" name="phone" placeholder="Enter phone">
                <input type="submit" name="submit" value="Save" class="submit-btn">
            </form>

            <a href="index.php" class="back-link">Back to Student List</a>
        </div>
    </div>
</body>
</html>