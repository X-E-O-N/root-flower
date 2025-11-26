<?php
session_start();
include('header.inc');

// Database connection setup
$host = "localhost";
$port = 3307;
$user = "root";
$pass = "";
$dbname = "root_flower";

$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("<main class='content'><h2>Database Connection Failed ❌</h2><p>" . $conn->connect_error . "</p></main>");
}

// Collect input data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Basic validation (missing fields)
if (empty($username) || empty($password)) {
    echo "
    <main class='content'>
      <h1>Login Error</h1>
      <form>
        <fieldset>
          <legend>Missing Fields</legend>
          <p>Please fill in both <strong>username</strong> and <strong>password</strong>.</p>
        </fieldset>
        <div class='subres'>
          <a href='login_form.php' class='aside-btn'>Return to Login</a>
        </div>
      </form>
    </main>";
    include('footer.inc');
    exit();
}

/* CHECK ADMIN LOGIN*/
$admin_sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$stmt = $conn->prepare($admin_sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$admin_result = $stmt->get_result();

if ($admin_result->num_rows > 0) {

    // Store session values
    $_SESSION['role'] = "admin";
    $_SESSION['username'] = $username;

    // Redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}

/* CHECK USER LOGIN */
$user_sql = "SELECT first_name, last_name, username, email FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result->num_rows > 0) {

    $row = $user_result->fetch_assoc(); // fetch full profile

    $_SESSION['role']       = "user";
    $_SESSION['username']   = $row['username'];
    $_SESSION['email']      = $row['email'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name']  = $row['last_name'];

    header("Location: user_dashboard.php");
    exit();
}

/*  INVALID LOGIN*/
echo "
<main class='content'>
  <h1>Login Failed ❌</h1>
  <form>
    <fieldset>
      <legend>Invalid Credentials</legend>
      <p>The username or password you entered is incorrect.</p>
      <p>Please try again below.</p>
    </fieldset>
    <div class='subres'>
      <a href='login_form.php' class='aside-btn'>Try Again</a>
    </div>
  </form>
</main>";

include('footer.inc');
?>
