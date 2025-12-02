<?php
    include 'php/config.php'; // including the database connection
    session_start();

    // Include PHPMailer
    require 'phpmailer/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['submit'])) { // if user clicks the submit button
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // checking if email is valid
                
            $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'"); // Check if email exists
            if(mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_assoc($select);

                // Check if the account is locked
                if ($row['lock_until'] && strtotime($row['lock_until']) > time()) {
                    $alert[] = "Your account is locked until " . $row['lock_until'] . ". Please try again later.";
                } else {
                    // Check if password is correct
                    if ($password === $row['password']) {
                        $status = 'Active Now'; // user status

                        $update = mysqli_query($conn, "UPDATE user_form SET status = '$status', failed_attempts = 0, lock_until = NULL WHERE user_id = '{$row['user_id']}' ");

                        if ($update) {
                            $_SESSION['user_id'] = $row['user_id'];
                            header('location: home.php');
                            exit;
                        }
                    } else {
                        // Incorrect password
                        $failed_attempts = $row['failed_attempts'] + 1;
                        $lock_until = ($failed_attempts >= 3) ? date('Y-m-d H:i:s', strtotime('+3 hours')) : NULL;

                        mysqli_query($conn, "UPDATE user_form SET failed_attempts = '$failed_attempts', lock_until = '$lock_until' WHERE user_id = '{$row['user_id']}'");

                        $alert[] = "Incorrect password!";

                        // Send email if the user is locked out
                        if ($failed_attempts >= 3) {
                            $mail = new PHPMailer(true);
                            try {
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = ''; // Your email
                                $mail->Password = ; // Replace with your app password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587;

                                $mail->setFrom('', '');
                                $mail->addAddress($email); // Send to user

                                $mail->isHTML(true);
                                $mail->Subject = 'Account Locked Due to Failed Logins';
                                $mail->Body = 'There were 3 failed login attempts on your account. Your account has been locked for 3 hours.';

                                $mail->send();
                                $alert[] = "Your account is locked. An email has been sent to notify you.";
                            } catch (Exception $e) {
                                $alert[] = "Mailer Error: " . $mail->ErrorInfo;
                            }
                        }
                    }
                }
            } else {
                $alert[] = "No user found with that email!";
            }
        } else {
            $alert[] = "$email is not a valid email!";
        }
    }

    if(isset($_SESSION['user_id'])) {
        header("location: home.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome Back</title>
    <link rel="icon" href="images/chat.png" type="image/png">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Welcome Back</h3>
            <?php 
                if(isset($alert)) {
                    foreach($alert as $message) {
                        echo '<div class="alert">'.$message.'</div>';
                    }
                }
            ?>
            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="submit" name="submit" class="btn" value="Start Chatting">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
            <p><a href="index.php">Go to Home Page</a></p> 
        </form>
    </div>
</body>
</html>










