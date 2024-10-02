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

include_once __DIR__ . '/scripts/login.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!isset($_POST['remember'])) {
            $_POST['remember'] = false;
        }
        try {
            $result = loginUser($_POST['email'], $_POST['password'], $_POST['remember']);
        } catch (Exception $e) {
            $error = "An error occurred: " . $e->getMessage();
        }
        if (!isset($result)) {
            $error = "An error occurred: Please try again later.";
        } else {
            if ($result === true) {
                header("Location: index.php");
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
    <link rel="stylesheet" href="css/signin.css">
    <!-- META TAGS -->
    <meta name="description" content="Connectez-vous à votre compte LaCorbeille STUDIO pour accéder à vos demandes de support et recevoir des notifications personnalisées." />
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <form method="POST">
            <h2><?php getValueFromJson('title'); ?></h2>
            <?php if (!empty(trim($error))) : ?>
                <a class="alert error"><?php echo $error; ?></a>
            <?php endif; ?>
            <input type="email" name="email" placeholder="<?php getValueFromJson('email'); ?>" required>
            <input type="password" name="password" placeholder="<?php getValueFromJson('password'); ?>" required>
            <label id="stayConnected"><input type="checkbox" name="remember" value="true"><?php getValueFromJson('remember'); ?></label>
            <button type="submit"><?php getValueFromJson('signin'); ?></button>
            <a href="signup.php" class="bottomText"><?php getValueFromJson('signup'); ?></a>
            <a href="#" class="bottomText"><?php getValueFromJson('forgot'); ?></a>
        </form>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>