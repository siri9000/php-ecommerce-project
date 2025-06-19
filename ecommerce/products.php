<?php
include 'navbar.html';
$conn = new mysqli("localhost", "root", "", "ecommerce");
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Product List</h2>
    <?php while($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; padding:10px; margin:10px; display:inline-block;">
            <h3><?= $row['name']; ?></h3>
            <img src="images/<?= $row['image']; ?>" width="150"><br>
            <p>Price: ₹<?= $row['price']; ?></p>
        </div>
    <?php endwhile; ?>
</body>
</html>
