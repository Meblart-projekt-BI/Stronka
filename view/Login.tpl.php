<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> LOGOWANIE</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Strona główna</a></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- Content Row -->
        <div class="row">
        <div class="col-md-4">
        <img class="profile-img" width="100%" height="100%" src="http://www.serwer1309029.home.pl/gt/public_html/juniperus/wp-content/uploads/2013/09/kominek-w-ogrodzie12.jpg"/>   
        </div>
        <div class="col-md-4">
          <h6 class="text-center login-title">Masz już konto?</h6>
          <h4 class="text-center login-title">Zaloguj się!</h4>
                     <div class="account-wall">
                         <div id="error">
    </div>
                <form class="form-signin">
                    <input type="text" id="user_name" class="form-control" placeholder="Email:" required autofocus>
                    <p></p>
                    <input type="password" id="password" class="form-control" placeholder="Hasło:" required>
                    <p></p>
                <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Zaloguj się</button>
                
                <label class="checkbox pull-right">
                    <input type="checkbox" value="remember-me"/>
                    Zapamiętej mnie
                </label>
                </form>
                    </div>
        </div>
           
        <div class="col-md-4">
            
               <!-- <div class="panel panel-primary text-center"> -->
         <!--     <div class="panel panel-default text-center">      --> 
          <h6 class="text-center login-title">Nie jesteś jeszcze naszym klientem?</h6>
          <h4 class="text-center login-title">Zarejestruj się!</h4>
                    <div class="account-wall">
                         <div id="error2">
                             <!-- error will be showen here ! -->
                          </div>
                        <div id="btn-submit">
                            
                        </div>
                    <form class="form-signin" id="register-form" method="post">
                        <input type="text" class="form-control" id="imie" name="imie" placeholder="Imię:" required autofocus>
                    <p></p>
                    <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Nazwisko:" required autofocus>
                    <p></p>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login:" required autofocus>
                    <p></p>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email:" required autofocus>
                    <p></p>
                    <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Hasło:" required>
                    <p></p>
                    <input type="password" class="form-control" id="haslo2" name="haslo2" placeholder="Powtórz hasło:" required autofocus>
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block" id="submitButton" type="submit">Zarejestruj się</button>
        
                </form>
                    </div>
        </div>
        
       
        </div>
        
<script type="text/javascript">
  $(document).ready(function (){ 
      
   $('#login').click(function()
        {
            var username=$("#user_name").val();
            var password=$("#password").val();
            var dataString = 'login='+username+'&password='+password;
            if($.trim(username).length>0 && $.trim(password).length>0)
            {
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function(){ $("#login").val('Czekaj');},
                    success: function(data){
                        if(data == '1')
                        {
                            console.log("cone");
                            console.log(data);
                            window.location.href = "index.php";
                        }
                        else
                        {
                            console.log(data);
                            $("#login").val('Login');
                            $("#error").html("<span style='color:#cc0000'>Błąd:</span> złe dane ");
                        }
                    }
                });
            }
            return false;
        });    
      
  $("#register-form").validate({
        rules:
        {
            imie: {
                required: true,
                minlength: 3
            },
            haslo: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            haslo2: {
                required: true,
                equalTo: '#haslo'
            },
            email: {
                required: true,
                email: true
            },
        },
        messages:
        {
            imie: "please enter user name",
            haslo:{
                required: "please provide a password",
                minlength: "password at least have 8 characters"
            },
            email: "please enter a valid email address",
            haslo2:{
                required: "please retype your password",
                equalTo: "password doesn't match !"
            }
        },
        submitHandler: submitForm
    });
    
      
      
  function submitForm()   {
        var data = $("#register-form").serialize();
        console.log("Jestem tutaj");
        console.log("Dane z formularza " + data);
        $.ajax({

            type : 'POST',
            url  : 'register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; wysyłam ...');
            },
            success :  function(data)
            {
                if(data==1){

                  

                        $("#error2").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Email jest zajęty!</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Utworz ko2nto');

                   

                }
                else if(data=="registered")
                {
                    $("#error2").html('');
                    $("#btn-submit").html('<img src="images/loader.gif" width="20" height="20" /> Zarejestrowalem, mozesz sie zalogowac');
                   

                }
                else{
                        $("#error2").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Utworz kont2o');

                   

                }
            }
        });
        return false;
    }
    });
</script>