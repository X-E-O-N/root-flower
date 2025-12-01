<?php
session_start();
include 'header.inc';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("<main class='content'><h1>Access Denied</h1></main>");
}

$conn = new mysqli("localhost", "root", "", "root_flower_db", 3307);
$result = $conn->query("SELECT * FROM user ORDER BY id DESC");
?>

<main class="content">
    <h1>User Management</h1>
    <a class="aside-btn" href="admin_user_add.php">Add New User</a>

    <table border='1' class="admin-table">
        <tr>
            <th>ID</th><th>Name</th><th>Username</th><th>Email</th><th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="admin_user_edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="admin_user_delete.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</main>
<?php include 'footer.inc'; ?>
