<?php
session_start();
include '../config.php';

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    );

    // Check if cart already exists
    if (isset($_SESSION['cart'])) {
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $cart_item;
        }
    } else {
        $_SESSION['cart'][] = $cart_item;
    }

    header("Location: products.php");
    exit();
}

// Fetch products
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<h2>Product List</h2>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div>
        <h4><?php echo $row['name']; ?></h4>
        <p>₹<?php echo $row['price']; ?></p>

        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
    </div>
<?php } ?>

<a href="cart.php">Go to Cart 🛒</a>
