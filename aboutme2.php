<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Wei Hang Lee">
    <meta name="keywords" content="HTML5, Root Flower, Profile">
    <meta name="description" content="Profile page of Wei Hang Lee">
    <link href="styles/style.css" rel="stylesheet">
    <title>About - WHL</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">
        <img src="images/Jimmy.jpg" alt="WHL pfp" class="profile-pic">

        <h1 class="profile-name">Wei Hang Lee</h1>
        <p class="profile-student-no">102788735</p>
        <p class="profile-course">Bachelor of Computer Science</p>

        <table class="profile-table">
            <tr>
                <th>Age</th>
                <td>24</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>Male</td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>Chinese-Malaysian</td>
            </tr>
            <tr>
                <th>Hometown Description</th>
                <td>Suburban</td>
            </tr>
            <tr>
                <th>Greatest Achievements</th>
                <td>Represented Dreaming Souls band for winning Battle of the Band championship during first semester of 2024</td>
            </tr>
            <tr>
                <th>List of Fav Bands</th>
                <td>Alvvays, Faith No More, Interpol, Alice in Chains and MASS OF THE FERMENTING DREGS</td>
            </tr>
            
        </table>

        <a class="profile-mailto" href="mailto:102788735@students.swinburne.edu.my">Email me here</a>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>
