<?php
session_start();

// ============================================
// OOP IMPLEMENTATION
// ============================================

// 1. USER CLASS - Represents a user entity
class User {
    private $username;
    private $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function verifyPassword($inputPassword) {
        return $this->password === $inputPassword;
    }
}

// 2. DATABASE CLASS - Simulates user storage
class Database {
    private $users = [];
    
    public function __construct() {
        // Initialize with default user
        $this->users[] = new User('imam', 'Imam.imam4321');
    }
    
    public function findUser($username) {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }
        return null;
    }
}

// 3. AUTH CLASS - Handles authentication logic
class Auth {
    private $database;
    
    public function __construct(Database $database) {
        $this->database = $database;
    }
    
    public function attempt($username, $password) {
        $user = $this->database->findUser($username);
        
        if ($user && $user->verifyPassword($password)) {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }
    
    public function logout() {
        session_destroy();
    }
}

// 4. LOGIN CONTROLLER - Manages login flow
class LoginController {
    private $auth;
    private $error = null;
    
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }
    
    public function handleLogin() {
        if (isset($_POST['submit'])) {
            if ($this->auth->attempt($_POST['username'], $_POST['password'])) {
                header('Location: /extras/dashboard.php');
                exit();
            } else {
                $this->error = "Mission Failed: Access Denied";
            }
        }
    }
    
    public function getError() {
        return $this->error;
    }
}

// ============================================
// INITIALIZE OOP STRUCTURE
// ============================================
$database = new Database();
$auth = new Auth($database);
$loginController = new LoginController($auth);
$loginController->handleLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wayne Secure Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bat-black: #050505;
            --bat-gold: #cfb53b; 
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: var(--bat-black);
            cursor: url("data:image/svg+xml,%3Csvg width='32' height='18' viewBox='0 0 32 18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16 1.5C16 1.5 12 6 8 8C4 10 0 8 0 8L2 14L8 11C8 11 12 14 16 18C20 14 24 11 24 11L30 14L32 8C32 8 28 10 24 8C20 6 16 1.5 16 1.5Z' fill='%230a0a0a' stroke='%23333' stroke-width='0.5'/%3E%3C/svg%3E") 16 9, auto;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('extras/login.jpg?v=<?= time() ?>') no-repeat center center fixed; 
            background-size: cover;
            z-index: -2;
            animation: slowZoom 30s ease-in-out infinite alternate;
        }

        body::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at center, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.9) 100%);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.15); }
        }

        .login-card {
            background: rgba(0, 0, 0, 0.6); 
            width: 100%;
            max-width: 400px;
            padding: 60px 40px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
            color: white;
            transform: scale(0.9);
            opacity: 0.5;
            filter: grayscale(100%);
            transition: all 2s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .login-card:hover {
            background: rgba(30, 30, 35, 0.4);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            transform: scale(1.0);
            opacity: 1;
            filter: grayscale(0%);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.8), 
                        inset 0 0 40px rgba(255, 255, 255, 0.05);
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-size: 36px;
            color: #888;
            margin-bottom: 5px;
            letter-spacing: 2px;
            font-weight: 700;
            transition: all 1.5s ease;
        }

        .login-card:hover h1 {
            color: var(--bat-gold);
            text-shadow: 0 0 20px rgba(207, 181, 59, 0.6);
        }

        p.subtitle {
            color: rgba(255, 255, 255, 0.3);
            font-size: 15px;
            margin-bottom: 40px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            transition: all 1.5s ease;
        }
        
        .login-card:hover p.subtitle {
            color: #fff;
            text-shadow: 0 0 10px rgba(255,255,255,0.5);
        }

        .input-group {
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 18px 25px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 18px;
            color: #fff;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.0);
            border-radius: 50px;
            outline: none;
            opacity: 0; 
            transform: translateY(20px);
            transition: all 1.5s ease;
        }

        .login-card:hover input[type="text"],
        .login-card:hover input[type="password"] {
            opacity: 1;
            transform: translateY(0);
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.03);
            transition-delay: 0.3s;
        }

        input:focus {
            background: rgba(0, 0, 0, 0.5) !important;
            border-color: var(--bat-gold) !important;
            box-shadow: 0 0 30px rgba(207, 181, 59, 0.2);
            transition-delay: 0s !important;
        }

        input[type="submit"] {
            background: transparent;
            color: transparent;
            border: 1px solid transparent;
            border-radius: 50px;
            padding: 18px;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
            font-family: 'Cinzel', serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 1.5s ease;
        }

        .login-card:hover input[type="submit"] {
            opacity: 1;
            transform: translateY(0);
            color: var(--bat-gold);
            border-color: var(--bat-gold);
            transition-delay: 0.8s;
        }

        input[type="submit"]:hover {
            background: var(--bat-gold) !important;
            color: #000 !important;
            box-shadow: 0 0 50px rgba(207, 181, 59, 0.8);
            transform: translateY(-2px);
            transition-delay: 0s !important;
        }

        .error-msg {
            color: #ff4d4d;
            background: rgba(255, 0, 0, 0.1);
            padding: 12px;
            border-radius: 15px;
            margin-bottom: 25px;
            display: block;
            border: 1px solid rgba(255, 77, 77, 0.3);
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Gotham Gate</h1>
        <p class="subtitle">System Dormant</p>

        <?php if($loginController->getError()): ?>
            <span class="error-msg">⚠ <?= $loginController->getError() ?></span>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Identity" required autocomplete="off">
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Passkey" required>
            </div>
            <input type="submit" value="LOGIN" name="submit">
        </form>
    </div>

</body>
</html>