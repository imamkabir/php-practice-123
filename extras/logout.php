<?php
session_start();

class Session {
    public static function kill() {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', 1, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }

        session_destroy();
    }
}

Session::kill();

header("Location: /se.php");
exit();
?>