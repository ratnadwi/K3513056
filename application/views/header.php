<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Data Mahasiswa PTIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
		background-color: #D8BFD8;
      }

      /* Custom container */
      .container-narrow {
        margin:  auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px ;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px ;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>
  <body>
   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">FOSS</a>
          <div class="nav-collapse collapse">
            
            <ul class="nav">
			<li>
			<?php
			echo anchor('index.php/data/home','Beranda');
			?>
			 </li>
			 <li>
			 <?php
			echo anchor('index.php/data/add','Input Data',array('class'=>'add'));
			?>
			 </li>
		
			 <li>
			 <?php
			echo anchor('index.php/data/cetak','Lihat Data');
			?>
			 </li>
			
			<li>
			 <?php
			echo anchor('index.php/data/about','About');
			?>
			 </li>
			
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="span12">
          <div class="hero-unit">
		 