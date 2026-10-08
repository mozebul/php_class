<?php

require_once __DIR__ . '/dbconfig.php';
require_once __DIR__ . '/Student.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id !== false && $id !== null && $id > 0) {
    $studentModel = new Student($conn);
    $studentModel->delete($id);
}

header('Location: index.php');
exit;