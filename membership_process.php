<?php
session_start();
require_once 'header.inc';

require_once 'db_conn.php'; // Ensure $conn is available

echo "<main class='content'>";

// 1. Get and sanitize form data
$first = trim($_POST['first_name'] ?? '');
$last = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Save for repopulation if needed
$_SESSION['first_name'] = $first;
$_SESSION['last_name'] = $last;
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;

// 2. Simple required-fields validation
$errors = [];
if ($first === "" || !preg_match('/^[A-Za-z]{1,25}$/', $first)) $errors[] = "First name is required and must be 1-25 letters.";
if ($last === "" || !preg_match('/^[A-Za-z]{1,25}$/', $last)) $errors[] = "Last name is required and must be 1-25 letters.";
if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is required and must be valid.";
if ($username === "" || !preg_match('/^[A-Za-z0-9]{4,12}$/', $username)) $errors[] = "Username is required and must be 4-12 letters/numbers.";
if (empty($password) || strlen($password) < 6) $errors[] = "Password is required and must be at least 6 characters.";

if ($errors) {
    echo "<div class='confirmation-container error'>
            <h1>Registration Failed ❌</h1>
            <ul>";
    foreach ($errors as $err) echo "<li>" . htmlspecialchars($err) . "</li>";
    echo    "</ul>
            <div class='confirmation-actions'>
                <a href='membership.php' class='btn-secondary'>Try Again</a>
            </div>
          </div>";
    echo "</main>";
    include 'footer.inc';
    exit();
}

// 3. Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 4. Prepare SQL insert - check unique username/email
try {
    // Check for existing username or email in membership or user table
    $checkStmt1 = $conn->prepare("SELECT id FROM membership WHERE username=? OR email=?");
    $checkStmt1->bind_param('ss', $username, $email);
    $checkStmt1->execute();
    $checkStmt1->store_result();
    $existsInMembership = $checkStmt1->num_rows > 0;
    $checkStmt1->close();

    $checkStmt2 = $conn->prepare("SELECT id FROM user WHERE username=? OR email=?");
    $checkStmt2->bind_param('ss', $username, $email);
    $checkStmt2->execute();
    $checkStmt2->store_result();
    $existsInUser = $checkStmt2->num_rows > 0;
    $checkStmt2->close();

    if ($existsInMembership || $existsInUser) {
        echo "<div class='confirmation-container error'>
                <h1>Registration Failed ❌</h1>
                <div class='confirmation-message'>Username or Email already exists!</div>
                <div class='confirmation-actions'>
                    <a href='membership.php' class='btn-secondary'>Try Again</a>
                </div>
              </div>";
        echo "</main>";
        include 'footer.inc';
        exit();
    }

    // Insert into membership table
    $stmt1 = $conn->prepare("INSERT INTO membership (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssss", $first, $last, $email, $username, $hashed_password);

    // Insert into user table
    $stmt2 = $conn->prepare("INSERT INTO user (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt2->bind_param("sssss", $first, $last, $email, $username, $hashed_password);

    $success1 = $stmt1->execute();
    $success2 = $stmt2->execute();

    if ($success1 && $success2) {
        session_unset();
        echo "<div class='confirmation-container success'>
                <h1>Membership Created Successfully 🎉</h1>
                <div class='confirmation-details'>
                    <h3>Welcome, " . htmlspecialchars($first) . "!</h3>
                    <p>You have successfully registered as a <strong>Root Flower Member</strong>.</p>
                    <ul>
                        <li>Your username: <strong>" . htmlspecialchars($username) . "</strong></li>
                    </ul>
                </div>
                <div class='confirmation-actions'>
                    <a href='login.php' class='btn-primary'>Go to Login</a>
                </div>
              </div>";
    } else {
        // Roll back membership entry if user insert failed
        if ($success1 && !$success2) {
            $conn->query("DELETE FROM membership WHERE username = '" . $conn->real_escape_string($username) . "'");
        }
        echo "<div class='confirmation-container error'>
                <h1>Registration Failed ❌</h1>
                <div class='confirmation-message'>
                    <p>Database Error: " . htmlspecialchars($conn->error) . "</p>
                </div>
                <div class='confirmation-actions'>
                    <a href='membership.php' class='btn-secondary'>Try Again</a>
                </div>
              </div>";
    }

    $stmt1->close();
    $stmt2->close();

} catch (Exception $e) {
    echo "<div class='confirmation-container error'>
            <h1>Registration Failed ❌</h1>
            <div class='confirmation-message'>
                <p>Unexpected Error: " . htmlspecialchars($e->getMessage()) . "</p>
            </div>
            <div class='confirmation-actions'>
                <a href='membership.php' class='btn-secondary'>Try Again</a>
            </div>
          </div>";
}

$conn->close();
echo "</main>";
include 'footer.inc';
?>