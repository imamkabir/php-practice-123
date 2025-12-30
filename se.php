<?php
session_start();

// OOP: Encapsulated Auth Logic
class Auth {
    // DRY: Single check point
    public static function attempt($username, $password) {
        if ($username === 'john' && $password === 'password') {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }
}

// Controller
if (isset($_POST['submit'])) {
    if (Auth::attempt($_POST['username'], $_POST['password'])) {
        header('Location: /extras/dashboard.php');
        exit();
    } else {
        $error = "Mission Failed: Access Denied";
    }
}
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
            
            /* TACTICAL CURSOR */
            cursor: url("data:image/svg+xml,%3Csvg width='32' height='18' viewBox='0 0 32 18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16 1.5C16 1.5 12 6 8 8C4 10 0 8 0 8L2 14L8 11C8 11 12 14 16 18C20 14 24 11 24 11L30 14L32 8C32 8 28 10 24 8C20 6 16 1.5 16 1.5Z' fill='%230a0a0a' stroke='%23333' stroke-width='0.5'/%3E%3C/svg%3E") 16 9, auto;
        }

        /* 1. BACKGROUND */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('extras/login.jpg?v=<?= time() ?>') no-repeat center center fixed; 
            background-size: cover;
            z-index: -2;
            animation: slowZoom 30s ease-in-out infinite alternate;
        }

        /* Dark Overlay */
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

        /* 2. THE MISSION CARD (Dormant State) */
        .login-card {
            /* Stealth Mode: Low opacity, smaller, greyed out */
            background: rgba(0, 0, 0, 0.4); 
            width: 100%;
            max-width: 400px;
            padding: 60px 40px;
            border-radius: 50px;
            
            /* Dim borders */
            border: 1px solid rgba(255, 255, 255, 0.05);
            
            text-align: center;
            color: white;
            
            /* THE TRANSITION ENGINE (This makes the animation smooth) */
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            
            /* Initial State */
            transform: scale(0.95);
            opacity: 0.6;
            filter: grayscale(100%); /* Black and white initially */
        }

        /* 3. MISSION ACTIVATED (Hover State) */
        .login-card:hover {
            /* Power Up */
            background: rgba(20, 20, 20, 0.6);
            backdrop-filter: blur(20px);
            
            transform: scale(1.0); /* Zooms in */
            opacity: 1; /* Fully visible */
            filter: grayscale(0%); /* Color returns */
            
            /* Gold Ignition */
            border-color: var(--bat-gold);
            box-shadow: 0 0 60px rgba(207, 181, 59, 0.2); /* Big Gold Glow */
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-size: 36px;
            color: #fff;
            margin-bottom: 5px;
            letter-spacing: 2px;
            font-weight: 700;
            transition: color 0.5s ease;
        }

        /* Text turns gold on hover */
        .login-card:hover h1 {
            color: var(--bat-gold);
            text-shadow: 0 0 15px rgba(207, 181, 59, 0.5);
        }

        p.subtitle {
            color: rgba(255, 255, 255, 0.5);
            font-size: 15px;
            margin-bottom: 40px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            transition: color 0.5s ease;
        }
        
        .login-card:hover p.subtitle {
            color: #fff;
        }

        .input-group {
            margin-bottom: 25px;
        }

        /* 4. REACTIVE INPUTS */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 18px 25px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 18px;
            color: #fff;
            
            /* Invisible initially */
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            outline: none;
            
            transition: all 0.4s ease;
            opacity: 0.5; /* Hard to see initially */
        }

        /* Inputs light up when card is hovered */
        .login-card:hover input[type="text"],
        .login-card:hover input[type="password"] {
            opacity: 1;
            border-color: rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        input:focus {
            background: rgba(0, 0, 0, 0.5) !important;
            border-color: var(--bat-gold) !important;
            box-shadow: 0 0 20px rgba(207, 181, 59, 0.3);
            transform: scale(1.05);
        }

        /* Gold Button */
        input[type="submit"] {
            background: transparent;
            color: transparent; /* Text invisible initially */
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 50px;
            padding: 18px;
            width: 100%;
            cursor: pointer;
            transition: all 0.5s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            font-family: 'Cinzel', serif;
            margin-top: 10px;
        }

        /* Button Reveals on Hover */
        .login-card:hover input[type="submit"] {
            color: var(--bat-gold);
            border-color: var(--bat-gold);
        }

        input[type="submit"]:hover {
            background: var(--bat-gold) !important;
            color: #000 !important;
            box-shadow: 0 0 40px rgba(207, 181, 59, 0.8);
            transform: translateY(-3px);
            font-weight: bold;
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
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Gotham Gate</h1>
        <p class="subtitle">Mission Status: Pending</p>

        <?php if(isset($error)): ?>
            <span class="error-msg">⚠ <?= $error ?></span>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Identity" required autocomplete="off">
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Passkey" required>
            </div>
            <input type="submit" value="Accept Mission" name="submit">
        </form>
    </div>

</body>
</html>