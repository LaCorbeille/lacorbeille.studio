<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/../scripts/connectDB.php';
include_once __DIR__ . '/../scripts/encryption.php';
include_once __DIR__ . '/../scripts/dotenv.php';
initEnvironmentVars();

function retrieveUsers($startFrom)
{
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

function searchString($string)
{
    // String is empty
    if (empty($string)) {
        return '<a class="alert warning">Please enter a search string</a>';
    }

    // Connect to the database
    $conn = connectToDB();
    if ($conn === false) {
        return '<a class="alert error">Database connection failed</a>';
    }

    // Retrieve users with search string
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE (username LIKE :string OR email LIKE :string OR firstname LIKE :string OR lastname LIKE :string) AND id LIKE :string");
    $stmt->bindParam(':string', $string, PDO::PARAM_STR);
    $stmt->execute();

    // Check if there are users
    if ($stmt->rowCount() === 0) {
        return '<a class="alert warning">No user found in database</a>';
    }

    // Return the users
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function printUser($user)
{
    echo '<div class="user">';
    echo '<a>#' . htmlspecialchars($user['id'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['username'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['email'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['creation_date'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['firstname'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['lastname'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['newsletter'] ?? 'undefined') . '</a>';
    echo '<a>' . htmlspecialchars($user['role'] ?? 'undefined') . '</a>';
    echo '<a id="editUser><img src="assets/img/icons/manage_account.svg" alt="manage user" ></a>';
    echo '<a id="deleteUser><img src="assets/img/icons/delete.svg" alt="delete user" ></a>';
    echo '</div><br>';
}