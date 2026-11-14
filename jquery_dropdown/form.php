<?php
$db = new mysqli("localhost", "root", "", "jquery_dropdown");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="../jQuery/js/jquery.min.js"></script>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="" class="">
        <select name="" id="districts">
            <option value="disabled selected">Select one</option>

            <?php
            $raw = $db->query("SELECT * FROM districts"); 
            while($row = $raw->fetch_assoc()){
             ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['districts']?></option>
            <?php } ?>
        </select><br>
        Upazilla <br>
        <select name="" id="upazila">
            <option value="selected disabled ">select one</option>
            <!-- <option value=""><?php echo $row['upazilla']?></option> -->
        </select>
        <input type="submit" value="SUBMIT"/>
    </form>
    <script>
        $(document).ready(function(){
            $("#districts").on ('change', function(){
                // alert($(this).val());
                $.get ("upazilla.php", {distid : $(this).val()}, function(data, status){
                    // alert(data);
                    $("#upazila").html(data); 
                });
            });
        });
    </script>
</body>
</html>