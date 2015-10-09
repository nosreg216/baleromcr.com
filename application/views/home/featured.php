<div class="col-sm-12">
<div class="page-header">
<h2><span class="glyphicon glyphicon-cd"></span>
Destacado
<a href="artist/0/Balerom"><small>Albums y Sencillos</small></a>
</h2>
</div>

<div class="thumnb-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 2}'>
<?php 
	// Gets the list of featured albums and outputs its content in the slider
	$query = $this->db->order_by('album_year DESC');
	$query = $this->db->get_where('db_album', array('isFeatured' => 1));
	foreach ($query->result_array() as $album) {
		$id = $album['album_id'];
		$title = $album['album_title'];
		$year = $album['album_year'];
		// Remove special characters from name (for the url)
		$url = str_replace(array(' ','.'),array('_',''),$album['album_title']);

		echo div_open("col-xs-6 col-md-3 hvr-underline-from-center");
			echo a_open("thumbnail", "album/$id/$url");
				echo img("data/music/albums/". $id ."/cover.png");
			echo a_close();
			echo heading($title . nbs(3) . $year, 5);
		echo div_close();
	}

	// Gets the list of featured songs and outputs its content in the slider
	$query = $this->db->order_by('song_year DESC');
	$query = $this->db->get_where('db_song', array('isFeatured' => 1));
	foreach ($query->result_array() as $song) {
		$id = $song['song_id'];
		$title = $song['song_title'];
		$year = $song['song_year'];
		// Remove special characters from name (for the url)
		$url = str_replace(array(' ','.'),array('_',''),$song['song_title']);

		echo div_open("col-xs-6 col-md-3 hvr-underline-from-center");
			echo a_open("thumbnail", "song/$id/$url");
				echo img("data/music/singles/". $id ."/cover.png");
			echo a_close();
			echo heading($title . nbs(3) . "(Sencillo)", 5);
		echo div_close();
	}
?>
</div>

</div>