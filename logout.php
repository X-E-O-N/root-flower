<?php
session_start();
session_unset();
session_destroy();

// Redirect back to login page with message
header("Location: login_form.php?logout=1");
exit();
?>