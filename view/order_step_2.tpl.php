<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista zakupów</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Strona główna</a>
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
            <div class="col-xs-8">
                <div class="text-center">
                    <h3>Krok 2 z 3 - Dostawa i płatność</h3>
                    <p>
                        Koszty przesyłki uzależnione są od gabarytów oraz ilości zakupionych produktów.
                        Poniżej przedstawione są szacunkowe koszty - ostateczne koszty przesyłamy w mailu potwierdzającym zamówienie.
                        Po otrzymaniu od nas maila można w ciągu "x" dni zmienić sposób wysyłki.</p>
                </div>
                <p>Wybierz sposób dostawy:</p>
                <form class="form-horizontal form-label-left" method="POST" action="index.php?action=order_step_3">
                    <?php
                    foreach ($this->result['couriers'] as $courier) {
                    ?>
                    <p>
                        <input required="required" type="radio" name="id_dostawcy" value="<?=$courier['id_dostawcy'];?>">
                        <?=$courier['nazwa_dostawcy'] . ' ' . $courier['cena_dostawy']?> PLN
                    </p>
                    <?php } ?>
                    <div class="text-center">
                        <a href="finalizacja_zamówienia1.html" class="btn btn-primary">Wróć - Dane osobowe</a>
                        <input type="submit" class="btn btn-success" value="Podsumowanie">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>