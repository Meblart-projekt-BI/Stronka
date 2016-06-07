<div class="row">
		 <div class="col-xs-2">
         </div>
        <div class="col-xs-8">
			<div class="panel panel-info">


            	    <div class="page-header">

					</div>

				<div class="panel-body">
					<form action="" method="post">
						<?php
						foreach ($this->result['koszyk_widok'] as $produkt) {
						?>
					<div class="row">

						<div class="col-xs-4">
							<h4 class="product-name"><strong><?=$produkt['nazwa_produktu'];?></strong></h4><h4></h4>
						</div>

                        <div class="col-xs-6">
							<div class="col-xs-7 text-right">
								<h6><strong>Cena produktu: <span class="text-muted"><?=$produkt['cena_jednostkowa']; ?> zł</span></strong></h6>
							</div>
							<div class="col-xs-3">
								<input type="text" name="ilosc" class="form-control input-sm" value="<?=$produkt['ilosc']?>">
							</div>
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
						<?php } ?>
					<input type="hidden" name="send" value="1">
					<hr>
				</div>

				<div class="panel-footer">

                <div class="row text-center">
						<div class="col-xs-9">
						</div>
						<div class="col-xs-3">
                                <a href="javascript:history.go(-1)" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span>Anuluj</a>
						</div>
					</div>

                    <p>
                    </p>

					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">
								<?php
								if($_POST['send'] ==  1)
								{
									echo "Cena: " . $this->params['price'];
									$btnName = "Dodaj do zamowienia";
								}
								else{
									$btnName = "Zatwierdź";
								}
								?>


							</h4>
						</div>
						<div class="col-xs-3">
						<button type="submit" class="btn btn-success btn-block"><?=$btnName;?></button>
						</div>
						<p><a href="index.php?action=showCart">przejdz do koszyka</a></p>
					</div>
				</div>
				</form>
			</div>
		</div>
        <div class="col-xs-2">
         </div>
	</div>