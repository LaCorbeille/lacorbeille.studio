<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/signin.css">
    <script src="js/popUp.js" defer></script>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <form action="./scripts/login.php">
            <h2>Connexion</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <label id="stayConnected"><input type="checkbox" name="remember" value="true"> Accepter les&nbsp;<a id="openPopUp">conditions générales</a></label>
            <button type="submit">Créer le compte</button>
            <a href="signin.php" id="bottomText">Se connecter</a>
        </form>
        <div id="popUp">
            <h2>Conditions générales</h2>
            <p>En cochant cette case, vous acceptez les conditions générales d'utilisation de LaCorbeille STUDIO.</p>
            <button id="closePopUp">Fermer</button>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>