<?php
require_once __DIR__ . '/dbconfig.php';
require_once __DIR__ . '/Student.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) {
    header('Location: index.php');
    exit;
}

$studentModel = new Student($conn);
$row = $studentModel->getById($id);
if ($row === null) {
    http_response_code(404);
    exit('Student not found.');
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) && is_string($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) && is_string($_POST['phone']) ? trim($_POST['phone']) : '';

    if ($name === '' || $email === '' || $phone === '') {
        $message = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } else {
        $studentModel->update($id, $name, $email, $phone);
        $row = $studentModel->getById($id);
        $message = 'Update Success';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Entry</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card">
        <h3>Student Update Form</h3>
        <?php if ($message !== '') { ?>
            <div class="message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
        <?php } ?>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter name" value="<?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="email" name="email" placeholder="Enter email" value="<?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="text" name="phone" placeholder="Enter phone" value="<?= htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8') ?>" required><br>
            <input type="submit" name="submit" value="UPDATE">
        </form>
        <br>
        <a class="link" href="index.php">Back to Student List</a><br><br>
    </div>
</body>
</html>