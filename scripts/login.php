<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

function loginUser($email, $password) {
    // Check if the email, username, and password are set
    if (empty($email) || empty($password)) {
        return "Email, and password are required";
    }

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }

    session_start();
    try {
        $_SESSION['username'] = 'Brume';
        $_SESSION['id'] = '00000';
        $_SESSION['email'] = 'brume@lacorbeille.studio';
        return true;
    } catch (Exception $e) {
        return "An error occurred";
    }
}