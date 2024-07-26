<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once __DIR__ . '/scripts/register.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
        try {
            $result = registerUser($_POST['email'], $_POST['username'], $_POST['password']);
        } catch (Exception $e) {
            $error = "An error occurred: " . $e->getMessage();
        }
        if ($result === true) {
            $success = "Un email de confirmation vous a été envoyé.\nVeuillez vérifier votre compte.";
        } else {
            $error = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/popUp.js" defer></script>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <form method="POST">
            <h2>Inscription</h2>
            <?php if (!empty(trim($error))) : ?>
                <a class="alert error"><?php echo $error; ?></a>
            <?php endif; ?>
            <?php if (!empty(trim($success))) : ?>
                <a class="alert error"><?php echo $success; ?></a>
            <?php endif; ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <label id="terms"><input type="checkbox" name="remember" value="true" required> Accepter les&nbsp;<a id="openPopUp">conditions générales</a></label>
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