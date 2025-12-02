<?php
// Start the session for future chat functionality
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatApp - About Us</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/chat.png" type="image/png">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">Real Time ChatApp</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php" class="active">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="login.php" class="nav-button">Login</a></li>
                    <li><a href="register.php" class="nav-button">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="content">
            <h1>About Us</h1>
            <p>Welcome to Real Time ChatApp, your go-to platform for seamless real-time communication. Our mission is to connect people across the globe with a fast, secure, and user-friendly chat experience.</p>
            <p>Founded in 2025, we are committed to leveraging cutting-edge technology to ensure your conversations are private and reliable. Join millions of users who trust ChatApp for their daily communication needs.</p>
            <a href="index.php">Back to Home</a>
        </div>
    </main>

    <footer>
        <p>© 2025 Real Time ChatApp. All Rights Reserved.</p>
    </footer>
</body>
</html>