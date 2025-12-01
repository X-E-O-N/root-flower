<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azmain Taraqqi">
    <meta name="keywords" content="HTML5, Root Flower, Profile">
    <meta name="description" content="Profile page of Azmain Taraqqi">
    <link href="styles/style.css" rel="stylesheet">
    <title>About - Azmain</title>
</head>
<body>
    <?php include('header.inc'); ?>

    <main class="content">
        <img class="pfp" src="images/Azmain.jpg">
        <div class="profile-info">
            <p class="profile-header"><strong>Azmain Taraqqi</strong></p>
            <p class="student-id"><strong>Student ID:</strong> 105804016</p>
            <p class="course"><strong>Course:</strong> Bachelor in Computer Science</p>
        </div>
        <table class="profile-table">
            <tr>
                <th>Age</th>
                <td>22</td>
            </tr>
            <tr>
                <th>Self Description</th>
                <td>Compsci undergrad hailing all the way from Bangladesh. Likes wandering around.</td>
            </tr>
            <tr>
                <th>Hometown Description</th>
                <td>Dhaka city. A jampacked metropolis of thrill, restlessness and violence. There is beauty in its chaos.</td>
            </tr>
            <tr>
                <th>Greatest Achievements</th>
                <td>Becoming a self taught guitarist and culinary hobbyist. Scoring an 8 on IELTS without practice. Staying sane and relatively well adjusted throughout early adulthood.</td>
            </tr>
        </table>
        <div class="profile-info">
            <p><strong>Email:</strong> <a href="mailto:105804016@students.swinburne.edu.my">105804016@students.swinburne.edu.my</a></p>
        </div>
    </main>

    <?php include('footer.inc'); ?>
</body>
</html>