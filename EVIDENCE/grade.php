<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Enter grade:
        <input type="text" name="grade"><br>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if($_POST){
        $grade = $_POST['grade'];
        if($grade == "A"){
            echo "Excillent";
        }elseif($grade =="B"){
            echo "Good";
        }elseif($grade =="C"){
            echo "fair";
        }elseif($grade =="D"){
            echo "poor";
        }else{
            echo "failed";
        }



    }
    ?>
</body>
</html>