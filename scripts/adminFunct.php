<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

function retrieveUsers($startFrom) {
    // Set variables
    if (!is_int($startFrom) || $startFrom < 0) {
        $startFrom = 0;
    }
    $limit = 15;

    // Connect to the database
    $conn = connectToDB();
    if ($conn === false) {
        return '<a class="alert error">Database connection failed</a>';
    } 

    // Retrieve users with limit and offset
    $stmt = $conn->prepare("SELECT * FROM accounts LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $startFrom, PDO::PARAM_INT);
    $stmt->execute();

    // Check if there are users
    if ($stmt->rowCount() === 0) {
        return '<a class="alert warning">No user found in database</a>';
    }

    // Return the users
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}