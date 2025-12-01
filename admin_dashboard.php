<?php
session_start();
include 'header.inc';

// Check if admin session exists
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
   echo "<main class='content'><h1>Access Denied ❌</h1></main>";
   include 'footer.inc';
   exit();
}
?>

<main class="content">
 <h1>Admin Dashboard</h1>
 <form>
   <fieldset>
     <legend>Welcome, Admin 🌸</legend>
     <p>You are logged in as <strong>Administrator</strong>.</p>
     <p>To view submissions, use the direct URLs (for marking) or use your database management interface:</p>
     <ul>
       <li>View register entries: <code>/view_register.php</code></li>
       <li>View enquiries: <code>/view_enquiry.php</code></li>
       <li>View memberships: <code>/view_membership.php</code></li>
     </ul>
   </fieldset>

   <div class="subres">
     <a href="logout.php" class="aside-btn">Sign Out</a>
   </div>
 </form>
</main>

<?php include 'footer.inc'; ?>
