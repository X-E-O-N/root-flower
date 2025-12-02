<?php
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
</head>
<header class="white-text">
    <div class="top">
        <img class="logo" src="styles/images/logo.jpg" alt="Root Flower Logo">
        <div id="title"><a href="index.php">root flower</a></div>
    </div>
    <nav>
        <ul class="nav-menu">
            <li class="dropdown">
                Products
                <ul class="dropdown-content">
                    <li><a href="product1.php">Hand Bouquets</a></li>
                    <li><a href="product2.php">CNY Decorations</a></li>
                    <li><a href="product3.php">Grand Openings</a></li>
                    <li><a href="product4.php">Graduation</a></li>
                </ul>
            </li>
            <li class="dropdown">
                Activities
                <ul class="dropdown-content">
                    <li><a href="workshops.php">Workshops</a></li>
                    <li><a href="promo.php">Promotions</a></li>
                </ul>
            </li>
            <li class="dropdown">
                Registration
                <ul class="dropdown-content">
                    <li><a href="register.php">Workshop Registration</a></li>
                    <li><a href="membership.php">Membership Registration</a></li>
                </ul>
            </li>
            <li>
                <a href="enquiry.php">Enquiry Form</a>
            </li>
        </ul>
        <div id="login">
            <?php if (isset($_SESSION['role'])): ?>
                <span>Welcome, <?= htmlspecialchars($_SESSION['username'] ?? $_SESSION['first_name'] ?? '') ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>
</header>