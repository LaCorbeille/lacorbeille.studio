<?php
include_once 'scripts/lang.php';
session_start();
//Language
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$deviceLang = substr($language, 0, 2);
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $deviceLang;
}
$lang = $_SESSION['lang'];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <title><?php getValueFromJson('tabTitle'); ?></title>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive/index.css">
</head>

<body>
    <header>
        <?php include ('components/header.php'); ?>
    </header>
    <main>
        <img src="assets/img/maintenance.png" alt="Maintenance">
    </main>
    <footer>
        <?php //include ('components/footer.php'); ?>
    </footer>
</body>

</html>