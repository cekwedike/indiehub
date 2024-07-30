<?php
require_once 'database.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $pdo = getDatabaseConnection();
    $sql = "UPDATE users SET is_verified = TRUE WHERE verification_token = ?";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$token]);
        if ($stmt->rowCount() > 0) {
            echo "Your account has been verified. You can now log in.";
        } else {
            echo "Invalid or expired verification token.";
        }
    } catch(PDOException $e) {
        echo "Verification failed: " . $e->getMessage();
    }
}