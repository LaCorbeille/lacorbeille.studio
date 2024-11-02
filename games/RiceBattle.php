<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/games/RiceBattle.css">
    <link rel="stylesheet" href="/css/responsive/games/RiceBattle.css">
    <meta name="description" content="RiceBattle est un jeu de combat 2.5D gratuit." />
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
        <div id="artworkWrapper"><img id="artwork" src="/assets/img/games/RiceBattle/artwork.png" alt="Artwork RiceBattle"></div>
        <h1>RiceBattle</h1>
        <a class="alert error">Le jeu est en cours de développement. L'alpha sera prochainement ouverte.</a>
        <div id="description">
            <div>
                <p>RiceBattle description</p>
                <div id="platforms"><a>Compatible Windows</a><img src="/assets/img/icons/platforms/Windows.svg"></div>
                <div id="controllers"><a>Prise en charge</a><img src="/assets/img/icons/controllers/gamepad.png"><img
                        src="/assets/img/icons/controllers/keyboardAndMouse.png"></div>
            </div>
            <img src="/assets/img/games/RiceBattle/1.png" alt="RiceBattle">
        </div>
        <!-- <button
            onclick="window.location.href='/assets/downloadable/RiceBattleAlpha1WindowsBuild.zip'">Télécharger
            l'alpha</button> -->
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>