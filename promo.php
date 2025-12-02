<?php
session_start();
include('header.inc');

// 1. Database Connection
$conn = new mysqli("localhost", "root", "", "root_flower_db", 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Handle Actions (Admin Only)
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$msg = "";

if ($isAdmin) {
    // Handle ADD Promotion
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_promo'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $img = $conn->real_escape_string($_POST['image_path']);
        // Allowing HTML tags for description/details so Admin can format text
        $desc = $conn->real_escape_string($_POST['description']);
        $details = $conn->real_escape_string($_POST['details_html']);

        $sql = "INSERT INTO promotions (title, image_path, description, details_html) VALUES ('$title', '$img', '$desc', '$details')";
        
        if ($conn->query($sql)) {
            $msg = "<p style='color:green; font-weight:bold;'>✅ Promotion added successfully!</p>";
        } else {
            $msg = "<p style='color:red;'>❌ Error adding promotion: " . $conn->error . "</p>";
        }
    }

    // Handle DELETE Promotion
    if (isset($_GET['delete_id'])) {
        $id = intval($_GET['delete_id']);
        $sql = "DELETE FROM promotions WHERE id = $id";
        if ($conn->query($sql)) {
            $msg = "<p style='color:green; font-weight:bold;'>🗑️ Promotion deleted.</p>";
        } else {
            $msg = "<p style='color:red;'>❌ Error deleting: " . $conn->error . "</p>";
        }
    }
}
?>

<main class="content">
    <h1>Promotions & Special Offers</h1>
    
    <?php if ($isAdmin): ?>
    <section class="course-table-section" style="background-color: #ffe6e6; border-color: #cc0000;">
        <h2>🛠️ Admin: Manage Promotions</h2>
        <?= $msg ?>
        <form method="post" action="promo.php">
            <div class="singletext">
                <label>Promotion Title:</label>
                <input type="text" name="title" required placeholder="e.g. Valentine's Sale">
            </div>
            <div class="singletext">
                <label>Image Path:</label>
                <input type="text" name="image_path" required placeholder="images/Promo/filename.jpg">
            </div>
            <div class="textareadiv">
                <label>Description:</label>
                <textarea name="description" rows="3" required placeholder="<p>Enter main description...</p>"></textarea>
            </div>
            <div class="textareadiv">
                <label>Details / How to Redeem:</label>
                <textarea name="details_html" rows="5" required placeholder="<h3>How to join:</h3><ul><li>Step 1...</li></ul>"></textarea>
            </div>
            <div class="subres" style="margin-top:10px;">
                <input type="submit" name="add_promo" value="Add Promotion" class="aside-btn">
            </div>
        </form>
    </section>
    <?php endif; ?>

    <section class="promo-section">
        <h2>Latest Deals</h2>

        <?php
        $result = $conn->query("SELECT * FROM promotions ORDER BY id DESC");
        
        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
            <figure class="promofig">
                <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="promo-img">
                <figcaption>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <h2><?= htmlspecialchars($row['title']) ?></h2>
                        <?php if ($isAdmin): ?>
                            <a href="promo.php?delete_id=<?= $row['id'] ?>" 
                               onclick="return confirm('Delete this promotion?');"
                               style="color:red; font-size:0.8em; text-decoration:underline;">[Delete]</a>
                        <?php endif; ?>
                    </div>

                    <div><?= $row['description'] ?></div>

                    <div style="margin-top:15px; background:rgba(255,255,255,0.5); padding:10px; border-radius:5px;">
                        <?= $row['details_html'] ?>
                    </div>
                </figcaption>
            </figure>
        <?php 
            endwhile;
        else:
            echo "<p>No active promotions at the moment. Stay tuned!</p>";
        endif;
        $conn->close();
        ?>
    </section>

    <section class="promo-section" id="how-to-redeem">
        <h2>How to Redeem</h2>
        <ol>
            <li>Pick your favorite promotion from the list above.</li>
            <li>Contact us via <strong>Instagram DM</strong> or fill in our <a href="enquiry.php">Enquiry Form</a>.</li>
            <li>Mention the promo name.</li>
            <li>Confirm your details and enjoy your discounted blooms!</li>
        </ol>
    </section>

    <aside class="promo-aside promo-section">
        <h2>Join & Save 🌸</h2>
        <p>Become a Root Flower member to enjoy exclusive discounts, seasonal promotions and more!</p>
        <a href="membership.php" class="aside-btn">Join Membership</a>
        <a href="workshops.php" class="aside-btn">View Workshops</a>
    </aside>
</main>

<?php include('footer.inc'); ?>