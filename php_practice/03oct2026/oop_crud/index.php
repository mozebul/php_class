<?php
require_once __DIR__ . '/dbconfig.php';
require_once __DIR__ . '/Student.php';

$studentModel = new Student($conn);
$students = $studentModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h3>Student List</h3>
            <a class="btn" href="student_new.php">
                <svg aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                <span>New Entry</span>
            </a>
        </div>

        <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>    
        <?php foreach ($students as $row) { ?>
              <tr>
                <td><?= htmlspecialchars((string) $row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="action">
                    <a class="edit" aria-label="Edit student" title="Edit student" href="student_edit.php?id=<?= (int) $row['id'] ?>">
                        <svg aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                        </svg>
                    </a>
                    <form action="student_delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this student?')">
                        <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                        <button class="danger" type="submit" aria-label="Delete student" title="Delete student">
                            <svg aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                                <path d="M3 6h18"/>
                                <path d="M8 6V4h8v2"/>
                                <path d="M19 6l-1 14H6L5 6"/>
                                <path d="M10 11v6M14 11v6"/>
                            </svg>
                        </button>
                    </form>
                </td>
              </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>