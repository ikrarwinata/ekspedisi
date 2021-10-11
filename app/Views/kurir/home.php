<?php
$this->extend($Template->container);
$this->section('content');
?>
<div class="col-12 col-lg-6 col-xl-6">
	<!-- small box -->
	<div class="small-box bg-info">
		<div class="inner">
			<h3><?php echo (session("k_pick")) ?></h3>

			<p>Tugas Pickup</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="<?php echo (base_url('kurir/Pickup/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<div class="col-12 col-lg-6 col-xl-6">
	<!-- small box -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3><?php echo (session("k_deliv")) ?></h3>

			<p>Tugas Delivery</p>
		</div>
		<div class="icon">
			<i class="fa fa-shipping-fast"></i>
		</div>
		<a href="<?php echo (base_url('kurir/Deliver/index')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<?php $this->endSection(); ?>;