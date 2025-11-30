<?php
// register.php
// This is the workshop/register form that posts to register_process.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azmain Taraqqi">
    <meta name="keywords" content="HTML5, Root Flower, Workshop, Form">
    <meta name="description" content="Workshop registration form for Root Flower">
    <link href="styles/style.css" rel="stylesheet">
    <title>Workshop Registration - Root Flower</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="content">
        <h1>Workshop Registration Form</h1>

        <form method="post" action="register_process.php" novalidate>
            <fieldset>
                <legend>Personal Details</legend>
                <div class="twintext">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text"
                               name="first_name"
                               id="first_name"
                               pattern="[a-zA-Z]{1,25}"
                               maxlength="25"
                               title="First name should contain only letters (1-25 characters)"
                               required>
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text"
                               name="last_name"
                               id="last_name"
                               pattern="[a-zA-Z]{1,25}"
                               maxlength="25"
                               title="Last name should contain only letters (1-25 characters)"
                               required>
                    </div>
                </div>

                <div class="singletext">
                    <label for="email">Email:</label>
                    <input type="email"
                           name="email"
                           id="email"
                           maxlength="100"
                           title="Please enter a valid email address"
                           required>
                </div>

                <div class="singletext">
                    <label for="phone">Phone:</label>
                    <input type="tel"
                           name="phone"
                           id="phone"
                           pattern="[0-9]{1,10}"
                           maxlength="10"
                           title="Phone number must be up to 10 digits"
                           required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Location</legend>
                <div>
                    <label for="address">Street Address:</label>
                    <input type="text"
                           name="address"
                           id="address"
                           maxlength="40"
                           pattern="[a-zA-Z0-9\s,.\()\/\-]{1,40}"
                           title="Street address (max 40 characters)"
                           required>
                </div>

                <div class="twintext">
                    <div>
                        <label for="city">City / Town:</label>
                        <input type="text"
                               name="city"
                               id="city"
                               pattern="[a-zA-Z\s]{1,20}"
                               maxlength="20"
                               title="City/Town (max 20 letters)"
                               required>
                    </div>
                    <div>
                        <label for="state">State:</label>
                        <input type="text"
                               name="state"
                               id="state"
                               maxlength="40"
                               title="State is required"
                               required>
                    </div>
                </div>

                <div class="singletext">
                    <label for="postcode">Postcode:</label>
                    <input type="text"
                           name="postcode"
                           id="postcode"
                           pattern="[0-9]{5}"
                           maxlength="5"
                           title="Postcode must be 5 digits"
                           required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Workshop Details</legend>
                <div class="singletext">
                    <label for="participants">Number of Participants:</label>
                    <input type="number"
                           name="participants"
                           id="participants"
                           min="1"
                           max="99"
                           pattern="[0-9]{1,2}"
                           title="Number of participants (1-99)"
                           required>
                </div>

                <div class="singletext">
                    <label for="date">Preferred Date:</label>
                    <input type="date"
                           name="date"
                           id="date"
                           title="Select your preferred date"
                           required>
                </div>

                <div>
                    <label for="comments">Comments / Special Requirements:</label>
                    <textarea name="comments"
                              id="comments"
                              rows="4"
                              maxlength="500"
                              placeholder="Any notes we should know (optional)"></textarea>
                </div>
            </fieldset>

            <div class="subres">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>