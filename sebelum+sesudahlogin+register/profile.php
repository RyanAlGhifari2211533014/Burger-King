<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Assuming you have the user details stored in the session
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="cssfile.css">
</head>
<body>
    <header>
        <div class="header-container">
            <img src="logo.jpg" class="logo">
            <nav class="navigation">
                <div class="nav-left">
                    <a href="#" class="nav_link">Delivery<br>Order</a>
                    <a href="#" class="nav_link">Get Fresh<br>Promotions</a>
                    <a href="#" class="nav_link">Exclusive<br>Large Order</a>
                </div>
                <div class="nav-right">
                    <a href="home.php" class="nav_link">HOME</a>
                    <a href="logout.php" class="nav_link">LOGOUT</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>
        <!-- <p>User ID: <?php echo htmlspecialchars($userid); ?></p> -->
        <!-- Add more user details as needed -->
    </div>
</body>
</html>
