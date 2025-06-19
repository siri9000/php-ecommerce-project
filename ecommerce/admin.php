<?php
include 'navbar.html';
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    echo "<h3>Access Denied: Admins Only</h3>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Welcome Admin <?= $_SESSION['username']; ?></h2>
    <p>This is the admin dashboard.</p>
</body>
</html>
