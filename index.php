<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/index.css">
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
                Your browser does not support the video tag
            </video>
            <div>
                <h1>Bienvenue dans <b>LaCorbeille</b> STUDIO !</h1>
                <h3>Plongez dans l'univers de notre studio de développement de jeux vidéo indépendant, où créativité
                    et passion se rencontrent.</h3>
            </div>
        </div>
        <h1>Notre dernier jeu : <b>BOT A.N.I.C</b></h1>
        <section id="latestProject">
            <img src="https://placehold.co/500x500?text=assets/img/latestProjects.png" alt="latest project">
            <div>
                <h3>Suivez la conception de notre tout dernier jeu.</h3>
                <ul>
                    <li>Une immersion totale : Les mécaniques de jeu sont conçues pour vous faire oublier que vous êtes
                        devant un écran, vous plongeant entièrement dans l'expérience.</li>
                    <li>Des graphismes impressionnants : Grâce à Unreal Engine 5, nous exploitons les dernières avancées
                        technologiques pour renforcer l'immersion visuelle et vous offrir des environnements à couper le
                        souffle.</li>
                    <li>Un récit interactif : Laissez-vous transporter par une histoire pleine de rebondissements, qui
                        s'adapte à vos choix et à votre style de jeu.</li>
                </ul>
                <button onclick="window.location.href='/games/BOT-ANIC.php'">En savoir plus</button>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>