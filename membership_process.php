<?php
session_start();
include 'header.inc';

echo "<main class='content'>";
if ($stmt1->execute() && $stmt2->execute()) {
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
                <a href='login_form.php' class='btn-primary'>Go to Login</a>
            </div>
          </div>";
} else {
    // FAILURE
    echo "<div class='confirmation-container error'>
            <h1>Registration Failed ❌</h1>
            <div class='confirmation-message'>
                <p>Database Error: " . htmlspecialchars($conn->error) . "</p>
            </div>
            <div class='confirmation-actions'>
                <a href='membership_form.php' class='btn-secondary'>Try Again</a>
            </div>
          </div>";
}
echo "</main>";

$stmt1->close();
$stmt2->close();
$conn->close();

include 'footer.inc';
?>