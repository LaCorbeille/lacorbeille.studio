<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/games.css">
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
                Your browser does not support the video tag
            </video>
            <a href="#gamesWrapper" id="seeMoreGames">Voir plus</a>
            <a id="showcaseLogo"><img src="assets/img/branding/logoFullWhite.svg" alt="Logo Full White"></a>
        </div>
        <div id="gamesWrapper">
            <?php
            $status = 'new';
            $title = 'Platformer 3D';
            $platforms = ['Windows'];
            $img = 'assets/img/games/Platformer3D.png';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'development';
            $title = 'Rice Battle';
            $platforms = ['Windows'];
            $img = 'assets/img/games/RiceBattle.png';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'conception';
            $title = 'A Little Adventue';
            $platforms = ['Windows', 'Switch'];
            $img = 'https://placehold.co/400x600?text=A+Little+Adventure';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'conception';
            $title = 'BOT A.N.I.C';
            $platforms = ['Windows', 'Linux', 'XBox', 'PlayStation'];
            $img = 'https://placehold.co/400x600?text=BOT+A.N.I.C';
            include 'components/games/game.php';
            ?>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>