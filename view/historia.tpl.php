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
                        <?php foreach ($this->result['zamowienia'] as $zamowienie) { ?>
                            <tr class="even pointer">
                                <td class=" "><?=$zamowienie['data_zamowienia'];?></td>
                                <td class=" "><?=$zamowienie['status_zamowienia'];?></td>
                                <td class=" "><?=$zamowienie['koszt'];?> pln</td>
                                <td class="last">
                                    <button type="button" class="btn btn-default">Drukuj
                            <span class="glyphicon glyphicon-download">
                            </span></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
