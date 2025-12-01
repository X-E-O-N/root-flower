<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Chan Chun Hui">
    <meta name="keywords" content="HTML5, Root FLower, Profile">
    <meta name="description" content="Profile page of Chan Chun Hui">
    <link href="styles/style.css" rel="stylesheet">
    <title>About - CCH</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">
        <img src="images/RX8.jpg" alt="CCH pfp" class="profile-pic">

        <h1 class="profile-name">Chan Chun Hui</h1>
        <p class="profile-student-no">101235900</p>
        <p class="profile-course">Robotic and Mechatronic Engineering</p>

        <table class="profile-table">
            <tr>
                <th>Age</th>
                <td>23</td>
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
                <td>Oil Town</td>
            </tr>
            <tr>
                <th>Greatest Achievements</th>
                <td>Raced in a GT3RS and won</td>
            </tr>
            <tr>
                <th>List of Fav Movies</th>
                <td>John Wick franchise, Transformers, and Pacific Rim</td>
            </tr>
            
        </table>

        <a class="profile-mailto" href="mailto:101235900@students.swinburne.edu.my">Email me here</a>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>