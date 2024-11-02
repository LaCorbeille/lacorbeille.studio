<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

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
        if (!isset($result)) {
            $error = "An error occurred: Please try again later.";
        } else {
            if ($result === true) {
                $success = "Un email de confirmation vous a été envoyé.\nVeuillez vérifier votre compte.";
                header("Location: signin.php");
                exit;
            } else {
                $error = $result;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/responsive/signup.css">
    <script src="js/popUp.js" defer></script>
    <!-- META TAGS -->
    <meta name="description" content="Rejoignez LaCorbeille STUDIO en créant un compte. Inscrivez-vous pour accéder à des contenus exclusifs et rester informé de nos actualités." />
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <form method="POST">
            <h2><?php getValueFromJson('title'); ?></h2>
            <?php if (!empty(trim($error))): ?>
                <a class="alert error"><?php echo $error; ?></a>
            <?php endif; ?>
            <?php if (!empty(trim($success))): ?>
                <a class="alert error"><?php echo $success; ?></a>
            <?php endif; ?>
            <input type="email" name="email" placeholder="<?php getValueFromJson('email'); ?>" required>
            <input type="text" name="username" placeholder="<?php getValueFromJson('username'); ?>" required>
            <input type="password" name="password" placeholder="<?php getValueFromJson('password'); ?>" required>
            <label id="terms"><input type="checkbox" name="remember" value="true" required><?php getValueFromJson('accept'); ?></label>
            <button type="submit"><?php getValueFromJson('signup'); ?></button>
            <a href="signin.php" class="bottomText"><?php getValueFromJson('signin'); ?></a>
        </form>
        <div id="popUp">
            <h2><?php getValueFromJson('popUp.title'); ?></h2>
            <p><?php getValueFromJson('popUp.content'); ?></p>
            <button id="closePopUp"><?php getValueFromJson('popUp.close'); ?></button>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>