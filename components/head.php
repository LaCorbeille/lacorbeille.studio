<?php
if (!isset($_SESSION)) {
    session_start();
}

//Language
// include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/lang.php';
// $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
// $deviceLang = substr($language, 0, 2);
// $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $deviceLang;
// if (!isset($_SESSION['lang'])) {
//     $_SESSION['lang'] = $deviceLang;
// }
?>

<!--Favicon-->
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
<!-- CSS -->
<link rel="stylesheet" href="/css/stylesheet.css">
<link rel="stylesheet" href="/css/responsive/stylesheet.css">
<!-- JS -->
<script src="/js/viewportHeight.js" defer></script>
<!-- <script src="/js/lang.js" defer></script> -->
<script src="/js/dynamicTitle.js" defer></script>
<script src="/js/rightClick.js" defer></script>
<script src="/js/osDetection.js" defer></script>
<!-- Ajax -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">