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
            <div class="col-xs-2"></div>

            <!-- ELEMENT -->
            <div class="col-xs-8">
                <div class="text-center">
                    <h3>Krok 3 z 3 - Podsumowanie</h3>
                </div>
                <h4>Dane zamawiającego:</h4>
                <p>
                    <?php
                    echo $_SESSION['zamowienie']['imie'] . ' ';
                    echo $_SESSION['zamowienie']['nazwisko'] . '<br>';
                    echo $_SESSION['zamowienie']['miasto'] . ' ';
                    echo $_SESSION['zamowienie']['postcode'] . '<br>';
                    echo $_SESSION['zamowienie']['ulica'] . '<br>';
                    echo $_SESSION['zamowienie']['phone'] . '<br>';
                    echo 'Uwagi: ' . $_SESSION['zamowienie']['uwagi'];
                    ?>
                </p>
                <div>
                    <br />
                    <h4>Zamówione produkty:</h4>
                    <?php
                    foreach ($this->result['koszyk_widok'] as $id => $produkt) { ?>
                        <p>
                            <strong><?= $produkt['nazwa_produktu']; ?></strong>
                            <small>(<?= $produkt['ilosc']; ?> x <?= $produkt['cena_jednostkowa']; ?> pln)</small>
                        </p>
                    <?php } ?>
                    <br />
                    <h4>Szczegóły wysyłki:</h4>
                    <p><strong>Koszt zamówienia:</strong> <?= $this->result['kwota_zamowienia']; ?> pln</p>
                    <p><strong>Sposób dostawy:</strong> <?= $this->result['courier']['nazwa_dostawcy']; ?> <small>(<?= $this->result['courier']['cena_dostawy']; ?> pln)</small></p>
                    <p><strong>Całkowita kwota do zapłaty:</strong> <?= $this->result['calkowita_kwota']; ?> pln</p>
                </div>
                <div class="text-center">
                    <form action="index.php?action=order_step_4" method="POST">
                        <input class="btn btn-primary" value="Zapłać" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>