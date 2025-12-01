<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied");
}

$id = intval($_GET['id']);

$conn = new mysqli("localhost", "root", "", "root_flower", 3307);
$stmt = $conn->prepare("DELETE FROM user WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: admin_users.php?deleted=1");
exit();
?>
