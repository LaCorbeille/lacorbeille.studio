<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/support.css">
    <link rel="stylesheet" href="css/responsive/support.css">
    <script src="js/support.js" defer></script>
    <meta name="description" content="Besoin d'aide ? Contactez notre support." />
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
        "@type": "Question",
        "name": "Comment contacter le support ?",
        "acceptedAnswer": {
            "@type": "Answer",
            "text": "Vous pouvez contacter notre support via nos formulaires en ligne."
        }
        }
    ]
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="Support - LaCorbeille STUDIO" />
    <meta property="og:description"
        content="Besoin d'aide avec nos jeux ou nos services ? Contactez le support de LaCorbeille STUDIO pour toute assistance." />
    <meta property="og:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta property="og:url" content="https://lacorbeille.studio/support.php" />
    <meta property="og:type" content="website" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Support - LaCorbeille STUDIO" />
    <meta name="twitter:description"
        content="Besoin d'aide avec nos jeux ou nos services ? Contactez le support de LaCorbeille STUDIO pour toute assistance." />
    <meta name="twitter:image" content="https://lacorbeille.studio/assets/img/branding/LogoFull.svg" />
    <meta name="twitter:site" content="@LaCorbeilleSTD" />
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <h1 id="title"><?php getValueFromJson('title'); ?></h1>
        <section id="support">
            <div id="supportGrid">
                <div id="help">
                    <h3><?php getValueFromJson('buttons.1'); ?></h3>
                </div>
                <div id="bug">
                    <h3><?php getValueFromJson('buttons.2'); ?></h3>
                </div>
                <div id="contact">
                    <h3><?php getValueFromJson('buttons.3'); ?></h3>
                </div>
            </div>
            <a id="helpText"><?php getValueFromJson(key: 'helpText'); ?></a>

            <!-- Help -->
            <div class="help">
                <h2>Demander de l'aide</h2>
            </div>
            <form class="help" <?php if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {echo 'action="/submit_help_request" method="post"';}?>>
                <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])): ?>
                    <a class="alert error">Vous devez être connecté pour envoyer le formulaire.</a>
                <?php endif; ?>
                <textarea id="help-text" name="help_text" rows="5" placeholder="Décrivez votre problème ici..."
                    required></textarea>
                <div><button type="submit" <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])) echo 'disabled'; ?>>Envoyer</button></div>
            </form>

            <!-- Bug -->
            <div class="bug">
                <h2>Déclarer un bug</h2>
            </div>
            <form class="bug" <?php if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {echo 'action="/report_bug" method="post" enctype="multipart/form-data"';} ?>>
                <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])): ?>
                    <a class="alert error">Vous devez être connecté pour envoyer le formulaire.</a>
                <?php endif; ?>
                <div>
                    <select id="game-select" name="game">
                        <option value="A Little Adventure - Platformer">A Little Adventure - Platformer</option>
                        <option value="RiceBattle">RiceBattle</option>
                    </select>
                </div>
                <textarea id="bug-description" name="bug_description" rows="5"
                    placeholder="Décrivez le bug rencontré..." required></textarea>
                <textarea id="repro-steps" name="repro_steps" rows="5"
                    placeholder="Décrivez les étapes à suivre pour reproduire ce bug..." required></textarea>
                <input type="file" id="proof" name="proof"
                    accept=".png, .jpeg, .jpg, .webp, .gif, .bmp, .svg, .mp4, .avi, .mov, .mkv, .webm"
                    max-file-size="5000000">
                <div><button type="submit" <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])) echo 'disabled'; ?>>Envoyer</button></div>
            </form>

            <!-- Contact -->
            <div class="contact">
                <h2>Entrer en contact</h2>
            </div>
            <form class="contact" <?php if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {echo 'action="/contact_us" method="post"';}?>>
                <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])): ?>
                    <a class="alert error">Vous devez être connecté pour envoyer le formulaire.</a>
                <?php endif; ?>
                <textarea id="contact-message" name="contact_message" rows="5"
                    placeholder="Écrivez votre message ici..." required></textarea>
                <div><button type="submit" <?php if (!isset($_SESSION['id']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])) echo 'disabled'; ?>>Envoyer</button></div>
            </form>
        </section>
        <!-- FAQ -->
        <h1><?php getValueFromJson('faq.title'); ?></h1>
        <section id="faq">
            <div class="faq">
                <h2><?php getValueFromJson('faq.headers.1.title'); ?></h2>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.1.questions.1'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.1.answers.1'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.1.questions.2'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.1.answers.2'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.1.questions.3'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.1.answers.3'); ?></p>
                </div>
            </div>
            <div class="faq">
                <h2><?php getValueFromJson('faq.headers.2.title'); ?></h2>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.2.questions.1'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.2.answers.1'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.2.questions.2'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.2.answers.2'); ?></p>
                </div>
            </div>
            <div class="faq">
                <h2><?php getValueFromJson('faq.headers.3.title'); ?></h2>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.3.questions.1'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.3.answers.1'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.3.questions.2'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.3.answers.2'); ?></p>
                </div>
            </div>
            <div class="faq">
                <h2><?php getValueFromJson('faq.headers.4.title'); ?></h2>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.4.questions.1'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.4.answers.1'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.4.questions.2'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.4.answers.2'); ?></p>
                </div>
                <div class="question">
                    <h3><?php getValueFromJson('faq.headers.4.questions.3'); ?></h3>
                    <p><?php getValueFromJson('faq.headers.4.answers.3'); ?></p>
                </div>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>