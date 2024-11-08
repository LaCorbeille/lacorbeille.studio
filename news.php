<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/news.css">
    <link rel="stylesheet" href="css/responsive/news.css">
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script async src="//www.instagram.com/embed.js"></script>
    <meta name="description" content="Suivez les dernières actualités de LaCorbeille STUDIO. Découvrez nos annonces, mises à jour, et événements en temps réel." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Actualités LaCorbeille STUDIO",
    "url": "https://lacorbeille.studio/news.php",
    "description": "Dernières nouvelles et mises à jour de LaCorbeille STUDIO."
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="Actualités - LaCorbeille STUDIO" />
    <meta property="og:description" content="Restez informé des dernières actualités de LaCorbeille STUDIO." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio/news.php" />
    <meta property="og:type" content="website" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Actualités - LaCorbeille STUDIO" />
    <meta name="twitter:description" content="Restez informé des dernières actualités de LaCorbeille STUDIO." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />

</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <h1><?php getValueFromJson('title'); ?></h1>
        <div class="row"> 
            <div class="column">
                <!-- Instagram --><iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0" src="https://www.instagram.com/p/C_yT9AnIydQ/embed/captioned/?cr=1&amp;v=14&amp;wp=1350&amp;rd=http%3A%2F%2Flocalhost%3A3000&amp;rp=%2Fnews.php#%7B%22ci%22%3A0%2C%22os%22%3A167.5%2C%22ls%22%3A17.299999997019768%2C%22le%22%3A116.69999999552965%7D" allowtransparency="true" allowfullscreen="true" frameborder="0" height="647" data-instgrm-payload-id="instagram-media-payload-0" scrolling="no" style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
                <!-- Discord --><iframe src="https://discord.com/widget?id=411196282124894208&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>  
            <div class="column">
                <!-- LinkedIn --><iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:7239694458080960512" height="584" width="504" frameborder="0" allowfullscreen="" title="Post intégré"></iframe>
                <!-- X --><a class="twitter-timeline" href="https://twitter.com/LaCorbeilleSTD" data-width="300" data-height="300" data-chrome="nofooter noborders">Tweets by @LaCorbeilleSTD</a>
                <!-- Facebook --><iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0B4c7MhRQxQr55qn21HfFUzYN8u2CBLXjzFY15zc8rihZCuierNrbzqxCSruZD3THl%26id%3D61565357266191&show_text=true&width=500" width="500" height="436" style="border:none;overflow:hidden;background:white;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>