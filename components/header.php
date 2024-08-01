<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
    }
?>

<header>
    <a href="/"><img src="assets/img/branding/logoSmall.svg" alt="LaCorbeille STUDIO"></a>
    <div id="menu">
        <a href="games.php">Jeux</a>
        <a href="news.php">Actus</a>
        <a href="support.php">Support</a>
        <?php if (isset($username)) { ?>
            <a id="account"><?php echo $username; ?></a>
        <?php } else { ?>
            <a id="signin" href="signin.php">Se connecter</a>
        <?php } ?>
    </div>
    <a id="burgerMenu"><img src="assets/img/icons/menu.svg" alt="Menu"></a>
    <div id="accountDropdown">
        <a id="userId"><?= $username; ?><span><?= "#" . $id ?></span><img src="assets/img/icons/content_copy.svg" alt="Settings"></a>
        <hr>
        <a>Paramètres<img src="assets/img/icons/manage_account.svg" alt="Settings"></a>
        <a href="/scripts/logout.php">Se déconnecter<img src="assets/img/icons/logout.svg" alt="Settings"></a>
    </div>
</header>