<?php
// logout.php - Destroys the session and redirects
session_start();

// 1. Clear all session variables
$_SESSION = [];

// 2. Destroy the session cookie (Best practice for complete logout)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Destroy the session
session_destroy();

// 4. Redirect to Login Page
header("Location: /se.php");
exit();
?>