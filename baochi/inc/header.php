<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/session.php';
Session::init();
include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

spl_autoload_register(function ($className) {
    include_once __DIR__ . "/../../admin/context/" . $className . ".php";
});

$db = new Database();
$fm = new Format();
$us = new user();
$cat = new category();
$post = new post();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GAT");
header("Cache-Control: max-age = 10800");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Tin tức mỗi ngày &amp; em lý</title>

    <!-- Favicon  -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Style CSS -->
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/animate.css" type="text/css" media="all">
	<link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="./css/magnific-popup.css" type="text/css" media="all">
	<link rel="stylesheet" href="./css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="./css/themify-icons.css" type="text/css" media="all"> -->
    <link rel="stylesheet" href="./css/titlerutgon.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="index.php"><img src="./img/core-img/logo.png" alt="Logo"></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto" id="main-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="contact.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.php">Home</a>
                                        <a class="dropdown-item" href="catagory.php">Catagory</a>
                                        <a class="dropdown-item" href="single-blog.php">Single Blog</a>
                                        <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                                        <a class="dropdown-item" href="contact.php">Contact</a>
                                    </ul>
                                </li> -->
                                <?php
                                    include_once __DIR__ . "/render_menu.php";
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Liên hệ</a>
                                </li>

                            </ul>
                            <!-- Search Form  -->
                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Tìm chi đó đi...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                            <!-- Icon login -->
                            <div class="form-submit">
                                <a class="btn btn-primary" href="/admin/page/login.php"><i class="fas fa-sign-in-alt ml-2"></i> Đăng nhập</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->