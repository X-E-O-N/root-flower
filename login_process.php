<?php
session_start();
include 'header.inc';

$host = "localhost"; $port = 3306; $user = "root"; $pass = ""; $dbname = "root_flower_db";
$conn = new mysqli($host, $user, $pass, $dbname, $port);
if ($conn->connect_error) {
    die("<main class='content'><h2>Database Connection Failed ❌</h2><p>" . htmlspecialchars($conn->connect_error) . "</p></main>");
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<main class='content'><h1>Login Error</h1><p>Please fill in both username and password.</p><p><a href='login_form.php' class='aside-btn'>Return to Login</a></p></main>";
    include 'footer.inc';
    exit();
}

$admin_sql = "SELECT username, password FROM admin WHERE username = ?";
$stmt = $conn->prepare($admin_sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();

if ($row = $res->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['role'] = "admin";
        $_SESSION['username'] = $row['username'];
        header("Location: admin_dashboard.php");
        exit();
    }
}
$stmt->close();

$user_sql = "SELECT first_name, last_name, username, email, password FROM user WHERE username = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();

if ($row = $res->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['role'] = "user";
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        header("Location: user_dashboard.php");
        exit();
    }
}

echo "<main class='content'><h1>Login Failed ❌</h1><p>The username or password you entered is incorrect.</p><p><a href='login_form.php' class='aside-btn'>Try Again</a></p></main>";
include 'footer.inc';
$conn->close();
?>
