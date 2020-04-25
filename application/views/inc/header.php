<!DOCTYPE html>
<html lang="en">
<title>E-Proje</title>
<head>

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/')?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?=base_url('/')?>">E-Proje</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!--Notification Menu-->

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="<?=base_url('profil')?>"><i class="fa fa-user fa-lg"></i>Profil</a></li>
                <li><a class="dropdown-item" href="<?=base_url('logout')?>"><i class="fa fa-sign-out fa-lg"></i> Çıkış Yap</a></li>
            </ul>
        </li>
    </ul>
</header>