<?php
session_start();

if (isset($_POST['submit'])) {
    // 1. ASSIGN VARIABLES
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 2. CHECK LOGIN
    if($username == 'john' && $password == 'password'){
        $_SESSION['username'] = $username;
        header('Location: /extras/dashboard.php');
        exit(); 
    } else {
        $error = "Incorrect Login"; // Store error to display nicely below
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        /* Apple Design System Variables */
        :root {
            --apple-blue: #0071e3;
            --apple-gray: #86868b;
            --apple-dark: #1d1d1f;
            --bg-color: #f5f5f7;
            --card-bg: #ffffff;
            --error-red: #ff3b30;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--apple-dark);
        }

        .login-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 24px; /* Deep rounded corners */
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04); /* Subtle, diffuse shadow */
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        p.subtitle {
            color: var(--apple-gray);
            font-size: 17px;
            margin-bottom: 32px;
            margin-top: 0;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: none; /* Apple style often hides labels inside placeholders or minimal layouts */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 16px 16px;
            font-size: 17px;
            border: 1px solid #d2d2d7;
            border-radius: 12px; /* Smooth input corners */
            outline: none;
            box-sizing: border-box; /* Fixes padding width issues */
            transition: all 0.2s ease;
            background-color: transparent;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--apple-blue);
            box-shadow: 0 0 0 4px rgba(0, 113, 227, 0.1); /* Blue glow focus */
        }

        input[type="submit"] {
            background-color: var(--apple-blue);
            color: white;
            font-size: 17px;
            font-weight: 500;
            padding: 16px;
            width: 100%;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #0077ed;
        }

        .error-msg {
            color: var(--error-red);
            font-size: 14px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Sign In</h1>
        <p class="subtitle">Access your dashboard</p>

        <?php if(isset($error)): ?>
            <span class="error-msg"><?= $error ?></span>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Apple ID (Username)" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Sign In" name="submit">
        </form>
    </div>

</body>
</html>