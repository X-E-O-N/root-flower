<?php
session_start();
include('header.inc');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    die("<main class='content'><h1>Access Denied ❌</h1></main>");
}

$username = $_SESSION['username'];
?>

<main class="content">
  <h1>Login Successful ✅</h1>

  <form>
    <fieldset>
      <legend>Welcome, <?php echo $username; ?>!</legend>
      <p>You are now logged in as a <strong>Root Flower Member</strong>.</p>
      <p>Enjoy browsing our floral collections and workshops.</p>
    </fieldset>

    <div class="subres">
      <a href="index.php" class="aside-btn">Return to Homepage</a>
      <a href="workshops.php" class="aside-btn">View Workshops</a>
      <a href="logout.php" class="aside-btn">Sign Out</a>
    </div>
  </form>
</main>

<?php include('footer.inc'); ?>
