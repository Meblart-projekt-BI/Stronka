<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Panel klienta zalogowanego
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Strona główna</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="index.php?action=userpanel" class="list-group-item">Moje dane</a>
                <a href="index.php?action=historia" class="list-group-item">Historia zamówień</a>
            </div>
        </div>


        <!-- Content Column -->
        <div class="col-md-9">

            <h2>Moje dane</h2>
            <small>Możesz w każdej chwili zaaktualizować swoje dane</small>

            <hr>

            <div class="row">
                <form class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Imię</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Nazwisko</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">E-mail:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input" required="required">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Powtórz e-mail:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input" required="required">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Hasło:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="password" class="form-control" value="passwordonetwo" required="required">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Powtórz hasło:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="password" class="form-control" value="passwordonetwo" required="required">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Ulica:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Numer domu:</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Numer mieszkania:</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Kod pocztowy:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Miasto:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Państwo:</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                    </div>

            </div>

        </div>
    </div>
</div>


<div class="ln_solid"></div>
<div class="form-group text-center">
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
        <button type="submit" class="btn btn-success">Zmień dane</button>
    </div>
</div>
</form>

<!-- /.row -->


<hr>
