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

// Update user information based on the id of the user. The data to change is the one who is set in the $_POST array.