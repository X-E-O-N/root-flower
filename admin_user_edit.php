<?php
session_start();
include 'header.inc';

if ($_SESSION['role'] !== 'admin') die("Access Denied");

$conn = new mysqli("localhost", "root", "", "root_flower_db", 3306);

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT first_name, last_name, username, email FROM user WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) die("User Not Found");

// UPDATE HANDLER
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = trim($_POST['first_name']);
    $last = trim($_POST['last_name']);
    $email = trim($_POST['email']);

    $update = $conn->prepare("UPDATE user SET first_name=?, last_name=?, email=? WHERE id=?");
    $update->bind_param("sssi", $first, $last, $email, $id);
    $update->execute();

    header("Location: admin_users.php?updated=1");
    exit();
}
?>

<main class="content">
    <h1>Edit User</h1>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <div class="subres">
            <input type="submit" value="Save Changes">
        </div>
    </form>
</main>

<?php include 'footer.inc'; ?>
