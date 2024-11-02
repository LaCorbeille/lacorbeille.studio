<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/games/lelab.css">
    <meta name="description"
        content="LeLAB est un jeu développé par LaCorbeille STUDIO. Dans ce FPS multijoueurs rapide, construisez des arènes et battez-vous." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "VideoGame",
      "name": "LeLAB",
      "description": "LeLAB est un jeu développé par LaCorbeille STUDIO. Dans ce FPS multijoueurs rapide, construisez des arènes et battez-vous.",
      "image": "https://lacorbeille.studio/assets/img/branding/LogoFull.svg",
      "genre": "Action, Stratégie",
      "publisher": {
        "@type": "Organization",
        "name": "LaCorbeille STUDIO",
        "url": "https://lacorbeille.studio"
      },
      "platform": "PC",
      "url": "https://lacorbeille.studio/games/LeLAB",
      "potentialAction": {
        "@type": "PlayAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://lacorbeille.studio/games/LeLAB"
        }
      }
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="LeLAB | LaCorbeille STUDIO" />
    <meta property="og:description"
        content="Dans ce FPS multijoueurs rapide, construisez des arènes et battez-vous." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio/games/LeLAB" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LaCorbeille STUDIO" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="LeLAB | LaCorbeille STUDIO" />
    <meta name="twitter:description"
        content="Dans ce FPS multijoueurs rapide, construisez des arènes et battez-vous." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
    ?>
    <main>
      <h1><b>LeLAB</b></h1>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>