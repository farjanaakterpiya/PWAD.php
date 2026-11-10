<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h3>student list</h3>
    <div id="container"></div>
    <h3>student entry</h3>
    <form action="">
    <input type="text" id="name" placeholder="Enter Name"><br>
    <textarea id="address" placeholder="Enter Address"></textarea><br>
    <button type="submit" class="btn_submit">Submit</button>

    </form>
    <!-- <button id="btn1">Click</button> -->
    <script>

        $(document).ready(function(){  

             function getstudents(){
                 $.get("students.php",function(data,status){
                    $("#container").html(data)
                })
               }
                 getstudents ();

            $(".btn_submit").click(function(){
              let name = $("#name").val();
              let address = $("#address").val();
                // alert(name);
              
           
              $.get("insert.php",{
                name:name,
                add:address},
               function(data, status){
                  alert(data);
                  $("#name").val();
                  $("#address").val();
                  getstudents();
              });
            });
        });
    </script>
</body>
</html>