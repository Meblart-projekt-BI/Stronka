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
                    <a href="#"><span class="badge pull-right"><?php echo $this->result[0][5] ?></span>Wiadomości</a>
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