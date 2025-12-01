<?php
session_start(); 
include('header.inc');
if(!isset($_SESSION["role"])||$_SESSION["role"]!="admin"){die("<main class='content'><h1>Access Denied ❌</h1></main>");}

$conn=new mysqli("localhost","root","","root_flower",3307);
$result=$conn->query("SELECT * FROM register");
?>

<main class="content">
<h1>📄 Workshop Registrations</h1>
<table class="course-table">

<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Workshop</th><th>Comments</th></tr>

<?php while($r=$result->fetch_assoc()): ?>
<tr>
<td><?= $r['first_name']." ".$r['last_name'] ?></td>
<td><?= $r['email']?></td>
<td><?= $r['phone']?></td>

<td><div style="white-space:pre-wrap;word-wrap:break-word;max-width:200px;">
<?= $r['address'].", ".$r['city'].", ".$r['state']." ".$r['postcode'] ?></div></td>

<td style="white-space:nowrap;"><?= $r['workshop_date']?></td>

<td><div style="white-space:pre-wrap;word-break:break-word;max-height:70px;overflow-y:auto;">
<?= $r['comments']?></div></td>

</tr>
<?php endwhile; ?>
</table>

<a href="admin_dashboard.php" class="aside-btn" style="margin-top:20px;">⬅ Back to Dashboard</a>
</main>
<?php include('footer.inc');?>
