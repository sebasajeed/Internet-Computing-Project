<?php
require 'db_config.php';

$sql = "SELECT * FROM InventoryTable ORDER BY ProductID ASC";
$result = $conn->query($sql);

// Output table rows only — no full HTML @SEBA I can do full HTML if needed or if you want it in JSON format, just let me know.
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['InventoryID']}</td>
            <td>{$row['ProductID']}</td>
            <td>{$row['ProductName']}</td>
            <td>{$row['Quantity']}</td>
            <td>{$row['Price']}</td>
            <td>{$row['Status']}</td>
            <td>{$row['SupplierName']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No data found.</td></tr>";
}

$conn->close();
?>
