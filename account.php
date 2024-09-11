<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <section class="accountSection">
            <div>
                <h3>LaCorbeille account</h3>
                <a>All the informations about your account</a>
            </div>
            <div>
                <a>Username : <?php echo $_SESSION['username']; ?></a>
                <a>Role : <?php echo $_SESSION['role']; ?></a>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3>Personnal informations</h3>
                <a>Your personnal informations</a>
            </div>
            <div>
                <a>Firstname : <?php echo $_SESSION['firstname']; ?></a>
                <a>Lastname : <?php echo $_SESSION['lastname']; ?></a>
                <a>Email : <?php echo $_SESSION['email']; ?></a>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3>Communication preferences</h3>
                <a>Set your communication preferences</a>
            </div>
            <div>
                <a>Newsletter : <?php echo $_SESSION['newsletter']; ?></a>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>