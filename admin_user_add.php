<?php
session_start();
include 'header.inc';
if ($_SESSION['role'] !== 'admin') die("Access Denied");

$conn = new mysqli("localhost","root","","root_flower_db",3307);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = trim($_POST['first_name']);
    $last = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (first_name,last_name,username,email,password) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $first,$last,$username,$email,$password);
    $stmt->execute();

    header("Location: admin_users.php?added=1");
    exit();
}
?>

<main class="content">
    <h1>Add New User</h1>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" required>

        <label>Last Name:</label>
        <input type="text" name="last_name" required>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <div class="subres">
            <input type="submit" value="Create User">
        </div>
    </form>
</main>

<?php include 'footer.inc'; ?>
