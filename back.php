<?php
include_once "base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Resume</title>
    <link rel="stylesheet" href="css/back.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
            <li><a href="?do=links">連結管理</a></li>
            <li><a href="?do=conditions">求職條件管理</a></li>
            <li><a href="?do=works">作品管理</a></li>
            <li><a href="?do=bio">自傳管理</a></li>
        </ul>
        <div class="burger">
            <div class="l-1"></div>
            <div class="l-2"></div>
            <div class="l-3"></div>
        </div>
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