<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $email = $_POST['email_address'];
    $feedback = $_POST['feedback'];

    // Insert feedback into database
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['full_name'], $_POST['email_address'], $_POST['feedback']);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "✅ Feedback submitted successfully!";
    } else {
        echo "❌ Error submitting feedback.";
    }
}
?>