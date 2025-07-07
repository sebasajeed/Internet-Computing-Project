<!-- This is could be SEBA's file for displaying the inventory table in HTML format. Or else I can merge it with the main inventory.php file -->

<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 30px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #333;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Inventory Table</h2>
    <table>
        <thead>
            <tr>
                <th>Inventory ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price ($)</th>
                <th>Status</th>
                <th>Supplier Name</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'inventory.php'; ?>
        </tbody>
    </table>
</body>
</html>
