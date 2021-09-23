<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script src="jquery.min.js"></script>

    
</head>



<?php if(isset($_SESSION['admin'])){
     echo  "<style>.match>div:hover:not(.popup),.match>div:hover .terminateButton{height:100px;opacity:1!important;}</style>";
    } 
    ?>
