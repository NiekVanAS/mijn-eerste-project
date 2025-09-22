<?php
session_start();

require "database.php";

// If already logged in, redirect to index
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    try {
        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['firstname'] = $user['firstname'];
            if(isset($user['admin_id'])) {
                $_SESSION['admin_id'] = $user['admin_id'];
            }
            
            header("Location: index.php");
            exit();
        } else {
            // Login failed
            header("Location: login.php?error=invalid");
            exit();
        }
        
    } catch (PDOException $e) {
        // Handle database errors
        error_log("Login error: " . $e->getMessage());
        header("Location: login.php?error=system");
        exit();
    }
} else {
    // If not POST request, redirect to login page
    header("Location: login.php");
    exit();
}
?>
