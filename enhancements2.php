<?php include 'header.inc'; ?>
<main class="content">
    <h1>Enhancements Implemented</h1>

    <section>
        <h2>1. User Management Module (Admin Only)</h2>
        <p><strong>Description:</strong> A full CRUD (Create, Read, Update, Delete) user management system was added for the administrator. The admin can view all registered users, add users manually, update their information, and delete accounts.</p>

        <p><strong>Files Added:</strong></p>
        <ul>
            <li><code>admin_users.php</code> — lists all users</li>
            <li><code>admin_user_add.php</code> — add a new user</li>
            <li><code>admin_user_edit.php</code> — edit existing user</li>
            <li><code>admin_user_delete.php</code> — delete user</li>
        </ul>

        <p><strong>How it improves the website:</strong></p>
        <ul>
            <li>Gives the admin complete control over user accounts</li>
            <li>Makes the system more realistic and closer to real-world e-commerce websites</li>
            <li>Uses secure prepared statements and password hashing</li>
        </ul>
    </section>

    <section>
        <h2>2. Anti-Spam Rate Limiter</h2>
        <p><strong>Description:</strong> Prevents automated spam or repeated submissions of the enquiry form using an IP-based rate limiter. If a user submits too many enquiries within a short time, they are temporarily blocked.</p>

        <p><strong>Database Table Added:</strong></p>
        <code>spam_block (ip, attempts, last_attempt)</code>

        <p><strong>How it works:</strong></p>
        <ul>
            <li>Tracks the number of attempts per IP address</li>
            <li>Enforces a time window (10 minutes) and max attempts (5)</li>
            <li>Temporarily blocks the user when threshold is exceeded</li>
        </ul>

        <p><strong>Benefits:</strong></p>
        <ul>
            <li>Prevents spam bot abuse</li>
            <li>Protects server resources</li>
            <li>Improves overall security and reliability</li>
        </ul>
    </section>

    <section>
        <h2>3. Password Hashing + Login Security Enhancements</h2>
        <p><strong>Description:</strong> All user and admin passwords are hashed using PHP’s <code>password_hash()</code> and verified using <code>password_verify()</code>. SQL injection protection is implemented everywhere via prepared statements.</p>

        <p><strong>Security Improvements:</strong></p>
        <ul>
            <li>Plain-text passwords removed completely</li>
            <li>All login checks secured using password hashing</li>
            <li>All SQL statements converted to prepared queries</li>
        </ul>
    </section>

    <section>
        <h2>4. Input Validation and Sanitisation</h2>
        <p><strong>Description:</strong> All user inputs across the website now use regex patterns, server-side sanitisation (<code>trim()</code>), and HTML escaping (<code>htmlspecialchars()</code>).</p>

        <p><strong>Benefits:</strong></p>
        <ul>
            <li>Prevents HTML injection attacks</li>
            <li>Prevents invalid data from entering the database</li>
            <li>Keeps all forms compliant with HTML5 standards</li>
        </ul>
    </section>

    <section>
        <h2>5. Session-Based Access Control</h2>
        <p><strong>Description:</strong> Both user and admin dashboards are now protected by session rules. Unauthorized visitors cannot access protected pages even via direct URL.</p>

        <p><strong>Benefits:</strong></p>
        <ul>
            <li>Strengthens privacy</li>
            <li>Secures admin-only resources</li>
            <li>Follows real-world authentication standards</li>
        </ul>
    </section>

    <p>All enhancements above were implemented on top of the minimum assignment requirements and improve security, usability, and functionality.</p>
</main>
<?php include 'footer.inc'; ?>
