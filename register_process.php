<?php
session_start();
include 'header.inc';

$host = "localhost"; $port = 3306; $user = "root"; $pass = ""; $dbname = "root_flower_db";
$conn = new mysqli($host, $user, $pass, $dbname, $port);
if ($conn->connect_error) {
    die("<main class='content'><h1>Database Error ❌</h1><p>".htmlspecialchars($conn->connect_error)."</p></main>");
}

$first = trim($_POST['first_name'] ?? '');
$last = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$postcode = trim($_POST['postcode'] ?? '');
$participants = intval($_POST['participants'] ?? 0);
$workshop_date = trim($_POST['date'] ?? '');
$comments = trim($_POST['comments'] ?? '');

if (empty($first) || empty($last) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($postcode) || empty($workshop_date)) {
    echo "<main class='content'><h1>Submission Error ❌</h1><p>Please fill in all required fields.</p><p><a href='workshop_form.php' class='aside-btn'>Return to Form</a></p></main>";
    include 'footer.inc';
    exit();
}

$sql = "INSERT INTO register (first_name,last_name,email,phone,address,city,state,postcode,participants,workshop_date,comments)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssisss", $first,$last,$email,$phone,$address,$city,$state,$postcode,$participants,$workshop_date,$comments);

echo "<main class='content'>";
if($stmt->execute()){
    echo "<h1>Registration Recorded ✔</h1>
    <fieldset><legend>Thank you " . htmlspecialchars($first) . "!</legend>
    <p>Your workshop booking has been successfully submitted.</p></fieldset>
    <div class='subres'><a class='aside-btn' href='index.php'>Back to Home</a></div>";
}else{
    echo "<h1>Submission Failed ❌</h1><p>".htmlspecialchars($conn->error)."</p>";
}
echo "</main>";

$stmt->close(); $conn->close();
include 'footer.inc';
?>
