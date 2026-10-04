<?php

include_once("dbconfig.php");

$message = "";

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
            "INSERT INTO products 
            (product_name, category, price, quantity, description, status)
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssdiss",
            $product_name,
            $category,
            $price,
            $quantity,
            $description,
            $status
        );

        if ($stmt->execute()) {

            header("Location: index.php");
            exit();

        } else {

            $message = "Product could not be added.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="form-container">

        <h2>Add Product</h2>

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
                placeholder="Enter product name"
                required
            >


            <label>Category</label>

            <input
                type="text"
                name="category"
                placeholder="Enter category"
                required
            >


            <label>Price</label>

            <input
                type="number"
                name="price"
                step="0.01"
                min="0"
                placeholder="Enter price"
                required
            >


            <label>Quantity</label>

            <input
                type="number"
                name="quantity"
                min="0"
                placeholder="Enter quantity"
                required
            >


            <label>Description</label>

            <textarea
                name="description"
                placeholder="Enter product description"
                rows="5"
            ></textarea>


            <label>Status</label>

            <select name="status">

                <option value="Active">
                    Active
                </option>

                <option value="Inactive">
                    Inactive
                </option>

            </select>


            <button type="submit" class="submit-btn">
                Add Product
            </button>

            <a href="index.php" class="back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>