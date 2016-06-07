
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
                            <label>Imię i Nazwisko:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Numer telefonu:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Proszę wprowadź swój numer telefonu">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Adres email:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Proszę wprowadź swój adres email">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Wiadomość:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Wprowadź wiadomość" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

        <hr>
