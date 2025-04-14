<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_unit = $_POST['product_unit'];

    if (!empty($product_code) && !empty($product_name) && !empty($product_price) && !empty($product_unit)) {
        $fields = ['product_code', 'product_name', 'product_price', 'product_unit'];
        $data = [$product_code, $product_name, $product_price, $product_unit];

        $result = add_records('products', $fields, $data);

        if ($result) {
            echo "<script>alert('Product added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed to add product');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add New Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .form-container {
            max-width: 600px;
            margin: 60px auto;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Add New Product</a>
            <div class="ms-auto">
                <a href="index.php" class="btn btn-outline-light btn-sm me-2">Home</a>
                <a href="sales.php" class="btn btn-outline-light btn-sm">Sales</a>
            </div>
        </div>
    </nav>

    <div class="container form-container">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Details</h4>
                <form method="POST" action="addproduct.php">
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" name="product_code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price (₱)</label>
                        <input type="number" step="0.01" name="product_price" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Product Unit (e.g. pcs, pack, bottle)</label>
                        <input type="text" name="product_unit" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Add Product</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
