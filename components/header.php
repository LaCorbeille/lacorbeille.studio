<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
?>

<header>
    <a href="/"><img src="assets/img/branding/logoSmall.svg" alt="LaCorbeille STUDIO"></a>
    <div id="menu">
        <a href="#">Jeux</a>
        <a href="#">Actus</a>
        <a href="#">Support</a>
        <?php if (isset($username)) { ?>
            <a id="account"><?php echo $username; ?></a>
        <?php } else { ?>
            <a id="signin" href="signin.php">Se connecter</a>
        <?php } ?>
    </div>
    <a id="burgerMenu"><img src="assets/img/icons/menu.svg" alt="Menu"></a>
    <div id="accountDropdown">
        <a>Username#00000</a>
        <hr>
        <a>Paramètres</a>
        <a>Se déconnecter</a>
    </div>
</header>