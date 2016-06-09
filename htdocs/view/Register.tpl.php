
<div class="signin-form">

<div class="container">



    <form class="form-signin" method="post" id="register-form">

        <h2 class="form-signin-heading">Zarejestruj sie</h2><hr />

        <div id="error">
            <!-- error will be showen here ! -->
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
        </div>

        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
            <span id="check-e"></span>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
        </div>
        <hr />

        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Utworz konto
            </button>
        </div>

    </form>
</div>
    </div>
<script type="text/javascript">
    $("#register-form").validate({
        rules:
        {
            user_name: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
            user_email: {
                required: true,
                email: true
            },
        },
        messages:
        {
            user_name: "please enter user name",
            password:{
                required: "please provide a password",
                minlength: "password at least have 8 characters"
            },
            user_email: "please enter a valid email address",
            cpassword:{
                required: "please retype your password",
                equalTo: "password doesn't match !"
            }
        },
        submitHandler: submitForm
    });
    
     $('#login').click(function()
        {
            var username=$("#username").val();
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

    function submitForm()
    {
        var data = $("#register-form").serialize();

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

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Email jest zajęty!</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Utw2orz konto');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('<img src="images/loader.gif" width="20" height="20" /> &nbsp;  ...');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("view/Login.tpl.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Utworz konto2');

                    });

                }
            }
        });
        return false;
    }
</script>