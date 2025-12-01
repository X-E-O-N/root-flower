CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    login_id VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
