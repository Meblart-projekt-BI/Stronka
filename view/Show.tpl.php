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

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php?action=category&val=1" class="list-group-item">Krzesła</a>
                    <a href="index.php?action=category&val=2" class="list-group-item">Stoły</a>
                    <a href="index.php?action=category&val=3" class="list-group-item">Huśtawki</a>
                    <a href="index.php?action=category&val=4" class="list-group-item">Ławki</a>
                </div>
            </div>
            <!-- Content Column -->
            
              <!-- Blog Post Content Column -->
            <div class="col-md-9">
            <div class="row">    
                
                <h2><?=$this->result[0][0]['nazwa_produktu'];?></h2>

            <hr>
                <div class="col-md-7" style="alignment-adjust: left;">
                 <img class="img-responsive" src="<?=$this->result[0][0]['image'];?>"/>
                  </div>

                <div class="col-md-5">
                <div class="product_price">
                <h1 class="price"><?=$this->result[0][0]['cena_jednostkowa'];?> zł</h1>
                  </div>
                        
             <div class="">
                  <a href="index.php?action=addToCart&id=<?=$this->result[0][0]['id_produktu'];?>">
                       <button type="button" class="btn btn-default btn-lg">Do koszyka!</button>
                   </a>
             </div>
         
            <hr>
            <p> 
           <?=$this->result[0][0]['opis_produktu'];?>
            </p>
          
            <hr>
          
                </div> 
          </div>
          
          <div class="row">
           <div class="col-md-4">
          </div>
          </div>
          
           <div class="row">
           <?php if($this->result['klient']) { ?>
                <div class="well">
                    <h4>Komentarz</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                             <textarea class="form-control" rows="3" name="desc"></textarea>
                        </div>
                        <button type="submit" name="post" class="btn btn-primary">Udostępnij</button>
                    </form>
                </div>
        <?php } ?>
        
        <?php foreach ($this->result['opinie'] as $row) { ?>
        
                        <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                       <h4 class="media-heading"><?=$row['imie']." ".$row['nazwisko'];?>
                             <small><?=$row['data_wystawienia'];?></small>
                          </h4>
                         <?=$row['tresc'];?>
                        </div>
                </div>
                
                <?php } ?>

                    </div>
                </div>
            </div>

                <hr>
