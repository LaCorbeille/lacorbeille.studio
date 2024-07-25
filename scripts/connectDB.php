<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/dotenv.php';
include_once __DIR__ . '/../scripts/encryption.php';
initEnvironmentVars();

/**
 * Connects to the database using the provided credentials.
 *
 * @return PDO|false Returns a PDO object representing the database connection if successful, or false if the connection fails.
 */
function connectToDB()
{
    $dbHostEncrypted = getenv('DB_HOST');
    $dbHost = decrypt($dbHostEncrypted);
    $dbUserEncrypted = getenv('DB_USER');
    $dbUser = decrypt($dbUserEncrypted);
    $dbPassEncrypted = getenv('DB_PASS');
    $dbPass = decrypt($dbPassEncrypted);
    $dbNameEncrypted = getenv('DB_NAME');
    $dbName = decrypt($dbNameEncrypted);

    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return false;
    }
}