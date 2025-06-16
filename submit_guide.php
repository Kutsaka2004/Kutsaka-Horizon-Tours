<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(htmlspecialchars($_POST['full_name']));
    $email = trim(htmlspecialchars($_POST['email_address']));
    $location = trim(htmlspecialchars($_POST['location']));
    $experience = trim(htmlspecialchars($_POST['experience']));
    $specialties = trim(htmlspecialchars($_POST['specialties']));
    $pricing = trim(htmlspecialchars($_POST['pricing']));
    $availability = trim(htmlspecialchars($_POST['availability']));

    // Insert guide application into database
    $stmt = $conn->prepare("INSERT INTO guides (name, email, location, experience, specialties, pricing, availability) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $location, $experience, $specialties, $pricing, $availability);

    if ($stmt->execute()) {
        echo "✅ Guide application submitted successfully!";
    } else {
        echo "❌ Error submitting application.";
    }
}
?>