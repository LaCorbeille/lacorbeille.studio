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
                <a>Username : <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'undefined'; ?></a>
                <a>Role : <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'undefined'; ?></a>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3>Personnal informations</h3>
                <a>Your personnal informations</a>
            </div>
            <div>
                <a>Firstname : <?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : 'undefined'; ?></a>
                <a>Lastname : <?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : 'undefined'; ?></a>
                <a>Email : <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'undefined'; ?></a>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3>Communication preferences</h3>
                <a>Set your communication preferences</a>
            </div>
            <div>
                <a>Newsletter : <?php echo isset($_SESSION['newsletter']) ? $_SESSION['newsletter'] : 'undefined'; ?></a>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>