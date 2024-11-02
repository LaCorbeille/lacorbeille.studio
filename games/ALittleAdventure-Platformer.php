<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/games/ALittleAdventure-Platformer.css">
    <link rel="stylesheet" href="/css/responsive/games/ALittleAdventure-Platformer.css">
    <meta name="description" content="A Little Adventure Platformer est un platformer 3D dans gratuit." />
    <!-- Schema.org -->
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
    include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
    ?>
    <main>
        <img id="artwork" src="/assets/img/games/ALittleAdventure-Platformer/artwork.png"
            alt="Artwork A Little Adventure - Platformer">
        <h1>A Little Adventure - Platformer</h1>
        <a class="alert error">Le jeu est en cours de développement. L'alpha est ouverte.</a>
        <div id="description">
            <div>
                <p>Plongez dans l'univers A Little Adventure avec ce platformer vibrant où chaque niveau regorge
                    d'obstacles
                    et de défis. Affrontez des canons, activez des mécanismes ingénieux et collectez des objets pour
                    espérer
                    compléter les niveaux.</p>
                <div id="platforms"><a>Compatible Windows</a><img src="/assets/img/icons/platforms/Windows.svg"></div>
                <div id="controllers"><a>Prise en charge</a><img src="/assets/img/icons/controllers/gamepad.png"><img src="/assets/img/icons/controllers/keyboardAndMouse.png"></div>
            </div>
            <img src="/assets/img/games/ALittleAdventure-Platformer/1.png" alt="A Little Adventure - Platformer">
        </div>
        <button
            onclick="window.location.href='/assets/downloadable/ALittleAdventure - Platformer - Alpha1WindowsBuild.zip'">Télécharger
            l'alpha</button>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>