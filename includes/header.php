<!DOCTYPE html>
<html lang="en">
  <head>
    <title>

<?php
              $page_active = $_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"];
        
              //Page detecting variables
              $index = '10.10.8.150/ward/index.php';
              $search = '10.10.8.150/ward/search.php';
              $conf = '10.10.8.150/ward/conf.php';
            

              //Title variables
              $index_title = 'Главная страница';
              $search_title = 'Поиск по базе';
              $conf_title = 'Настройки бота';


              //Page title echo
              if($page_active == $index) { echo $index_title; }
              elseif($page_active == $search) { echo $search_title; }
              elseif($page_active == $conf) { echo $conf_title; }
?>
  </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="http://10.10.8.150/ward/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://10.10.8.150/ward/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://10.10.8.150/ward/assets/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="http://10.10.8.150/ward/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://10.10.8.150/ward/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      body {
        padding-top: 70px;
        padding-bottom: 40px;
      }
    </style>

  </head>

 <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SentryWard v.0.4</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li <?php if($page_active == $index) { echo "class='active'>"; } else { echo ">"; } ?><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden=""></span> Главная</a></li>
            <li <?php if($page_active == $search) { echo "class='active'>"; } else { echo ">"; } ?><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden=""></span> Поиск по базе</a></li>
            <li <?php if($page_active == $conf) { echo "class='active'>"; } else { echo ">"; } ?><a href="conf.php"><span class="glyphicon glyphicon-cog" aria-hidden=""></span> Настройки</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

