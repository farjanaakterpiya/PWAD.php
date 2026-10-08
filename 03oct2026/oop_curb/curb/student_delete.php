<?php

require_once __DIR__ . '/dbconfig.php';
require_once __DIR__ . '/students.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id !== false && $id !== null && $id > 0) {
    $studentsModel = new $students($conn);
    $studentsModel->delete($id);
}

header('Location: index.php');
exit;