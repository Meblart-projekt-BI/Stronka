<div class="container">
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
                <a href="index.php?action=kontakt#contactForm" class="btn  btn-block btn-danger" role="button"><i class="glyphicon glyphicon-edit"></i> Napisz
                    wiadomość</a>
            </div>
        </div>

        <!-- Content Column -->
        <div class="col-md-9">
            <h2>Moje dane</h2>
            <small>Możesz w każdej chwili zaaktualizować swoje dane</small>
            <hr>
            <div class="row">
                <form id="profile-form" class="form-horizontal form-label-left" method="POST" action="index.php?action=userpanel">

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Imię</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" readonly="readonly" placeholder="<?=$this->result['klient']['imie'];?>">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Nazwisko</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" class="form-control" readonly="readonly" placeholder="<?=$this->result['klient']['nazwisko'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">E-mail:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" value="<?=$this->result['klient']['email'];?>" required="required">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Powtórz e-mail:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="email2" class="form-control" placeholder="Powtórz e-mail" >
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Hasło:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Powtórz hasło:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="password" name="password2" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Ulica:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="street" class="form-control" placeholder="Ulica" value="<?=$this->result['klient']['ulica'];?>" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Numer domu:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="nr_domu" class="form-control" placeholder="Numer domu" value="<?=$this->result['klient']['nr_domu'];?>" required="required">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Numer mieszkania:</label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="nr_mieszkania" class="form-control" placeholder="Numer mieszkania" value="<?=$this->result['klient']['nr_mieszkania'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Kod pocztowy:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="kod_pocztowy" class="form-control" placeholder="Kod pocztowy" value="<?=$this->result['klient']['kod_pocztowy'];?>" required="required">
                        </div>

                        <label class="control-label col-md-2 col-sm-2">Miasto:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="city" class="form-control" placeholder="Miasto" value="<?=$this->result['klient']['miasto'];?>" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2">Państwo:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 form-group">
                            <input type="text" name="country" class="form-control" placeholder="Państwo" value="<?=$this->result['klient']['panstwo'];?>" required="required">
                        </div>
                    </div>

            </div>

        </div>
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group text-center">
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" >
        <input type="hidden" name="update_user" value="1">
        <button type="submit" class="btn btn-success">Zmień dane</button>
    </div>
</div>
</form>

<script type="text/javascript">
    $("#profile-form").validate({
        rules:
        {
            password: {
                minlength: 8,
                maxlength: 15
            },
            password2: {
                equalTo: '#password'
            },
            email: {
                required: true,
                email: true
            },
            email2: {
                equalTo: '#email'
            },
        },
        messages:
        {
            password:{
                required: "please provide a password",
                minlength: "password at least have 8 characters"
            },
            email: "please enter a valid email address",
            password2:{
                required: "please retype your password",
                equalTo: "password doesn't match !"
            },
            email2:{
                required: "please retype your email",
                equalTo: "email doesn't match !"
            }
        }
    });
</script>