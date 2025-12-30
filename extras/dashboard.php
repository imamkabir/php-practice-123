<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap" rel="stylesheet">
    <style>
        :root {
            --vice-pink: #ff00d4;
            --vice-blue: #00e5ff;
            --gta-gradient: linear-gradient(to right, #ff00d4, #00e5ff);
        }

        body {
            font-family: 'Grand Hotel', cursive;
            background: url('img.jpg?v=<?= time() ?>') no-repeat center center fixed; 
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; 
        }

        /* Dark overlay to help text pop */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.1); 
            z-index: -1;
        }

        .card {
            /* 1. LIQUID GLASS EFFECT */
            /* Very low opacity background, but with a gradient reflection */
            background: linear-gradient(
                135deg, 
                rgba(255, 255, 255, 0.15) 0%, 
                rgba(255, 255, 255, 0.01) 100%
            );
            
            /* 2. THE FROST (Blur) */
            backdrop-filter: blur(25px); 
            -webkit-backdrop-filter: blur(25px); /* For Safari/Mac */
            
            /* 3. GLASS EDGES (Light hits top-left, shadow on bottom-right) */
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-top: 1px solid rgba(255, 255, 255, 0.4);
            border-left: 1px solid rgba(255, 255, 255, 0.4);
            
            /* 4. DEPTH SHADOW */
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            
            padding: 60px 40px;
            border-radius: 40px;
            text-align: center;
            width: 100%;
            max-width: 500px;
            color: white;
            
            /* Smooth entrance */
            animation: slideIn 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        @keyframes slideIn {
            0% { opacity: 0; transform: translateY(100px) scale(0.9); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        h1 {
            font-size: 80px; 
            margin: 0;
            line-height: 1.1;
            /* Gradient Text */
            background: var(--gta-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            /* Glass text shadow */
            filter: drop-shadow(0px 2px 10px rgba(0,0,0,0.3));
            font-weight: normal;
        }

        p {
            font-size: 36px; 
            margin: 15px 0 50px 0;
            color: rgba(255, 255, 255, 0.9); /* Slightly translucent white text */
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }

        .btn {
            display: inline-block;
            /* Totally transparent button with glass border */
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            padding: 15px 50px;
            border-radius: 100px;
            text-decoration: none;
            font-size: 32px; 
            
            /* Cyan Glass Border */
            border: 1px solid rgba(0, 229, 255, 0.4); 
            border-top: 1px solid rgba(0, 229, 255, 0.8);
            
            box-shadow: 0 4px 15px rgba(0, 229, 255, 0.2); 
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .btn:hover {
            background: rgba(0, 229, 255, 0.2);
            box-shadow: 0 0 40px rgba(0, 229, 255, 0.6);
            transform: translateY(-3px);
            border-color: #00e5ff;
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
        <?php if(isset($_SESSION['username'])): ?>
            <h1>Welcome <?= htmlspecialchars($_SESSION['username']) ?></h1>
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