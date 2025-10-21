<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$db = "registration";
$port = 3306;

$connection = new mysqli($servername, $username, $password, $db, $port);

if ($connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    die("Connection failed: " . $connection->connect_error);
}

echo "Connected successfully<br>";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirm_password'];
$action = $_POST['action'];

if ($action === 'register') {
    if ($password === $confirmpassword) {
        
    } else {
        echo "Passwords do not match.";
    }
else if ($action === 'login') {
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        echo "Login successful.";
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid action.";
}
?>