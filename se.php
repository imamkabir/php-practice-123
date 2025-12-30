<?php
session_start();

// OOP: encapsulated login logic
class Auth {
    // DRY: Single source of truth for checking credentials
    public static function attempt($username, $password) {
        // In the future, this is where you connect to MySQL
        if ($username === 'john' && $password === 'password') {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }
}

// Controller Logic
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (Auth::attempt($user, $pass)) {
        header('Location: /extras/dashboard.php');
        exit();
    } else {
        $error = "Access Denied";
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
            
            /* TACTICAL BATARANG CURSOR */
            cursor: url("data:image/svg+xml,%3Csvg width='32' height='18' viewBox='0 0 32 18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16 1.5C16 1.5 12 6 8 8C4 10 0 8 0 8L2 14L8 11C8 11 12 14 16 18C20 14 24 11 24 11L30 14L32 8C32 8 28 10 24 8C20 6 16 1.5 16 1.5Z' fill='%230a0a0a' stroke='%23333' stroke-width='0.5'/%3E%3C/svg%3E") 16 9, auto;
        }

        /* 1. CINEMATIC BACKGROUND */
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
            /* Lighter overlay so you can see the face clearly */
            background: radial-gradient(circle at center, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.15); }
        }

        /* 2. THE GHOST CARD */
        .login-card {
            /* GHOST MODE: 
               0.05 opacity = 95% transparent. 
               It is essentially invisible glass.
            */
            background: rgba(255, 255, 255, 0.02);
            
            /* High blur to distinguish text from background details */
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px);
            
            width: 100%;
            max-width: 400px;
            padding: 60px 40px;
            border-radius: 50px;
            
            /* Extremely subtle borders */
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5);
            
            text-align: center;
            color: white;
            animation: slideUp 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(60px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-size: 36px;
            color: #fff;
            margin-bottom: 5px;
            letter-spacing: 2px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.9); /* Heavy shadow for readability */
            font-weight: 700;
        }

        p.subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 15px;
            margin-bottom: 40px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            text-shadow: 0 2px 5px rgba(0,0,0,0.9);
        }

        .input-group {
            margin-bottom: 25px;
        }

        /* 3. INVISIBLE INPUTS */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 18px 25px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 18px;
            color: #fff;
            
            /* TOTALLY TRANSPARENT BACKGROUND */
            background: transparent;
            
            /* Very faint border */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            
            outline: none;
            box-sizing: border-box;
            transition: all 0.3s ease;
            
            /* Text shadow needed because background is clear */
            text-shadow: 0 1px 2px rgba(0,0,0,0.8);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input:focus {
            /* Slight darkness on focus so you know you are typing */
            background: rgba(0, 0, 0, 0.2); 
            border-color: var(--bat-gold);
            box-shadow: 0 0 20px rgba(207, 181, 59, 0.2);
            transform: scale(1.02);
        }

        /* Gold Button */
        input[type="submit"] {
            background: transparent; /* See-through button */
            color: var(--bat-gold);
            font-family: 'Cinzel', serif;
            font-size: 18px;
            font-weight: 700;
            padding: 18px;
            width: 100%;
            
            border: 1px solid var(--bat-gold);
            border-radius: 50px;
            
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 10px;
            text-shadow: 0 1px 5px rgba(0,0,0,0.8);
            box-shadow: 0 0 15px rgba(207, 181, 59, 0.1);
        }

        input[type="submit"]:hover {
            background: var(--bat-gold);
            color: #000;
            box-shadow: 0 0 40px rgba(207, 181, 59, 0.6);
            transform: translateY(-3px);
            text-shadow: none;
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
            text-shadow: 0 1px 2px rgba(0,0,0,0.8);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Gotham Gate</h1>
        <p class="subtitle">Secure Access</p>

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
            <input type="submit" value="Initiate" name="submit">
        </form>
    </div>

</body>
</html>