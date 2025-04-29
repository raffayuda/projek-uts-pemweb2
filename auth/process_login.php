<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT u.*, r.name as role_name FROM user u 
            JOIN role_user r ON u.role_id = r.id 
            WHERE u.email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role_id'];
            $_SESSION['user_role_name'] = $user['role_name'];
            
            // Redirect berdasarkan role
            switch ($user['role_id']) {
                case 1:
                    header("Location: ../dashboard/index.php");
                    break;
                case 2: 
                    header("Location: ../index.php");
                    break;
                default:
                    header("Location: ../index.php");
                    break;
            }
            exit();
        }
    }

    header("Location: login.php?error=Invalid email or password");
    exit();
}