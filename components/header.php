<?php
if (!isset($_SESSION)) {
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
        <a href="games.php" <?php if ($active == 'games.php') { echo ' id="active"'; } ?>><?php getValueFromJson('games'); ?></a>
        <a href="news.php" <?php if ($active == 'news.php') { echo ' id="active"'; } ?>><?php getValueFromJson('news'); ?></a>
        <a href="support.php" <?php if ($active == 'support.php') { echo ' id="active"'; } ?>><?php getValueFromJson('support'); ?></a>
        <?php if (isset($username)) { ?>
            <a id="account"><?php echo $username; ?></a>
        <?php } else { ?>
            <a id="signin" href="signin.php"><?php getValueFromJson(key: 'login'); ?></a>
        <?php } ?>
    </div>
    <a id="burgerMenu"><img src="assets/img/icons/menu.svg" alt="Menu"></a>
    <div id="accountDropdown">
        <a id="userId"><?= $username; ?><span><?= "#" . $id ?></span><img src="assets/img/icons/content_copy.svg" alt="content_copy"></a>
        <hr>
        <a href="/account.php"><?php getValueFromJson('settings'); ?><img src="assets/img/icons/manage_account.svg" alt="settings"></a>
        <a href="/scripts/logout.php"><?php getValueFromJson('logout'); ?><img src="assets/img/icons/logout.svg" alt="logout"></a>
    </div>
    <!-- Mobile Menu -->
    <div id="menuMobile">
        <a href="games.php" <?php if ($active == 'games.php') { echo ' id="active"'; } ?>><?php getValueFromJson('games'); ?><img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a></a>
        <a href="news.php" <?php if ($active == 'news.php') { echo ' id="active"'; } ?>><?php getValueFromJson('news'); ?><img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a>
        <a href="support.php" <?php if ($active == 'support.php') { echo ' id="active"'; } ?>><?php getValueFromJson('support'); ?><img src="assets/img/icons/arrow_north_east.svg" alt="Go To"></a>
        <hr>
        <?php if (isset($username)) { ?>
            <a id="userId"><?= $username; ?><?= "#" . $id ?><img src="assets/img/icons/content_copy_white.svg" alt="content_copy"></a>
            <a href="/account.php"><?php getValueFromJson('settings'); ?><img src="assets/img/icons/manage_account_white.svg" alt="settings"></a>
            <a id="logout" href="/scripts/logout.php"><?php getValueFromJson('logout'); ?><img src="assets/img/icons/logout.svg" alt="logout"></a>
        <?php } else { ?>
            <a id="signin" href="signin.php"><?php getValueFromJson('login'); ?></a>
        <?php } ?>
    </div>
</header>