<?php include 'header.inc'; ?>
<main class="content">
    <h1>Enhancements</h1>
    
    <section class="enhancements-section">
        <h2>1. User Management Module (Admin Only)</h2>
        <p>
            <strong>Description:</strong>
            A full **CRUD** (Create, Read, Update, Delete) user management system was added for the administrator, allowing them to view all registered users, add users manually, update their information, and delete accounts. This provides the admin with complete control over user accounts, making the system more realistic and robust.
        </p>
        <p>
            <strong>Associated Code:</strong>
            Relies on **secure prepared statements** and **password hashing** in `admin_user_add.php`, `admin_user_edit.php`, and `admin_user_delete.php`.
        </p>
        <p>
            <strong>Associated Files:</strong>
            <code>admin_users.php</code>, <code>admin_user_add.php</code>, <code>admin_user_edit.php</code>, <code>admin_user_delete.php</code>
        </p>
        <p>
            <strong>Source:</strong>
            Beyond the curriculum. Implements standard security and CRUD practices.
        </p>
    </section>

    <section class="enhancements-section">
        <h2>2. Anti-Spam Rate Limiter</h2>
        <p>
            <strong>Description:</strong>
            Prevents automated spam or repeated submissions of the enquiry form using an **IP-based rate limiter**. If a user submits too many enquiries within a short time (5 attempts in 10 minutes), they are temporarily blocked. This protects server resources and improves overall security.
        </p>
        <p>
            <strong>Associated Code:</strong>
            IP tracking and timestamp logic added to <code>enquiry_process.php</code>.
        </p>
        <p>
            <strong>Associated Database Table:</strong>
            <code>spam_block (ip, attempts, last_attempt)</code>
        </p>
        <p>
            <strong>Source:</strong>
            Beyond the curriculum (Server-side defense mechanism).
        </p>
    </section>

    <section class="enhancements-section">
        <h2>3. Password Hashing + Login Security</h2>
        <p>
            <strong>Description:</strong>
            All user and admin passwords are hashed using PHP’s **<code>password_hash()</code>** and verified using **<code>password_verify()</code>**. This ensures that passwords are never stored in plain text, greatly improving security.
        </p>
        <p>
            <strong>Associated Code:</strong>
            <code>password_hash()</code> in `membership_process.php` and `admin_user_add.php`. <code>password_verify()</code> in `login_process.php`.
        </p>
        <p>
            <strong>Security Improvements:</strong>
            Plain-text passwords removed; all login checks are secured.
        </p>
        <p>
            <strong>Source:</strong>
            <a href="https://www.php.net/manual/en/function.password-hash.php">PHP Manual: password_hash</a>
        </p>
    </section>

    <section class="enhancements-section">
        <h2>4. Output Escaping and Input Validation</h2>
        <p>
            <strong>Description:</strong>
            All user inputs across the website use **server-side validation** (e.g., checking for empty fields) and **sanitisation** (`trim()`). Additionally, all dynamic output to the HTML pages is **escaped** using `htmlspecialchars()` to prevent Cross-Site Scripting (XSS) attacks.
        </p>
        <p>
            <strong>Associated Code:</strong>
            Widespread use of <code>htmlspecialchars()</code> in all `view_*.php` files and dashboards.
        </p>
        <p>
            <strong>Benefits:</strong>
            Prevents HTML/XSS injection attacks and ensures data integrity.
        </p>
        <p>
            <strong>Source:</strong>
            Beyond the curriculum (Defense against XSS).
        </p>
    </section>

    <section class="enhancements-section">
        <h2>5. Session-Based Access Control</h2>
        <p>
            <strong>Description:</strong>
            Both the user and admin dashboards are now protected by **session rules**. Unauthorized visitors cannot access protected pages (like `admin_dashboard.php` or `user_dashboard.php`) even via a direct URL, strengthening privacy and security.
        </p>
        <p>
            <strong>Associated Code:</strong>
            Conditional check <code>if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')</code> at the top of protected pages.
        </p>
        <p>
            <strong>Benefits:</strong>
            Secures admin-only and member-only resources.
        </p>
        <p>
            <strong>Source:</strong>
            Beyond the curriculum (Role-based access control).
        </p>
    </section>
    
    <a href="index.php" class="aside-btn" style="margin-top:20px;">Back to Home</a>
</main>
<?php include 'footer.inc'; ?>