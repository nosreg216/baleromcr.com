<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Jean Carlo Cabezas, azazeldead@gmail.com">
  <meta name="author" content="Gerson Rodriguez, nosreg216@gmail.com">
	<title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/hover.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/full-slider.css">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico">
</head>
<body class="index">

<nav class="navbar navbar-fixed-top navbar-translucident">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">BaleromCR.com</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-navbar">

      <form class="navbar-form navbar-right" role="search" action="<?php echo base_url();?>search/">
         <div class="input-group">
          <input type="text" class="form-control" name="s" placeholder="Buscar canciones...">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </span>
        </div><!-- /input-group -->
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Biografia</a></li>
        <li>
          <a href="<?php echo base_url();?>cart">
            <span class="glyphicon glyphicon-shopping-cart"></span>
              Orden
            <span class="badge"><?php echo $this->cart->total_items(); ?></span>
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>