<?php
include_once "base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/back.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 




</head>

<body>
    <nav>
        <div class="logo">
            <h4>Sadie Hsieh</h4>
        </div>
        <ul class="nav-links">
            <li><a href="?do=title">大標題管理</a></li>
            <li><a href="?do=info">個人資料管理</a></li>
            <li><a href="?do=img">個人圖片管理</a></li>
            <li><a href="?do=skills">技能管理</a></li>
            <li><a href="?do=link">連結管理</a></li>
            <li><a href="?do=jobs">求職條件管理</a></li>
            <li><a href="?do=works">作品管理</a></li>
            <li><a href="?do=bio">自傳管理</a></li>
            <li><a href="?do=exps">經驗管理</a></li>
            <li><a href="?do=edu">學歷管理</a></li>
        </ul>
     
    </nav>
    <hr class="divider">
    <?php


    $do = (!empty($_GET['do'])) ? ($_GET['do']) : 'main';
    $file = "back/" . $do . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        include 'back/main.php';
    }


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous"></script>
</body>

</html>