<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$email = $_POST['email'];
$password = $_POST['password'];


$conn = new mysqli('localhost', 'root', '', 'login');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);


if ($stmt->execute()) {
    echo "Login data inserted successfully .<a href='continalllangs.html'>Continue</a>";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
