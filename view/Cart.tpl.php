<div class="row">
	<div class="col-xs-2">
	</div>
	<div class="col-xs-8">
		<div class="panel panel-info">


			<div class="page-header">

			</div>

			<div class="panel-body">
				<form action="" method="post">
					<div class="row">

						<div class="col-xs-6">
							<h4 class="product-name"><strong><?=$this->result[0]['nazwa_produktu'];?></strong></h4><h4><small><?=$this->result[0]['opis_produktu'];?></small></h4>
						</div>

						<div class="col-xs-6">
							<div class="col-xs-8 text-right">
								<h6><strong>Cena produktu <span class="text-muted"><?=$this->result[0]['cena_jednostkowa']; ?> zł</span></strong></h6>
							</div>
							<div class="col-xs-4">
								<input type="text" name="ilosc" class="form-control input-sm" value="<?=$this->result[1];?>">
							</div>
						</div>
					</div>
					<input type="hidden" name="send" value="1">
					<hr>
			</div>

			<div class="panel-footer">

				<div class="row text-center">
					<div class="col-xs-9">
					</div>
					<div class="col-xs-3">
						<a href="javascript:history.go(-1)" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-share-alt"></span>Anuluj</a>
					</div>
				</div>

				<p>
				</p>

				<div class="row text-center">
					<div class="col-xs-9">
						<h4 class="text-right">

						</h4>
					</div>
					<div class="col-xs-3">
						<button type="submit" class="btn btn-success btn-block">Dodaj do zamowienia</button>
					</div>
				</div>
				<p></p>
				<div class="row text-center">
					<div class="col-xs-9"></div>
					<div class="col-xs-3">
						<p><a class="btn btn-primary btn-block" href="index.php?action=showCart">Zobacz koszyk</a></p>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="col-xs-2">
	</div>
</div>