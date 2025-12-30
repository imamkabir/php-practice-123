<?php
// OOP: A dedicated class to handle session logic (DRY Principle)
class SessionManager {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    public static function getUsername() {
        return self::isLoggedIn() ? htmlspecialchars($_SESSION['username']) : 'Guest';
    }
}

// Initialize Session
SessionManager::start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vice City Ultimate</title>
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-pink: #ff00d4;
            --neon-blue: #00e5ff;
            --glass-bg: rgba(255, 255, 255, 0.05); /* ULTRA TRANSPARENT */
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        body {
            font-family: 'Grand Hotel', cursive;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: #000;
        }

        /* 1. CINEMATIC BACKGROUND (Ken Burns Zoom) */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('img.jpg?v=<?= time() ?>') no-repeat center center fixed; 
            background-size: cover;
            z-index: -2;
            animation: slowZoom 30s ease-in-out infinite alternate;
        }

        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.15); }
        }

        /* 2. OVERLAY */
        body::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
            pointer-events: none;
        }

        /* 3. ULTRA LIQUID CARD */
        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(25px); /* Heavy blur makes text readable */
            -webkit-backdrop-filter: blur(25px);
            
            width: 100%;
            max-width: 500px;
            padding: 70px 40px;
            border-radius: 50px;
            
            /* Glass Edges */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.4);
            border-left: 1px solid rgba(255, 255, 255, 0.4);
            
            /* Neon Pulse Shadow */
            box-shadow: 0 0 40px rgba(255, 0, 212, 0.2);
            animation: pulseGlow 4s infinite alternate, slideIn 1.5s ease-out forwards;
            
            text-align: center;
            color: white;
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 40px rgba(255, 0, 212, 0.2); }
            100% { box-shadow: 0 0 70px rgba(0, 229, 255, 0.3); }
        }

        @keyframes slideIn {
            0% { opacity: 0; transform: translateY(100px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 85px; 
            margin: 0;
            line-height: 1.1;
            background: linear-gradient(to right, var(--neon-pink), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0px 0px 15px rgba(255, 0, 212, 0.5));
            font-weight: normal;
        }

        p {
            font-size: 38px; 
            margin: 15px 0 50px 0;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 1px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.8);
        }

        .btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            padding: 15px 50px;
            border-radius: 100px;
            text-decoration: none;
            font-size: 32px; 
            border: 1px solid rgba(0, 229, 255, 0.4); 
            box-shadow: 0 0 20px rgba(0, 229, 255, 0.2); 
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .btn:hover {
            background: var(--neon-blue);
            color: #000;
            box-shadow: 0 0 50px var(--neon-blue);
            transform: scale(1.1);
            border-color: var(--neon-blue);
        }

        .status-dot {
            height: 18px;
            width: 18px;
            background-color: #00ff00;
            border-radius: 50%;
            display: inline-block;
            margin-right: 12px;
            box-shadow: 0 0 15px #00ff00;
            vertical-align: middle;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="card">
        <?php if(SessionManager::isLoggedIn()): ?>
            <h1>Welcome <?= SessionManager::getUsername() ?></h1>
            <p>
                <span class="status-dot"></span>System Active
            </p>
            <a href="logout.php" class="btn">Log Out</a>
        <?php else: ?>
            <h1>Welcome Guest</h1>
            <p>Identify Yourself</p>
            <a href="/se.php" class="btn">Sign In</a>
        <?php endif; ?>
    </div>

</body>
</html>