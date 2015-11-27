<!-- Page-Specific  CSS -->
<style type="text/css">
	.panel-collapse{
		overflow: scroll;
		height: 50vh;
	}
	.wrapper{
		position: absolute;
		height: 100%;
		top: 0px;
		z-index: -500;
	}
	.panel{
		background-color: rgba(255,255,255,0.25);
		margin-top: 50px;
		border: none;
	}
	video{
		width: 100vw;
	}
</style>

<!-- Page Content -->
<div class="wrapper">
	<!-- Full Page Image Background Carousel Header -->
	<div id="myCarousel" class="carousel slide">
	    <!-- Wrapper for Slides -->
	    <div class="carousel-inner">
	        <div class="item active">
				<video autoplay>
				  <source src="data/banners/video_1.mp4" type="video/mp4">
				</video>
	        </div>
	        <div class="item">
	        	<img src="data/banners/wallpaper_1.jpg">
	        </div>
	        <div class="item">
				<img src="data/banners/wallpaper_1.jpg">
	        </div>
	    </div>
	</div>
</div>

<div class="container-fluid">
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="icon-next"></span>
	</a>
	<!-- Acordeon -->
	<div class="col-md-3">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          <strong>Discografia</strong>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
					<?php album_list_thumbnail($albumList); ?>	
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          <strong>Sencillos</strong>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
					<?php 
						foreach ($albumList as $album) {
							$id = $album['album_id'];
							$title = $album['album_title'];
							$year = $album['album_year'];
							echo div_open("col-md-6");
								echo a_open("thumbnail", base_url()."album/$id");
									echo img("data/music/albums/$id/cover.png");
								echo a_close();
							echo div_close();
						}
					?>	
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          <strong>Videos</strong>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
					<?php 
						foreach ($albumList as $album) {
							$id = $album['album_id'];
							$title = $album['album_title'];
							$year = $album['album_year'];
							echo div_open("col-md-6");
								echo a_open("thumbnail", base_url()."album/$id");
									echo img("data/music/albums/$id/cover.png");
								echo a_close();
							echo div_close();
						}
					?>	
		      </div>
		    </div>
		  </div>
		</div>
	</div><!-- End of Acordeon -->	
</div><!--container-fluid-->