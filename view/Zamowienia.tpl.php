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
                      
                            <a href="index.php?do=faktura" class="list-group-item">Faktury</a>
                       
                            <a href="index.php?do=wiadomosci" class="list-group-item">Wiadomości</a>
                 
                </div>


                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <h1>Zamówienia</h1>
                            </div>
                        </div>
                    </div>

           
            
                    <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nr faktury </th>
                            <th class="column-title">Data</th>
                            <th class="column-title">ID klienta </th>
                             <th class="column-title">Imię</th>
                             <th class="column-title">Nazwisko</th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Suma </th>
                            <th class="column-title no-link last"><span class="nobr"></span></th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
            <?php
            foreach ($this->result[2] as $row)
            {
            ?>
                        <tbody>
                          <tr class="even pointer table table-striped jambo_table">
                            <td class=" "><?=$row['id_zamowienia'];?></td>
                            <td class=" "><?=$row['data_zamowienia'];?></td>
                            <td class=" "><?=$row['id_klienta'];?></td>
                            <td class=" "><?=$row2['imie'];?></td>
                            <td class=" "><?=$row2['nazwisko'];?></td>
                            <td class=" "><?=$row['status_zamowienia'];?></td>
                            <td class="a-right a-right ">wprowadz sumę za zakupy</td>
                            <td class=" last"><a href="#">Wygeneruj fakturę</a>
                            </td>
                          </tr>
            <?php } ?>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>

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
