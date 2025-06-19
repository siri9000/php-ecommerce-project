<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_role'])) {
    echo "<h2>Access Denied: Please log in.</h2>";
    exit();
}

// Check if role is 'user'
if ($_SESSION['user_role'] === 'user') {
    echo "<h2>Welcome, User!</h2>";
    echo "<p>You are logged in as: " . $_SESSION['user_role'] . "</p>";
    echo "<p><a href='logout.php'>Logout</a></p>";
} else {
    echo "<h2>Access Denied: Users Only</h2>";
}
?>
