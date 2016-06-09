  <!-- Our Customers -->
   <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
        <p>
        
        
        
        
        
        </p>
        </div>
        </div>
        
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
        <img src="images/Untitled-3.jpg" alt=""/>
        </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Polecane produkty</h3>
            </div>
             <?php
            foreach ($this->result[1] as $row)
            {
            ?>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="index.php?action=show&id=<?=$row['id_produktu'];?>"><img class="img-responsive customer-img" src="<?=$row['image'];?>" alt=""/></a>
            </div>
            <?php } ?>
        </div>
        <!-- /.row -->
        

        <hr/>