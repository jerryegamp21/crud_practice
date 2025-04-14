<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Sale</h4>
        </div>
        <div class="card-body">
            <form action="addsales.php" method="POST">
                <div class="mb-3">
                    <label for="sales_date" class="form-label">Sales Date</label>
                    <input type="date" class="form-control" id="sales_date" name="sales_date" required>
                </div>
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select class="form-select" id="customer_id" name="customer_id" required>
                        <option value="" selected disabled>Select Customer</option>
                        <!-- Populate with PHP dynamically -->
                        <option value="1">Customer 1</option>
                        <option value="2">Customer 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select class="form-select" id="product_id" name="product_id" required>
                        <option value="" selected disabled>Select Product</option>
                        <!-- Populate with PHP dynamically -->
                        <option value="1">Product A</option>
                        <option value="2">Product B</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="qty" name="qty" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment (₱)</label>
                    <input type="number" class="form-control" id="payment" name="payment" min="0" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit Sale</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
