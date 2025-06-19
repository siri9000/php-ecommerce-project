<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "ecommerce";

// Connect to DB
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from DB
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $row['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_role'] = $row['role'];

        // Redirect based on role
        if ($row['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
        exit();
    } else {
        echo "❌ Invalid password!";
    }
} else {
    echo "❌ User not found!";
}

$conn->close();
?>
