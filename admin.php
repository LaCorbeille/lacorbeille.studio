<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once __DIR__ . '/scripts/adminFunct.php';

$users = retrieveUsers(startFrom: 0);
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/admin.css">
    <meta name="robots" content="nofollow">
    <script src="js/admin.js" defer></script>
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <input type="text" id="search" placeholder="Search : Username, ID...">
        <?php
        if (is_string($users)) {
            echo $users;
            return;
        } else {
            echo '<section id="users">';
            echo '<div id="usersHeaders"><a>ID ; Username ; Email ; Creation date ; First name ; Last name ; Newsletter ; Role</a></div>';
            foreach ($users as $user) {
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
            echo '</section>';
        }
        ?>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>