<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the session variables are set
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userId = $_SESSION['id'];
    $userEmail = $_SESSION['email'];
} else {
    // Handle the case where the session variables are not set
    echo "Session variables are not set.";
    exit;
}

// Encrypt the email
$encryptedEmail = encrypt($email);

//Connect to the database
$conn = connectToDB();
if ($conn === false) {
    return "Database connection failed";
}

// Check if the account exists with the given email and id
$stmt = $conn->prepare("SELECT COUNT(*) FROM accounts WHERE email = :email AND id = :id");
$stmt->bindParam(':email', $encryptedEmail);
$stmt->bindParam(':id', $userId);
$stmt->execute();
$count = $stmt->fetchColumn();
if ($count == 0) {
    // Account does not exist, return false
    return "Account does not exist";
} else {
    // Account exists, continue with account deletion
}

// Delete the user account from the database based on the id and email
$stmt = $conn->prepare("DELETE FROM accounts WHERE id = :id AND email = :email");
$stmt->bindParam(':id', $userId);
$stmt->bindParam(':email', $encryptedEmail);
$stmt->execute();
$stmt = $conn->prepare('DELETE FROM user_info WHERE user_id = :id');
$stmt->bindParam(':id', $userId);
$stmt->execute();

// Logout the user
header("Location: logout.php");
exit();