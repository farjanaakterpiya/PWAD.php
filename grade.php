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
        <input type="grade" name="grade"><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if($_POST){
        $grade =$_POST['grade'];

        if($grade == "A"){
            echo "Excillent";
        }elseif($grade =="B"){
            echo "Good";
        }elseif($grade == "C"){
            echo "poor";
        }elseif($grade =="D"){
            echo "fair";
        }elseif($grade =="E"){
            echo "failed";
        }else{
            echo "Invalid";
        }
    }
</body>
</html>