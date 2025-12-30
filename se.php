<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'john' && $password == 'password'){
        $_SESSION['username'] = $username;
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
            --glass-border: rgba(255, 255, 255, 0.25);
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
            background: radial-gradient(circle at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.85) 100%);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes slowZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.15); }
        }

        /* 2. ALMOST TRANSPARENT GLASS CARD */
        .login-card {
            /* SUPER TRANSPARENT
               Only 15% opacity on the black, creating a "barely there" look 
            */
            background: rgba(15, 15, 15, 0.15);
            
            /* The Blur does the heavy lifting for readability */
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px);
            
            width: 100%;
            max-width: 400px;
            padding: 60px 40px;
            border-radius: 50px;
            
            /* STRONG GLASS REFLECTION BORDERS */
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-top: 1px solid rgba(255, 255, 255, 0.35); /* Bright top edge to catch light */
            border-left: 1px solid rgba(255, 255, 255, 0.35); /* Bright left edge */
            
            /* Deep, soft shadow to separate it from the background */
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.7);
            
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
            text-shadow: 0 2px 10px rgba(0,0,0,0.8);
            font-weight: 700;
        }

        p.subtitle {
            color: rgba(255, 255, 255, 0.7); /* Slightly brighter for contrast */
            font-size: 15px;
            margin-bottom: 40px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            text-shadow: 0 2px 5px rgba(0,0,0,0.8);
        }

        .input-group {
            margin-bottom: 25px;
        }

        /* Inputs: Almost invisible */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 18px 25px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 18px;
            color: #fff;
            
            /* 10% opacity white background */
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 50px;
            
            outline: none;
            box-sizing: border-box;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.5);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input:focus {
            background: rgba(0, 0, 0, 0.5); /* Darkens when you type */
            border-color: var(--bat-gold);
            box-shadow: 0 0 25px rgba(207, 181, 59, 0.25);
            transform: scale(1.02);
        }

        /* Gold Button */
        input[type="submit"] {
            background: linear-gradient(135deg, #cfb53b 0%, #9e8826 100%);
            color: #1a1a1a;
            font-family: 'Cinzel', serif;
            font-size: 18px;
            font-weight: 700;
            padding: 18px;
            width: 100%;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 10px;
            box-shadow: 0 10px 30px rgba(158, 136, 38, 0.3);
            border-top: 1px solid rgba(255,255,255,0.4);
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 40px rgba(207, 181, 59, 0.6); /* Stronger glow on hover */
            filter: brightness(1.2);
        }

        .error-msg {
            color: #ff4d4d;
            background: rgba(255, 0, 0, 0.15);
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