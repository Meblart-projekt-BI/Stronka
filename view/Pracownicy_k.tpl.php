<?php
session_start();
error_reporting(~E_NOTICE);

if (!$_SESSION['kierownik']) {
    session_destroy();
    header("Location: index.php");
}

?>

<!-- small navbar -->
<nav class="navbar navbar-default navbar-top bootstrap-admin-navbar-sm" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php?do=page">Powrót do strony głównej <i
                                    class="glyphicon glyphicon-share-alt"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Witaj: <?= $_SESSION['user']; ?> </i>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?action=logout">Wyloguj się</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- PONIŻEJ PIERWSZY NAVBAR -->
<!-- main / large navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small"
     role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".main-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?action=panel_kierownika">Panel kierownika</a>
                </div>
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
                    <a href="index.php?action=panel_kierownika&do=zamowienia"><span
                            class="badge pull-right"><?php echo $this->result[0][0] ?></span>Zamówienia</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=klienci_k"><span
                            class="badge pull-right"><?php echo $this->result[0][1] ?></span>Klienci</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=pracownicy_k"><span
                            class="badge pull-right"><?php echo $this->result[0][2] ?></span>Pracownicy</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=produkty_k"><span
                            class="badge pull-right"><?php echo $this->result[0][3] ?></span>Produkty</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&do=wiadomosci"><span
                            class="badge pull-right"><?php echo $this->result[0][4] ?></span>Wiadomości</a>
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
                    <div class="table-responsive" style="height:400px; overflow:auto;">
                        <table id="pracownicy_k" class="table table-striped table-bordered">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">ID pracownika</th>
                                <th class="column-title">Imię</th>
                                <th class="column-title">Nazwisko</th>
                                <th class="column-title">Login</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Zarzadzaj</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($this->result[1] as $row) {
                                ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $row["id_pracownika"]; ?></td>
                                    <td class=" "><?php echo $row["imie"]; ?></td>
                                    <td class=" "><?php echo $row["nazwisko"]; ?></td>
                                    <td class=" "><?php echo $row["login"]; ?></td>
                                    <td class=" "><?php echo $row["email"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <p>ID pracownika: <input type="text" id="id_pracownika"/>
                <button type="button" class="btn btn-primary" id="dodaj">
                    Dodaj nowego pracownika
                </button>
            </p>
            <h5>Hasło nowo powstałego pracownika to: <span class="label label-default">maslowniczka25</span></h5>
            <!--
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                    <div class="caption">
                                        <h3>John Smith<br/>
                                            <small>Job Title</small>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt
                                            maxime.</p>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt
                                            maxime.</p>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt
                                            maxime.</p>
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
            -->
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
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
<script type="text/javascript" src="jquery-tabledit-1.2.3/jquery.tabledit.js"></script>

<script type="text/javascript">
    $('#pracownicy_k').Tabledit({
        url: 'table_edit.php',
        typ: 'pracownicy',
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
            identifier: [0, 'id_pracownika'],
            editable: [[1, 'imie'], [2, 'nazwisko'], [3, 'login'], [4, 'email']]
        },
        onSuccess: function (action, data, textStatus, jqXHR) {
            if (action === "delete") {
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#dodaj').click(function () {
            var id_pracownika = $("#id_pracownika").val();
            var dataString = 'id_pracownika=' + id_pracownika;
            {
                $.ajax({
                    type: "POST",
                    url: "register_pracownik_k.php",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        window.location.reload();
                    }
                });
            }
            return false;
        });
    });
</script>