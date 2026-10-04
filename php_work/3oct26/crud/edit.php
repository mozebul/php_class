<?php

include_once("dbconfig.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Product ID");
}

$id = (int) $_GET['id'];

$message = "";


/* Get existing product */

$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();

$stmt->close();


/* Update product */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_name = trim($_POST['product_name']);
    $category = trim($_POST['category']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = trim($_POST['description']);
    $status = $_POST['status'];

    if ($product_name == "" || $category == "" || $price == "" || $quantity == "") {

        $message = "Please fill in all required fields.";

    } else {

        $stmt = $conn->prepare(
            "UPDATE products SET
            product_name = ?,
            category = ?,
            price = ?,
            quantity = ?,
            description = ?,
            status = ?
            WHERE id = ?"
        );

        $stmt->bind_param(
            "ssdissi",
            $product_name,
            $category,
            $price,
            $quantity,
            $description,
            $status,
            $id
        );

        if ($stmt->execute()) {

            header("Location: index.php");
            exit();

        } else {

            $message = "Product could not be updated.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Product</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="form-container">

        <h2>Edit Product</h2>

        <?php if ($message != ""): ?>

            <div class="error">
                <?php echo $message; ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <label>Product Name</label>

            <input
                type="text"
                name="product_name"
                value="<?php echo htmlspecialchars($product['product_name']); ?>"
                required
            >


            <label>Category</label>

            <input
                type="text"
                name="category"
                value="<?php echo htmlspecialchars($product['category']); ?>"
                required
            >


            <label>Price</label>

            <input
                type="number"
                name="price"
                step="0.01"
                min="0"
                value="<?php echo $product['price']; ?>"
                required
            >


            <label>Quantity</label>

            <input
                type="number"
                name="quantity"
                min="0"
                value="<?php echo $product['quantity']; ?>"
                required
            >


            <label>Description</label>

            <textarea
                name="description"
                rows="5"
            ><?php echo htmlspecialchars($product['description']); ?></textarea>


            <label>Status</label>

            <select name="status">

                <option value="Active"
                    <?php
                    if ($product['status'] == 'Active') {
                        echo 'selected';
                    }
                    ?>>
                    Active
                </option>

                <option value="Inactive"
                    <?php
                    if ($product['status'] == 'Inactive') {
                        echo 'selected';
                    }
                    ?>>
                    Inactive
                </option>

            </select>


            <button type="submit" class="submit-btn">
                Update Product
            </button>

            <a href="index.php" class="back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>