<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

/**
 * Registers a new user in the system.
 *
 * @param string $email The email of the user.
 * @param string $username The username of the user.
 * @param string $password The password of the user.
 * @return bool|string Returns true if the user was successfully registered, or an error message if the registration failed.
 */
function registerUser($email, $username, $password) {
    //Encrypt the password and email
    $encryptedPassword = encrypt($password);
    $encryptedEmail = encrypt($email);

    //Connect to the database
    $conn = connectToDB();
    if ($conn === false) {
        return "Database connection failed";
    }

    // Check if email is already used
    $stmt = $conn->prepare("SELECT COUNT(*) FROM accounts WHERE email = :email");
    $stmt->bindParam(':email', $encryptedEmail);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        // Email is already used, return false
        return "Email is already used";
    }

    // Continue with user registration
    $stmt = $conn->prepare("INSERT INTO accounts (email, username, password) VALUES (:email, :username, :password)");
    $stmt->bindParam(':email', $encryptedEmail);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $encryptedPassword);
    $stmt->execute();

    return true;
}