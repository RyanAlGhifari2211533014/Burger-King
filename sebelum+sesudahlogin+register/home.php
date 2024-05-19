<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burger King</title>
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
                    <?php if(isset($_SESSION['username'])): ?>
                        <a href="profile.php" class="nav_link">PROFILE</a>
                    <?php else: ?>
                        <a href="login.php" class="nav_link">LOGIN</a>
                    <?php endif; ?>
                    <a href="#" class="nav_link"><img src="cart.png" alt="Cart" class="cart-icon"></a>
                </div>
            </nav>
        </div>
    </header>

    <div class="slider">
        <div class="slide fade">
            <img src="promo1.jpg" alt="Promo 1" class="slide-image">
            <div class="slide-text">
                <h2>Deal 1</h2>
                <p>Get the best deals on our new menu</p>
            </div>
        </div>
        <div class="slide fade">
            <img src="promo2.jpg" alt="Promo 2" class="slide-image">
            <div class="slide-text">
                <h2>Deal 2</h2>
                <p>Enjoy delicious burgers with great offers</p>
            </div>
        </div>
        <div class="slide fade">
            <img src="promo3.jpg" alt="Promo 3" class="slide-image">
            <div class="slide-text">
                <h2>Deal 3</h2>
                <p>Order now and get exclusive discounts</p>
            </div>
        </div>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <script src="jsfile.js"></script>
</body>
</html>
