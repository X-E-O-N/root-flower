<?php
session_start();
include('header.inc');

// Check if admin session exists
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<main class='content'><h1>Access Denied ❌</h1></main>";
    include('footer.inc');
    exit();
}
?>

<main class="content">
  <h1>Admin Dashboard</h1>

  <form>
    <fieldset>
      <legend>Welcome, Admin 🌸</legend>
      <p>You have successfully logged in as <strong>Administrator</strong>.</p>
      <p>Use the buttons below to view user submissions.</p>
    </fieldset>

    <div class="subres">
      <a href="view_register.php" class="aside-btn">View Register Entries</a>
      <a href="view_enquiry.php" class="aside-btn">View Enquiries</a>
      <a href="view_membership.php" class="aside-btn">View Memberships</a>
      <a href="logout.php" class="aside-btn">Sign Out</a>
    </div>
  </form>
</main>

<?php include('footer.inc'); ?>
