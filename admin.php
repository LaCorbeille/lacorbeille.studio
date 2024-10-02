<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

include_once __DIR__ . '/scripts/adminFunct.php';

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
    $users = searchString($searchTerm);
} else {
    $users = retrieveUsers(startFrom: 0);
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/responsive/admin.css">
    <meta name="robots" content="nofollow">
    <script src="js/admin.js" defer></script>
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <div id="toolbar">
            <input type="text" id="searchBar" placeholder="Search : Username, ID...">
            <a href="#" id="searchButton"><img src="assets/img/icons/search.svg" alt="Search"></a>
            <a href="https://mysql17.lwspanel.com/phpmyadmin" target="_blank"><img src="assets/img/icons/database.svg" alt="Database"></a>
            <a href="https://mail.lacorbeille.studio" target="_blank"><img src="assets/img/icons/mail.svg" alt="Webmail"></a>
        </div>
        <?php
        if (is_string($users)) {
            echo $users;
            return;
        } else {
            echo '<section id="users">';
            echo '<div id="usersHeaders"><a>ID ; Username ; Email ; Creation date ; First name ; Last name ; Newsletter ; Role</a></div>';
            foreach ($users as $user) {
                printUser($user);
            }
            echo '</section>';
        }
        ?>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>