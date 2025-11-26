<?php
session_start();
include('header.inc');

// Database connection
$host = "localhost";
$port = 3307;
$user = "root";
$pass = "";
$dbname = "root_flower";

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("<main class='content'><h1>Database Connection Failed ❌</h1><p>" . $conn->connect_error . "</p></main>");
}

// Collect POST data
$first = $_POST['first_name'] ?? '';
$last = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Basic validation
if (empty($first) || empty($last) || empty($email) || empty($username) || empty($password)) {
    echo "
    <main class='content'>
        <h1>Submission Error ❌</h1>
        <form>
            <fieldset>
                <legend>Missing Fields</legend>
                <p>Please fill in <strong>all required fields</strong>.</p>
            </fieldset>
            <div class='subres'>
                <a href='membership_form.php' class='aside-btn'>Return to Form</a>
            </div>
        </form>
    </main>";
    include('footer.inc');
    exit();
}

echo "<main class='content'>";

/* =============== INSERT INTO MEMBERSHIP TABLE =============== */
$sql_membership = "INSERT INTO membership (first_name, last_name, email, username, password)
                   VALUES (?, ?, ?, ?, ?)";
$stmt1 = $conn->prepare($sql_membership);
$stmt1->bind_param("sssss", $first, $last, $email, $username, $password);


/* =============== INSERT INTO USER TABLE =============== */
$sql_user = "INSERT INTO user (first_name, last_name, username, email, password)
             VALUES (?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql_user);
$stmt2->bind_param("sssss", $first, $last, $username, $email, $password);


/* =============== EXECUTE BOTH =============== */
if ($stmt1->execute() && $stmt2->execute()) {
    echo "
        <h1>Membership Created Successfully 🎉</h1>
        <form>
            <fieldset>
                <legend>Welcome, $first!</legend>
                <p>You have successfully registered as a <strong>Root Flower Member!<strong></p>
                <p>You now have a login account under the username: <strong>$username</strong></p>
            </fieldset>

            <div class='subres'>
                <a href='login_form.php' class='aside-btn'>Go to Login</a>
            </div>
        </form>
    ";
} else {
    echo "
        <h1>Registration Failed ❌</h1>
        <form>
            <fieldset>
                <legend>Database Error</legend>
                <p>Something went wrong. Please try again.</p>
                <p>Error: " . $conn->error . "</p>
            </fieldset>

            <div class='subres'>
                <a href='membership_form.php' class='aside-btn'>Try Again</a>
            </div>
        </form>
    ";
}

echo "</main>";

$stmt1->close();
$stmt2->close();
$conn->close();

include('footer.inc');
?>
