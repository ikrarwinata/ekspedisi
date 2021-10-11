<?php
$this->extend($Template->container);
$this->section('content');
?>
<div class="col-12 col-lg-4 col-xl-4">
	<!-- small box -->
	<div class="small-box bg-info">
		<div class="inner">
			<h3><?php echo (session("verivikasi")) ?></h3>

			<p>Pickup Baru</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="<?php echo (base_url('administrator/Master/verivikasi')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<div class="col-12 col-lg-4 col-xl-4">
	<!-- small box -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3><?php echo (session("d_cancel")) ?></h3>

			<p>Delivery Cancel</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="<?php echo (base_url('administrator/Master/verivikasi')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<div class="col-12 col-lg-4 col-xl-4">
	<!-- small box -->
	<div class="small-box bg-success">
		<div class="inner">
			<h3><?php echo (session("d_success")) ?></h3>

			<p>Delivery On Process</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="<?php echo (base_url('administrator/Master/verivikasi')) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>
<?php $this->endSection(); ?>;