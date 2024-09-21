<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
}
?>

<?php
if (!isset($active)) {
    $active = "";
}
?>

<header>
    <a href="/"><img src="<?php echo ($active == 'index.php') ? 'assets/img/branding/logoSmall.svg' : 'assets/img/branding/logoSmallWhite.svg'; ?>" alt="LaCorbeille STUDIO"></a>
    <!-- Desktop Menu -->
    <div id="menu">
        <a href="games.php" <?php if ($active == 'games.php') { echo ' id="active"'; } ?>>Jeux</a>
        <a href="news.php" <?php if ($active == 'news.php') { echo ' id="active"'; } ?>>Actus</a>
        <a href="support.php" <?php if ($active == 'support.php') { echo ' id="active"'; } ?>>Support</a>
        <?php if (isset($username)) { ?>
            <a id="account"><?php echo $username; ?></a>
        <?php } else { ?>
            <a id="signin" href="signin.php">Se connecter</a>
        <?php } ?>
    </div>
    <a id="burgerMenu"><img src="assets/img/icons/menu.svg" alt="Menu"></a>
    <div id="accountDropdown">
        <a id="userId"><?= $username; ?><span><?= "#" . $id ?></span><img src="assets/img/icons/content_copy.svg" alt="content_copy"></a>
        <hr>
        <a href="/account.php">Paramètres<img src="assets/img/icons/manage_account.svg" alt="Settings"></a>
        <a href="/scripts/logout.php">Se déconnecter<img src="assets/img/icons/logout.svg" alt="Settings"></a>
    </div>
    <!-- Mobile Menu -->
    <div id="menuMobile">
        <a href="games.php" <?php if ($active == 'games.php') { echo ' id="active"'; } ?>>Jeux<img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a></a>
        <a href="news.php" <?php if ($active == 'news.php') { echo ' id="active"'; } ?>>Actus<img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a>
        <a href="support.php" <?php if ($active == 'support.php') { echo ' id="active"'; } ?>>Support<img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a>
        <hr>
        <?php if (isset($username)) { ?>
            <a id="userId"><?= $username; ?><?= "#" . $id ?><img src="assets/img/icons/content_copy_white.svg" alt="content_copy"></a>
            <a href="/account.php">Paramètres<img src="assets/img/icons/manage_account_white.svg" alt="Settings"></a>
            <a id="logout" href="/scripts/logout.php">Se déconnecter<img src="assets/img/icons/logout.svg" alt="Settings"></a>
        <?php } else { ?>
            <a id="signin" href="signin.php">Se connecter</a>
        <?php } ?>
    </div>
</header>