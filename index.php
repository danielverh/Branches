<?php
/**
 * Created by PhpStorm.
 * User: Daniel Verhoef
 * Date: 12-3-2017
 * Time: 09:47
 */
require_once 'header.php';
$branch = new Branches();

$page = $_GET['page'];
$pages = $branch->getRPages();
$page_info = $pages[$page];
$title = $page->name;
$url = null;
if ($page_info) {
    $title = $page_info['title'];
    $url = $page_info['url'];
}

$page = $branch->getPage($page);
$site_title = $branch->json["title"];
?>
<head>
    <link rel="stylesheet" href="roots/css/bootstrap.min.css">
    <link rel="stylesheet" href="roots/css/tether.min.css">
    <link rel="stylesheet" href="roots/css/stylesheet.css">

    <title><?= $site_title . ' - ' . $title ?></title>
</head>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/"><?= $site_title?></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php

            foreach ($pages as $item) {
                if ($item['url'] === $url) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $url ?>"><?= $title ?> <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $item['url'] ?>"><?= $item['title'] ?></a>
                    </li>
                    <?php
                }
            } ?>
        </ul>
    </div>
</nav>
<body>

<div class="container">
    <div class="col-md-12">
        <?php
        echo $page->getContent();
        ?>
        <!-- Footer: all the scripts-->
        <footer>
            <script src="roots/js/jquery-3.1.1.min.js"></script>
            <script src="roots/js/tether.min.js"></script>
            <script src="roots/js/bootstrap.min.js"></script>
            <script src="https://use.typekit.net/ujy3jey.js"></script>
            <script>try{Typekit.load({ async: true });}catch(e){}</script>
        </footer>
    </div>
</div>
</body>
