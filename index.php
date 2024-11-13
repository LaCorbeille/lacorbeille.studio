<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/gameCard.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive/index.css">
    <script src="js/carousel.js" defer></script>
    <meta name="description"
        content="LaCorbeille STUDIO, créateur de jeux vidéo indépendant. Découvrez nos projets en cours, nos jeux sortis, et les dernières actualités de notre studio." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "LaCorbeille STUDIO",
        "url": "https://lacorbeille.studio",
        "logo": "https://lacorbeille.studio/assets/img/branding/LogoFull.svg",
        "description": "Créateur de jeux vidéo innovants."
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="LaCorbeille STUDIO - Créateur de Jeux Vidéo" />
    <meta property="og:description" content="Découvrez nos jeux vidéo et les dernières actualités de notre studio." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio" />
    <meta property="og:type" content="website" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="LaCorbeille STUDIO - Créateur de Jeux Vidéo" />
    <meta name="twitter:description" content="Découvrez nos jeux vidéo et les dernières actualités de notre studio." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />
</head>

<body>
    <header>
        <img src="assets/img/branding/LogoFullWhite.svg" alt="LaCorbeille STUDIO" />
    </header>
    <main>
        <div id="contentWrapper">
            <h1>LaCorbeille STUDIO</h1>
        </div>
        <div id="carousel">
            <?php
            $title = "A Little Adventure";
            $description = "A Little Adventure est platformer vibrant où chaque niveau regorge d'obstacles et de défis.";
            $gameTags = ["Platformer", "Adventure", "3D", "LowPoly"];
            $action = "Télécharger l'alpha";
            $platforms = ["Windows"];
            $cover = "ALittleAdventure.png";
            include 'components/gameCard.php';
            ?>
            <?php
            $title = "Rice Battle";
            // $description = "Rice Battle est un jeu de combat en 2.5D dans l'univers de la cuisine asiatique.";
            $description = "Ce jeu est en cours de conception.";
            $gameTags = ["Combat", "2.5D", "Arcade"];
            // $action = "Télécharger la beta";
            $action = "";
            $platforms = ["Windows"];
            $cover = "RiceBattle.png";
            include 'components/gameCard.php';
            ?>
            <?php
            $title = "BOT A.N.I.C";
            $description = "Ce jeu est en cours de conception.";
            $gameTags = [""];
            $action = "";
            $platforms = [""];
            $cover = "";
            include 'components/gameCard.php';
            ?>
            <?php
            $title = "Le LAB";
            $description = "Ce jeu est en cours de conception.";
            $gameTags = [""];
            $action = "";
            $platforms = [""];
            $cover = "";
            include 'components/gameCard.php';
            ?>
        </div>
        <div id="bottomFade"></div>
        <img id="background" src="assets/video/background.svg" alt="Background" />
    </main>
    <footer>
        <div id="navArrows">
            <a id="arrowLeft"><img src="assets/img/icons/Arrow_Left.svg"></a>
            <a id="arrowRight"><img src="assets/img/icons/Arrow_Right.svg"></a>
        </div>
        <div id="social">
            <a>Suivez-nous</a>
            <a href="https://lacorbeille-studio.itch.io"><img src="assets/img/icons/social/ItchIO.svg"></a>
            <a href="https://discord.com/invite/hmPzS4k"><img src="assets/img/icons/social/Discord.svg"></a>
            <a href="https://www.facebook.com/people/LaCorbeille-Studio/61565357266191/"><img
                    src="assets/img/icons/social/Facebook.svg"></a>
            <a href="https://www.linkedin.com/company/lacorbeille-studio"><img
                    src="assets/img/icons/social/LinkedIn.svg"></a>
            <a href="https://x.com/LaCorbeilleSTD"><img src="assets/img/icons/social/X.svg"></a>
            <a href="https://www.instagram.com/lacorbeille.studio"><img src="assets/img/icons/social/Instagram.svg"></a>
        </div>
        <a id="mail" href="mailto:contact@lacorbeille.studio">contact@lacorbeille.studio</a>
    </footer>
</body>

</html>