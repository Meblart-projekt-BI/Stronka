
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kategorie produktów
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Strona główna</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        
         <!-- Sortowanie -->
         <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2"> 
            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
            Sortuj według: <span class="caret"></span>
            </button>
                <ul class="dropdown-menu">
                <li><a href="#">Sortuj A-Z</a></li>
                <li><a href="#">Sortuj Z-A</a></li>
                <li><a href="#">Sortuj cena-malejąco</a></li>
                <li><a href="#">Sortuj cena-rosnąco</a></li>
                </ul>
            </div>
        </div>
        <!--koniec sortowania -->

        <div class="row">
            <div class="col-lg-12">
             <hr>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
            <?php
            foreach ($this->result[1] as $row)
            {
            ?>
                    <a href="index.php?action=category&val=<?=$row['id_kategorii'];?>" class="list-group-item"><?=$row['nazwa_kategorii'];?></a>

            <?php } ?>
                </div>
            </div>
            
            
            <!-- Content Column -->
            <div class="col-md-9">
            <?php
            foreach ($this->result[0] as $row)
            {
            ?>
            <!-- Projects Row -->
            <div class="col-sm-4 col-xs-6">
                    <img class="img-responsive img-hover" src="<?=$row['image'];?>"/>
                <h3>
                    <a href="index.php?action=show&id=<?=$row['id_produktu'];?>"><?=$row['nazwa_produktu'];?></a>
                </h3>
                <h5><?=$row['cena_jednostkowa'];?> zł</h5>
              <!--  <p><?=$row['opis_produktu'];?></p> -->
            </div>
            
            <?php } ?>
            </div>
        </div>
        <!-- /.row -->

        <hr>