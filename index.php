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