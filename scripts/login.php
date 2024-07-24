<?php
    session_start();
    $_SESSION['username'] = 'Brume';
    $_SESSION['id'] = '00000';
    $_SESSION['email'] = 'brume@lacorbeille.studio';
    header('Location: ../index.php');
    exit;
?>