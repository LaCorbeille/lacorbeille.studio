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
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

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
                <h3><?php getValueFromJson('sections.1.title'); ?></h3>
                <a><?php getValueFromJson('sections.1.description'); ?></a>
            </div>
            <div>
                <a><?php getValueFromJson('sections.1.username'); ?><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'undefined'; ?></a>
                <a><?php getValueFromJson('sections.1.id'); ?><?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 'undefined'; ?></a>
                <a><?php getValueFromJson('sections.1.creationDate'); ?><?php echo isset($_SESSION['creation_date']) ? $_SESSION['creation_date'] : 'undefined'; ?></a>
                <form>
                    <input type="text" name="username" placeholder="<?php getValueFromJson('sections.1.editUsername'); ?>" pattern="[A-Za-z]+"
                        title="Username should only contain letters.">
                    <input type="submit" value="OK">
                </form>
                <form>
                    <input type="password" name="password" placeholder="<?php getValueFromJson('sections.1.editPassword'); ?>">
                    <input type="submit" value="OK">
                </form>
                <button id="deleteAccount"><?php getValueFromJson('sections.1.deleteAccount'); ?></button>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3><?php getValueFromJson('sections.2.title'); ?></h3>
                <a><?php getValueFromJson('sections.2.description'); ?></a>
            </div>
            <div>
                <a><?php getValueFromJson('sections.2.firstname'); ?><?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : 'undefined'; ?></a>
                <a><?php getValueFromJson('sections.2.lastname'); ?><?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : 'undefined'; ?></a>
                <a><?php getValueFromJson('sections.2.email'); ?><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'undefined'; ?></a>
                <form>
                    <input type="email" name="email" placeholder="<?php getValueFromJson('sections.2.editEmail'); ?>">
                    <input type="submit" value="OK">
                </form>
            </div>
        </section>
        <section class="accountSection">
            <div>
                <h3><?php getValueFromJson('sections.3.title'); ?></h3>
                <a><?php getValueFromJson('sections.3.description'); ?></a>
            </div>
            <div>
                <a>
                    <?php getValueFromJson('sections.3.newsletter'); ?>
                    <?php echo isset($_SESSION['newsletter']) ? $_SESSION['newsletter'] : 'No'; ?>
                </a>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>

</html>