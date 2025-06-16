<?php
include 'connect.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found in database!");
    } else {
        echo "User found: " . $user["email"] . "<br>";
    }

    echo "Stored password in DB: " . $user["password"] . "<br>";

    if (password_verify($password, $user["password"])) {
        $_SESSION["name"] = $user["name"];
        header("Location: dashboard.php");
        exit();
    } else {
        die("Password mismatch! Entered: " . $password);
    }

    if (password_verify($_POST["password"], $user["password"])) {
    $_SESSION["name"] = $user["name"];
    $_SESSION["email"] = $user["email"]; // Store email in session
    header("Location: dashboard.php");
    exit();
    }
}
?>