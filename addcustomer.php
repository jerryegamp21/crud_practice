<?php
    include('db.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerName = $_POST['customer_name'];

        if (!empty($customerName)) {
            $fields = ['customer_name'];
            $data = [$customerName];

            $result = add_records('customers', $fields, $data);

            if ($result) {
                header("Location: sales.php?message=Customer added successfully!");
                exit;
            } else {
                $error = "Error adding customer.";
            }
        } else {
            $error = "Customer name is required.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
        }
    </style>
</head>
<body>

    <div class="bg-primary text-white p-4 text-center">
        <h2>Add Customer</h2>
        <a href="sales.php" class="btn btn-light btn-sm mt-2">← Back to Sales</a>
    </div>

    <div class="container form-container">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="addcustomer.php" method="post">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                        <a href="sales.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
