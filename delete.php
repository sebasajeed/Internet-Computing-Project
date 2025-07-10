<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['product_id'];

    // Check if input is a number
    if (!is_numeric($productID)) {
        echo "Invalid Product ID.";
        exit();
    }

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM ProductTable WHERE ProductID = ?");
    $stmt->bind_param("i", $productID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Product(s) with ProductID $productID deleted successfully.";
        } else {
            echo "No product found with ProductID $productID.";
        }
    } else {
        echo "Error executing delete: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
echo '<br><br><a href="inventory_display.php"><button>Back to Inventory</button></a>';
?>
