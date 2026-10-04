<?php

include_once("dbconfig.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Product ID");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    header("Location: index.php");
    exit();

} else {

    echo "Product could not be deleted.";

}

$stmt->close();

$conn->close();

?>