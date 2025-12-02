<?php
session_start();
require_once 'header.inc';

require_once 'db_conn.php'; // Ensure $conn is available

// 1. Get and sanitize POST data
$first = trim($_POST['first_name'] ?? '');
$last  = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$postcode = trim($_POST['postcode'] ?? '');
$participants = trim($_POST['participants'] ?? '');
$workshop_date = trim($_POST['date'] ?? ''); // 'date' matches form field
$comments = trim($_POST['comments'] ?? '');

// Save to session for form repopulation on error
$_SESSION['first_name'] = $first;
$_SESSION['last_name'] = $last;
$_SESSION['email'] = $email;

// 2. Validate required fields
$errors = [];
if ($first === "" || !preg_match('/^[A-Za-z]{1,25}$/', $first)) $errors[] = "First name is required and must be 1-25 letters.";
if ($last === "" || !preg_match('/^[A-Za-z]{1,25}$/', $last)) $errors[] = "Last name is required and must be 1-25 letters.";
if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is required and must be valid.";
if ($phone === "" || !preg_match('/^[0-9]{1,10}$/', $phone)) $errors[] = "Phone is required and must be 1-10 digits.";
if ($address === "" || !preg_match('/^[a-zA-Z0-9\s,.()\/\-]{1,40}$/', $address)) $errors[] = "Address is required and must be 1-40 valid characters.";
if ($city === "" || !preg_match('/^[a-zA-Z\s]{1,20}$/', $city)) $errors[] = "City is required and must be 1-20 letters/spaces.";
if ($state === "" || $state == "None") $errors[] = "State must be selected.";
if ($postcode === "" || !preg_match('/^[0-9]{5}$/', $postcode)) $errors[] = "Postcode is required and must be exactly 5 digits.";
if ($participants === "" || !is_numeric($participants) || $participants < 1 || $participants > 99) $errors[] = "Participants must be a number 1-99.";
if ($workshop_date === "" || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $workshop_date)) $errors[] = "Workshop date is required and should be valid.";

echo "<main class='content'>";
if ($errors) {
    echo "<div class='confirmation-container error'>
            <h1>Submission Error ❌</h1>
            <ul>";
    foreach ($errors as $err) echo "<li>" . htmlspecialchars($err) . "</li>";
    echo    "</ul>
            <div class='confirmation-actions'>
                <a href='register.php' class='btn-secondary'>Return to Form</a>
            </div>
          </div>";
    echo "</main>";
    include 'footer.inc';
    exit();
}

// 3. Prepare/execute SQL
try {
    $stmt = $conn->prepare(
        "INSERT INTO register (first_name, last_name, email, phone, address, city, state, postcode, participants, workshop_date, comments)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssssssiss", $first, $last, $email, $phone, $address, $city, $state, $postcode, $participants, $workshop_date, $comments);

    if ($stmt->execute()) {
        // Success
        session_unset();
        echo "<div class='confirmation-container success'>
                <h1>Registration Recorded ✔</h1>
                <div class='confirmation-details'>
                    <h3>Thank you " . htmlspecialchars($first) . "!</h3>
                    <p>Your workshop booking has been successfully submitted.</p>
                </div>
                <div class='confirmation-actions'>
                    <a class='btn-primary' href='index.php'>Back to Home</a>
                </div>
              </div>";
    } else {
        // SQL error
        echo "<div class='confirmation-container error'>
                <h1>Submission Failed ❌</h1>
                <div class='confirmation-message'>
                    <p>Database Error: " . htmlspecialchars($conn->error) . "</p>
                </div>
                <div class='confirmation-actions'>
                    <a class='btn-secondary' href='register.php'>Try Again</a>
                </div>
              </div>";
    }
    $stmt->close();
} catch (Exception $e) {
    echo "<div class='confirmation-container error'>
            <h1>Submission Failed ❌</h1>
            <div class='confirmation-message'>
                <p>Unexpected Error: " . htmlspecialchars($e->getMessage()) . "</p>
            </div>
            <div class='confirmation-actions'>
                <a class='btn-secondary' href='register.php'>Try Again</a>
            </div>
          </div>";
}

$conn->close();
echo "</main>";
include 'footer.inc';
?>