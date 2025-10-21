<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$db = "registration";
$port = 3306;

$connection = new mysqli($servername, $username, $password, $db, $port);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Name is only used for registration
$email = $_POST['email'];
$password = $_POST['password'];
// Confirm password only for registration
$action = $_POST['action']; 

// Register: validate then insert data
if ($action === 'register') {
    $confirmpassword = $_POST['confirm_password'];
    if ($password === $confirmpassword) {
        // Check if email already exists
        $checkquery = "SELECT * FROM users WHERE email='$email'";
        $checkresult = $connection->query($checkquery);
        if ($checkresult->num_rows > 0) {
            echo "Email already exists. Try logging in instead.";
        } else {
            // Safe to insert new user into the table
            $name = $_POST['name'];
            $insertquery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if ($connection->query($insertquery) === TRUE) {
                echo "Registration successful. Welcome $name!";
            } else {
                echo "An error occurred";
            }
        }
    } else {
        echo "Passwords do not match.";
    }
// Login: validate then get data
} else if ($action === 'login') {
    $checkquery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $checkresult = $connection->query($checkquery);

    if ($checkresult->num_rows > 0) {
        echo "Login successful.";
        // Get user data to display the name
        $user = $checkresult->fetch_assoc();
        echo " Welcome " . $user['name'] . "!";
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid action.";
}
?>