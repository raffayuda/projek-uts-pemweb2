<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role_id = 2; // Default role for new users

    // Check if email already exists
    $check_sql = "SELECT id FROM user WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        header("Location: register.php?error=Email already exists");
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO user (name, email, password, role_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $role_id);

    if ($stmt->execute()) {
        header("Location: login.php?success=Registration successful! Please login.");
        exit();
    } else {
        header("Location: register.php?error=Registration failed");
        exit();
    }
}