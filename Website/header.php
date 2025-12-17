<?php
include('../Admin/config.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="assets/images/favicon.png" type="">
   <title>Jennys </title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="assets/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="assets/" rel="stylesheet" />
</head>

<body>
   <!-- header section strats -->
   <header class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html"><img width="250" src="assets/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                              class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="about.php">About</a></li>
                        <li><a href="testimonial.php">Testimonial</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="product.php">Products</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="true"> <span class="nav-label">catagories<span
                              class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="jwellery.php">jewllery</a></li>
                        <li><a href="cosmetic.php">cosmetic</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <?php if (isset($_SESSION['user_id'])) { ?>
                        <a class="nav-link" href="order_confimation.php">Orders</a>
                     <?php } else { ?>
                        <a class="nav-link" hidden href="##">Orders</a>
                     <?php } ?>
                  </li>
                  <li class="nav-item dropdown">
                     <?php
                     if (isset($_SESSION['user_id'])) {
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="true">
                           <span class="nav-label"><?= $_SESSION['user_name']; ?> <span class="caret"></span></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="profile.php">Profile</a></li>
                           <li><a href="../Admin/logout.php">Logout</a></li>
                        </ul>
                        <?php
                     } else {
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="true">
                           <span class="nav-label">Login / Register <span class="caret"></span></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="../Admin/login.php">Login</a></li>
                           <li><a href="../Admin/register.php">Register</a></li>
                        </ul>
                     <?php } ?>
                  </li>
                  <form class="form-inline">
                     <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                     </button>
                  </form>
               </ul>
            </div>
         </nav>
      </div>
   </header>