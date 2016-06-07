<?php
ob_start();
session_start();
error_reporting(~E_NOTICE);

?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System do internetowego sklepu ogrodniczego</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!--Nawigacja strony -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">


            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?action=showCart">Koszyk</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Strona główna</a>
                    </li>
					<li>
						<a href="index.php?action=category">Kategorie produktów</a>
					</li>
					<li>
                        <a href="index.php?action=oNas">O nas</a>
                    </li>
					<li>
                        <a href="index.php?action=kontakt">Kontakt</a>
                    </li>
                    <li>
                    <?php if($_SESSION['login'] == 'yes')  { ?>
						<a href="index.php?action=userpanel">Witaj: <?=$_SESSION['user']; ?></a>
					<?php } else { ?>
                        <a href="index.php?action=login">Zaloguj się</a>
                    <?php } ?>
					</li>
				<?php if($_SESSION['pracownik'])  { ?>
					<li>
						<a href="index.php?do=panel">Panel pracownika</a>
					</li>
				<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <?php


         foreach ($views as $view) echo $view;

         ?>

  <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; IO</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
<?php
ob_end_flush();

