<?php
// Start the session for future chat functionality
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatApp - Contact Us</title>
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
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php" class="active">Contact Us</a></li>
                    <li><a href="login.php" class="nav-button">Login</a></li>
                    <li><a href="register.php" class="nav-button">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="content">
            <h1>Contact Us</h1>
            <p>We’d love to hear from you! Whether you have questions, feedback, or need support, feel free to reach out to us.</p>
            <p>Email: support@chatapp.com<br>Phone: +91 9373362885<br>Address: 7814 Shiroli, Kolhapur</p>
            <a href="index.php">Back to Home</a>
        </div>
    </main>

    <footer>
        <p>© 2025 Real Time ChatApp. All Rights Reserved.</p>
    </footer>
</body>
</html>