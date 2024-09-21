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
    $dbHost = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');
    $dbName = getenv('DB_NAME');

    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // If the connection is successful, check if the table accounts exists
        $stmt = $conn->query("SELECT 1 FROM accounts LIMIT 1");
        if ($stmt === false) {
            // If the table does not exist, create it with initDB.sql
            $sql = file_get_contents(__DIR__ . '/../scripts/initDB.sql');
            $conn->exec($sql);
        } else {
            $stmt->closeCursor();
        }

        return $conn;
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return false;
    }
}