<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Form - Root Flower</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.inc'; ?>

    <main class="content">
        <h1>Membership Registration Form</h1>
        <form method="post" action="membership_process.php" novalidate>
            <fieldset>
                <legend>Personal Details</legend>
                <div class="twintext">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name"
                            value="<?= htmlspecialchars($_SESSION['first_name'] ?? '') ?>"
                            pattern="[A-Za-z]{1,25}" required>
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name"
                            value="<?= htmlspecialchars($_SESSION['last_name'] ?? '') ?>"
                            pattern="[A-Za-z]{1,25}" required>
                    </div>
                </div>

                <div class="singletext">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email"
                        value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Account Details</legend>
                <div class="twintext">
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username"
                            value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>"
                            pattern="[A-Za-z0-9]{4,12}" required>
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password"
                            pattern=".{6,25}" required>
                    </div>
                </div>
            </fieldset>

            <div class="subres">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>
