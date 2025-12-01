<?php
session_start();
include('header.inc');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die("<main class='content'><h1>Access Denied ❌</h1></main>");
}
?>

<main class="content">
 <h1>Admin Dashboard</h1>

 <div class="float-aside">
  <h2>Management Tools</h2>
  <div class="admin-actions">
   <a href="view_membership.php" class="aside-btn">View Members</a>
   <a href="view_register.php" class="aside-btn">View Registrations</a>
   <a href="view_enquiry.php" class="aside-btn">View Enquiries</a>
   <a href="admin_users.php" class="aside-btn">Manage Users/Admins</a>
  </div>
 </div>

 <div class="float-aside">
  <h2>System Tools</h2>
  <div class="admin-actions">
   <a href="db_conn.php" class="aside-btn">Test DB Connection</a>
   <a href="logout.php" class="aside-btn">Sign Out</a>
  </div>
 </div>
</main>

<?php include('footer.inc'); ?>