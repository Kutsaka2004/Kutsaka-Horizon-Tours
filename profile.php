<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: login.html"); 
    exit();
}
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    $stmt = $conn->prepare("UPDATE users SET name=?, password=? WHERE email=?");
    $stmt->bind_param("sss", $name, $password, $_SESSION["email"]);
    if ($stmt->execute()) {
        $_SESSION["name"] = $name; // Update session name
        echo "✅ Profile updated successfully!";
    } else {
        echo "❌ Error updating profile!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $_SESSION["name"]; ?>" required><br>

        <label>New Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Update Profile</button>
    </form>

    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>