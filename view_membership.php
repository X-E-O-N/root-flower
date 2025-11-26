<?php
session_start(); 
include('header.inc');
if(!isset($_SESSION["role"])||$_SESSION["role"]!="admin"){die("<main class='content'><h1>Access Forbidden 🚫</h1></main>");}

$conn=new mysqli("localhost","root","","root_flower",3307);
$r=$conn->query("SELECT * FROM user");
?>

<main class="content">
<h1>👥 Registered Members</h1>
<table class="course-table">
<tr><th>Username</th><th>Email</th><th>Created</th></tr>

<?php while($row=$r->fetch_assoc()): ?>
<tr>
<td><?= $row['username']?></td>
<td><?= $row['email']?></td>
<td><?= $row['created_at']?></td>
</tr>
<?php endwhile;?>
</table>

<a href="admin_dashboard.php" class="aside-btn">⬅ Back to Dashboard</a>
</main>
<?php include('footer.inc');?>