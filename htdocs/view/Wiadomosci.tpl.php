<?php
ob_start();
session_start();
error_reporting(~E_NOTICE);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>UI & Interface | Bootstrap 3.x Admin Theme</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme-change-size.css">

        <!-- Vendors -->
        <link rel="stylesheet" media="screen" href="vendors/jGrowl/jquery.jgrowl.css">
    </head>
    
    <body class="bootstrap-admin-with-small-navbar">
        
        <!-- small navbar -->
        <nav class="navbar navbar-default navbar-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="index.php?do=page">Powrót do strony głównej <i class="glyphicon glyphicon-share-alt"></i></a>
                                </li>
                                <li>
                                 <?php if($_SESSION['login'] == 'yes') { ?>
                                    <a href="#"><i class="glyphicon glyphicon-user"></i> Witaj: <?=$_SESSION['user']; ?> </i></a>
                                 <?php } ?>      
                                </li>
                                <li><a href="index.php?do=page">Wyloguj się</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

<!-- PONIŻEJ PIERWSZY NAVBAR -->
        <!-- main / large navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php?do=panel">Panel pracownika</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
               <div class="col-md-2 list-group">
              
                            <a href="index.php?do=zamowienia" class="list-group-item">Zamówienia</a>
                      
                            <a href="index.php?do=faktura" class="list-group-item">Faktury</a>
                       
                            <a href="index.php?do=wiadomosci" class="list-group-item">Wiadomości</a>
                 
                </div>


                <!-- content -->
            <div class="col-md-10">
            <div class="row">
     
            <div class="mail_list_column">
                       
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                            </div>
                            
                            <div class="right">
                              <h3>Imię i nazwisko</h3>
                              <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                            </div>
                          </div>
                        </a>
            </div>
            <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
</div>
</div>

        
<!-- compose -->
    <script>
      $('#compose, .compose-close').click(function(){
        $('.compose').slideToggle();
      });
    </script>
    <!-- /compose -->
    </body>
</html>
