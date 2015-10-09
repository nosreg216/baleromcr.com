<div class="container-fluid">
	<!-- Main Slider -->
	<div class="row">
		<?php $this->load->view('home/hero-slider'); ?>
	</div>

	<!-- Featured Albums Carousel + Promotions block -->
	<div class="row">
		<div class="col-sm-12 col-md-9">
			<?php $this->load->view('home/featured'); ?>
		</div>
		<div class="col-sm-12 col-md-3">
			<?php $this->load->view('global/sidebar-promo'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-9">
			<?php $this->load->view('home/videos'); ?>
			<?php $this->load->view('home/productos'); ?>
		</div>
		<div class="col-sm-12 col-md-3">
			<?php $this->load->view('global/sidebar-top'); ?>
		</div>
	</div>
</div><!--container-fluid-->