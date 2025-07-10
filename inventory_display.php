<?php
require 'db_config.php';

// Load full inventory
$query = "SELECT p.ProductEntryID, p.ProductID, p.ProductName, p.Description, p.Quantity, p.Price, p.Status, s.SupplierName 
          FROM ProductTable p
          JOIN SupplierTable s ON p.SupplierID = s.SupplierID";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Display</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h2 { text-align: center; }
        .form-section { margin-bottom: 20px; text-align: center; }
        input, select, button {
            padding: 6px; margin: 5px;
            border-radius: 4px; border: 1px solid #ccc;
        }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: center; }
    </style>
</head>
<body>

<h2>Inventory Management</h2>

<!-- 🔍 Search/Delete Section -->
<div class="form-section">
    <form method="POST" action="search.php" style="display:inline;">
        <input type="number" name="product_id" placeholder="Enter Product ID" required>
        <button type="submit">Search</button>
    </form>

    <form method="POST" action="delete.php" style="display:inline;">
        <input type="number" name="product_id" placeholder="Enter Product ID" required>
        <button type="submit">Delete</button>
    </form>
</div>

<!-- 📝 Update Section -->
<div class="form-section">
    <form method="POST" action="update.php">
        <input type="number" name="product_id" placeholder="Product ID to update" required>
        <input type="number" name="quantity" placeholder="New Quantity" required>
        <select name="status" required>
            <option value="">Status</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <button type="submit">Update</button>
    </form>
</div>

<!-- 📦 Inventory Table -->
<table>
    <tr>
        <th>Entry ID</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Status</th>
        <th>Supplier</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['ProductEntryID'] ?></td>
        <td><?= $row['ProductID'] ?></td>
        <td><?= $row['ProductName'] ?></td>
        <td><?= $row['Description'] ?></td>
        <td><?= $row['Quantity'] ?></td>
        <td><?= $row['Price'] ?></td>
        <td><?= $row['Status'] ?></td>
        <td><?= $row['SupplierName'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
