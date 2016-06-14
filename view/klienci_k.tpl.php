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
                            <a href="#"><i class="glyphicon glyphicon-user"></i>
                                Witaj: <?= $_SESSION['user']; ?> </i></a>
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
                    <a href="index.php?action=panel_kierownika&do=faktura"><span
                            class="badge pull-right"><?php echo $this->result[0][1] ?></span>Faktury</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=klienci_k"><span
                            class="badge pull-right"><?php echo $this->result[0][2] ?></span>Klienci</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=pracownicy_k"><span
                            class="badge pull-right"><?php echo $this->result[0][3] ?></span>Pracownicy</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&typ=produkty_k"><span
                            class="badge pull-right"><?php echo $this->result[0][4] ?></span>Produkty</a>
                </li>
                <li>
                    <a href="index.php?action=panel_kierownika&do=wiadomosci"><span
                            class="badge pull-right"><?php echo $this->result[0][5] ?></span>Wiadomości</a>
                </li>
            </ul>
        </div>

        <!-- content -->
        <div class="col-md-10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1>Klienci</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="x_content">
                    <div class="table-responsive" style="height:400px; overflow:auto;">
                        <table id="klienci_k" class="table table-striped  table-bordered">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">ID klienta</th>
                                <th class="column-title">Imię</th>
                                <th class="column-title">Nazwisko</th>
                                <th class="column-title">Login</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title">Zarządzaj</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            foreach ($this->result[1] as $row) {
                                ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $row["id_klienta"]; ?></td>
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

            <div class="row">

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

    <script type="text/javascript">
        $('#klienci_k').Tabledit({
            url: 'table_edit.php',
            typ: 'klienci',
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
                identifier: [0, 'id_klienta'],
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