<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/admin.css">
    <meta name="robots" content="nofollow">
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <section id="legalNotice"></section>
        <section id="privacyPolicy"></section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>