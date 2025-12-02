<?php
// Start the session for future chat functionality
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatApp - Home</title>
    <link rel="icon" href="images/chat.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo"> Real Time ChatApp</div>
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="login.php" class="nav-button">Login</a></li>
                    <li><a href="register.php" class="nav-button">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="content">
            <h1>Welcome to Real Time ChatApp</h1>
            <p>Experience Real Time communication like never before. Connect with friends, family, or colleagues instantly with our secure and easy-to-use platform.</p>
            <p>Get started today and enjoy seamless chats and more!</p>
            <a href="login.php">Start Chatting Now</a>
        </div>
    </main>

    <footer>
        <p>© 2025 Real Time ChatApp. All Rights Reserved.</p>
    </footer>
</body>
</html>