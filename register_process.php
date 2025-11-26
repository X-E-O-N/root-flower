<?php
session_start();
include('header.inc');

$host = "localhost";
$port = 3307;
$user = "root";
$pass = "";
$dbname = "root_flower";
$conn = new mysqli($host, $user, $pass, $dbname, $port);

if($conn->connect_error){
    die("<main class='content'><h1>Database Error ❌</h1><p>".$conn->connect_error."</p></main>");
}

$first = $_POST['first_name'] ?? '';
$last = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$postcode = $_POST['postcode'] ?? '';
$participants = $_POST['participants'] ?? '';
$workshop_date = $_POST['date'] ?? '';
$comments = $_POST['comments'] ?? '';

$sql = "INSERT INTO register (first_name,last_name,email,phone,address,city,state,postcode,participants,workshop_date,comments)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssisss", $first,$last,$email,$phone,$address,$city,$state,$postcode,$participants,$workshop_date,$comments);

echo "<main class='content'>";
if($stmt->execute()){
    echo "
    <h1>Registration Recorded ✔</h1>
    <fieldset>
        <legend>Thank you $first!</legend>
        <p>Your workshop booking has been successfully submitted.</p>
    </fieldset>
    <div class='subres'>
        <a class='aside-btn' href='index.php'>Back to Home</a>
    </div>";
}else{
    echo "<h1>Submission Failed ❌</h1><p>".$conn->error."</p>";
}
echo "</main>";

$stmt->close(); $conn->close();
include('footer.inc');
?>