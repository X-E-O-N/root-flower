<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Enquiry Form - Root Flower</title>
   <link href="styles/style.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.inc'; ?>

    <main class="content">
        <h1>Enquiry Form</h1>
        <form method="post" action="mailto:105804016@students.swinburne.edu.my">
            <fieldset>
                <legend>Personal Details</legend>
                <div class="twintext">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" pattern="[a-zA-Z]{0-25}" required="required">
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" pattern="[a-zA-z]{0-25}" required="required">
                    </div>
                </div>
                <div class="twintext">
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required="required">
                    </div>
                    <div>
                        <label for="phone">Phone Number:</label>
                        <input type="tel" name="phone" id="phone" pattern="[0-9]{10,12}" placeholder="+60-123456789" required="required">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Enquiry Details</legend>
                <div class="selectdiv">
                    <label for="enquiry-type">Enquiry Type:</label>
                    <select name="enquiry-type" id="enquiry-type" required="required">
                        <option value="" selected>None</option>
                        <option value="product">Product</option>
                        <option value="workshop">Workshop</option>
                        <option value="membership">Membership</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="textareadiv">
                    <label for="comment">Enquiry:</label>
                    <textarea name="comment" id="comment" required="required"></textarea>
                </div>
            </fieldset>
            <div class="subres">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </main>

   <?php include('footer.inc'); ?>
</body>
</html>
