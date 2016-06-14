<?php
session_start();
error_reporting(~E_NOTICE);
?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kontakt</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Strona główna</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->

        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Dane kontaktowe</h3>
            <p>
                ul. Wincentego Pola<br>Rzeszów<br>
            </p>
            <p><i class="fa fa-phone"></i>
                <abbr title="Phone">P</abbr>: 711 711 712</p>
            <p><i class="fa fa-envelope-o"></i>

                <!-- Tutaj musimy wpisać nasz email -->
                <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">meblartgarden@gmail.com</a>
            </p>
            <p><i class="fa fa-clock-o"></i>
                <abbr title="Godziny otwarcia">H</abbr>: Poniedziałek - Piątek: 9:00 do 17:00 </p>
        </div>
    </div>

    <hr>

    <div class="col-md-4">
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        <div class="col-md-8">
            <h3>Napisz do nas!</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Tytuł wiadomości:</label>
                        <input type="text" class="form-control" id="tytul" required
                               data-validation-required-message="Wprowadź tytuł wiadomości">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Wiadomość:</label>
                                <textarea rows="10" cols="100" class="form-control" id="message" required
                                          data-validation-required-message="Wprowadź wiadomość" maxlength="999"
                                          style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] = 'yes') {
                    ?>
                    <button id="wyslij" type="button" class="btn btn-primary">Wyślij</button>
                    <?php
                } else {
                    ?>
                    <span style='color:#cc0000'>Aby wysłać wiadomość musisz być zalogowany!</span>
                    <?php
                }
                ?>
                <div id="success">
                    <!-- error will be showen here ! -->
                </div>
                <div id="error">
                    <!-- error will be showen here ! -->
                </div>
            </form>
        </div>

    </div>
    <!-- /.row -->
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy;</p>
            </div>
        </div>
    </footer>

    <script>
        var main = function () {
            $("#wyslij").click(function () {
                $("#success").html("");
                var temat=$("#tytul").val();
                var tresc=$("#message").val();
                var dataString = 'dodaj=1&tytul='+temat+'&tresc='+tresc;
                if($.trim(temat).length>0)
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
                                $("#error").html("");
                                $("#success").html("Wiadomość wysłano!");
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