<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/games.css">
    <link rel="stylesheet" href="css/responsive/games.css">
    <meta name="description" content="Explorez les jeux vidéo créés par LaCorbeille STUDIO. Retrouvez nos jeux en cours de développement et nos dernières sorties." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Nos jeux",
        "url": "https://lacorbeille.studio/games.php",
        "description": "Découvrez les jeux développés par LaCorbeille STUDIO.",
        "itemListElement": [
            {
                "@type": "VideoGame",
                "name": "RiceBattle",
                "url": "https://lacorbeille.studio/RiceBattle"
            },
            {
                "@type": "VideoGame",
                "name": "A Litte Adventure",
                "url": "https://lacorbeille.studio/ALittleAdventure"
            },
            {
                "@type": "VideoGame",
                "name": "BOT A.N.I.C",
                "url": "https://lacorbeille.studio/BOT-ANIC"
            }
        ]
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="Nos Jeux - LaCorbeille STUDIO" />
    <meta property="og:description" content="Explorez les jeux vidéo créés par LaCorbeille STUDIO." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio/games.php" />
    <meta property="og:type" content="website" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Nos Jeux - LaCorbeille STUDIO" />
    <meta name="twitter:description" content="Explorez les jeux vidéo créés par LaCorbeille STUDIO." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />

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
        <h1 id="title"><?php getValueFromJson('games.title'); ?></h1>
        <div id="gamesWrapper">
            <?php
            $status = 'new';
            $status = 'development';
            $title = 'Platformer 3D';
            $platforms = ['Windows'];
            $img = 'assets/img/games/ALittleAdventure-Platformer/Cover.png';
            $target = 'games/ALittleAdventure-Platformer.php';
            include 'components/games/game.php';
            ?>
            <?php
            $status = 'development';
            $title = 'Rice Battle';
            $platforms = ['Windows'];
            $img = 'assets/img/games/RiceBattle/Cover.png';
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
            <?php
            $status = 'conception';
            $title = 'LeLAB';
            $platforms = ['Windows', 'Linux', 'XBox', 'PlayStation'];
            $img = 'https://placehold.co/400x600?text=Le+LAB';
            $target = 'games/LeLAB.php';
            include 'components/games/game.php';
            ?>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>