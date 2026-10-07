<?php

include 'classes/Table.php';

$table = new \Html\Table();
$table->title = "My table";
$table->rows = 5;
?>

<!DOCTYPE html>
<html>

<body>

    <?php
    $table->info();
    ?>
</body>
</html>