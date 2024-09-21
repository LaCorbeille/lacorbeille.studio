<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/support.css">
    <script src="js/support.js" defer></script>
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <h1 id="title">Besoin de <b>nous</b> contacter ?</h1>
        <div id="supportGrid">
            <div id="help">
                <h3>Demander de l'aide</h3>
            </div>
            <div id="bug">
                <h3>Déclarer un bug</h3>
            </div>
            <div id="contact">
                <h3>Entrer en contact</h3>
            </div>
        </div>
        <a id="helpText">Sélectionnez une option pour continuer</a>

        <!-- Help -->
        <div class="help">
            <h2>Demander de l'aide</h2>
        </div>
        <form class="help" action="/submit_help_request" method="post">
            <textarea id="help-text" name="help_text" rows="5" placeholder="Décrivez votre problème ici..."
                required></textarea>
            <div><button type="submit">Envoyer</button></div>
        </form>

        <!-- Bug -->
        <div class="bug">
            <h2>Déclarer un bug</h2>
        </div>
        <form class="bug" action="/report_bug" method="post" enctype="multipart/form-data">
            <div>
                <select id="game-select" name="game">
                    <option value="jeu1">Jeu 1</option>
                    <option value="jeu2">Jeu 2</option>
                    <option value="jeu3">Jeu 3</option>
                </select>
            </div>
            <textarea id="bug-description" name="bug_description" rows="5" placeholder="Décrivez le bug rencontré..."
                required></textarea>
            <textarea id="repro-steps" name="repro_steps" rows="5"
                placeholder="Décrivez les étapes à suivre pour reproduire ce bug..." required></textarea>
            <input type="file" id="proof" name="proof"
                accept=".png, .jpeg, .jpg, .webp, .gif, .bmp, .svg, .mp4, .avi, .mov, .mkv, .webm"
                max-file-size="5000000">
            <div><button type="submit">Envoyer</button></div>
        </form>

        <!-- Contact -->
        <div class="contact">
            <h2>Entrer en contact</h2>
        </div>
        <form class="contact" action="/contact_us" method="post">
            <textarea id="contact-message" name="contact_message" rows="5" placeholder="Écrivez votre message ici..."
                required></textarea>
            <div><button type="submit">Envoyer</button></div>
        </form>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>