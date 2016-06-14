<?php
session_start();
error_reporting(~E_NOTICE);

include('config.php');
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);
if (!$_SESSION['kierownik']) {
    session_destroy();
    header("Location: index.php");
}

$stm2 = $db->query("select * from produkt");

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
                        <h1>Produkty</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="table-responsive" style="overflow:auto;">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title text-center">ID kategorii</th>
                            <th class="column-title text-center">Nazwa kategorii</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($this->result[1] as $row) {
                            //error_log(print_r($this->result[1], true), 0);
                            ?>
                            <tr class="table-row">
                                <td class=" "><?php echo $row[0]; ?></td>
                                <td class=" "><?php echo $row[1]; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="image-upload">
                    <form action="upload.php" method="post" enctype="multipart/form-data" target="hiddenFrame">
                        Przeslij obraz
                        <label for="FileToUpload">
                            <img src="http://goo.gl/pB9rpQ" style="width: 80px; cursor: pointer;"/>
                        </label>
                        <input id="FileToUpload" name="FileToUpload" type="file" style="display: none;"/>
                        <input type="submit" id="uploadFile" style="display: none;"/>
                    </form>
                </div>
                <h5>Obrazy zostają zapisane w katalogu: <span class="label label-default">image/</span></h5>

                <div class="table-responsive" style="height:400px; overflow:auto;">
                    <table id="produkty_k" class="table table-striped table-bordered">
                        <thead>
                        <tr class="headings">
                            <th class="column-title text-center">ID produktu</th>
                            <th class="column-title text-center">Nazwa produktu</th>
                            <th class="column-title text-center">Cena jednostkowa</th>
                            <th class="column-title text-center">ID kategorii</th>
                            <th class="column-title text-center">Opis produktu</th>
                            <th class="column-title text-center">Obraz</th>
                            <th class="column-title text-center">Podglad obrazu</th>
                            <th class="column-title text-center">Zarządzaj</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($stm2 as $row) {
                            ?>
                            <tr class="table-row">
                                <td class=" "><?php echo $row["id_produktu"]; ?></td>
                                <td class=" "><?php echo $row["nazwa_produktu"]; ?></td>
                                <td class=" "><?php echo $row["cena_jednostkowa"]; ?></td>
                                <td class=" "><?php echo $row["id_kategorii"]; ?></td>
                                <td class=" "><?php echo $row["opis_produktu"]; ?>
                                <td class=" " name="imagePodglad" id="imagePodglad"><?php echo $row["image"]; ?>
                                </td>
                                <td class=" "><img src=<?php echo $row["image"]; ?> id="imagePreview"
                                                   name="imagePreview" alt="Preview Image" width="200px"/>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="dodaj">
                Dodaj nowy produkt
            </button>
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
    $("#FileToUpload").change(function () {
        $("#uploadFile").click();
    });

</script>

<script type="text/javascript">
    $('#produkty_k').Tabledit({
        url: 'table_edit.php',
        typ: 'produkty',
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
            editable: [[1, 'nazwa_produktu'], [2, 'cena_jednostkowa'], [3, 'id_kategorii'], [4, 'opis_produktu'], [5, 'image']]
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
            $.ajax({
                type: "POST",
                url: "dodaj_produkt.php",
                cache: false,
                success: function (data) {
                    window.location.reload();
                }
            });
            return false;
        });
    });
</script>