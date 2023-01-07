<?php
session_start();
include('database.inc.php');
include('function.inc.php');

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/', $curStr);
$cur_path=$curArr[count($curArr)-1];

if (!isset($_SESSION['IS_LOGIN'])) {
    redirect('login.php');
}
$page_title='';
if ($cur_path=='' || $cur_path=='index.php') {
    $page_title='Dashboard';
} elseif ($cur_path=='category.php' || $cur_path=='manage_category.php') {
    $page_title='Manage Category';
} elseif ($cur_path=='user.php' || $cur_path=='manage_user.php') {
    $page_title='Manage User';
} elseif ($cur_path=='delivery_boy.php' || $cur_path=='manage_delivery_boy.php') {
    $page_title='Manage Delivery Boy';
} elseif ($cur_path=='coupon_code.php' || $cur_path=='manage_coupon_code.php') {
    $page_title='Manage Coupon Code';
} elseif ($cur_path=='dish.php' || $cur_path=='manage_dish.php') {
    $page_title='Manage Dish';
} elseif ($cur_path=='banner.php' || $cur_path=='manage_banner.php') {
    $page_title='Manage Banner';
} elseif ($cur_path=='contact_us.php') {
    $page_title='Contact Us';
} elseif ($cur_path=='order.php') {
    $page_title='Order Master';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">


  <script src="assets/js/jquery.min.js"></script>
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logoDigi.png" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['ADMIN_USER']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="pos.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">POS</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="order.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>

        <li class="nav-item">
            <a class="nav-link" href="inventory.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Feedback</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">