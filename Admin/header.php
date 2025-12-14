<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ecommerce Dashboard &mdash; CodiePie</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-4">
    <!-- <div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div> -->

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result"></div>
                    </div>
                </form>

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/uploads/<?php echo $_SESSION['image']; ?>"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Welcome, <?php echo $_SESSION['user_name']; ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.php" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                            <a href="features-activities.html" class="dropdown-item has-icon"><i
                                    class="fas fa-bolt"></i> Activities</a>
                            <a href="features-settings.html" class="dropdown-item has-icon"><i class="fas fa-cog"></i>
                                Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item has-icon text-danger"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar -->
            <div class="main-sidebar sidebar-style-3">
                <aside id="sidebar-wrapper">

                    <!-- Brand -->
                    <div class="sidebar-brand">
                        <a href="index.php"><i class="fas fa-store"></i> CodiePie</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.php">CP</a>
                    </div>

                    <!-- Menu -->
                    <ul class="sidebar-menu">

                        <!-- Dashboard -->
                        <li>
                            <a class="nav-link" href="adminpannel.php">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-header">Ecommerce</li>

                        <!-- Ecommerce Dropdown -->
                        <li class="dropdown active">
                            <a href="#" class="nav-link has-dropdown">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Ecommerce</span>
                            </a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a class="nav-link" href="orders.php">
                                        <i class="fas fa-receipt"></i> Orders
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" href="clints.php">
                                        <i class="fas fa-users"></i> Clients
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" href="add_products.php">
                                        <i class="fas fa-box"></i> Products
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" aria-disable href="category.php">
                                        <i class="fas fa-tags"></i> Categories
                                    </a>
                                    <a class="nav-link" aria-disable href="order_details.php">
                                        <i class="fas fa-tags"></i> Order Details
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </aside>
            </div>