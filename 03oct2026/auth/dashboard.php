<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PWAD</title>
    <style>
        body {
            margin: 0;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            padding: 40px 20px;
        }

        .dashboard {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        .logout {
            text-decoration: none;
            background: #111827;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
        }

        .panel {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
        }

        pre {
            margin: 0;
            overflow-x: auto;
            font-size: 13px;
            background: #111827;
            color: #f9fafb;
            padding: 12px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="topbar">
            <h1>Welcome to dashboard</h1>
            <a class="logout" href="logout.php">Logout</a>
        </div>

        <div class="panel">
            <pre class="session-box"><?php print_r($_SESSION); ?></pre>
        </div>
    </div>
</body>
</html>