<?php include_once("dbconfig.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f4f7fb 0%, #eaf2ff 100%);
            color: #1d2a39;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .panel {
            width: min(100%, 930px);
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 18px 40px rgba(32, 66, 122, 0.12);
            padding: 28px;
        }

        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        h3 {
            margin: 0;
            font-size: 2rem;
            color: #1d3557;
        }

        .primary-btn {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .primary-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(37, 99, 235, 0.25);
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid #dfeaf7;
        }

        .student-table tr:nth-child(even) {
            background: #f8fbff;
        }

        .student-table tr:nth-child(odd) {
            background: #ffffff;
        }

        .student-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #e9eef7;
            text-align: left;
        }

        .student-table tr:first-child td {
            background: #1d3557;
            color: #fff;
            font-weight: 700;
        }

        .student-table tr:hover td {
            background: #edf4ff;
        }

        .action-links {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .delete-link {
            color: #dc2626;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel">
            <div class="title-row">
                <h3>Student List</h3>
                <a href="students_new.php" class="primary-btn">New Entry</a>
            </div>

            <?php
            $rawData = $conn->query("SELECT * FROM students");
            ?>
            <table class="student-table">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Action</td>
                </tr>
                <?php while ($row = $rawData->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                            <a href="#" class="action-links">Edit</a> |
                            <a onclick="confirm('Are you sure to delete')"class="danger"href="student_delete.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>