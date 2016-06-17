<div class="container">
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

                <h2>Historia zamówień:</h2>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Data zamówienia</th>
                            <th class="column-title">Status zamówienia</th>
                            <th class="column-title">Koszt</th>
                            <th class="column-title">Faktura</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($this->result['zamowienia'] as $zamowienie) {
							$total = explode('<td id="total">', file_get_contents("http://".$_SERVER['HTTP_HOST']."/".$_SERVER['PHP_SELF']."?do=faktura&id=".$zamowienie['id_zamowienia']));
							$total = explode('</td>', $total[1]);
						?>
                            <tr class="even pointer">
                                <td class=" "><?=$zamowienie['data_zamowienia'];?></td>
                                <td class=" "><?=$zamowienie['status_zamowienia'];?></td>
                                <td class=" "><?=$total[0];?> pln</td>
                                <td class="last">
                                    <a href="index.php?do=faktura&id=<?=$zamowienie['id_zamowienia'];?>" class="btn btn-default">Pokaż
                            <span class="glyphicon glyphicon-download">
                            </span></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
