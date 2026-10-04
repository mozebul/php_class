<?php
include_once("dbconfig.php");

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product Management</h2>
        <a href="add.php" class="btn btn-primary">+ Add Product</a>
    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = $result->fetch_assoc()) { ?>

            <tr>
                <td><?= $row['id']; ?></td>

                <td><?= htmlspecialchars($row['product_name']); ?></td>

                <td><?= htmlspecialchars($row['category']); ?></td>

                <td>৳<?= number_format($row['price'], 2); ?></td>

                <td><?= $row['quantity']; ?></td>

                <td><?= htmlspecialchars($row['description']); ?></td>

                <td>
                    <?php if($row['status'] == 'Active') { ?>
                        <span class="badge bg-success">Active</span>
                    <?php } else { ?>
                        <span class="badge bg-danger">Inactive</span>
                    <?php } ?>
                </td>

                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <a href="delete.php?id=<?= $row['id']; ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Are you sure you want to delete this product?')">
                        Delete
                    </a>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>