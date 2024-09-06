<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/support.css">
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <img id="maintenanceImg" src="assets/img/branding/logoFull.svg" alt="LaCorbeille STUDIO">
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>