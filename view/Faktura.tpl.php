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

        <!-- Custom styles -->
        <style type="text/css">
            .pagination-container{
                margin-top: 20px;
            }
            .pagination-container-first{
                margin-top: 10px;
            }
            .pagination-container .pagination{
                margin: 0;
            }
            .notification{
                margin: 5px 0;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
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
                            <a href="index.php?do=faktura" class="list-group-item"><span class="badge pull-right"><?php printf(count($this->result[0]));?></span>Faktury</a>
                            <a href="index.php?do=wiadomosci" class="list-group-item">Wiadomości</a>
                 
                </div>


                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <h1>Faktury</h1>
                            </div>
                        </div>
                    </div>

                <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i><h3>Faktura </h3>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          Od:
                          <address>
                                          <strong>Meblart Garden</strong>
                                          <br>ul. W.Pola 
                                          <br>Rzeszów
                                          <br>Tel.: 723 723 724
                                          <br>Email: meblartgarden@gmail.com
                          </address>
                        
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Dla
                          <address>
                          <?php
                            foreach ($this->result[4] as $row)
                            foreach ($this->result[5] as $row2)
                            {
                          ?>
                                          <strong><?=$row['imie'];?> <?=$row['nazwisko'];?></strong>
                                          <br><?=$row2['ulica'];?> <?=$row2['nr_domu'];?>/<?=$row2['nr_mieszkania'];?>
                                          <br><?=$row2['kod_pocztowy'];?> <?=$row2['miasto'];?>
                                          <br><?=$row2['panstwo'];?>
                                          <br><?=$row['email'];?>
                          </address>
                          <?php
                            }
                          ?>
                        </div>
                        <!-- /.col -->
                         <?php
                            foreach ($this->result[6] as $row3)
                            {
                          ?>
                        <div class="col-sm-4 invoice-col">
                          <b>Numer zamówienia: <?=$row3['id_zamowienia'];?> </b>
                          <br>
                          <br>
                          <b>Data zakupu</b> <?=$row3['data_zamowienia'];?> 
                          <br>
                          
                        </div>
                        <?php
                            }
                          ?>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Ilość</th>
                                <th>Product</th>
                                <th>Id_produktu</th>
                                <th style="width: 59%">Opis</th>
                                <th>Suma</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                                <?php
                                foreach ($this->result[7] as $row4)
                                {
                                ?>
                              
                                <tr>
                                <td>Ilosc produktu</td>
                                <td><?=$row4['nazwa_produktu'];?></td>
                                <td><?=$row4['id_produktu'];?></td>
                                <td><?=$row4['opis_produktu'];?></td>
                                <td>$Suma za produkt</td>
                                </tr>
                               <?php
                                }
                               ?>
                          
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          <p class="lead">Metody płatności</p>
                          <img src="images/visa.png" alt="Visa">
                          <img src="images/mastercard.png" alt="Mastercard">
                          <img src="images/paypal2.png" alt="Paypal">
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">      </p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Suma:</th>
                                  <td>....(zł)</td>
                                </tr>
                                <tr>
                                  <th>Podatek (23%)</th>
                                  <td>Cena z podatkiem (zł)</td>
                                </tr>
                                <tr>
                                  <th>Cena dostawy:</th>
                                  <td>...(zł)</td>
                                </tr>
                                <tr>
                                  <th>Razem do zapłaty:</th>
                                  <td>...(zł)</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i>Drukuj</button>
                          <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>Zapisz fakturę</button>
                        </div>
                      </div>
                    </section>

                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="navbar navbar-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <footer role="contentinfo">
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/jGrowl/jquery.jgrowl.js"></script>

        <script type="text/javascript">
            $(function() {
                $('.tooltip').tooltip();
                $('.tooltip-left').tooltip({placement: 'left'});
                $('.tooltip-right').tooltip({placement: 'right'});
                $('.tooltip-top').tooltip({placement: 'top'});
                $('.tooltip-bottom').tooltip({placement: 'bottom'});

                $('.popover-left').popover({placement: 'left', trigger: 'hover'});
                $('.popover-right').popover({placement: 'right', trigger: 'hover'});
                $('.popover-top').popover({placement: 'top', trigger: 'hover'});
                $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});

                $('.notification').click(function() {
                    var $id = $(this).attr('id');
                    switch ($id) {
                        case 'notification-sticky':
                            $.jGrowl("Stick this!", {sticky: true});
                            break;

                        case 'notification-header':
                            $.jGrowl("A message with a header", {header: 'Important'});
                            break;

                        default:
                            $.jGrowl("Hello world!");
                            break;
                    }
                });
            });
        </script>
    </body>
</html>
