<aside class="main-sidebar main-sidebar-custom sidebar-light-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo (base_url('kurir/Dashboard/index')) ?>" class="brand-link">
		<img src="assets/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .9">
		<span class="brand-text font-weight-light">Ekspedisi</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="assets/img/user.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?php echo (base_url('kurir/Dashboard/index')) ?>" class="d-block"><?php echo (strCut(session("nama"), 23)) ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?php echo (base_url('kurir/Dashboard')) ?>" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo (base_url('kurir/Pickup/index')) ?>" class="nav-link">
						<i class="nav-icon fa fa-people-carry"></i>
						<p>
							Pickup
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-shipping-fast"></i>
						<p>
							Delivery
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo (base_url('kurir/Deliver/index')) ?>" class="nav-link">
								<i class="fas fa-circle nav-icon"></i>
								<p>Delivery Barang</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo (base_url('kurir/Deliver/history')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Riwayat Delivery</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-header"><?php echo (strtoupper(session("level"))) ?></li>
				<li class="nav-item">
					<a href="<?php echo (base_url('kurir/Dashboard/update')) ?>" class="nav-link">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Profil Saya
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo (base_url('Home/logout')) ?>" class="nav-link">
						<i class="nav-icon fa fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>