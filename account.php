<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>"></html>

<head>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/responsive/account.css">
    <script src="js/account.js" defer></script>
    <!-- META TAGS -->
    <meta name="description" content="Gérez vos informations personnelles et vos préférences dans votre compte LaCorbeille STUDIO." />
</head>

<body>
    <?php
    $active = basename($_SERVER['PHP_SELF']);
    include 'components/header.php';
    ?>
    <main>
        <div id="deletionPopUp">
            <div>
                <a>Are you sure you want to delete your account ?</a>
                <div>
                    <button id="deletionYes">Yes</button>
                    <button id="deletionNo">No</button>
                </div>
            </div>
        </div>
        <section class="accountSection">
            <div>
                <h3>LaCorbeille account</h3>
                <a>All the informations about your account</a>
            </div>
            <div>
                <a>Username : <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'undefined'; ?></a>
                <a>ID : <?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 'undefined'; ?></a>
                <a>Date of creation :
                    <?php echo isset($_SESSION['creation_date']) ? $_SESSION['creation_date'] : 'undefined'; ?></a>
                <form>
                    <input type="text" name="username" placeholder="Change username" pattern="[A-Za-z]+"
                        title="Username should only contain letters.">
                    <input type="submit" value="OK">
                </form>
                <form>
                    <input type="password" name="password" placeholder="Change password">
                    <input type="submit" value="OK">
                </form>
                <button id="deleteAccount">Delete my account</button>
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
                <form>
                    <input type="email" name="email" placeholder="Change email">
                    <input type="submit" value="OK">
                </form>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3>Communication preferences</h3>
                <a>Set your communication preferences</a>
            </div>
            <div>
                <a>Newsletter :
                    <?php echo isset($_SESSION['newsletter']) ? $_SESSION['newsletter'] : 'No'; ?></a>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>