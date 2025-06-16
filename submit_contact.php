<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(htmlspecialchars($_POST['full_name']));
    $email = trim(htmlspecialchars($_POST['email_address']));
    $mobile = trim(htmlspecialchars($_POST['mobile_number']));
    $country = trim(htmlspecialchars($_POST['country']));
    $date_from = trim(htmlspecialchars($_POST['date_from']));
    $date_to = trim(htmlspecialchars($_POST['date_to']));
    $guests = trim(htmlspecialchars($_POST['guests']));
    $questions = trim(htmlspecialchars($_POST['questions']));

    // Insert inquiry into database
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, mobile, country, date_from, date_to, guests, questions) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssis", $name, $email, $mobile, $country, $date_from, $date_to, $guests, $questions);

    if ($stmt->execute()) {
        echo "✅ Inquiry submitted successfully!";
    } else {
        echo "❌ Error submitting inquiry.";
    }
}
?>