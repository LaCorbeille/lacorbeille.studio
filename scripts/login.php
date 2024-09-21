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

    // Encrypt the password and email
    $encryptedPassword = encrypt($password);
    $encryptedEmail = encrypt($email);

    // Connect to the database
    $conn = connectToDB();
    if ($conn === false) {
        return "Database connection failed";
    }

    // Retrieve the user from the database
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $encryptedEmail);
    $stmt->bindParam(':password', $encryptedPassword);
    $stmt->execute();

    // Check if the user exists
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user === false) {
        return "Invalid email or password";
    }

    // Start the session
    session_start();
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

    // Start fake session
    // session_start();
    // try {
    //     $_SESSION['id'] = '0';
    //     $_SESSION['username'] = 'Brume';
    //     $_SESSION['email'] = 'brume@lacorbeille.studio';
    //     $_SESSION['creation_date'] = '21/09/2024';
    //     $_SESSION['firstname'] = 'Noa';
    //     $_SESSION['lastname'] = 'Second';
    //     $_SESSION['newsletter'] = false;
    //     $_SESSION['role'] = 'admin';
    //     return true;
    // } catch (Exception $e) {
    //     return "An error occurred";
    // }
}