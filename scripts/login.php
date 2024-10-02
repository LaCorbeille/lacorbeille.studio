<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

function loginUser($email, $password, $remember) {
    // Check if the email, username, and password are set
    if (empty($email) || empty($password)) {
        return "Email, and password are required";
    }

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }

    // Connect to the database
    $conn = connectToDB();
    if ($conn === false) {
        return "Database connection failed";
    }

    // Retrieve the user from the database
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if the user exists
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user === false) {
        return "Invalid email or password";
    }

    // Decrypt the password from the database and compare it with the provided password
    $decryptedPassword = decrypt($user['password']);
    if ($decryptedPassword !== $password) {
        return "Invalid email or password" . $decryptedPassword . " != " . $password;
    }

    // Start the session
    if (!isset($_SESSION)) {
        session_start();
    }

    // Set session expiration time
    if ($remember === 'true') {
        $_SESSION['expire'] = time() + 60 * 60 * 24 * 30; // 30 days
    } else {
        $_SESSION['expire'] = time() + 60 * 60 * 24; // 24 hours
    }

    // Set the session variables
    try {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['creation_date'] = $user['creation_date'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['newsletter'] = $user['newsletter'];
        $_SESSION['role'] = $user['role'];
        return true;
    } catch (Exception $e) {
        return "An error occurred";
    }
}