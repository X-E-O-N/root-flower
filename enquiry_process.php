<?php
session_start();
include 'header.inc';

// Database connection
$conn = new mysqli("localhost", "root", "", "root_flower_db", 3306);

if($conn->connect_error){
   die("<main class='content'><h1>Database Connection Failed ❌</h1><p>" . htmlspecialchars($conn->connect_error) . "</p></main>");
}

// Get form input values (sanitise)
$first   = trim($_POST['first_name'] ?? '');
$last    = trim($_POST['last_name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$type    = trim($_POST['enquiry-type'] ?? '');
$comment = trim($_POST['comment'] ?? '');

// Anti-Spam Rate Limiter
$ip = $_SERVER['REMOTE_ADDR'];
$window_seconds = 600; // 10 minutes
$max_attempts = 5;

// Check previous attempts
$check = $conn->prepare("SELECT attempts, last_attempt FROM spam_block WHERE ip = ?");
$check->bind_param("s", $ip);
$check->execute();
$check->store_result();
$check->bind_result($attempts, $last_attempt_time);

if ($check->num_rows > 0) {
    $check->fetch();
    $time_since_last = time() - strtotime($last_attempt_time);

    if ($time_since_last < $window_seconds && $attempts >= $max_attempts) {
        echo "<main class='content'><h1>Slow Down ⏳</h1>
        <p>You have submitted too many enquiries recently.</p>
        <p>Please wait a few minutes before trying again.</p>
        <a href='index.php' class='aside-btn'>Return Home</a></main>";
        include 'footer.inc';
        exit();
    }
    
    // Update attempts
    if ($time_since_last < $window_seconds) {
        $update = $conn->prepare("UPDATE spam_block SET attempts = attempts + 1 WHERE ip = ?");
        $update->bind_param("s", $ip);
        $update->execute();
    } else {
        // reset expired window
        $reset = $conn->prepare("UPDATE spam_block SET attempts = 1 WHERE ip = ?");
        $reset->bind_param("s", $ip);
        $reset->execute();
    }

} else {
    // first time submission
    $insert_ip = $conn->prepare("INSERT INTO spam_block (ip, attempts) VALUES (?, 1)");
    $insert_ip->bind_param("s", $ip);
    $insert_ip->execute();
}


// Validate required fields
if(empty($first) || empty($last) || empty($email) || empty($phone) || empty($type) || empty($comment)){
   echo "<main class='content'><h1>Submission Failed ❌</h1><p>Please fill in <strong>all input fields</strong> before submitting.</p><p><a href='enquiry_form.php' class='aside-btn'>Return to Form</a></p></main>";
   include('footer.inc');
   exit();
}

// Insert into enquiry table
$sql = "INSERT INTO enquiry (first_name, last_name, email, phone, enquiry_type, comment)
       VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if(!$stmt){
   die("<main class='content'><h1>Database Error ❌</h1><p>".htmlspecialchars($conn->error)."</p></main>");
}
$stmt->bind_param("ssssss", $first, $last, $email, $phone, $type, $comment);
$stmt->execute();

// SUCCESS DISPLAY
echo "<main class='content'><h1>Enquiry Submitted Successfully 📩</h1><fieldset><legend>Thank You, " . htmlspecialchars($first) . "!</legend><p>Your enquiry has been received and stored in our database. We will contact you via email soon.</p></fieldset><div class='subres'><a href='index.php' class='aside-btn'>Return to Homepage</a></div></main>";

$stmt->close();
$conn->close();

include 'footer.inc';
?>
