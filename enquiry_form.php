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
       <form method="post" action="enquiry_process.php" novalidate>
           <fieldset>
               <legend>Personal Details</legend>
               <div class="twintext">
                   <div>
                       <label for="first_name">First Name:</label>
                       <input type="text" name="first_name" id="first_name"
                        value="<?= htmlspecialchars($_SESSION['first_name'] ?? '') ?>" pattern="[A-Za-z]{1,25}" required>
                   </div>
                   <div>
                       <label for="last_name">Last Name:</label>
                       <input type="text" name="last_name" id="last_name"
                       value="<?= htmlspecialchars($_SESSION['last_name'] ?? '') ?>" pattern="[A-Za-z]{1,25}" required>
                   </div>
               </div>
               <div class="twintext">
                   <div>
                       <label for="email">Email:</label>
                       <input type="email" name="email" id="email"
                       value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>
                   </div>
                   <div>
                       <label for="phone">Phone Number:</label>
                       <input type="tel" name="phone" id="phone" pattern="[0-9]{8,15}" placeholder="+60-123456789" required>
                   </div>
               </div>
           </fieldset>
           <fieldset>
               <legend>Enquiry Details</legend>
               <div class="selectdiv">
                   <label for="enquiry-type">Enquiry Type:</label>
                   <select name="enquiry-type" id="enquiry-type" required>
                       <option value="" selected>None</option>
                       <option value="product">Product</option>
                       <option value="workshop">Workshop</option>
                       <option value="membership">Membership</option>
                       <option value="other">Other</option>
                   </select>
               </div>
               <div class="textareadiv">
                   <label for="comment">Enquiry:</label>
                   <textarea name="comment" id="comment" required></textarea>
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
