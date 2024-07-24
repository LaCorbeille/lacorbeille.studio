<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>
        <form action="./scripts/login.php">
            <h2>Connexion</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <label id="stayConnected"><input type="checkbox" name="remember" value="true"> Rester connecté</label>
            <button type="submit">Se connecter</button>
        </form>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>