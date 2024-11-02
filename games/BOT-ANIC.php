<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/games/bot-anic.css">
    <meta name="description"
        content="BOT - A.N.I.C est un jeu développé par LaCorbeille STUDIO. Explorez un monde post-apocalyptique avec un androïde combatif, A.N.I.C, dans une aventure stratégique où vos choix auront des conséquences." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "VideoGame",
      "name": "BOT - A.N.I.C",
      "description": "BOT - A.N.I.C est un jeu où vous incarnez un androïde combattant dans un monde post-apocalyptique envahi par des plantes mutantes.",
      "image": "https://lacorbeille.studio/assets/img/branding/LogoFull.svg",
      "genre": "Action, Stratégie",
      "publisher": {
        "@type": "Organization",
        "name": "LaCorbeille STUDIO",
        "url": "https://lacorbeille.studio"
      },
      "platform": "PC",
      "url": "https://lacorbeille.studio/games/BOT-ANIC",
      "potentialAction": {
        "@type": "PlayAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://lacorbeille.studio/games/BOT-ANIC"
        }
      }
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="BOT - A.N.I.C | LaCorbeille STUDIO" />
    <meta property="og:description"
        content="Incarnez l'androïde A.N.I.C et affrontez des plantes mutantes dans un monde post-apocalyptique." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio/games/BOT-ANIC" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LaCorbeille STUDIO" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="BOT - A.N.I.C | LaCorbeille STUDIO" />
    <meta name="twitter:description"
        content="Incarnez A.N.I.C, un androïde prêt à affronter des hordes de plantes mutantes pour sauver son monde." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';
    ?>
    <main>
      <h1><b>BOT - A.N.I.C</b></h1>
        <section>Biomes et créatures</section>
        <section>Customisation</section>
        <section>Rechargement</section>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>