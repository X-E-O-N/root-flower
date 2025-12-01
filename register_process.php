<?php
session_start();
include 'header.inc';

if (empty($first) || empty($last) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($postcode) || empty($workshop_date)) {
    echo "<main class='content'>
            <div class='confirmation-container error'>
                <h1>Submission Error ❌</h1>
                <div class='confirmation-message'>
                    <p>Please fill in all required fields.</p>
                </div>
                <div class='confirmation-actions'>
                    <a href='register.php' class='btn-secondary'>Return to Form</a>
                </div>
            </div>
          </main>";
    include 'footer.inc';
    exit();
}

echo "<main class='content'>";
if($stmt->execute()){
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
}else{
    echo "<div class='confirmation-container error'>
            <h1>Submission Failed ❌</h1>
            <div class='confirmation-message'>
                <p>Database Error: ".htmlspecialchars($conn->error)."</p>
            </div>
            <div class='confirmation-actions'>
                <a class='btn-secondary' href='register.php'>Try Again</a>
            </div>
          </div>";
}
echo "</main>";

$stmt->close(); $conn->close();
include 'footer.inc';
?>