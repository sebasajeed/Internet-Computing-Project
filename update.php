<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];
    $newStatus = $_POST['status'];

    // Validation
    if (!is_numeric($productID) || !is_numeric($newQuantity) || strlen($newStatus) !== 1) {
        echo "Invalid input. Please check the form.";
        exit();
    }

    // Prepare the UPDATE statement
    $stmt = $conn->prepare("UPDATE ProductTable SET Quantity = ?, Status = ? WHERE ProductID = ?");
    $stmt->bind_param("isi", $newQuantity, $newStatus, $productID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Product with ID $productID updated successfully.";
        } else {
            echo "No product found with ID $productID or data is already up to date.";
        }
    } else {
        echo "Error executing update: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
