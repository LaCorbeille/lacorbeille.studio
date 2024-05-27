<!--Développé avec ❤️ par : www.noasecond.com-->
<?php
session_start();

//Language
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$deviceLang = substr($language, 0, 2);
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $deviceLang;
}
$lang = $_SESSION['lang'];
?>

<!-- Meta Tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
<!-- CSS -->
<link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/responsive/stylesheet.css">
<link rel="stylesheet" href="css/responsive/header.css">
<link rel="stylesheet" href="css/responsive/footer.css">
<!-- JavaScript -->
<script src="js/lang.js" defer></script>
<script src="js/dynamicTitle.js" defer></script>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">