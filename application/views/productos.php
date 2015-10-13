<div class="col-sm-12">
	<div class="page-header">
		<h2><span class="glyphicon glyphicon-gift"></span>Más Productos <a href=""><small> / Tienda Balerom</small></a></h2>
	</div>
<!-- Thumbnails -->
<div class="row">
<?php 
	for ($i=1; $i <= 4; $i++) { 
		echo div_open("col-xs-6 col-md-3");
			echo a_open("thumbnail", "#");
				echo img("http://placehold.it/500x300");
			echo a_close();
		echo div_close();		
	}
?>
</div>
</div>