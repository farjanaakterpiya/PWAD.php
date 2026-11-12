<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <!-- <form action="" class="">
        <input type="text" name="fullname"><br>
        <textarea name="address" id=""></textarea><br>
        <button type="button" class="btn_submit">submit</button>
    </form> -->

    <button id="btn1">Get Data form Server</button>

    <script>
        $(document).ready(function(){
            $(".btn1").click(function(){
                $.get();
            });
        });
    </script>
</body>
</html>