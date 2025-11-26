<?php 
session_start(); 
include('header.inc');

// If already logged in, do not allow login page again
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin_dashboard.php?status=already_logged_in");
        exit();
    }
    if ($_SESSION['role'] === 'user') {
        header("Location: user_dashboard.php?status=already_logged_in");
        exit();
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azmain Taraqqi">
    <meta name="keywords" content="HTML5, Root Flower, Login, Form">
    <meta name="description" content="Login page for Root Flower">
    <link href="styles/style.css" rel="stylesheet">
    <title>Login - Root Flower</title>
</head>

</body>
    <main class="content">
        
        <h1>Login</h1>
        <form method="post" action="login_process.php">
            <fieldset>
                <div class="singletext">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" pattern="[a-zA-Z]{0-10}" required="required">
                </div>
                <div class="singletext">
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" pattern="[a-zA-Z]{0-25}" required="required">
                </div>
            </fieldset>
            <?php if (isset($_GET['logout'])): ?> 
            <p style="color: black; font-weight: bold; font-size: 18px;"> 
             ✅ You have successfully logged out!
            </p>
            <?php endif; ?>
            <div class="subres">
                <input type="submit" class = "aside-btn" value="Login">
                <a href="membership_form.php" class="aside-btn">Sign Up</a>
            </div>
        </form>
    </main>
<?php include('footer.inc'); ?>
    
</body>
</html>