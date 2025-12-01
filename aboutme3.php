<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Dhirrennraj Vijayaraj">
    <meta name="keywords" content="HTML5, Root Flower, Profile">
    <meta name="description" content="Profile page of Dhirrennraj Vijayaraj">
    <link href="styles/style.css" rel="stylesheet">
    <title>About - Dhirrenn</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">
        <img src="images/Dhirrenn.jpg" alt="Dhirrenn pfp" class="profile-pic">

        <h1 class="profile-name">Dhirrennraj Vijayaraj</h1>
        <p class="profile-student-no">102761273</p>
        <p class="profile-course">Bachelor of Engineering (Robotics and Mechatronics)</p>

        <table class="profile-table">
            <tr>
                <th>Age</th>
                <td>21</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>Male</td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>Malaysian</td>
            </tr>
            <tr>
                <th>Hometown Description</th>
                <td>Tambunan, Sabah (The land below the wind, a valley between mountains).</td>
            </tr>
            <tr>
                <th>Greatest Achievements</th>
                <td>Becoming a Private Pilot, fulfilling my dream of flying aircrafts.</td>
            </tr>
            <tr>
                <th>Favourite Music & Band</th>
                <td>Country Music, and the band Simple Plan.</td>
            </tr>
        </table>

        <a class="profile-mailto" href="mailto:102761273@students.swinburne.edu.my">Email me here</a>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>