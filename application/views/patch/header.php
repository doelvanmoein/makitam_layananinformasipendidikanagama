<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="ThemeSelection">
    <title>Layanan Informasi Pendidikan Agama - Kantor Kementerian Agama Kota Sawahlunto</title>
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.png') ?>">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=  base_url('app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?=  base_url('app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?=  base_url('app-assets/css/core/menu/menu-types/vertical-compact-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?=  base_url('app-assets/vendors/css/cryptocoins/cryptocoins.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?=  base_url('app-assets/css/pages/transactions.css') ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/style.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">

    <!-- chart -->
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- leaflet -->
    <!-- Link Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Link Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        .dashboard-box {
            height: 140px;
            border-radius: 10px;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
  </head>
  <body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
      <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item d-md-none"><a class="navbar-brand" href="<?= base_url() ?>"><img class="brand-logo d-none d-md-block" src="<?=  base_url('app-assets/images/logo/logo.png')?>"><img class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm" src="<?=  base_url('app-assets/images/logo/logo-sm.png') ?>"></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v">   </i></a></li>
          </ul>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
              <li class="nav-item nav-search">
                <h1 class="mt-2">LAYANAN INFORMASI PENDIDIKAN AGAMA</h1>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-user nav-item">
                <img src="<?= base_url('app-assets/images/portrait/small/logo_green.png')?>" style="width: 250px;" alt="avatar">
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>