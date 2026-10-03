<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PWAD</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 360px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        h3 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <span class="brand">Secure Access</span>
        <h3>Login Form</h3>

        <?php
        if (isset($_POST['submit'])) {
            extract($_POST);
            $email = trim($email);
            $password = md5(trim($password));
            include_once('dbconfig.php');
            $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

            if ($result->num_rows > 0) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<div class='alert'>Login failed. Please check your email and password.</div>";
            }
        }
        ?>

        <form action="" method="post">
            <div>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php if (isset($_POST['email'])) echo $_POST['email']?>"><br>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <input class="button" type="submit" name="submit" value="LOGIN">
        </form>
    </div>
</body>
</html>