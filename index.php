<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>"></html>

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive/index.css">
    <meta name="description" content="LaCorbeille STUDIO, créateur de jeux vidéo indépendant. Découvrez nos projets en cours, nos jeux sortis, et les dernières actualités de notre studio." />
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
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <div class="loadingContainer">
            <svg class="loadingSVGContainer" viewBox="0 0 40 40" height="40" width="40">
                <circle class="track" cx="20" cy="20" r="17.5" pathlength="100" stroke-width="5px" fill="none" />
                <circle class="car" cx="20" cy="20" r="17.5" pathlength="100" stroke-width="5px" fill="none" />
            </svg>
        </div>
        <div id="showcase">
            <video autoplay loop muted>
                <source src="assets/video/showcase.mp4" type="video/mp4">
                <?php getValueFromJson('showcase.error'); ?>
            </video>
            <div>
                <h1><?php getValueFromJson('showcase.title.1'); ?><b><?php getValueFromJson('showcase.title.2'); ?></b><?php getValueFromJson('showcase.title.3'); ?></h1>
                <h3><?php getValueFromJson('showcase.description'); ?></h3>
            </div>
        </div>
        <h1><?php getValueFromJson('latestProject.title.1'); ?><b><?php getValueFromJson('latestProject.title.2'); ?></b></h1>
        <section id="latestProject">
            <img src="https://placehold.co/500x500?text=assets/img/latestProjects.png" alt="latest project">
            <div>
                <h3><?php getValueFromJson('latestProject.subtitle'); ?></h3>
                <ul>
                    <li><?php getValueFromJson('latestProject.paragraph.1'); ?></li>
                    <li><?php getValueFromJson('latestProject.paragraph.2'); ?></li>
                    <li><?php getValueFromJson('latestProject.paragraph.3'); ?></li>
                </ul>
                <button onclick="window.location.href='/games/BOT-ANIC.php'"><?php getValueFromJson('latestProject.button'); ?></button>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>