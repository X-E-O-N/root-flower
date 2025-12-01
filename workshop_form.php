<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azmain Taraqqi">
  <meta name="keywords" content="HTML5, Root Flower, Workshops, Form">
  <meta name="description" content="Workshop registration form for Root Flower">
    <link href="styles/style.css" rel="stylesheet">
    <title>Workshop Registration - Root Flower</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">

        <h1>Workshop Registration Form</h1>
        <form method="post" action="register_process.php">
            <fieldset>
                <legend>Personal Details</legend>
                <div class="twintext">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" 
                         value="<?= $_SESSION['first_name'] ?? '' ?>" pattern="[a-zA-Z]{0-25}" required="required">
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" 
                         value="<?= $_SESSION['last_name'] ?? '' ?>" pattern="[a-zA-Z]{0-25}" required="required">
                    </div>
                </div>
                <div class="twintext">
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email"
                         value="<?= $_SESSION['email'] ?? '' ?>" size="20" required="required">
                    </div>
                    <div>
                        <label for="phone">Phone Number:</label>
                        <input type="tel" name="phone" id="phone" pattern="[0-9]{0-10}" placeholder="+60-123456789" required="required">
                    </div>
                </div>
                
            </fieldset>
            <fieldset>
                <legend>Address</legend>
                <div class="singletext">
                    <label for="address">Street Address:</label>
                    <input type="text" name="address" id="address" pattern="[a-zA-Z]{0-40}" size="40" required="required">
                </div>
                <div class="singletext">
                    <label for="city">City/Town:</label>
                    <input type="text" name="city" id="city" pattern="[a-zA-Z]{0-20}" size="20" required="required">
                </div>
                <div class="twintext">
                    <div>
                        <label for="state">State:</label>
                        <select name="state" id="state" required="required">
                            <option value="" selected>None</option>
                            <option value="johor">Johor</option>
                            <option value="kedah">Kedah</option>
                            <option value="kelantan">Kelantan</option>
                            <option value="malacca">Malacca</option>
                            <option value="negeri_sembilan">Negeri Sembilan</option>
                            <option value="pahang">Pahang</option>
                            <option value="penang">Penang</option>
                            <option value="perak">Perak</option>
                            <option value="perlis">Perlis</option>
                            <option value="sabah">Sabah</option>
                            <option value="sarawak">Sarawak</option>
                            <option value="selangor">Selangor</option>
                            <option value="terengganu">Terengganu</option>
                        </select>
                    </div>
                    <div>
                        <label for="postcode">Postcode:</label>
                        <input type="text" name="postcode" id="postcode" pattern="[0-9]{5}" size="5" required="required">
                    </div>
                </div>
                
            </fieldset>
            <fieldset>
                <legend>Workshop Details</legend>
                <div class="twintext">
                    <div>
                        <label for="participants">Number of Participants:</label>
                        <input type="text" name="participants" id="participants" pattern="[0-9]{1-2}" required="required">
                    </div>
                    <div>
                        <label for="date">Preferred Date:</label>
                        <input type="date" name="date" id="date" required="required">
                    </div>
                </div>
                <div class="textareadiv">
                    <textarea name="comments" id="comments" placeholder="Additional comments (if any)"></textarea>
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