<!DOCTYPE html>
<html>
<head>
    <title>My E-Commerce Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .main-content {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to My E-Commerce Website</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="pages/products.php">Products</a>
        <a href="#">Contact</a>
    </nav>

    <div class="main-content">
        <h2>Explore Our Products!</h2>
        <p>Click on "Products" in the menu to view all available items.</p>
    </div>

</body>
</html>