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
    <a id="burgerMenu">
        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')"><path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20"></path><path class="line middle" d="m 70,50 h -40"></path><path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20"></path></svg>
    </a>
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