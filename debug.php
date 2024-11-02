<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['start_session'])) {
        $_SESSION['id'] = "0000";
        $_SESSION['username'] = "Brume";
        $_SESSION['email'] = "noalucas.ms@gmail.com";
        $_SESSION['creation_date'] = "01/10/2024";
        $_SESSION['firstname'] = "Noa";
        $_SESSION['lastname'] = "Second";
        $_SESSION['newsletter'] = "false";
        $_SESSION['role'] = "admin";
        echo "Session started.";
    } elseif (isset($_POST['destroy_session'])) {
        session_destroy();
        echo "Session destroyed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Management</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="start_session">Start Session</button>
    </form>
    <form method="post">
        <button type="submit" name="destroy_session">Destroy Session</button>
    </form>
</body>
</html>