<?php
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into the contact_messages table
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Send success response
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        // Send error response
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }

    // Close the connection
    $conn->close();
}
?>
