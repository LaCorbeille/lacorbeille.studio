<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>"></html>

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/games.css">
    <link rel="stylesheet" href="css/responsive/games.css">
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <div id="showcase">
            <video autoplay loop muted>
                <source src="assets/video/showcaseGames.mp4" type="video/mp4">
                <?php getValueFromJson('showcase.error'); ?>
            </video>
            <a id="showcaseLogo"><img src="assets/img/branding/logoFullWhite.svg" alt="Logo Full White"></a>
            <a href="#title" id="seeMoreGames"><?php getValueFromJson('showcase.button'); ?></a>
        </div>
        <h1 id="title"><?php getValueFromJson('games.title.1'); ?><b><?php getValueFromJson('games.title.2'); ?></b><?php getValueFromJson('games.title.3'); ?></h1>
        <div id="gamesWrapper">
            <?php
            $status = 'new';
            $title = 'Platformer 3D';
            $platforms = ['Windows'];
            $img = 'assets/img/games/Platformer3D.png';
            $target = 'games/Platformer3D.php';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'development';
            $title = 'Rice Battle';
            $platforms = ['Windows'];
            $img = 'assets/img/games/RiceBattle.png';
            $target = 'games/RiceBattle.php';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'conception';
            $title = 'A Little Adventue';
            $platforms = ['Windows', 'Switch'];
            $img = 'https://placehold.co/400x600?text=A+Little+Adventure';
            $target = 'games/ALittleAdventure.php';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'conception';
            $title = 'BOT A.N.I.C';
            $platforms = ['Windows', 'Linux', 'XBox', 'PlayStation'];
            $img = 'https://placehold.co/400x600?text=BOT+A.N.I.C';
            $target = 'games/BOT-ANIC.php';
            include 'components/games/game.php';
            ?>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>