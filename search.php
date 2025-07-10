<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['product_id'];

    if (!is_numeric($productID)) {
        echo "Invalid Product ID.";
        exit();
    }

    // Prepared statement
    $stmt = $conn->prepare("SELECT * FROM ProductTable WHERE ProductID = ?");
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Search Results for Product ID: $productID</h2>";

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>Product Entry ID</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Supplier ID</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ProductEntryID']}</td>
                    <td>{$row['ProductID']}</td>
                    <td>{$row['ProductName']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['Quantity']}</td>
                    <td>{$row['Price']}</td>
                    <td>{$row['Status']}</td>
                    <td>{$row['SupplierID']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No product found with that ID.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
