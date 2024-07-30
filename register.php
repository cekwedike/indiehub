<?php
require_once 'database.php';
require_once 'email.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $verification_token = bin2hex(random_bytes(16));

    $pdo = getDatabaseConnection();
    $sql = "INSERT INTO users (name, email, password, role, verification_token) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$name, $email, $password, $role, $verification_token]);
        sendVerificationEmail($email, $verification_token);
        echo "Registration successful. Please check your email to verify your account.";
    } catch(PDOException $e) {
        echo "Registration failed: " . $e->getMessage();
    }
}