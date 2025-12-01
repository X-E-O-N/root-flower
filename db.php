<?php
// Include database connection
require_once 'db_conn.php';

// Create Enquiry table
$sql_enquiry = "CREATE TABLE IF NOT EXISTS enquiry (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    enquiry_type VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_enquiry) === TRUE) {
    
} else {
    echo "Error creating table 'enquiry': " . $conn->error . "<br>";
}

// Create Register table (Workshop Registration)
$sql_register = "CREATE TABLE IF NOT EXISTS register (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    address VARCHAR(40) NOT NULL,
    city VARCHAR(20) NOT NULL,
    state VARCHAR(50) NOT NULL,
    postcode VARCHAR(5) NOT NULL,
    participants INT(2) NOT NULL,
    preferred_date DATE NOT NULL,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_register) === TRUE) {
   
} else {
    echo "Error creating table 'register': " . $conn->error . "<br>";
}

// Create Membership table
$sql_membership = "CREATE TABLE IF NOT EXISTS membership (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    login_id VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_membership) === TRUE) {
    
} else {
    echo "Error creating table 'membership': " . $conn->error . "<br>";
}



// Close connection
$conn->close();
?>
