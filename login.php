<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = getDatabaseConnection();
    $sql = "SELECT * FROM users WHERE email = ? AND is_verified = TRUE";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        echo "Login successful";
        // Redirect to dashboard or appropriate page based on role
    } else {
        echo "Invalid email or password, or account not verified";
    }
}