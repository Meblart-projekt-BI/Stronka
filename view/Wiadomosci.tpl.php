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
                            <a href="index.php?do=page">Powrót do strony głównej <i
                                    class="glyphicon glyphicon-share-alt"></i></a>
                        </li>
                        <li>
                            <?php if ($_SESSION['login'] == 'yes') { ?>
                                <a href="#"><i class="glyphicon glyphicon-user"></i>
                                    Witaj: <?= $_SESSION['user']; ?> </i></a>
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
            <a href="index.php?do=wiadomosci" class="list-group-item">Wiadomości</a>
<!--
            <a href="#" class="btn  btn-block btn-danger" role="button"><i class="glyphicon glyphicon-edit"></i> Napisz
                wiadomość</a>
                -->
        </div>

        <!--main-->
        <div class="col-md-10">
            <!-- Tabela -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="inbox">
                    <div id="checkboxes">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <!-- Skrzynka nagłówek -->
                            <tr>
                                <td>
                                    <label>Skrzynka odbiorcza</label>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <button id="usun" class="btn btn-default"><i title="Skasuj wybrane"
                                                                       class="glyphicon glyphicon-trash"></i></button>
                                    <button id="show" class="btn btn-default"><i title="Odpowiedz na wiadomość"
                                                                                 class="glyphicon glyphicon glyphicon-share-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Wiersz skrzynki -->
                            <?php
                            foreach ($this->result[8] as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" class="wiadomoscCheckbox"
                                                   id="<?php echo $row['id_wiadomosci'] ?>">
                                        </label> <span
                                            class="name"><?php echo $row['imie']; ?>&nbsp;<?php echo $row['nazwisko']; ?></span>
                                    </td>
                                    <td><span class="subject"><?php echo $row['tytul_wiadomosci']; ?></span></td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div id="error2">
                <!-- error will be showen here ! -->
            </div>

            <div class="row-md-12">
                <div class="well text-right">
                </div>


                <!-- /.modal compose message -->
                <div class="modal-show" id="modalCompose">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button id="xxx" type="button" class="close compose-close">×</button>
                                <h4 class="modal-title">Nowa wiadomość</h4>
                            </div>

                            <div class="modal-body">
                                <form role="form" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2" for="inputTo">Odbiorca:</label>
                                        <div class="col-sm-10"><input type="email" class="form-control" id="inputTo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2" for="inputSubject">Temat:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control"
                                                                      id="inputSubject"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12" for="inputBody">Wiadomość</label>
                                        <div class="col-sm-12"><textarea class="form-control" id="inputBody"
                                                                         rows="18"></textarea></div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button id="anuluj" type="button" class="btn btn-default pull-left">Anuluj</button>
                                <div id="error">
                                    <!-- error will be showen here ! -->
                                </div>
                                <button id="wyslij" type="button" class="btn btn-primary ">Wyślij&nbsp;<i
                                        class="fa fa-arrow-circle-right fa-lg"></i></button>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal compose message -->


            </div>
        </div>
    </div>
</div>

<!-- compose -->
<script>
    var main = function () {
        $(".modal-show").hide();

        $("#usun").click(function () {
            if($(".wiadomoscCheckbox:checked").length > 0) {
                var dataString = "";
                var i=0;
                $('#checkboxes input:checked').each(function() {
                    i++;
                    dataString += 'id_wiadomosci'+i+'='+$(this).attr('id');
                });
                $.ajax({
                    type: "POST",
                    url: "wiadomosc.php",
                    data: dataString,
                    cache: false,
                    success: function(data){

                        if(data == '1')
                        {
                            window.location.reload();
                        }
                    }
                });
            }
        });

        $("#show").click(function () {
            if($(".wiadomoscCheckbox:checked").length == 1) {
                $("#error2").html("");
                var dataString;
                $('#checkboxes input:checked').each(function() {
                    dataString = 'id_wiadomosci='+$(this).attr('id');
                });
                $.ajax({
                    type: "POST",
                    url: "wiadomosc.php",
                    data: dataString,
                    cache: false,
                    success: function(data){

                        var temat   = data.substring(data.indexOf("tytul=")+6, data.lastIndexOf("$"));
                        $('#inputSubject').val("Re: " + temat);

                        var email   = data.substring(6, data.indexOf("$$"));
                        $('#inputTo').val(email);
                        var tresc   = data.substring(data.lastIndexOf("$")+1);
                        $('#inputBody').val(tresc);


                        //console.log(data);
                        $(".modal-show").show();
                    }
                });
            }
            else {
                $("#error2").html("<span style='color:#cc0000'>Możesz odpowiedzieć maksymalnie na jedną wiadomość na raz.</span>");
            }
        });

        $("#anuluj").click(function () {
            $(".modal-show").hide();
        });

        $("#xxx").click(function () {
            $(".modal-show").hide();
        });

        $("#wyslij").click(function () {
            var temat=$("#inputSubject").val();
            var email=$("#inputTo").val();
            var tresc=$("#inputBody").val();
            var dataString = 'temat='+temat+'&email='+email+'&tresc='+tresc;
            if($.trim(email).length>0)
            {
                $.ajax({
                    type: "POST",
                    url: "wiadomosc.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function(){ $("#wyslij").html("Wysyłanie...&nbsp;<i class='fa fa-arrow-circle-right fa-lg'></i>")},
                    success: function(data){
                        if(data == '1')
                        {
                            $(".modal-show").hide();
                            $("#error").html("");
                        }
                        else
                        {
                            //console.log(data);
                            $("#error").html("<span style='color:#cc0000'>Błąd:</span> "+data);
                        }
                        $("#wyslij").html("Wyślij&nbsp;<i class='fa fa-arrow-circle-right fa-lg'></i>");
                    }
                });
            }
        });

    }

    $(document).ready(main);
</script>
<!-- /compose -->
</body>
</html>
