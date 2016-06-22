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
            <div class="col-xs-8">
                <div class="text-center">
                    <h3>Krok 1 z 2 - Dostawa i płatność</h3>
                    <p>
                        Koszty przesyłki uzależnione są od gabarytów oraz ilości zakupionych produktów.
                        Poniżej przedstawione są szacunkowe koszty - ostateczne koszty przesyłamy w mailu potwierdzającym zamówienie.
                        Po otrzymaniu od nas maila można w ciągu 2 dni zmienić sposób wysyłki.</p>
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
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Uwagi do zamówienia:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="uwagi" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="index.php?action=showCart" class="btn btn-primary">Wróć do koszyka</a>
                        <input class="btn btn-success" type="submit" value="Dostawa i płatność">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>