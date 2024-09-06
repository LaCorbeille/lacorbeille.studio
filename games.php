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
    <?php include 'components/header.php'; ?>
    <main>
        <div id="gamesWrapper">
            <?php
            $title = 'Platformer 3D';
            $platforms = ['Windows'];
            $img = 'assets/img/games/Platformer3D.png';
            include 'components/games/game.php';
            ?>
            <?php
            $title = 'Rice Battle';
            $platforms = ['Windows'];
            $img = 'assets/img/games/RiceBattle.png';
            include 'components/games/game.php';
            ?>
            <?php
            $title = 'A Little Adventue';
            $platforms = ['Windows', 'Switch'];
            $img = 'https://placehold.co/400x600?text=A+Little+Adventure';
            include 'components/games/game.php';
            ?>
            <?php
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