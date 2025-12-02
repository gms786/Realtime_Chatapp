<?php
session_start(); // Start the session to access the user ID
if(isset($_SESSION['user_id'])) {
    include "config.php"; // Include the database configuration file

    // Get the outgoing user ID and incoming user ID
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert text messages if there is a message
    if(!empty($message)) {
        $insert_msg = mysqli_query($conn, "INSERT INTO `messages`(`outgoing_msg_id`, `incoming_msg_id`, `msg`) 
                                          VALUES ('{$outgoing_id}', '{$incoming_id}', '$message')");
    }

    // Handle image uploads
    if(isset($_FILES['send_image'])) {
        $send_image = $_FILES['send_image']['name']; // Get the image name
        $send_image_size = $_FILES['send_image']['size']; // Get the image size
        $send_image_tmp_name = $_FILES['send_image']['tmp_name']; // Get the temporary image file path
        $image_rename = time() . $send_image; // Rename the image to avoid conflicts
        $image_folder = '../uploaded_img/' . $image_rename; // Define the image upload folder

        // Move the uploaded file to the destination folder
        if(move_uploaded_file($send_image_tmp_name, $image_folder)) {
            // Insert the image file path into the database
            $insert_img_msg = mysqli_query($conn, "INSERT INTO `messages`(`outgoing_msg_id`, `incoming_msg_id`, `msg_img`) 
                                                   VALUES ('{$outgoing_id}', '{$incoming_id}', '$image_rename')");
        }
    }
} else {
    // Redirect to login page if the user is not logged in
    header('location: login.php');
}
?>
