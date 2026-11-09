<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <form action="" class="">
        <input type="text" id="fullname"><br>
        <textarea id="address" id=""></textarea><br>
        <button type="button" class="btn_submit">submit</button>
    </form>

    <button id="btn1">Get Data form Server</button>

    <script>
        $(document).ready(function(){
            // $("#btn1").click(function(){
            //     $.get("data.php", {name:"Sumaia"}, function(data,statuses){
            //         alert(data);
            //     });
            // });
            $(".btn_submit").click(function(){
                let fullname = $("#fullname").val();
                let address = $("#address").val();
                // alert(fullname);

                $.get("insert.php",{name:fullname, add:address},function(data, status){
                    alert (data);
                });
            });
        });
    </script>
</body>
</html>