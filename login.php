<?php
// Start the session to store messages
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "mark";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions for login or account creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_account'])) {
        // Handle account creation
        $student_number = $_POST['student_number'];
        $section = $_POST['section'];
        $password = $_POST['password'];
        

        $stmt = $conn->prepare("INSERT INTO users (student_number, section, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $student_number, $section, $password);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Account created successfully!";
        } else {
            $_SESSION['message'] = "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['login'])) {
        // Handle login
        $user = $_POST['student_number'];
        $pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE student_number = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                $_SESSION['message'] = "Login successful!";
            } else {
                $_SESSION['message'] = "Invalid password!";
            }
        } else {
            $_SESSION['message'] = "No user found!";
        }
        $stmt->close();
    }
    $conn->close();
}
?>