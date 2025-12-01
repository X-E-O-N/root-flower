<?php
session_start();
include 'header.inc';

$conn = new mysqli("localhost", "root", "", "root_flower_db", 3306);

if($conn->connect_error){
   die("<main class='content'>
           <div class='confirmation-container error'>
               <h1>Database Connection Failed ❌</h1>
               <div class='confirmation-message'>
                   <p>" . htmlspecialchars($conn->connect_error) . "</p>
               </div>
           </div>
         </main>");
}

$first   = trim($_POST['first_name'] ?? '');
$last    = trim($_POST['last_name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$type    = trim($_POST['enquiry-type'] ?? '');
$comment = trim($_POST['comment'] ?? '');

$ip = $_SERVER['REMOTE_ADDR'];
$window_seconds = 600; // 10 minutes
$max_attempts = 5;

$check = $conn->prepare("SELECT attempts, last_attempt FROM spam_block WHERE ip = ?");
$check->bind_param("s", $ip);
$check->execute();
$check->store_result();
$check->bind_result($attempts, $last_attempt_time);

if ($check->num_rows > 0) {
    $check->fetch();
    $time_since_last = time() - strtotime($last_attempt_time);

    if ($time_since_last < $window_seconds && $attempts >= $max_attempts) {
        echo "<main class='content'>
                <div class='confirmation-container error'>
                    <h1>Slow Down ⏳</h1>
                    <div class='confirmation-message'>
                        <p>You have submitted too many enquiries recently.</p>
                        <p>Please wait a few minutes before trying again.</p>
                    </div>
                    <div class='confirmation-actions'>
                        <a href='index.php' class='btn-secondary'>Return Home</a>
                    </div>
                </div>
              </main>";
        include 'footer.inc';
        exit();
    }
    
    if ($time_since_last < $window_seconds) {
        $update = $conn->prepare("UPDATE spam_block SET attempts = attempts + 1 WHERE ip = ?");
        $update->bind_param("s", $ip);
        $update->execute();
    } else {
        $reset = $conn->prepare("UPDATE spam_block SET attempts = 1 WHERE ip = ?");
        $reset->bind_param("s", $ip);
        $reset->execute();
    }

} else {
    $insert_ip = $conn->prepare("INSERT INTO spam_block (ip, attempts) VALUES (?, 1)");
    $insert_ip->bind_param("s", $ip);
    $insert_ip->execute();
}


if(empty($first) || empty($last) || empty($email) || empty($phone) || empty($type) || empty($comment)){
   echo "<main class='content'>
           <div class='confirmation-container error'>
               <h1>Submission Failed ❌</h1>
               <div class='confirmation-message'>
                   <p>Please fill in <strong>all input fields</strong> before submitting.</p>
               </div>
               <div class='confirmation-actions'>
                   <a href='enquiry_form.php' class='btn-secondary'>Return to Form</a>
               </div>
           </div>
         </main>";
   include('footer.inc');
   exit();
}

$sql = "INSERT INTO enquiry (first_name, last_name, email, phone, enquiry_type, comment)
       VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if(!$stmt){
   die("<main class='content'>
           <div class='confirmation-container error'>
               <h1>Database Error ❌</h1>
               <div class='confirmation-message'>
                   <p>Failed to prepare statement: ".htmlspecialchars($conn->error)."</p>
               </div>
           </div>
         </main>");
}
$stmt->bind_param("ssssss", $first, $last, $email, $phone, $type, $comment);
$stmt->execute();

echo "<main class='content'>
        <div class='confirmation-container success'>
            <h1>Enquiry Submitted Successfully 📩</h1>
            <div class='confirmation-details'>
                <h3>Thank You, " . htmlspecialchars($first) . "!</h3>
                <p>Your enquiry has been received and stored in our database. We will contact you via email soon.</p>
                <ul>
                    <li>Enquiry Type: <strong>" . htmlspecialchars($type) . "</strong></li>
                </ul>
            </div>
            <div class='confirmation-actions'>
                <a href='index.php' class='btn-primary'>Return to Homepage</a>
            </div>
        </div>
      </main>";

$stmt->close();
$conn->close();

include 'footer.inc';
?>