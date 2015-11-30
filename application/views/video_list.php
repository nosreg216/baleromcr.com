<div class="col-sm-12">
	<div class="page-header">
		<h2>
			<span class="glyphicon glyphicon-film"></span>
			Video-Producciones
			<a href=""><small>Videos Musicales</small></a>
		</h2>
	</div>
<!-- Thumbnails -->
<?php 
	for ($i=1; $i <= 4; $i++) { 
		echo div_open("col-xs-6 col-md-3 hvr-underline-from-center");
			echo a_open("thumbnail", "#");
				echo img("data/videos/tmb/$i.png");
			echo a_close();
		echo div_close();		
	}
?>
</div>