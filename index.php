<?php 
    include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge,safari">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <title>Gamboa Store</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f6fa;
    margin: 0;
    padding: 0;
    
}

/* Navigation Bar */
.nav-bar {
    background: linear-gradient(to right, #ff6a00, #ee0979);
    padding: 15px 30px;
    color: white;
    font-size: 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    width: 95%;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.nav-bar h3 {
    margin: 0;
    font-weight: 600;
    animation: slide-in 0.6s ease-out;
}

.nav-links a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 6px;
    font-weight: 500;
    margin-left: 10px;
    transition: all 0.3s ease;
}

.nav-links a:hover {
    background: rgba(255, 255, 255, 0.25);
}

/* Main Content Section */
.content-container {
    margin-top: 90px;
    padding: 30px;
}

/* Table Styling */
.w3-table-all {
    border-radius: 10px;
    overflow: hidden;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.w3-table-all th {
    background: #ee0979;
    color: white;
    text-transform: uppercase;
    padding: 12px;
}

.w3-table-all tr:nth-child(even) {
    background: #fef1f4;
}

.w3-table-all td {
    padding: 10px;
}

.w3-table-all tr:hover {
    background: #ffe6eb;
    transition: 0.3s ease;
}

/* Buttons */
.w3-button {
    transition: 0.3s ease;
    padding: 8px 14px;
    border-radius: 6px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 13px;
}

.w3-blue {
    background-color: #3498db !important;
    color: white;
}

.w3-red {
    background-color: #e74c3c !important;
    color: white;
}

.w3-button:hover {
    transform: scale(1.08);
    opacity: 0.9;
}

/* Card View for Mobile */
.product-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
    padding: 18px;
    text-align: center;
    margin-bottom: 20px;
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card h4 {
    color: #ee0979;
    margin-bottom: 10px;
}

.product-card p {
    font-size: 15px;
    margin: 5px 0;
}

/* Responsive Layout */
@media (max-width: 768px) {
    .w3-table-all {
        display: none;
    }
    .product-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 15px;
    }
}

@media (min-width: 769px) {
    .product-container {
        display: none;
    }
}

/* Animations */
@keyframes slide-in {
    0% { transform: translateX(-50px); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
}
</style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="nav-bar">
        <h3>Sari-Sari Store | Gamboa Store</h3>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="addcustomer.php">Add Customer</a>
            <a href="addproduct.php">Add Product</a>
            <a href="sales.php">Sales</a>
        </div>
    </div>

    <div class="w3-container content-container">
        
        <?php
        $products = getall_records('products');

        // TABLE VIEW (For Desktop)
        echo "<table class='w3-table-all w3-card-4 w3-animate-top'>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>CODE</th>";
            echo "<th>NAME</th>";
            echo "<th>PRICE</th>";
            echo "<th>UNIT</th>";
            echo "<th>ACTION</th>";
        echo "</tr>";
        foreach($products as $product){
            echo "<tr>";
                echo "<td>".$product['product_id']."</td>";
                echo "<td>".strtoupper($product['product_code'])."</td>";
                echo "<td>".strtoupper($product['product_name'])."</td>";
                echo "<td>".number_format($product['product_price'],2)."</td>";
                echo "<td>".strtoupper($product['product_unit'])."</td>";
                echo "<td>";
                    echo "<a href='editproduct.php?id=".$product['product_id']."' class='w3-button w3-blue'>Edit</a> ";
                    echo "<a href='deleteproduct.php?id=".$product['product_id']."' class='w3-button w3-red' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // CARD VIEW (For Mobile)
        echo "<div class='product-container'>";
        foreach ($products as $product) {
            echo "<div class='product-card'>";
                echo "<h4>".strtoupper($product['product_name'])."</h4>";
                echo "<p><b>Code:</b> ".strtoupper($product['product_code'])."</p>";
                echo "<p><b>Price:</b> ₱".number_format($product['product_price'],2)."</p>";
                echo "<p><b>Unit:</b> ".strtoupper($product['product_unit'])."</p>";
                echo "<a href='editproduct.php?id=".$product['product_id']."' class='w3-button w3-blue'>Edit</a> ";
                echo "<a href='deleteproduct.php?id=".$product['product_id']."' class='w3-button w3-red' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
            echo "</div>";
        }
        echo "</div>";
        ?>

    </div>

</body>
</html>
