<?php
session_start();
include 'header.inc';

// DB connection
$host = "localhost"; $port = 3307; $user = "root"; $pass = ""; $dbname = "root_flower";
$conn = new mysqli($host, $user, $pass, $dbname, $port);
if ($conn->connect_error) {
    die("<main class='content'><h1>Database Connection Failed ❌</h1><p>" . htmlspecialchars($conn->connect_error) . "</p></main>");
}

// Collect and sanitize
$first    = trim($_POST['first_name'] ?? '');
$last     = trim($_POST['last_name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Basic validation
if (empty($first) || empty($last) || empty($email) || empty($username) || empty($password)) {
    echo "<main class='content'><h1>Submission Error ❌</h1><p>Please fill in all required fields.</p><p><a href='membership_form.php' class='aside-btn'>Return to Form</a></p></main>";
    include 'footer.inc';
    exit();
}

// Check username uniqueness
$chk = $conn->prepare("SELECT id FROM user WHERE username = ?");
$chk->bind_param("s", $username);
$chk->execute();
$chk->store_result();
if ($chk->num_rows > 0) {
    echo "<main class='content'><h1>Registration Error</h1><p>Username already exists. Please choose another username.</p><p><a href='membership_form.php' class='aside-btn'>Try Again</a></p></main>";
    include 'footer.inc';
    $chk->close();
    $conn->close();
    exit();
}
$chk->close();

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert into membership
$sql1 = "INSERT INTO membership (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("sssss", $first, $last, $email, $username, $hashed);

// Insert into user (for login)
$sql2 = "INSERT INTO user (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("sssss", $first, $last, $username, $email, $hashed);

// Execute
echo "<main class='content'>";
if ($stmt1->execute() && $stmt2->execute()) {
    echo "<h1>Membership Created Successfully 🎉</h1>
    <fieldset><legend>Welcome, " . htmlspecialchars($first) . "!</legend>
    <p>You have successfully registered as a <strong>Root Flower Member</strong>.</p>
    <p>Your username: <strong>" . htmlspecialchars($username) . "</strong></p></fieldset>
    <div class='subres'><a href='login_form.php' class='aside-btn'>Go to Login</a></div>";
} else {
    echo "<h1>Registration Failed ❌</h1><p>Database Error: " . htmlspecialchars($conn->error) . "</p><div class='subres'><a href='membership_form.php' class='aside-btn'>Try Again</a></div>";
}
echo "</main>";

$stmt1->close();
$stmt2->close();
$conn->close();

include 'footer.inc';
?>
