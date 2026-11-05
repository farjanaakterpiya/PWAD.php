<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>File Upload using php</h3>
    <?php
    if(isset($_POST['upload'])){
        $name = $_FILES['myfile']['name'];
        $size = $_POST['myfile']['size'];
        $tmp =$_FILES['myfile']['tmp'];
        $allowed =["jpg", "pdf"];
        $ext = pathinfo($name ,PATHINFO_EXTENSION);
        if(!in_array($ext, $allowed)){
            echo "File type not allowed";
        }
        elseif($size>400*1024){
            echo "File size must be within 400 KB";
        }
        else {
            if(move_uploaded_file($tmp, "uploads/" . $name)){
                echo "File uploaded successfully";
            }
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="upload" value="UPLOAD">
    </form>
</body>
</html>