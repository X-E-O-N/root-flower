<?php
session_start();
include('header.inc');

// Database connection
$conn = new mysqli("localhost", "root", "", "root_flower", 3307);

if($conn->connect_error){
    die("<main class='content'><h1>Database Connection Failed ❌</h1><p>" . $conn->connect_error . "</p></main>");
}

// Get form input values
$first   = $_POST['first_name'] ?? '';
$last    = $_POST['last_name'] ?? '';
$email   = $_POST['email'] ?? '';
$phone   = $_POST['phone'] ?? '';
$type    = $_POST['enquiry-type'] ?? '';
$comment = $_POST['comment'] ?? '';

// Validate required fields
if(empty($first) || empty($last) || empty($email) || empty($phone) || empty($type) || empty($comment)){
    echo "
    <main class='content'>
        <h1>Submission Failed ❌</h1>
        <form>
            <fieldset>
                <legend>Missing Information</legend>
                <p>Please fill in <strong>all input fields</strong> before submitting.</p>
            </fieldset>
            <div class='subres'>
                <a href='enquiry_form.php' class='aside-btn'>Return to Form</a>
            </div>
        </form>
    </main>";
    include('footer.inc');
    exit();
}

// Insert into enquiry table
$sql = "INSERT INTO enquiry (first_name, last_name, email, phone, enquiry_type, comment)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if(!$stmt){
    die("<main class='content'><h1>Database Error ❌</h1><p>".$conn->error."</p></main>");
}

$stmt->bind_param("ssssss", $first, $last, $email, $phone, $type, $comment);
$stmt->execute();

// SUCCESS DISPLAY
echo "
<main class='content'>
    <h1>Enquiry Submitted Successfully 📩</h1>
    <form>
        <fieldset>
            <legend>Thank You, $first!</legend>
            <p>Your enquiry has been received and stored in our database.</p>
            <p>We will contact you via email soon.</p>
        </fieldset>
        <div class='subres'>
            <a href='index.php' class='aside-btn'>Return to Homepage</a>
        </div>
    </form>
</main>";

$stmt->close();
$conn->close();

include('footer.inc');
?>
