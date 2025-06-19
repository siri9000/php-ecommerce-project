<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerce");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Just a file name or path, not uploading actual file

    $sql = "INSERT INTO products (name, description, price, image)
            VALUES ('$name', '$description', '$price', '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Product added successfully! <a href='products.php'>View Products</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>

<h2>Add New Product</h2>
<form method="POST">
    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price (₹):</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Image filename (e.g. phone.jpg):</label><br>
    <input type="text" name="image"><br><br>

    <input type="submit" value="Add Product">
</form>
