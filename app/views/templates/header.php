<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/styles/Global.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/styles/<?= $data["style"] ?>.css">
    <link rel="icon" href="<?= BASEURL ?>/assets/img/icon-title.png" type="image/x-icon">
    <title>PucPen | <?= $data["tab-name"] ?></title>
</head>

<body>

    <header>
        <a href="<?= BASEURL ?>/Home/"><img src="<?= BASEURL ?>/assets/img/logo.png" alt="logo" width="150px"></a>


        <nav class="nav">
            <ul>
                <li><a href="<?= BASEURL ?>/Home">Beranda</a></li>
                <li><a href="<?= BASEURL ?>/Collections">Koleksi</a></li>
                <li><a href="<?= BASEURL ?>/Contribute">Pustakawan</a></li>
                <li><a href="<?= BASEURL ?>/About">Tentang</a></li>
                <li><a href="<?= BASEURL ?>/Contact">Kontak</a></li>
                <li style="color : white">|</li>
                <li><a href="<?= BASEURL ?>/SignIn">Masuk</a></li>
            </ul>
        </nav>

        <menu-icon>
            <input type="checkbox" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </menu-icon>
    </header>