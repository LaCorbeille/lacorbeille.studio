<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/legal.css">
    <meta name="robots" content="nofollow">
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <section id="legalNotice">
            <h1>Mentions Légales</h1>
            <h2>Éditeur du site</h2>
            Le site https://lacorbeille.studio est édité par Noa Second pour LaCorbeille STUDIO, un studio de
            développement de jeux vidéo.
            Email : contact@lacorbeille.studio

            <h2>Hébergeur</h2>
            Le site est hébergé par LWS (Ligne Web Services) France, dont le siège social est situé au 10 Rue
            Penthièvre, 75008 Paris, France.
            Téléphone : 01 77 62 30 03
            Site Web : www.lws.fr
        </section>
        <section id="privacyPolicy">
            <h1>Politique de Confidentialité</h1>
            <h2>Collecte des Données</h2>
            LaCorbeille STUDIO s'engage à protéger la vie privée de ses utilisateurs. Nous ne collectons des données
            personnelles que lorsqu’un utilisateur crée un compte sur notre site. Les informations collectées incluent :

            Prénom, nom
            Adresse email
            Nom d’utilisateur
            Toute autre information nécessaire pour la gestion de votre compte utilisateur

            <h2>Utilisation des Données</h2>
            Les données collectées sont utilisées pour :

            La gestion des comptes utilisateurs
            L’envoi d’informations relatives à nos services
            L’amélioration de l'expérience utilisateur sur notre site
            Aucune donnée personnelle ne sera utilisée à des fins commerciales ou partagée avec des tiers sans le
            consentement explicite de l’utilisateur.

            <h2>Sécurité des Données</h2>
            LaCorbeille STUDIO met en œuvre toutes les mesures de sécurité nécessaires pour protéger les données
            sensibles. Toutes les informations sensibles sont cryptées pour garantir leur confidentialité. Nous
            utilisons des protocoles de sécurité standard pour éviter tout accès non autorisé.

            <h2>Droits des Utilisateurs</h2>
            Conformément au Règlement Général sur la Protection des Données (RGPD), vous avez le droit de :

            <h2>Accéder à vos données personnelles</h2>
            Demander la rectification de vos données
            Demander la suppression de votre compte et de vos données personnelles
            Définir des directives sur le sort de vos données après votre décès
            Pour exercer ces droits, veuillez nous contacter par email à : contact@lacorbeille.studio

            <h2>Modification de la Politique de Confidentialité</h2>
            LaCorbeille STUDIO se réserve le droit de modifier la présente politique de confidentialité à tout moment.
            Les utilisateurs seront informés de toute modification par une notification sur le site.

            <h2>Contact</h2>
            Pour toute question concernant la protection de vos données personnelles, vous pouvez nous contacter à :
            contact@lacorbeille.studio
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>