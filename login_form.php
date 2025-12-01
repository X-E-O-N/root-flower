<?php session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin_dashboard.php?status=already_logged_in");
        exit();
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: user_dashboard.php?status=already_logged_in");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Login - Root Flower</title>
   <link href="styles/style.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.inc'; ?>
   <main class="content">
       <h1>Login</h1>
       <form method="post" action="login_process.php" novalidate>
           <fieldset>
               <div class="singletext">
                   <label for="username">Username:</label>
                   <input type="text" name="username" id="username" pattern="[A-Za-z0-9]{4,12}" required>
               </div>
               <div class="singletext">
                   <label for="password">Password:</label>
                   <input type="password" name="password" id="password" pattern=".{6,25}" required>
               </div>
           </fieldset>
           <?php if (isset($_GET['logout'])): ?>
           <p style="color: black; font-weight: bold; font-size: 18px;">✅ You have successfully logged out!</p>
           <?php endif; ?>
           <div class="subres">
               <input type="submit" class="aside-btn" value="Login">
               <a href="membership_form.php" class="aside-btn">Sign Up</a>
           </div>
       </form>
   </main>
   <?php include 'footer.inc'; ?>
</body>
</html>
