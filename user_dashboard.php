<?php
session_start();
include('header.inc');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
  die("<main class='content'><h1>Access Denied ❌</h1></main>");
}

$username = $_SESSION['username'];
?>

<main class="content">
 <div class="confirmation-container success">
  <h1>Login Successful ✅</h1>

  <fieldset>
   <legend>Welcome, <?= htmlspecialchars($username); ?>!</legend>
   <p>You are now logged in as a <strong>Root Flower Member</strong>.</p>
   <p>Enjoy browsing our floral collections and workshops.</p>
  </fieldset>

  <div class="confirmation-actions">
   <a href="index.php" class="btn-secondary">Return to Homepage</a>
   <a href="workshops.php" class="btn-secondary">View Workshops</a>
   <a href="logout.php" class="btn-primary">Sign Out</a>
  </div>
 </div>
</main>

<?php include('footer.inc'); ?>