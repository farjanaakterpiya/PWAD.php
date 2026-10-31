<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP file upload</title>
</head>
<body>
    <h3>File Upload using PHP</h3>
    <?php
    echo"<pre>";
    print_r($_FILES);
    $name =  $_FILES['myfile']['name'];
    $size =  $_FILES['myfile']['size'];
    $targetPath =  "upload/$name";
    $status = true;

    //Allowed file type
    $allowedTypes = ["jpg", "pdf"];

    //Allowed size 400kb
    $size_kb = $size /1024;

     $fileExt = pathinfo($name, PATHINFO_EXTENSION);
     //Filetype check
     if(!in_array($fileExt, $allowedTypes)){
        echo "Filetype not allowed <br>";
        $status = false;
     }

     if($status){
        echo "File type not allowed <br>";
     }else{
       //move_uploaded_file($fileTmpName, $targetPath);
       echo "Success"; 
     }
    
    

    ?>


    <form action="" method="post" enctype=" = multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="upload" value="UPLOAD">
    </form>

    
</body>
</html>