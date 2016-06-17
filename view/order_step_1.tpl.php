<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista zakupów</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Strona główna</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
            </div>

            <!-- ELEMENT -->
            <div class="col-xs-8    text-center">
                <h3>Krok 1 z 3 - Twoje dane</h3>

                <form class="form-horizontal form-label-left" method="POST" action="index.php?action=order_step_2">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imie">Imię<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="imie" class="form-control col-md-7 col-xs-12" name="imie" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Nazwisko<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="nazwisko" class="form-control col-md-7 col-xs-12" name="nazwisko" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ulica">Ulica<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="ulica" class="form-control col-md-7 col-xs-12" name="ulica" required="required"  type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postcode">Kod pocztowy<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="postcode" class="form-control col-md-7 col-xs-12" name="postcode" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="miasto">Miasto<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="miasto" class="form-control col-md-7 col-xs-12" name="miasto" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Tel. kontaktowy<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" id="telephone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Uwagi do zamówienia:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="uwagi" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="index.php?action=showCart" class="btn btn-primary">Wróć do koszyka</a>
                            <input class="btn btn-success" type="submit" value="Dostawa i płatność">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>

    </div>
    <!-- /.container -->