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

$stm2 = $db->query("select * from produkt");

//$result2 = $stm2->fetch(PDO::FETCH_ASSOC);
//error_log(print_r($result2, true), 0);



//print_r($_SESSION['pracownik']->email);
//print_r( $_SESSION['pracownik2']->email);
print "/ntet";
?>

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
                        <li>
                            <?php if($_SESSION['login'] == 'yes')  { ?>
                                <a href="index.php?action=logout">Wyloguj się</a>
                            <?php } ?>
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
                            <a href="index.php?action=panel_kierownika&typ=zamowienia_k"><span class="badge pull-right"><?php echo $this->result[0][0] ?></span>Zamówienia</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=faktura_k"><span class="badge pull-right"><?php echo $this->result[0][1] ?></span>Faktury</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=klienci_k"><span class="badge pull-right"><?php echo $this->result[0][2] ?></span>Klienci</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=pracownicy_k"><span class="badge pull-right"><?php echo $this->result[0][3] ?></span>Pracownicy</a>
                        </li>
                        <li>
                            <a href="index.php?action=panel_kierownika&typ=produkty_k"><span class="badge pull-right"><?php echo $this->result[0][4] ?></span>Produkty</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge pull-right"><?php echo $this->result[0][5] ?></span>Wiadomości</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge pull-right"><?php echo $this->result[0][6] ?></span>Dostawcy</a>
                        </li>
                    </ul>
                </div>


                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <h1>Panel kierownika</h1>
                            </div>
                        </div>
                    </div>
         <div class="col-md-12">
             <div class="image-upload">
                 <form action="upload.php" method="post" enctype="multipart/form-data" target="hiddenFrame">
                     Przeslij obraz
                     <label for="FileToUpload">
                         <img src="http://goo.gl/pB9rpQ" style="width: 80px; cursor: pointer;"/>
                     </label>
                     <input id="FileToUpload" name="FileToUpload" type="file" style="display: none;"/>
                     <input type="submit" id="uploadFile" style="display: none;" />
                 </form>
             </div>

                    <div class="table-responsive" style="height:400px; overflow:auto;">
                      <table id="produkty_k" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center">ID produktu</th>
                            <th class="column-title text-center">Nazwa produktu</th>
                            <th class="column-title text-center">Cena jednostkowa</th>
                            <th class="column-title text-center">Opis produktu</th>
                            <th class="column-title text-center">Obraz</th>
                            <th class="column-title text-center">Podglad obrazu</th>
                            <th class="column-title text-center">Zarządzaj</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach($stm2 as $row)
                          {
                          ?>
                          <tr class="table-row">
                            <td class=" "><?php echo $row["id_produktu"]; ?></td>
                            <td class=" "><?php echo $row["nazwa_produktu"]; ?></td>
                            <td class=" "><?php echo $row["cena_jednostkowa"]; ?></td>
                            <td class=" "><?php echo $row["opis_produktu"]; ?>
                            <td class=" " name="imagePodglad" id="imagePodglad"><?php echo $row["image"]; ?>
                            </td>
                            <td class=" "><img src=<?php echo $row["image"]; ?> id="imagePreview" name="imagePreview" alt="Preview Image" width="200px"/>

                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
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
        <script type="text/javascript" src="jquery-tabledit-1.2.3/jquery.tabledit.js"></script>
        <script type="text/javascript" src="vendors/jGrowl/jquery.jgrowl.js"></script>

        <script type="text/javascript">
            $( "#FileToUpload" ).change(function() {
                $( "#uploadFile" ).click();
            });

        </script>
<!--
<script type="text/javascript" src="js/jquery.ba-resize.min.js"></script>
<script type="text/javascript" src="js/jquery.doubleScroll.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //$('.double-scroll').doubleScroll();
        $('.double-scroll').doubleScroll({resetOnWindowResize: true});
    });
</script>


        <script type="text/javascript">
            $('#imagePodglad').change(function(){
                ('#imagePreview').attr('src', document.getElementById("imagePodglad").innerHTML);
            });
        </script>
-->

        <script type="text/javascript">
            $('#produkty_k').Tabledit({
                url: 'table_edit.php',
                typ: 'produkty',
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
                columns: {
                    identifier: [0, 'id_produktu'],
                    editable: [[1, 'nazwa_produktu'], [2, 'cena_jednostkowa'], [3, 'opis_produktu'], [4, 'image']]
                },
                onSuccess: function(action, data, textStatus, jqXHR) {
                    if(action === "delete")
                    {
                        setTimeout(function() {
                            window.location.reload();
                        }, 500);
                    }
                    // Occurs whenever it is made a successful ajax request (edit or remove action).
                    //console.log(data);
                    //console.log(textStatus);
                    //console.log(jqXHR);
                    //window.location.reload();
                },

                onFail: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    //window.location.reload();
                },
                onAjax: function(action, serialize) {
                    //console.log(action);
                    //console.log(serialize);
                    //window.location.reload();
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
