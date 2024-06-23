<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = substr($email, 0, 255); 


$conn = new mysqli('localhost', 'root', '', 'login');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Registered successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
