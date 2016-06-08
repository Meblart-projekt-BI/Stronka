<?php
//session_start();
error_reporting(~E_NOTICE);

//print_r($_SESSION);
/* ustawienie zmiennych konfiguracyjnych */
include('config.php');
//print((dirname(__FILE)).'config.php');
//print($dbhost);
//print_r($dbhost);
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);
//phpinfo();
//print_r($db);
//print_r($kierownik);
//print_r($_SESSION['pracownik']);
//print "elo kierownik2";
//echo $kierownik[email];
//print $kierownik->jestKierownikiem;
if($_SESSION['kierownik'])
{
    print "elo kierownik";
}
else
{
    session_destroy();
    header("Location: index.php");
}

$stm2 = $db->query("select * from pracownik");
$liczbaPracownikow = $stm2->rowCount();



//print_r($_SESSION['pracownik']->email);
//print_r( $_SESSION['pracownik2']->email);
print "/ntet";
?>

        <!-- small navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="index.html">Powrót do strony głównej<i class="glyphicon glyphicon-share-alt"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown"> <i class="glyphicon glyphicon-user"></i> Użytkownik <i class="caret"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                      <!--                  <li role="presentation" class="divider"></li>  Linia dzieląca -->
                                        <li><a href="index.html">Wyloguj się</a></li>
                                    </ul>
                                </li>
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
                            <a class="navbar-brand" href="index.php?action=panel_kierownika">Panel kierownika</a>
                        </div>
                  <!--      <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Dropdown <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation" class="dropdown-header">Dropdown header</li>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation" class="dropdown-header">Dropdown header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                <div class="col-md-2 bootstrap-admin-col-left">
                    <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=zamowienia_k"><span class="badge pull-right">731</span>Zamówienia</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=faktura_k"><span class="badge pull-right">812</span>Faktury</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=klienci_zalogowani_k"><span class="badge pull-right">27</span>Klienci</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=pracownicy_k"><span class="badge pull-right"><?php echo $liczbaPracownikow ?></span>Pracownicy</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=produkty_k"><span class="badge pull-right">2,221</span>Produkty</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge pull-right">2,221</span>Wiadomości</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge pull-right">11</span>Dostawcy</a>
                        </li>
                    </ul>
                </div>


                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <h1>Pracownicy</h1>
                            </div>
                        </div>
                    </div>

                <div class="col-md-12">
                    <div class="x_content">
                    <div class="table-responsive">
                      <table id="pracownicy_k" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID pracownika</th>
                            <th class="column-title">Imię</th>
                            <th class="column-title">Nazwisko</th>
                              <th class="column-title">Login</th>
                              <th class="column-title">Zarzadzaj</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php
                          foreach($stm2 as $row)
                          {
                              ?>
                            <tr class="even pointer">
                            <td class=" "><?php echo $row["id_pracownika"]; ?></td>
                            <td class=" "><?php echo $row["imie"]; ?></td>
                            <td class=" "><?php echo $row["nazwisko"]; ?></td>
                            <td class=" "><?php echo $row["login"]; ?></td>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
                
                <p>ID pracownika:  <input type="text" id="id_pracownika" />
                    <button type="button" class="btn btn-primary" id="dodaj">
                        Dodaj nowego pracownika
                    </button>
                </p>
                
            <div class="row">
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    <div class="caption">
                        <h3>John Smith<br/>
                            <small>Job Title</small>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    <div class="caption">
                        <h3>John Smith<br/>
                            <small>Job Title</small>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    <div class="caption">
                        <h3>John Smith<br/>
                            <small>Job Title</small>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
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
        <script type="text/javascript" src="jquery-tabledit-1.2.3/jquery.tabledit.min.js"></script>

        <script type="text/javascript">
            $('#pracownicy_k').Tabledit({
                url: 'table_edit_pracownicyk.php',
                //rowIdentifier: 'id_pracownika',
                restoreButton: false,
                buttons: {
                    edit: {
                        class: 'btn btn-sm btn-default',
                        html: '<span class="glyphicon glyphicon-wrench"></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'btn btn-sm btn-default',
                        html: '<span class="glyphicon glyphicon-remove"></span>',
                        action: 'delete'
                    },
                    confirm: {
                        class: 'btn btn-sm btn-default',
                        html: 'Are you sure?'
                    }
                },
                <!--
                                onSuccess: function(data, textStatus, jqXHR)
                                {
                                    $("#imagePreview").html("<img src=<?php// echo $row['image']; ?> id='imagePreview' alt='Preview Image' width='200px;/>");
            },
-->
                columns: {
                    identifier: [0, 'id_pracownika'],
                    editable: [[1, 'imie'], [2, 'nazwisko'], [3, 'login']]
                }
            });
        </script>

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

            <script type="text/javascript">
                $(document).ready(function (){

                    $('#dodaj').click(function()
                    {
                        var id_pracownika=$("#id_pracownika").val();
                        var dataString = 'id_pracownika='+id_pracownika;
                        {
                            $.ajax({
                                type: "POST",
                                url: "register_pracownik_k.php",
                                data: dataString,
                                cache: false,
                            });
                        }
                        return false;
                    });
                });
            </script>