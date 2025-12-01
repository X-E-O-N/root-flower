<?php
session_start(); 
include('header.inc');
if(!isset($_SESSION["role"])||$_SESSION["role"]!="admin"){die("<main class='content'><h1>Access Denied ❌</h1></main>");}

$conn=new mysqli("localhost","root","","root_flower_db",3307);
$result=$conn->query("SELECT * FROM enquiry");
?>

<main class="content">
<h1>📩 User Enquiries</h1>
<table class="course-table">
<tr><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>

<?php while($r=$result->fetch_assoc()): ?>
<tr>
<td><?= $r['first_name']." ".$r['last_name'] ?></td>
<td><?= $r['email']?></td>
<td><?= $r['phone']?></td>

<td><div style="white-space:pre-wrap;word-break:break-word;max-height:80px;overflow-y:auto;">
<?= $r['comment']?></div></td>

</tr>
<?php endwhile;?>
</table>

<a href="admin_dashboard.php" class="aside-btn">⬅ Back to Dashboard</a>
</main>
<?php include('footer.inc');?>