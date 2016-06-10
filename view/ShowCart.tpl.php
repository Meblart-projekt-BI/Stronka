<div class="row">
	<div class="col-xs-12">
		<h1 class="page-header">Koszyk</h1>
	</div>
</div>
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
					foreach ($this->result['koszyk_widok'] as $id => $produkt) {
						?>
						<div class="row">

							<div class="col-xs-4">
								<h4 class="product-name"><strong><?=$produkt['nazwa_produktu'];?></strong></h4><h4></h4>
							</div>

							<div class="col-xs-8">
								<div class="col-xs-7 text-right">
									<h6><strong>Cena produktu: <span class="text-muted"><?=$produkt['cena_jednostkowa']; ?> zł</span></strong></h6>
								</div>
								<div class="col-xs-3">
									<h6>Sztuk: <?=$produkt['ilosc']?></h6>
								</div>
								<div class="col-xs-2">
									<button type="button" class="btn btn-link btn-xs">
										<a href="index.php?action=addToCart&id=<?php echo $id; ?>&ilosc=<?php echo $produkt['ilosc']; ?>&modify=1">
											<span class="glyphicon glyphicon glyphicon-edit"></span>
										</a>
										<a href="index.php?action=showCart&id=<?php echo $id; ?>&remove=1">
											<span class="glyphicon glyphicon glyphicon-trash"></span>
										</a>
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
						<a href="index.php?action=category&val=1" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span>Kontynuuj zakupy</a>

					</div>
				</div>
				<p>
				</p>
				<div class="row text-center">
					<div class="col-xs-9">
						<h4 class="text-right">Razem do zapłaty <strong><?=$this->result['wartosc_calkowita']?> zł</strong></h4>
					</div>
					<div class="col-xs-3">
						<a href="index.php?action=order_step_1" class="btn btn-success btn-block">Do kasy</a>
					</div>
				</div>
			</div>

			</form>
		</div>
	</div>
	<div class="col-xs-2">
	</div>
</div>