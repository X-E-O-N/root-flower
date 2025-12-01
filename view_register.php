<?php
session_start();
include('header.inc');
if(!isset($_SESSION["role"])||$_SESSION["role"]!="admin"){die("<main class='content'><h1>Access Denied ❌</h1></main>");}

$conn=new mysqli("localhost","root","","root_flower_db", 3306);
$result=$conn->query("SELECT * FROM register");
?>

<main class="content">
<div class="course-table-section">
    <h1>📄 Workshop Registrations</h1>
    <table class="course-table">

    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Workshop</th><th>Comments</th></tr>

    <?php while($r=$result->fetch_assoc()): ?>
    <tr>
    <td><?= htmlspecialchars($r['first_name']." ".$r['last_name']) ?></td>
    <td><?= htmlspecialchars($r['email']) ?></td>
    <td><?= htmlspecialchars($r['phone']) ?></td>

    <td><div style="white-space:pre-wrap;word-wrap:break-word;max-width:200px;">
    <?= htmlspecialchars($r['address']).", ".htmlspecialchars($r['city']).", ".htmlspecialchars($r['state'])." ".htmlspecialchars($r['postcode']) ?></div></td>

    <td style="white-space:nowrap;"><?= htmlspecialchars($r['workshop_date']) ?></td>

    <td><div style="white-space:pre-wrap;word-break:break-word;max-height:70px;overflow-y:auto;">
    <?= htmlspecialchars($r['comments']) ?></div></td>

    </tr>
    <?php endwhile; ?>
    </table>
</div>

<a href="admin_dashboard.php" class="aside-btn" style="margin-top:20px;">⬅ Back to Dashboard</a>
</main>
<?php include('footer.inc');?>