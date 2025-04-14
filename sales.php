<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, safari">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <title>Sari-Sari Store v1.0</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .w3-bar {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            padding: 15px 25px !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .w3-bar h3 {
            color: white;
            margin: 0;
        }

        .w3-bar a {
            color: white !important;
            margin-left: 10px;
            font-weight: bold;
            border-radius: 8px;
            padding: 8px 15px;
            transition: background 0.3s ease-in-out;
        }

        .w3-bar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Page Container */
        .content-container {
            margin-top: 80px;
            padding: 20px;
        }

        /* Card Style */
        .w3-card-4 {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .w3-card-4 label {
            font-weight: bold;
            color: #444;
        }

        .w3-card-4 input[type="submit"],
        .w3-card-4 input[type="reset"] {
            margin: 10px 5px;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 30px;
        }

        /* Table Styles */
        .w3-table-all {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .w3-table-all th {
            background-color: #ff6f61;
            color: white;
            text-align: center;
            padding: 12px;
        }

        .w3-table-all td {
            text-align: center;
            padding: 10px;
        }

        .w3-table-all tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .w3-table-all tr:hover {
            background-color: #ffe0e0;
            cursor: pointer;
        }

        .subtotal-container {
            text-align: right;
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Button Styles */
        .w3-button.w3-blue {
            background-color: #4a90e2;
            border-radius: 6px;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
        }

        .w3-button.w3-red {
            background-color: #e94e77;
            border-radius: 6px;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-container {
                padding: 10px;
            }

            .w3-third, .w3-twothird {
                width: 100%;
                margin-bottom: 20px;
            }

            .w3-bar a {
                font-size: 14px;
                margin-left: 5px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="w3-bar w3-container">
        <h3 class="w3-left">Sales</h3>
        <div class="w3-right">
            <a href="index.php" class='w3-button'>Home</a>
            <a href="addcustomer.php" class='w3-button'>Add Customer</a>
            <a href="addproduct.php" class='w3-button'>Add Product</a>
            <a href="sales.php" class='w3-button'>Sales</a>
        </div>
    </div>

    <div class="w3-container content-container">
        <?php if (isset($_GET['message'])): ?>
            <div class='w3-panel w3-amber w3-padding'>
                <h4><?= htmlspecialchars($_GET['message']); ?></h4>
            </div>
        <?php endif; ?>

        <div class="w3-row-padding">
            <!-- Left Section (Form) -->
            <div class="w3-third">
                <div class="w3-padding w3-container w3-round-xlarge w3-card-4">
                    <form action="addsales.php" method="post">
                        <p>
                            <label><b>SALES DATE</b></label>
                            <input type="text" name="sales_date" value="<?= date('Y/m/d'); ?>" class="w3-input w3-border" required>
                        </p>
                        <p>
                            <label><b>CUSTOMER</b></label>
                            <select name="customer_id" class="w3-select w3-border" required>
                                <?php foreach (getall_records('customers') as $customer): ?>
                                    <option value="<?= $customer['customer_id']; ?>"><?= strtoupper($customer['customer_name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                        <p>
                            <label><b>PRODUCT NAME</b></label>
                            <select name="product_id" class="w3-select w3-border" required>
                                <?php foreach (getall_records('products') as $p): ?>
                                    <option value="<?= $p['product_id']; ?>">
                                        <?= strtoupper($p['product_name']) . " -----> " . number_format($p['product_price'], 2); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                        <p>
                            <label><b>QTY</b></label>
                            <input type="number" step="0.01" min="0" name="qty" class="w3-input w3-border" required>
                        </p>
                        <p>
                            <label><b>PAYMENT</b></label>
                            <select name="payment" class="w3-select w3-border" required>
                                <option value="Cash">Cash</option>
                                <option value="Gcash">Gcash</option>
                            </select>
                        </p>
                        <p class="w3-center">
                            <input type="submit" value="Save" class="w3-button w3-blue">
                            <input type="reset" value="Cancel" class="w3-button w3-red">
                        </p>
                    </form>
                </div>
            </div>

            <!-- Right Section (Sales Table) -->
            <div class="w3-twothird">
                <div class="table-container">
                    <?php
                    $subtotal = 0.0;
                    $sales = getsales();
                    ?>
                    <table class="w3-table-all w3-small w3-centered">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th class="w3-hide-small w3-hide-medium">Customer</th>
                            <th class="w3-hide-small w3-hide-medium">Product Name</th>
                            <th class="w3-hide-large w3-hide-medium">Product Code</th>
                            <th class="w3-hide-small w3-hide-medium">Unit</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td><?= $sale['sales_id']; ?></td>
                                <td><?= $sale['sales_date']; ?></td>
                                <td class="w3-hide-small w3-hide-medium"><?= $sale['customer_name']; ?></td>
                                <td class="w3-hide-small w3-hide-medium"><?= $sale['product_name']; ?></td>
                                <td class="w3-hide-large w3-hide-medium"><?= $sale['product_code']; ?></td>
                                <td class="w3-hide-small w3-hide-medium"><?= $sale['product_unit']; ?></td>
                                <td><?= number_format($sale['product_price'], 2); ?></td>
                                <td><?= $sale['qty']; ?></td>
                                <td class="w3-center"><?= $sale['payment']; ?></td>
                                <td class="w3-right"><?= number_format($sale['total'], 2); ?></td>
                                <td class="w3-center">
                                    <a href="editsales.php?sales_id=<?= $sale['sales_id']; ?>" class="w3-button w3-blue">Edit</a>
                                    <a href="deletesales.php?sales_id=<?= $sale['sales_id']; ?>" class="w3-button w3-red">Delete</a>
                                </td>
                            </tr>
                            <?php $subtotal += $sale['total']; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Subtotal Section -->
                <div class="subtotal-container">
                    SUBTOTAL: ₱<?= number_format($subtotal, 2); ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
